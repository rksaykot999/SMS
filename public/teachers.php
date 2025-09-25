<?php include_once '../includes/db.php'; ?>
<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers Details</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/teacher.css">
    <style>
        .header-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("Images/Hero.jpg") no-repeat center center;
            background-size: cover;
            height: 50vh;
        }
    </style>
</head>

<body>
    <?php include_once '../includes/header.php'; ?>
    <!-- Hero Section -->
    <header class="header-hero pt-12 text-white">
        <div class="p-4 md:p-12 rounded-3xl h-500px] mx-auto max-w-4xl text-center transform transition-transform">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Teachers Information</h1>
            <p class="text-lg md:text-xl text-gray-200 mb-8">
                Explore the Diploma in Engineering courses offered at Barisal Polytechnic Institute's Teachers.
            </p>
        </div>
    </header>

    <section class="teacher-list">
    <h2>All Teachers</h2>

<?php
// ... আগের ইনক্লুড/হেডার কোড ...

$stmt = $pdo->query("
    SELECT *
    FROM teachers
    ORDER BY
      CASE
        WHEN designation = 'Chief Instructor & Head of the Department' THEN 1
        WHEN designation = 'Instructor' THEN 2
        WHEN designation = 'Workshop Super' THEN 3
        WHEN designation = 'Junior Instructor' THEN 4
        ELSE 5
      END,
      CASE 
        WHEN id = 17 THEN 0  -- Md. Selim Khelifa সব Junior Instructor এর আগে আসবে
        ELSE 1
      END,
      name ASC
");

while ($t = $stmt->fetch()) {
    $img = !empty($t['image']) ? '../uploads/teachers/' . $t['image'] : '../assets/images/default-teacher.png';
    echo '<div class="teacher-card-full">';
    echo "<img src='$img' alt='Teacher'>";
    echo '<div class="info">';
    echo '<h3>' . htmlspecialchars($t['name']) . '</h3>';
    echo '<p><strong>Designation:</strong> ' . htmlspecialchars($t['designation']) . '</p>';
    echo '<p><strong>Department:</strong> ' . htmlspecialchars($t['department']) . '</p>';
    echo '<p><strong>Shift:</strong> ' . htmlspecialchars($t['shift']) . '</p>';
    echo '<p><strong>Qualification:</strong> ' . htmlspecialchars($t['qualification']) . '</p>';
    echo '<p><strong>Phone:</strong> ' . htmlspecialchars($t['phone']) . '</p>';
    echo '<p><strong>Email:</strong> ' . htmlspecialchars($t['email']) . '</p>';
    echo '</div></div>';
}
?>

</section>


    <?php include_once '../includes/footer.php'; ?>
</body>

</html>