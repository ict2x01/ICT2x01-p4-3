from flask import Flask, render_template

app = Flask(__name__)

# Decorator that turns a regular Python function into a Flask view function
@app.route('/')
def index():
    return render_template('index.html')