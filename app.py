from flask import Flask, session, render_template, request, redirect
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
def index():
    if ('user' in session):
        return 'Xin chào, {}'.format(session['user'])
    if request.method == 'POST':
        email = request.form.get('email')
        password = request.form.get('password')
        try: 
            user = auth.sign_in_with_email_and_password(email, password)
            session['user'] = email
        except:
            return 'Đăng nhập thất bại !' 
    return render_template('home.html')

@app.route('/logout')
def logout():
    session.pop('user')
    return redirect('/')

if __name__ == '__main__':
    app.run(port=1111)