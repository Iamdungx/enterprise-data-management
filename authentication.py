import pyrebase

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

email = 'test12345@gmail.com'
password = '1234567'

# user = auth.create_user_with_email_and_password(email, password)
# print(user)

user = auth.sign_in_with_email_and_password(email, password)

info = auth.get_account_info(user['idToken'])
print(info)

# auth.send_email_verification(user(['idToken'])) // Xác thực email
# auth.send_password_reset_email(user['idToken']) // Gửi yêu cầu reset lại password cho email


