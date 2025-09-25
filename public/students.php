<?php
include '../includes/db.php'; // তোমার PDO connection ফাইল

$searchRoll = "";
if (isset($_POST['search'])) {
    $searchRoll = $_POST['roll'];
    $stmt = $pdo->prepare("SELECT * FROM students WHERE roll LIKE ? ORDER BY roll ASC");
    $stmt->execute(["%$searchRoll%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM students ORDER BY roll ASC");
}
$students = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Students - Student Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/student.css">

</head>

<body>

    <?php include '../includes/header.php'; ?> <!-- Navbar -->

    <!-- Hero Section -->
    <header class="header-hero pt-12 md:pt-32 text-white">
        <div class="px-6 md:px-12 lg:px-16 py-12 md:py-4 rounded-3xl mx-auto max-w-6xl text-center">

            <!-- Title -->
            <h1 class="text-3xl sm:text-4xl md:text-6xl font-extrabold mb-6 leading-snug md:leading-tight">
                Student Information & Resources
            </h1>

            <!-- Subtitle -->
            <p class="text-base sm:text-lg md:text-2xl text-gray-200 mb-10 max-w-3xl leading-relaxed mx-auto">
                Your one-stop destination for all academic, extracurricular, and administrative information.
            </p>

        </div>
    </header>
    <div class="container">
        <div class="student-section">
            <h3>🎓 All Students List</h3>

            <!-- Search Form -->
            <form method="POST" class="row g-3 mb-4">
                <div class="col-md-10">
                    <input type="text" name="roll" class="form-control" placeholder="Enter Roll No..."
                        value="<?php echo htmlspecialchars($searchRoll); ?>">
                </div>
                <div class="col-md-2">
                    <button type="submit" name="search" class="btn btn-primary w-100">Search</button>
                </div>
            </form>

            <!-- Student Table -->
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Serial</th>
                        <th>Roll</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Semester</th>
                        <th>Session</th>
                        <th>Shift</th>
                        <th>Result</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($students && count($students) > 0):
                        $serial = 1;
                        foreach ($students as $row):
                            ?>
                            <tr>
                                <td><?php echo $serial++; ?></td>
                                <td><?php echo htmlspecialchars($row['roll']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['department']); ?></td>
                                <td><?php echo htmlspecialchars($row['semester']); ?></td>
                                <td><?php echo htmlspecialchars($row['session']); ?></td>
                                <td><?php echo htmlspecialchars($row['shift']); ?></td>
                                <td><?php echo htmlspecialchars($row['result']); ?></td>
                            </tr>
                        <?php
                        endforeach;
                    else:
                        ?>
                        <tr>
                            <td colspan="6" class="text-danger">No student found!</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include_once '../includes/footer.php'; ?>
    
</body>

</html>