<?php
include_once '../includes/db.php';
session_start();
if(!isset($_SESSION['teacher_id'])) header("Location: teacher-login.php");

if(isset($_GET['id'])){
    $stmt = $pdo->prepare("DELETE FROM teachers WHERE id=?");
    $stmt->execute([$_GET['id']]);
}
header("Location: view-teacher.php");
exit();

