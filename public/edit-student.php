<?php
include_once '../includes/db.php';
session_start();

// Teacher login check
if(!isset($_SESSION['teacher_id'])){
    header("Location: teacher-login.php");
    exit();
}

$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM students WHERE id=?");
$stmt->execute([$id]);
$student = $stmt->fetch();
if(!$student){ die("Student not found"); }

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

    if(isset($_FILES['image']) && $_FILES['image']['error'] === 0){
        $img_name = time().'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../public/uploads/'.$img_name);
    } else {
        $img_name = $student['image']; // keep old image
    }

    $stmt = $pdo->prepare("UPDATE students SET name=?,roll=?,registration=?,department=?,semester=?,session=?,shift=?,father_name=?,mother_name=?,father_phone=?,mother_phone=?,present_address=?,permanent_address=?,phone=?,result=?,image=? WHERE id=?");
    if($stmt->execute([$name,$roll,$registration,$department,$semester,$session,$shift,$father_name,$mother_name,$father_phone,$mother_phone,$present_address,$permanent_address,$phone,$result,$img_name,$id])){
        $success = "Student updated successfully!";
        // Refresh student data
        $stmt = $pdo->prepare("SELECT * FROM students WHERE id=? LIMIT 1");
        $stmt->execute([$id]);
        $student = $stmt->fetch();
    } else {
        $error = "Failed to update student!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Student</title>
<link rel="stylesheet" href="../assets/css/edit-student.css">

</head>
<body>
<!-- Back Button -->
    <a href="teacher-dashboard.php" class="back-btn">
        <img src="../assets/images/back.png" alt="Back"> Back
    </a>

<div class="container">
    <h2>Edit Student</h2>

    <?php if($error) echo "<p class='message error'>$error</p>"; ?>
    <?php if($success) echo "<p class='message success'>$success</p>"; ?>

    <form method="post" enctype="multipart/form-data">
        <input type="text" name="name" value="<?php echo htmlspecialchars($student['name']); ?>" required>
        <input type="text" name="roll" value="<?php echo htmlspecialchars($student['roll']); ?>" required>
        <input type="text" name="registration" value="<?php echo htmlspecialchars($student['registration']); ?>" required>
        <input type="text" name="department" value="<?php echo htmlspecialchars($student['department']); ?>" required>
        <input type="text" name="semester" value="<?php echo htmlspecialchars($student['semester']); ?>" required>
        <input type="text" name="session" value="<?php echo htmlspecialchars($student['session']); ?>" required>
        <input type="text" name="shift" value="<?php echo htmlspecialchars($student['shift']); ?>" required>
        <input type="text" name="father_name" placeholder="Father Name" value="<?= htmlspecialchars($student['father_name'] ?? '') ?>" required>
        <input type="text" name="mother_name" placeholder="Mother Name" value="<?= htmlspecialchars($student['mother_name'] ?? '') ?>" required>
        <input type="text" name="father_phone" placeholder="Father Phone" value="<?= htmlspecialchars($student['father_phone'] ?? '') ?>" required>
        <input type="text" name="mother_phone" placeholder="Mother Phone" value="<?= htmlspecialchars($student['mother_phone'] ?? '') ?>" required>
        <input type="text" name="present_address" placeholder="Present Address" value="<?= htmlspecialchars($student['present_address'] ?? '') ?>" required>
        <input type="text" name="permanent_address" placeholder="Permanent Address" value="<?= htmlspecialchars($student['permanent_address'] ?? '') ?>" required>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($student['phone']); ?>" required>
        <input type="text" name="result" value="<?php echo htmlspecialchars($student['result']); ?>" required>
        <input type="file" name="image" accept="image/*">
        <button type="submit">Update Student</button>
    </form>
</div>

</body>
</html>
