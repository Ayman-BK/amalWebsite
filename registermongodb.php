// Terminal

sudo pecl install mongodb

extension=mongodb.so

composer require mongodb/mongodb

// Code


<?php
require 'vendor/autoload.php'; // ضروري إذا تستخدم Composer

try {
    // الاتصال بقاعدة البيانات
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $collection = $client->users_db->users; // users_db اسم الداتا بيز، users اسم الكولكشن

    // استقبال البيانات من الفورم
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // تشفير الباسورد
    $privacy = isset($_POST['privacy']) ? true : false;

    if (!$privacy) {
        die("يجب أن توافق على سياسة الخصوصية!");
    }

    // إنشاء الدوكيومنت للتخزين
    $insertOneResult = $collection->insertOne([
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ]);

    echo "تم تسجيل المستخدم بنجاح!";
} catch (Exception $e) {
    echo "خطأ بالاتصال أو بالتخزين: " . $e->getMessage();
}
?>
