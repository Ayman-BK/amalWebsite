<?php
$file = 'users.json';

if (file_exists($file)) {
    $data = json_decode(file_get_contents($file), true);
} else {
    $data = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username && $email && $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $newUser = [
            'username' => $username,
            'email' => $email,
            'password' => $hashedPassword,
            'created_at' => date('Y-m-d H:i:s')
        ];

        // أضف المستخدم
        $data[] = $newUser;

        // حاول كتابة البيانات إلى ملف
        if (file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT))) {
            echo "✅ تم التسجيل بنجاح!";
        } else {
            echo "❌ فشل في تخزين البيانات!";
        }
    } else {
        echo "❌ كل الحقول مطلوبة!";
    }
} else {
    echo "❌ طلب غير صالح!";
}
?>
