import json
import hashlib
from datetime import datetime
from flask import Flask, request, jsonify

app = Flask(__name__)
file = 'users.json'

# قراءة البيانات من الملف إذا كانت موجودة
def read_data():
    try:
        with open(file, 'r') as f:
            return json.load(f)
    except FileNotFoundError:
        return []

# كتابة البيانات إلى الملف
def write_data(data):
    with open(file, 'w') as f:
        json.dump(data, f, indent=4)

@app.route('/register', methods=['POST'])
def register_user():
    data = read_data()

    username = request.form.get('username')
    email = request.form.get('email')
    password = request.form.get('password')

    if username and email and password:
        # تجزئة كلمة المرور
        hashed_password = hashlib.sha256(password.encode()).hexdigest()

        new_user = {
            'username': username,
            'email': email,
            'password': hashed_password,
            'created_at': datetime.now().strftime('%Y-%m-%d %H:%M:%S')
        }

        # إضافة المستخدم الجديد
        data.append(new_user)

        # محاولة كتابة البيانات إلى الملف
        try:
            write_data(data)
            return jsonify({"message": "✅ تم التسجيل بنجاح!"})
        except Exception as e:
            return jsonify({"message": "❌ فشل في تخزين البيانات!"}), 500
    else:
        return jsonify({"message": "❌ كل الحقول مطلوبة!"}), 400

if __name__ == '__main__':
    app.run(debug=True)
