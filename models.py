from flask_sqlalchemy import SQLAlchemy

db = SQLAlchemy()

class Admin(db.model):
    __tablemane__= "admin"
    id = db.Column(db.Integer, primary_key = True)
    username = db.Column(db.String, nullable = False, unique = True)
    password = db.Column(db.String, nullable = False)
    