<?php
include '../includes/db.php'; // PDO connection file

// --- MODIFIED PHP ---
// Get search and sort parameters from the request
$searchTerm = $_GET['search'] ?? ""; // Changed from 'roll' to 'search'
$sortBy = $_GET['sort'] ?? 'roll'; 

// Whitelist allowed column names for sorting to prevent SQL injection
$allowedSortColumns = ['roll', 'name', 'department', 'shift'];
$orderByClause = 'roll'; // Default to a safe value
if (in_array($sortBy, $allowedSortColumns)) {
    $orderByClause = $sortBy;
}

// Prepare and execute the database query
if (!empty($searchTerm)) {
    // Updated query to search in both 'roll' and 'name' columns
    $sql = "SELECT * FROM students WHERE roll LIKE ? OR name LIKE ? ORDER BY $orderByClause ASC";
    $stmt = $pdo->prepare($sql);
    // Bind the search term to both placeholders
    $stmt->execute(["%$searchTerm%", "%$searchTerm%"]);
} else {
    $stmt = $pdo->query("SELECT * FROM students ORDER BY $orderByClause ASC");
}
$students = $stmt->fetchAll();

// If it's an AJAX request, return only the student grid HTML and exit
if (isset($_GET['ajax']) && $_GET['ajax'] == '1') {
    if ($students && count($students) > 0) {
        foreach ($students as $student) {
            ?>
            <div class="student-card bg-white rounded-xl shadow-md overflow-hidden" 
                 onclick='openStudentModal(<?php echo json_encode($student); ?>)'>
                <div class="p-5">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            <?php echo substr($student['name'], 0, 1); ?>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-lg"><?php echo htmlspecialchars($student['name']); ?></h3>
                            <p class="text-gray-600"><?php echo htmlspecialchars($student['roll']); ?></p>
                        </div>
                    </div>
                    <div class="border-t border-gray-100 pt-3">
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Department:</span>
                            <span class="font-medium"><?php echo htmlspecialchars($student['department']); ?></span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600 mb-1">
                            <span>Semester:</span>
                            <span class="font-medium"><?php echo htmlspecialchars($student['semester']); ?></span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600">
                            <span>Session:</span>
                            <span class="font-medium"><?php echo htmlspecialchars($student['session']); ?></span>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-5 py-3 flex justify-between items-center">
                    <span class="text-xs font-medium px-2 py-1 rounded-full 
                        <?php echo $student['shift'] == 'Morning' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800'; ?>">
                        <?php echo htmlspecialchars($student['shift']); ?>
                    </span>
                    <span class="text-xs font-bold px-2 py-1 rounded-full 
                        <?php 
                        $result = floatval($student['result']);
                        if ($result >= 3.5) echo 'bg-green-100 text-green-800';
                        elseif ($result >= 3.0) echo 'bg-yellow-100 text-yellow-800';
                        else echo 'bg-red-100 text-red-800';
                        ?>">
                        GPA: <?php echo htmlspecialchars($student['result']); ?>
                    </span>
                </div>
            </div>
            <?php
        }
    } else {
        echo '
        <div class="col-span-full text-center py-12">
            <i class="fas fa-user-slash text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-semibold text-gray-700">No students found</h3>
            <p class="text-gray-500 mt-2">Try adjusting your search or sort criteria</p>
        </div>';
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Students - Student Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5; /* Changed background for better contrast with white cards */
        }
        .header-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("Images/Hero.jpg") no-repeat center center;
            background-size: cover;
            /* height: 50vh; */
        }
        .student-card {
            transition: all 0.3s ease;
            cursor: pointer;
            border: none;
            overflow: hidden;
        }
        .student-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .modal-content {
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        .modal-header {
            background: linear-gradient(45deg, #2575fc, #6a11cb);
            color: white;
            border-radius: 15px 15px 0 0;
            border-bottom: none;
        }
        .detail-item {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .detail-item:last-child {
            border-bottom: none;
        }
         /* Style for new sections */
        .info-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body class="text-gray-800 font-roboto">

    <?php include '../includes/header.php'; ?>
    
    <header class="header-hero pt-24 pb-24 text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 leading-tight">Student Information & Resources</h1>
            <p class="text-lg md:text-xl text-gray-200 max-w-3xl mx-auto">
                Your one-stop destination for all academic, extracurricular, and administrative information.
            </p>
        </div>
    </header>

    <div class="bg-white">
        <div class="container mx-auto px-4 py-16">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <img src="Images/Building-1.jpg" alt="Barishal Polytechnic Institute Campus" class="w-full h-full object-cover">
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Welcome to Barishal Polytechnic Institute</h2>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Established with a vision to create skilled technical professionals, Barishal Polytechnic Institute has been a center of excellence in technical education in southern Bangladesh for decades. We are committed to providing state-of-the-art facilities and quality education to nurture the next generation of engineers and innovators.
                    </p>
                    <div class="grid grid-cols-2 gap-4 text-center mt-6">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <p class="text-2xl font-bold text-blue-600">8+</p>
                            <p class="text-sm text-gray-700">Departments</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <p class="text-2xl font-bold text-green-600">5,000+</p>
                            <p class="text-sm text-gray-700">Enrolled Students</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto px-4 py-16">
        <div class="bg-white rounded-2xl shadow-xl p-6 md:p-8 mb-8">
            <div class="flex flex-col md:flex-row justify-between items-center mb-6">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 md:mb-0">
                    <i class="fas fa-user-graduate mr-2 text-blue-500"></i>All Students
                </h2>
                <div class="flex flex-col md:flex-row items-center gap-4 w-full md:w-auto">
                    <div class="relative w-full md:w-48">
                        <select id="sortSelect" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 appearance-none bg-white">
                            <option value="roll">Sort by Roll</option>
                            <option value="name">Sort by Name</option>
                            <option value="department">Sort by Department</option>
                            <option value="shift">Sort by Shift</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-3 top-3 text-gray-400 pointer-events-none"></i>
                    </div>
                    <div class="relative w-full md:w-80">
                        <input type="text" id="searchInput" 
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                               placeholder="Search by Roll or Name...">
                        <i class="fas fa-search absolute right-3 top-3 text-gray-400"></i>
                    </div>
                </div>
            </div>
            <div id="studentGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($students as $student): ?>
                    <div class="student-card bg-gray-50 rounded-xl shadow-md" 
                         onclick='openStudentModal(<?php echo json_encode($student); ?>)'>
                        <div class="p-5">
                            <div class="flex items-center mb-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                    <?php echo substr($student['name'], 0, 1); ?>
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-bold text-lg"><?php echo htmlspecialchars($student['name']); ?></h3>
                                    <p class="text-gray-600"><?php echo htmlspecialchars($student['roll']); ?></p>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 pt-3">
                                <div class="flex justify-between text-sm text-gray-600 mb-1"><span>Department:</span><span class="font-medium"><?php echo htmlspecialchars($student['department']); ?></span></div>
                                <div class="flex justify-between text-sm text-gray-600 mb-1"><span>Semester:</span><span class="font-medium"><?php echo htmlspecialchars($student['semester']); ?></span></div>
                                <div class="flex justify-between text-sm text-gray-600"><span>Session:</span><span class="font-medium"><?php echo htmlspecialchars($student['session']); ?></span></div>
                            </div>
                        </div>
                        <div class="bg-gray-100 px-5 py-3 flex justify-between items-center">
                            <span class="text-xs font-medium px-2 py-1 rounded-full <?php echo $student['shift'] == 'Morning' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800'; ?>"><?php echo htmlspecialchars($student['shift']); ?></span>
                            <span class="text-xs font-bold px-2 py-1 rounded-full <?php $result = floatval($student['result']); if ($result >= 3.5) echo 'bg-green-100 text-green-800'; elseif ($result >= 3.0) echo 'bg-yellow-100 text-yellow-800'; else echo 'bg-red-100 text-red-800'; ?>">GPA: <?php echo htmlspecialchars($student['result']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <div class="container mx-auto px-4 py-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Campus Resources</h2>
            <p class="text-gray-600 mt-2">Quick access to essential student services and information.</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <a href="#" class="info-card block bg-white p-6 rounded-xl shadow-lg">
                <i class="fas fa-book-open text-4xl text-blue-500 mb-4"></i>
                <h4 class="font-semibold text-lg">Digital Library</h4>
            </a>
            <a href="#" class="info-card block bg-white p-6 rounded-xl shadow-lg">
                <i class="fas fa-poll text-4xl text-green-500 mb-4"></i>
                <h4 class="font-semibold text-lg">Online Results</h4>
            </a>
            <a href="#" class="info-card block bg-white p-6 rounded-xl shadow-lg">
                <i class="fas fa-building text-4xl text-purple-500 mb-4"></i>
                <h4 class="font-semibold text-lg">Hostel Info</h4>
            </a>
            <a href="#" class="info-card block bg-white p-6 rounded-xl shadow-lg">
                <i class="fas fa-envelope text-4xl text-red-500 mb-4"></i>
                <h4 class="font-semibold text-lg">Contact Admin</h4>
            </a>
        </div>
    </div>
    <div class="modal fade" id="studentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title text-xl font-bold">Student Details</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div>
                <div class="modal-body p-5">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1 flex flex-col items-center">
                            <div class="w-32 h-32 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-4xl mb-4" id="studentAvatar"></div>
                            <h3 class="text-xl font-bold text-center" id="studentName"></h3>
                            <p class="text-gray-600 text-center" id="studentRoll"></p>
                        </div>
                        <div class="md:col-span-2">
                            <div class="space-y-4">
                                <div class="detail-item"><label class="font-semibold text-gray-700">Department:</label><p class="mt-1" id="studentDepartment"></p></div>
                                <div class="detail-item"><label class="font-semibold text-gray-700">Semester:</label><p class="mt-1" id="studentSemester"></p></div>
                                <div class="detail-item"><label class="font-semibold text-gray-700">Session:</label><p class="mt-1" id="studentSession"></p></div>
                                <div class="detail-item"><label class="font-semibold text-gray-700">Shift:</label><p class="mt-1" id="studentShift"></p></div>
                                <div class="detail-item"><label class="font-semibold text-gray-700">Result (GPA):</label><p class="mt-1 font-bold" id="studentResult"></p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-gray-50 rounded-b-2xl py-4 px-5"><button type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 mx-auto rounded-lg" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>

    <?php include_once '../includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function openStudentModal(student) {
            document.getElementById('studentAvatar').textContent = student.name.charAt(0);
            document.getElementById('studentName').textContent = student.name;
            document.getElementById('studentRoll').textContent = 'Roll: ' + student.roll;
            document.getElementById('studentDepartment').textContent = student.department;
            document.getElementById('studentSemester').textContent = student.semester;
            document.getElementById('studentSession').textContent = student.session;
            document.getElementById('studentShift').textContent = student.shift;
            document.getElementById('studentResult').textContent = student.result;

            const resultElement = document.getElementById('studentResult');
            const result = parseFloat(student.result);
            if (result >= 3.5) {
                resultElement.className = 'mt-1 font-bold text-green-600';
            } else if (result >= 3.0) {
                resultElement.className = 'mt-1 font-bold text-yellow-600';
            } else {
                resultElement.className = 'mt-1 font-bold text-red-600';
            }

            new bootstrap.Modal(document.getElementById('studentModal')).show();
        }
        
        function fetchAndUpdateStudents() {
            const searchQuery = document.getElementById("searchInput").value;
            const sortBy = document.getElementById("sortSelect").value;
            const url = `?ajax=1&search=${encodeURIComponent(searchQuery)}&sort=${encodeURIComponent(sortBy)}`;
            fetch(url)
                .then(res => res.text())
                .then(data => { document.getElementById("studentGrid").innerHTML = data; })
                .catch(error => console.error('Error fetching student data:', error));
        }

        document.getElementById("searchInput").addEventListener("keyup", fetchAndUpdateStudents);
        document.getElementById("sortSelect").addEventListener("change", fetchAndUpdateStudents);
    </script>
</body>
</html>