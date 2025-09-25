<?php
include_once '../includes/db.php';
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $stmt = $pdo->prepare("SELECT * FROM teachers WHERE username=? LIMIT 1");
        $stmt->execute([$username]);
        $teacher = $stmt->fetch();

        if ($teacher && $password === $teacher['password']) { 
            // এখানে চাইলে password_hash ব্যবহার করতে পারেন
            $_SESSION['teacher_id'] = $teacher['id'];
            header("Location: teacher-dashboard.php");
            exit();
        } else {
            $error = "⚠ ভুল Username বা Password!";
        }
    } else {
        $error = "⚠ সব ঘর পূরণ করুন!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>BPI Teacher Portal</title>
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
    body { font-family: 'Inter', sans-serif; }
    .error { color: red; text-align: center; margin-bottom: 10px; font-weight: bold; }
</style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-green-500 via-teal-600 to-blue-700 p-4 sm:p-6">

<div class="bg-white p-12 rounded-3xl shadow-2xl w-full max-w-sm sm:max-w-md hover:scale-105 duration-300">
    <div class="flex flex-col items-center mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-teal-600 mb-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
        </svg>
        <h2 class="text-3xl font-bold text-center text-gray-800">Teacher Login</h2>
    </div>

    <?php if ($error): ?>
        <p class="error"><?= $error; ?></p>
    <?php endif; ?>

    <form method="post" action="" class="space-y-6">
        <div>
            <label for="teacher-username" class="block text-gray-700 font-medium mb-2">Username</label>
            <input type="text" id="teacher-username" name="username" placeholder="Enter Username"
                class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-transparent" required>
        </div>
        <div>
            <label for="teacher-password" class="block text-gray-700 font-medium mb-2">Password</label>
            <input type="password" id="teacher-password" name="password" placeholder="Enter Password"
                class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-teal-400 focus:border-transparent" required>
        </div>
        <button type="submit"
            class="w-full bg-teal-600 text-white py-3 rounded-xl font-semibold hover:bg-teal-700 transition-colors transform hover:scale-105 shadow-lg">
            Login
        </button>
    </form>

    <div class="text-center mt-6 text-sm">
        <a href="#" class="text-teal-600 hover:underline font-medium">Forgot Password?</a>
        <span class="text-gray-400 mx-2">•</span>
        <a href="index.php" class="text-teal-600 hover:underline font-medium">Back to Homepage</a>
    </div>
</div>

</body>
</html>
