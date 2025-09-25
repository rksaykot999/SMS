<?php
include_once '../includes/db.php';
session_start();
if(!isset($_SESSION['teacher_id'])){ header("Location: teacher-login.php"); exit(); }

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("DELETE FROM students WHERE id=?");
$stmt->execute([$id]);
header("Location: teacher-dashboard.php");
exit();

