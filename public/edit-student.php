<?php
// public/edit-student.php
session_start();
require_once __DIR__ . '/../includes/db.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}

$id = $_GET['id'] ?? null;
if (!$id) {
    die("Invalid request");
}

// fetch student
$stmt = $pdo->prepare("SELECT * FROM students WHERE id=?");
$stmt->execute([$id]);
$student = $stmt->fetch();
if (!$student) {
    die("Student not found!");
}

$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE students SET 
                name=?, roll=?, registration=?, department=?, semester=?, session=?, shift=?,
                father_name=?, mother_name=?, father_phone=?, mother_phone=?,
                present_address=?, permanent_address=?, phone=?, 
                result=?
            WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $_POST['name'], $_POST['roll'], $_POST['registration'], $_POST['department'], $_POST['semester'],
        $_POST['session'], $_POST['shift'], $_POST['father_name'], $_POST['mother_name'],
        $_POST['father_phone'], $_POST['mother_phone'], $_POST['present_address'], $_POST['permanent_address'],
        $_POST['phone'], $_POST['result'], $id
    ]);

    // image update (optional)
    if (!empty($_FILES['image']['name'])) {
        $imagePath = "/students/" . time() . "_" . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], __DIR__ . '/../uploads' . $imagePath);
        $pdo->prepare("UPDATE students SET image=? WHERE id=?")->execute([$imagePath, $id]);
    }

    // reg_paper_image update
    if (!empty($_FILES['reg_paper_image']['name'])) {
        $regImagePath = "/students/" . time() . "_" . basename($_FILES['reg_paper_image']['name']);
        move_uploaded_file($_FILES['reg_paper_image']['tmp_name'], __DIR__ . '/../uploads' . $regImagePath);
        $pdo->prepare("UPDATE students SET reg_paper_image=? WHERE id=?")->execute([$regImagePath, $id]);
    }

    $success = true;
    // Refresh student data
    $stmt = $pdo->prepare("SELECT * FROM students WHERE id=?");
    $stmt->execute([$id]);
    $student = $stmt->fetch();
}
?>
<!doctype html>
<html lang="bn">
<head>
  <meta charset="utf-8">
  <title>Edit Student</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
  <h3 class="mb-3">Edit Student</h3>

  <?php if($success): ?>
    <script>alert("✅ Update সফল হয়েছে!");</script>
  <?php endif; ?>

  <form method="post" enctype="multipart/form-data" class="card p-3 shadow-sm">
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="<?=htmlspecialchars($student['name'])?>" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Roll</label>
        <input type="text" name="roll" class="form-control" value="<?=htmlspecialchars($student['roll'])?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Registration</label>
        <input type="text" name="registration" class="form-control" value="<?=htmlspecialchars($student['registration'])?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Department</label>
        <input type="text" name="department" class="form-control" value="<?=htmlspecialchars($student['department'])?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Semester</label>
        <input type="text" name="semester" class="form-control" value="<?=htmlspecialchars($student['semester'])?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Session</label>
        <input type="text" name="session" class="form-control" value="<?=htmlspecialchars($student['session'])?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Shift</label>
        <input type="text" name="shift" class="form-control" value="<?=htmlspecialchars($student['shift'])?>">
      </div>

      <div class="col-md-6">
        <label class="form-label">Father's Name</label>
        <input type="text" name="father_name" class="form-control" value="<?=htmlspecialchars($student['father_name'])?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Mother's Name</label>
        <input type="text" name="mother_name" class="form-control" value="<?=htmlspecialchars($student['mother_name'])?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Father Phone</label>
        <input type="text" name="father_phone" class="form-control" value="<?=htmlspecialchars($student['father_phone'])?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Mother Phone</label>
        <input type="text" name="mother_phone" class="form-control" value="<?=htmlspecialchars($student['mother_phone'])?>">
      </div>
      <div class="col-md-12">
        <label class="form-label">Present Address</label>
        <textarea name="present_address" class="form-control"><?=htmlspecialchars($student['present_address'])?></textarea>
      </div>
      <div class="col-md-12">
        <label class="form-label">Permanent Address</label>
        <textarea name="permanent_address" class="form-control"><?=htmlspecialchars($student['permanent_address'])?></textarea>
      </div>
      <div class="col-md-6">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="<?=htmlspecialchars($student['phone'])?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Result</label>
        <input type="text" name="result" class="form-control" value="<?=htmlspecialchars($student['result'])?>">
      </div>

      <div class="col-md-6">
        <label class="form-label">Student Image</label>
        <input type="file" name="image" class="form-control">
        <?php if(!empty($student['image'])): ?>
          <a href="../uploads<?=$student['image']?>" target="_blank">Current Image</a>
        <?php endif; ?>
      </div>
      <div class="col-md-6">
        <label class="form-label">Reg Paper Image</label>
        <input type="file" name="reg_paper_image" class="form-control">
        <?php if(!empty($student['reg_paper_image'])): ?>
          <a href="../uploads<?=$student['reg_paper_image']?>" target="_blank">Current Reg Paper</a>
        <?php endif; ?>
      </div>
    </div>
    <div class="mt-3">
      <button type="submit" class="btn btn-success">Update</button>
      <a href="students_view.php" class="btn btn-secondary">Back</a>
    </div>
  </form>
</div>
</body>
</html>
