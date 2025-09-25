<?php include_once '../includes/db.php'; ?>

<!DOCTYPE html>

<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers Details - Barishal Polytechnic Institute</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
        }

        .header-hero {
            background: linear-gradient(rgba(20, 30, 48, 0.7), rgba(36, 59, 85, 0.7)), url('https://images.unsplash.com/photo-1580894732444-8ecded794837?q=80&w=2070&auto=format&fit=crop') no-repeat center center;
            background-size: cover;
            /* height: 50vh; */
        }

        .teacher-card {
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .teacher-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background: linear-gradient(45deg, #1e3a8a, #3b82f6);
            color: white;
            border-bottom: none;
        }

        .section-icon {
            color: #3b82f6;
            transition: transform 0.3s ease;
        }

        .section-icon:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body class="text-gray-800">
    <?php include_once '../includes/header.php'; ?>

    <header class="header-hero pt-24 pb-24 text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4">Meet Our Faculty</h1>
            <p class="text-lg md:text-xl text-gray-200 max-w-3xl mx-auto">
                Explore the dedicated and experienced instructors at Barishal Polytechnic Institute.
            </p>
        </div>
    </header>

    <div class="container mx-auto px-4 py-16">
        <!-- New Welcome Section -->
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-16">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6 text-center">
                <i class="fas fa-handshake mr-3 section-icon"></i>Welcome to Our Academic Community
            </h2>
            <div class="max-w-4xl mx-auto text-justify text-gray-700 leading-relaxed">
                <p class="mb-4">
                    At Barishal Polytechnic Institute, our faculty is the heart of our academic excellence. They are not just teachers, but mentors and innovators dedicated to shaping the next generation of engineers and technologists. Our instructors bring a wealth of real-world experience and a passion for education to the classroom, ensuring every student receives a high-quality, practical education.
                </p>
                <p>
                    We believe in a hands-on approach to learning, and our faculty members are committed to fostering an environment where curiosity thrives and creativity is celebrated. Get to know the brilliant minds who inspire our students every day.
                </p>
            </div>
        </div>

        <div class="container mx-auto px-4 py-16">
            <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-8">
                    <i class="fas fa-chalkboard-teacher mr-3 text-blue-500"></i>All Teachers
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                    <?php
                    $stmt = $pdo->query("
                SELECT * FROM teachers
                ORDER BY
                CASE
                    WHEN designation = 'Chief Instructor & Head of the Department' THEN 1
                    WHEN designation = 'Instructor' THEN 2
                    WHEN designation = 'Workshop Super' THEN 3
                    WHEN designation = 'Junior Instructor' THEN 4
                    ELSE 5
                END,
                CASE 
                    WHEN id = 17 THEN 0
                    ELSE 1
                END,
                name ASC
            ");

while ($t = $stmt->fetch()) {
    $img = !empty($t['image']) ? '../public/uploads/' . $t['image'] : '../assets/images/default-teacher.png';
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