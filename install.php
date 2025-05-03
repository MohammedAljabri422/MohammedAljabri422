<?php
$servername = "localhost";
$username = "root";
$password = "";

// إنشاء الاتصال بالسيرفر
$conn = new mysqli($servername, $username, $password);

// فحص الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بالسيرفر: " . $conn->connect_error);
}

// إنشاء قاعدة بيانات باسم accounting_system
$dbname = "accounting_system";
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "✅ تم إنشاء قاعدة البيانات بنجاح!<br>";
} else {
    echo "❌ خطأ في إنشاء قاعدة البيانات: " . $conn->error;
}

// إغلاق الاتصال بالسيرفر
$conn->close();

// إعادة الاتصال بقاعدة البيانات الجديدة
$conn = new mysqli($servername, $username, $password, $dbname);

// إنشاء جدول المستخدمين
$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) NOT NULL,
    status VARCHAR(20) DEFAULT 'مفعل'
)";

if ($conn->query($sql_users) === TRUE) {
    echo "✅ تم إنشاء جدول المستخدمين بنجاح!<br>";
} else {
    echo "❌ خطأ في إنشاء جدول المستخدمين: " . $conn->error;
}

$conn->close();
?>
