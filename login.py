from flask import Flask, session, render_template, request, redirect, jsonify, url_for
from flask_mysqldb import MySQL

app = Flask(__name__)

app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'enterprise_data_management'

app.secret_key = 'secret'

mySQL = MySQL(app)

@app.route('/', methods=['POST', 'GET'])
def authenticate():
    
    login_failed_message = None  # Initialize the variable
    
    if request.method == 'GET':
        return render_template('index.html')
    
    if request.method == 'POST':
        username = request.form.get('username')
        password = request.form.get('password')
        
        cursor = mySQL.connection.cursor()
        cursor.execute(''' SELECT username, password FROM login WHERE username = %s AND password = %s ''', (username, password))
        user = cursor.fetchone()
        cursor.close()
        
        if user:
            session['user'] = username
            return render_template('employee-manager.html')
        else:
            login_failed_message = 'Đăng nhập thất bại !'
            return render_template('index.html', login_failed_message=login_failed_message)

@app.route('/manager')
def manager():
    if 'user' in session:
        return render_template('employee-manager.html')
    else:
        return redirect(url_for('login'))
    
# @app.route('/logout')
# def logout():
#     # Xóa phiên đăng nhập và chuyển hướng về trang đăng nhập
#     session.pop('user', None)
#     return render_template('index.html')

@app.route('/logout', methods=['POST', 'GET'])
def logout():
    session.pop('user', None)
    # You can return a JSON response if needed
    return jsonify({'status': 'success'})

if __name__ == '__main__':
    app.run(debug=True)