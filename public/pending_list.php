<?php
// public/pending_list.php
session_start();
require_once __DIR__ . '/../includes/db.php';
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin_login.php');
    exit;
}

$tab = $_GET['tab'] ?? 'students';

// fetch pending students & teachers
$pendingStudents = $pdo->query("SELECT * FROM pending_students ORDER BY created_at DESC")->fetchAll();
$pendingTeachers = $pdo->query("SELECT * FROM pending_teachers ORDER BY created_at DESC")->fetchAll();
?>
<!doctype html>
<html lang="bn">
<head>
  <meta charset="utf-8">
  <title>Pending Requests - Admin</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>body{background:#f7f8fb}</style>
</head>
<body>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Pending Registrations</h3>
    <div>
      <a href="admin_dashboard.php" class="btn btn-outline-secondary btn-sm">Dashboard</a>
    </div>
  </div>

  <ul class="nav nav-tabs mb-3">
    <li class="nav-item"><a class="nav-link <?= $tab === 'students' ? 'active' : '' ?>" href="?tab=students">Students (<?=count($pendingStudents)?>)</a></li>
    <li class="nav-item"><a class="nav-link <?= $tab === 'teachers' ? 'active' : '' ?>" href="?tab=teachers">Teachers (<?=count($pendingTeachers)?>)</a></li>
  </ul>

  <?php if ($tab === 'students'): ?>
    <div class="card shadow-sm">
      <div class="card-body p-0">
        <table class="table table-sm table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>#</th><th>Name</th><th>Roll</th><th>Dept</th><th>Phone</th><th>Submitted</th><th>Image</th><th class="text-end">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($pendingStudents)): ?>
              <tr><td colspan="8" class="text-center py-3">No pending student registrations.</td></tr>
            <?php else: foreach($pendingStudents as $p): ?>
              <tr>
                <td><?=htmlspecialchars($p['id'])?></td>
                <td><?=htmlspecialchars($p['name'])?></td>
                <td><?=htmlspecialchars($p['roll'])?></td>
                <td><?=htmlspecialchars($p['department'])?></td>
                <td><?=htmlspecialchars($p['phone'])?></td>
                <td><?=htmlspecialchars($p['created_at'])?></td>
                <td>
                  <?php if(!empty($p['image']) && file_exists(__DIR__ . '/../uploads/students/' . $p['image'])): ?>
                    <a href="../uploads/students/<?=htmlspecialchars($p['image'])?>" target="_blank">View</a>
                  <?php else: ?>
                    -
                  <?php endif; ?>
                </td>
                <td class="text-end">
                  <a class="btn btn-sm btn-success" href="approve_student.php?id=<?=urlencode($p['id'])?>" onclick="return confirm('Approve this student?')">Approve</a>
                  <a class="btn btn-sm btn-danger" href="reject_pending.php?type=student&id=<?=urlencode($p['id'])?>" onclick="return confirm('Reject and delete this pending registration?')">Reject</a>
                  <a class="btn btn-sm btn-secondary" href="pending_student_view.php?id=<?=urlencode($p['id'])?>">View</a>
                </td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>
      </div>
    </div>

  <?php else: /* teachers tab */ ?>
    <div class="card shadow-sm">
      <div class="card-body p-0">
        <table class="table table-sm table-hover mb-0">
          <thead class="table-light">
            <tr>
              <th>#</th><th>Name</th><th>Email</th><th>Dept</th><th>Phone</th><th>Submitted</th><th>Image</th><th class="text-end">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($pendingTeachers)): ?>
              <tr><td colspan="8" class="text-center py-3">No pending teacher registrations.</td></tr>
            <?php else: foreach($pendingTeachers as $p): ?>
              <tr>
                <td><?=htmlspecialchars($p['id'])?></td>
                <td><?=htmlspecialchars($p['name'])?></td>
                <td><?=htmlspecialchars($p['email'])?></td>
                <td><?=htmlspecialchars($p['department'])?></td>
                <td><?=htmlspecialchars($p['phone'])?></td>
                <td><?=htmlspecialchars($p['created_at'])?></td>
                <td>
                  <?php if(!empty($p['image']) && file_exists(__DIR__ . '/../uploads/teachers/' . $p['image'])): ?>
                    <a href="../uploads/teachers/<?=htmlspecialchars($p['image'])?>" target="_blank">View</a>
                  <?php else: ?>
                    -
                  <?php endif; ?>
                </td>
                <td class="text-end">
                  <a class="btn btn-sm btn-success" href="approve_teacher.php?id=<?=urlencode($p['id'])?>" onclick="return confirm('Approve this teacher?')">Approve</a>
                  <a class="btn btn-sm btn-danger" href="reject_pending.php?type=teacher&id=<?=urlencode($p['id'])?>" onclick="return confirm('Reject and delete this pending registration?')">Reject</a>
                  <a class="btn btn-sm btn-secondary" href="pending_teacher_view.php?id=<?=urlencode($p['id'])?>">View</a>
                </td>
              </tr>
            <?php endforeach; endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  <?php endif; ?>

</div>
</body>
</html>

