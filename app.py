from flask import Flask, session, render_template, request, redirect, jsonify, url_for
from flask_mysqldb import MySQL
import random

app = Flask(__name__)

app.config['MYSQL_HOST'] = 'mrournnys-macbook-pro.local' # Đổi đoạn string trong '' thành domain của phpAdmin
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'enterprise_data_management'

app.secret_key = 'secret'

mySQL = MySQL(app)

@app.route('/manager')
def manager():
    if 'user' in session:
        return render_template('employee-information.html')
    else:
        return render_template('login.html')

# Login
@app.route('/', methods=['POST', 'GET'])
def login():
    login_failed_message = None  # Initialize the variable
    
    if request.method == 'GET':
        return render_template('login.html')
    
    if request.method == 'POST':
        username = request.form.get('username')
        password = request.form.get('password')
        
        cursor = mySQL.connection.cursor()
        cursor.execute(''' SELECT username, password FROM login WHERE username = %s AND password = %s ''', (username, password))
        user_role = cursor.execute(''' SELECT role FROM login WHERE username = %s AND password = %s ''')
        user_role.fetchone()
        user = cursor.fetchone()
        cursor.close()
        
        print(user_role)
        if user:
            session['user'] = username
            session['user_role'] = user_role

            return redirect(url_for('employee_information'))
        else:
            login_failed_message = 'Đăng nhập thất bại !'
            return render_template('login.html', login_failed_message=login_failed_message)

@app.route('/employee_information', methods=['POST', 'GET'])
def index():
    cursor = mySQL.connection.cursor()
    cursor.execute(''' SELECT * FROM employee ''')
    data = cursor.fetchall()
    cursor.close()

    user_role = session.get('user_role')
    print (user_role)
    # if user_role == 'admin_dev':
    return render_template('employee-information.html', employees = data)


# def index():
#     cursor = mySQL.connection.cursor()
#     try:
#         cursor.execute(' SELECT * FROM employee ')
#         data = cursor.fetchall()
#         print("Data retrieved successfully:", data)
#     except Exception as e:
#         print("Error retrieving data from the database:", e)
#         data = []

#     cursor.close()

#     return render_template('employee-manager.html', employees=data)


# @app.route('/manager')
# def manager():
#     if 'user' in session:
#         return render_template('employee-manager.html')
#     else:
#         return redirect(url_for('login'))
    
# @app.route('/logout')
# def logout():
#     # Xóa phiên đăng nhập và chuyển hướng về trang đăng nhập
#     session.pop('user', None)
#     return render_template('index.html')
# ADD Data 
@app.route('/insert', methods = ['POST'])
def insert():
    if request.method == "POST":
        # flash("Data Inserted Successfully")
        id = createIDEmployee()
        first_name = request.form['first_name']
        last_name = request.form['last_name']
        address = request.form['address']
        date_of_birth = request.form['date_of_birth']
        phone = request.form['phone']
        email = request.form['email']
        hire_date = request.form['hire_date']
        department = request.form['department']
        position = request.form['position']
        cur = mySQL.connection.cursor()
        cur.execute("INSERT INTO employee (id, first_name, last_name, address, date_of_birth, phone, email, hire_date, department ,position) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                    (id, first_name, last_name, address, date_of_birth, phone, email, hire_date, department, position))
        mySQL.connection.commit()
        
        return redirect(url_for('index'))
    
@app.route('/update/<string:id_employee>', methods=['POST', 'GET'])
def update(id_employee):
    cur = mySQL.connection.cursor()
    cur.execute("SELECT * FROM employee WHERE id = %s", (id_employee,))
    employee = cur.fetchone()
    cur.close()

    if request.method == 'POST':
        # Get form data
        first_name = request.form['first_name']
        last_name = request.form['last_name']
        address = request.form['address']
        date_of_birth = request.form['date_of_birth']
        phone = request.form['phone']
        email = request.form['email']
        hire_date = request.form['hire_date']
        department = request.form['department']
        position = request.form['position']

        # Update employee information in the database
        cur = mySQL.connection.cursor()
        cur.execute("""
            UPDATE employee 
            SET first_name = %s, last_name = %s, address = %s, date_of_birth = %s, phone = %s, email = %s, hire_date = %s, department = %s, position = %s
            WHERE id = %s
        """, (first_name, last_name, address, date_of_birth, phone, email, hire_date, department, position, id_employee))
        mySQL.connection.commit()
        cur.close()
    return redirect(url_for('index'))

@app.route('/delete/<string:id_employee>', methods=['GET'])
def delete(id_employee):
    cur = mySQL.connection.cursor()
    # Xóa tất cả các hàng từ bảng login có liên kết với nhân viên được chỉ định
    cur.execute("DELETE FROM login WHERE employee_id = %s", (id_employee,))
    # Sau đó xóa nhân viên
    cur.execute("DELETE FROM employee WHERE id = %s", (id_employee,))
    mySQL.connection.commit()
    return redirect(url_for('index'))
 
@app.route('/logout', methods=['POST', 'GET'])
def logout():
    session.pop('user', None)
    # You can return a JSON response if needed
    return redirect(url_for('login'))
    
# @app.route('/delete', methods=['POST'])
# def delete():
#     if request.method == "POST":
#         try:
#             employee_id = request.form['employee_id']
#             cur = mySQL.connection.cursor()
#             cur.execute("DELETE FROM employee WHERE id = %s", (employee_id,))
#             mySQL.connection.commit()
#             flash("Employee data deleted successfully", "success")
#             return redirect(url_for('employee_manager'))
#         except Exception as e:
#             flash("An error occurred while deleting employee data", "error")
#             # Log the exception or handle it appropriately
#             return redirect(url_for('employee_manager'))

if __name__ == '__main__':
    app.run(debug=True)

# Chức năng khác
    
def createIDEmployee(): # Tạo mã số nhân viên
    id_employee = 'HUMG' + str(random.randint(100001, 999999))

    cursor = mySQL.connection.cursor()
    cursor.execute(''' SELECT id FROM employee''')
    checkIDs = cursor.fetchall()
    cursor.close()

    for checkID in checkIDs:
        if checkID[0] == id_employee:
            return createIDEmployee()  # Tạo lại mã nếu trùng
    return id_employee  # Trả về mã mới nếu không trùng



# update data

