<?php
// الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password = ""; // اذا عندك باسوورد للـ MySQL اكتبه هنا
$dbname = "users_db";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// تحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// استقبال البيانات من الفورم
$user = $_POST['username'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // تشفير الباسورد

// استعلام الإدخال
$sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "تم تسجيل الحساب بنجاح!";
} else {
    echo "خطأ: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
