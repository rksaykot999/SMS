<?php
include_once '../includes/db.php';
session_start();

if(!isset($_SESSION['teacher_id'])){
    header("Location: teacher-login.php");
    exit();
}

if(!isset($_GET['id'])){
    header("Location: view-teacher.php");
    exit();
}

$id = $_GET['id'];

// fetch teacher info
$stmt = $pdo->prepare("SELECT * FROM teachers WHERE id=?");
$stmt->execute([$id]);
$teacher = $stmt->fetch();

if(!$teacher){
    header("Location: view-teacher.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    $shift = $_POST['shift'];
    $qualification = $_POST['qualification'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $image_name = $teacher['image'];
    if(!empty($_FILES['image']['name'])){
        $image_name = time().'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../public/uploads/'.$image_name);
    }

    $stmt = $pdo->prepare("UPDATE teachers SET name=?, designation=?, department=?, shift=?, qualification=?, phone=?, email=?, image=? WHERE id=?");
    $stmt->execute([$name, $designation, $department, $shift, $qualification, $phone, $email, $image_name, $id]);

    header("Location: view-teacher.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Teacher</title>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/edit-teacher.css">

</head>
<body>
 <a href="view-teacher.php" class="back-btn">← Back to Teacher List</a>
<div class="container">
    
    <h2>Edit Teacher</h2>
    <form method="post" enctype="multipart/form-data">
        <label>Current Image:</label>
        <img src="<?php echo !empty($teacher['image']) ? '../public/uploads/'.$teacher['image'] : '../assets/images/default-teacher.png'; ?>" class="current-img">
        <input type="file" name="image" accept="image/*">

        <input type="text" name="name" placeholder="Name" value="<?php echo htmlspecialchars($teacher['name']); ?>" required>
        <input type="text" name="designation" placeholder="Designation" value="<?php echo htmlspecialchars($teacher['designation']); ?>" required>
        <input type="text" name="department" placeholder="Department" value="<?php echo htmlspecialchars($teacher['department']); ?>" required>
        <input type="text" name="shift" placeholder="Shift" value="<?php echo htmlspecialchars($teacher['shift']); ?>" required>
        <input type="text" name="qualification" placeholder="Qualification" value="<?php echo htmlspecialchars($teacher['qualification']); ?>" required>
        <input type="text" name="phone" placeholder="Phone" value="<?php echo htmlspecialchars($teacher['phone']); ?>" required>
        <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($teacher['email']); ?>" required>

        <button type="submit">Update Teacher</button>
    </form>
</div>

</body>
</html>

