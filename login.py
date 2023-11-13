from create import *

@app.route("/home")
def renderLogin():
    return render_template("employee-manager.html")

# login
# @app.route("/login", methods=["POST", "GET"])
# def login():
#     if request.method == "POST":
#         user_name = request.form["name"]
#         user_password = request.form["password"]
#         user = Admin(username = user_name, password = user_password)
#         db.session.add(user)
#         db.session.commit()

#         if user_name and user_password:
#             return render_template("templates/employee-manager.html")
#     return render_template("index.html")

@app.route('/login', methods=['GET', 'POST'])
def login():
    error = None
    if request.method == 'POST':
        if request.form['name'] != 'admin' or request.form['password'] != 'admin':
            error = 'Invalid Credentials. Please try again.'
        else:
            return redirect(url_for('employee-manager.html'))
    return render_template('index.html', error=error)