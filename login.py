from flask import Flask, session, render_template, request, redirect, jsonify
import pyrebase

app = Flask(__name__)

config = {
    'apiKey': "AIzaSyCiM3nEkc0Eh3rpyOTELTtZnxz8rn2fafc",
    'authDomain': "enterprise-data-manager.firebaseapp.com",
    'projectId': "enterprise-data-manager",
    'storageBucket': "enterprise-data-manager.appspot.com",
    'messagingSenderId': "798644344070",
    'appId': "1:798644344070:web:53485cefdb56d98624fa87",
    'measurementId': "G-4QKL3S5TER",
    'databaseURL': ''
}

firebase = pyrebase.initialize_app(config)
auth = firebase.auth()

app.secret_key = 'secret'


@app.route('/', methods=['POST', 'GET'])
def authenticate():
    login_failed_message = None  # Initialize the variable
    if 'user' in session:
        return login()
    if request.method == 'POST':
        username = request.form.get('username')
        password = request.form.get('password')
        try:
            user = auth.sign_in_with_email_and_password(username, password)
            session['user'] = username
            return render_template('employee-manager.html')
        except:
            login_failed_message = 'Đăng nhập thất bại !'
    return render_template('index.html', login_failed_message=login_failed_message)

def login():
    return render_template('employee-manager.html')

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
    app.run(port=1111, debug=True)