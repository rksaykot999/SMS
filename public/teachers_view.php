<?php
// public/teachers_view.php
session_start();
require_once __DIR__ . '/../includes/db.php';
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}

// fetch all approved teachers
$stmt = $pdo->query("SELECT * FROM teachers ORDER BY id DESC");
$teachers = $stmt->fetchAll();
?>
<!doctype html>
<html lang="bn">
<head>
  <meta charset="utf-8">
  <title>Teachers - Admin</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>body{background:#f7f8fb}</style>
</head>
<body>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Approved Teachers</h3>
    <div>
      <a href="admin_dashboard.php" class="btn btn-outline-secondary btn-sm">Dashboard</a>
      <a href="teacher_register.php" class="btn btn-primary btn-sm">Add New Teacher</a>
    </div>
  </div>

  <?php if(empty($teachers)): ?>
    <div class="alert alert-info">No teachers found.</div>
  <?php else: ?>
    <div class="card shadow-sm">
      <div class="card-body p-0">
        <table class="table table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>#</th><th>Name</th><th>Email</th><th>Department</th><th>Shift</th><th>Phone</th><th>Qualification</th><th>Designation</th><th>Image</th><th class="text-end">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($teachers as $t): ?>
              <tr>
                <td><?=htmlspecialchars($t['id'])?></td>
                <td><?=htmlspecialchars($t['name'])?></td>
                <td><?=htmlspecialchars($t['email'])?></td>
                <td><?=htmlspecialchars($t['department'])?></td>
                <td><?=htmlspecialchars($t['shift'])?></td>
                <td><?=htmlspecialchars($t['phone'])?></td>
                <td><?=htmlspecialchars($t['qualification'])?></td>
                <td><?=htmlspecialchars($t['designation'])?></td>
                <td>
                  <?php if(!empty($t['image']) && file_exists(__DIR__ . '/../uploads/teachers/' . $t['image'])): ?>
                    <a href="../uploads/teachers/<?=htmlspecialchars($t['image'])?>" target="_blank">View</a>
                  <?php else: ?>
                    -
                  <?php endif; ?>
                </td>
                <td class="text-end">
                  <a class="btn btn-sm btn-warning" href="teacher_edit.php?id=<?=urlencode($t['id'])?>">Edit</a>
                  <a class="btn btn-sm btn-danger" href="teacher_delete.php?id=<?=urlencode($t['id'])?>" onclick="return confirm('Delete this teacher?')">Delete</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  <?php endif; ?>

</div>
</body>
</html>

