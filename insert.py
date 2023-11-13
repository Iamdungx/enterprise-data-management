from flask import Flask
from models import *

app = Flask(__name__)
app.config["SQLALCHEMY_DATABASE_URI"] = "link"
app.config["SQLALCHEMY_TRACK_MODIFICATIONS"] = False
db.init_app(app)

def main():
    admin = Admin(username="ntvd", password="05082003")
    db.session.add(admin)
    db.session.commit()

if __name__ == "__main__":
    with app.app_context():
        main()