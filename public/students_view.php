<?php
// public/students_view.php
session_start();
require_once __DIR__ . '/../includes/db.php';
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}

// fetch all approved students
$stmt = $pdo->query("SELECT * FROM students ORDER BY id DESC");
$students = $stmt->fetchAll();
?>
<!doctype html>
<html lang="bn">
<head>
  <meta charset="utf-8">
  <title>Students - Admin</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body{background:#f7f8fb} 
    td { vertical-align: middle; }
    .img-thumb { width:50px; height:50px; object-fit:cover; cursor:pointer; border-radius:6px; }
  </style>
</head>
<body>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>All Students</h3>
    <div>
      <a href="admin_dashboard.php" class="btn btn-outline-secondary btn-sm">Dashboard</a>
      <a href="add-student.php" class="btn btn-primary btn-sm">Add New Student</a>
    </div>
  </div>

  <?php if(empty($students)): ?>
    <div class="alert alert-info">No students found.</div>
  <?php else: ?>
    <div class="card shadow-sm">
      <div class="card-body p-0">
        <table class="table table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>Name</th>
              <th>Roll</th>
              <th>Registration</th>
              <th>Dept</th>
              <th>Sem</th>
              <th>Session</th>
              <th>Shift</th>
              <th>Phone</th>
              <th>Image</th>
              <th class="text-end">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($students as $s): ?>
              <tr>
                <td><?=htmlspecialchars($s['name'])?></td>
                <td><?=htmlspecialchars($s['roll'])?></td>
                <td><?=htmlspecialchars($s['registration'] ?? '')?></td>
                <td><?=htmlspecialchars($s['department'] ?? '')?></td>
                <td><?=htmlspecialchars($s['semester'] ?? '')?></td>
                <td><?=htmlspecialchars($s['session'] ?? '')?></td>
                <td><?=htmlspecialchars($s['shift'] ?? '')?></td>
                <td><?=htmlspecialchars($s['phone'] ?? '')?></td>
                <td>
                  <?php if(!empty($s['image']) && file_exists(__DIR__ . '/../uploads' . $s['image'])): ?>
                    <img src="../uploads<?=htmlspecialchars($s['image'])?>" 
                         class="img-thumb" 
                         data-bs-toggle="modal" 
                         data-bs-target="#imageModal" 
                         data-img="../uploads<?=htmlspecialchars($s['image'])?>">
                  <?php else: ?>
                    -
                  <?php endif; ?>
                </td>
                <td class="text-end">
                  <a href="/SMS/public/edit-student.php?id=<?= urlencode($s['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a class="btn btn-sm btn-danger" href="delete-student.php?id=<?=urlencode($s['id'])?>" onclick="return confirm('Delete this student?')">Delete</a>
                  <a class="btn btn-sm btn-secondary" href="student_view.php?id=<?=urlencode($s['id'])?>">View</a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  <?php endif; ?>

</div>

<!-- Bootstrap Modal for image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-transparent border-0">
      <img id="modalImage" src="" class="img-fluid rounded shadow" alt="Student Image">
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // when thumbnail clicked, set modal image
  const imageModal = document.getElementById('imageModal');
  imageModal.addEventListener('show.bs.modal', event => {
    const thumb = event.relatedTarget;
    const imgSrc = thumb.getAttribute('data-img');
    document.getElementById('modalImage').setAttribute('src', imgSrc);
  });
</script>
</body>
</html>
