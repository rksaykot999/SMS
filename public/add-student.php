<?php
include_once '../includes/db.php';
session_start();

// Teacher login check
if(!isset($_SESSION['teacher_id'])){
    header("Location: teacher-login.php");
    exit();
}

$error = "";
$success = "";

// Form submit
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $registration = $_POST['registration'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $session = $_POST['session'];
    $shift = $_POST['shift'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $father_phone = $_POST['father_phone'];
    $mother_phone = $_POST['mother_phone'];
    $present_address = $_POST['present_address'];
    $permanent_address = $_POST['permanent_address'];
    $phone = $_POST['phone'];
    $result = $_POST['result'];

    // Image upload
    if(isset($_FILES['image']) && $_FILES['image']['error'] === 0){
        $img_name = time().'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../public/uploads/'.$img_name);
    } else { 
        $img_name = NULL; 
    }

    // Insert student
    $stmt = $pdo->prepare("INSERT INTO students(name,roll,registration,department,semester,session,shift,father_name,mother_name,father_phone,mother_phone,present_address,permanent_address,phone,result,image) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    if($stmt->execute([$name,$roll,$registration,$department,$semester,$session,$shift,$father_name,$mother_name,$father_phone,$mother_phone,$present_address,$permanent_address,$phone,$result,$img_name])){
        $success = "Student added successfully!";
    } else {
        $error = "Failed to add student!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Student</title>
<link rel="stylesheet" href="../assets/css/add-student.css">

</head>
<body>

<div class="container">

     <!-- Back Button -->
    <a href="teacher-dashboard.php" class="back-btn">
        <img src="../assets/images/back.png" alt="Back"> Back
    </a>

    <h2>Add Student</h2>

    <?php if($error) echo "<p class='message error'>$error</p>"; ?>
    <?php if($success) echo "<p class='message success'>$success</p>"; ?>

    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="roll" placeholder="Roll" required>
        <input type="text" name="registration" placeholder="Registration" required>
        <input type="text" name="department" placeholder="Department" required>
        <input type="text" name="semester" placeholder="Semester" required>
        <input type="text" name="session" placeholder="Session" required>
        <input type="text" name="shift" placeholder="Shift" required>
        <input type="text" name="Father Name" placeholder="Father Name" required>
        <input type="text" name="Mother Name" placeholder="Mother Name" required>
        <input type="text" name="Father Phone" placeholder="Father Phone" required>
        <input type="text" name="Mother Phone" placeholder="Mother Phone" required>
        <input type="text" name="Present Address" placeholder="Present Address" required>
        <input type="text" name="Permanent Address" placeholder="Permanent Address" required>
        <input type="text" name="phone" placeholder="Phone" required>
        <input type="text" name="result" placeholder="Result" required>
        <input type="file" name="image" accept="image/*">
        <button type="submit">Add Student</button>
    </form>
</div>

</body>
</html>
