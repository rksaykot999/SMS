
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departments</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f4f8;
        }

        .header-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("Images/Hero.jpg") no-repeat center center;
            background-size: cover;
            height: 40vh;
        }

        .dropdown-menu {
            display: none;
        }

        .dropdown-menu.show {
            display: block;
        }

        /* Mobile menu specific styling */
        .mobile-menu-container {
            transition: all 0.3s ease-in-out;
            transform: translateY(-100%);
            opacity: 0;
            pointer-events: none;
        }

        .mobile-menu-container.show {
            transform: translateY(0);
            opacity: 1;
            pointer-events: auto;
        }
    </style>
</head>

<body class="text-gray-800">

    <!-- Navbar -->
    <?php include_once '../includes/header.php'; ?>

    <!-- Hero Section -->
    <header class="header-hero pt-12 text-white">
        <div class="p-4 md:p-12 rounded-3xl h-500px] mx-auto max-w-3xl text-center transform transition-transform">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Our Departments</h1>
            <p class="text-lg md:text-xl text-gray-200 mb-8">
                Explore a wide range of technical disciplines and start your career journey.
            </p>
        </div>
    </header>

    <!-- Main Content Sections -->
    <main class="container mx-auto p-6 md:p-12 space-y-16">
        <section class="bg-white p-8 md:p-12 rounded-3xl shadow-xl">
            <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Explore Our Technical Departments</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Department Card: Computer Technology -->
                <div class="bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="https://placehold.co/400x250/4f46e5/FFFFFF?text=Computer+Technology" alt="Computer Technology" class="rounded-lg mb-4 w-full">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Computer Technology</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        This department focuses on modern computing, software development, networking, and hardware design. Students gain hands-on experience in building innovative technological solutions.
                    </p>
                    <a href="#" class="inline-block px-4 py-2 text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">
                        View Details
                    </a>
                </div>

                <!-- Department Card: Civil Technology -->
                <div class="bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="https://placehold.co/400x250/10b981/FFFFFF?text=Civil+Technology" alt="Civil Technology" class="rounded-lg mb-4 w-full">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Civil Technology</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Learn the principles of designing, constructing, and maintaining infrastructure such as roads, bridges, and buildings. This department provides a strong foundation in structural engineering.
                    </p>
                    <a href="#" class="inline-block px-4 py-2 text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">
                        View Details
                    </a>
                </div>

                <!-- Department Card: Electrical Technology -->
                <div class="bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="https://placehold.co/400x250/ef4444/FFFFFF?text=Electrical+Technology" alt="Electrical Technology" class="rounded-lg mb-4 w-full">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Electrical Technology</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        This department covers the fundamentals of electricity, electronics, and power systems. Students are prepared for careers in power generation, distribution, and automation.
                    </p>
                    <a href="#" class="inline-block px-4 py-2 text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">
                        View Details
                    </a>
                </div>

                <!-- Department Card: Mechanical Technology -->
                <div class="bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="https://placehold.co/400x250/eab308/FFFFFF?text=Mechanical+Technology" alt="Mechanical Technology" class="rounded-lg mb-4 w-full">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Mechanical Technology</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Focus on the design, analysis, and manufacturing of mechanical systems. Students learn about thermodynamics, fluid mechanics, and material science to build functional machines.
                    </p>
                    <a href="#" class="inline-block px-4 py-2 text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">
                        View Details
                    </a>
                </div>
                
                <!-- Department Card: Electronics Technology -->
                <div class="bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="https://placehold.co/400x250/3b82f6/FFFFFF?text=Electronics+Technology" alt="Electronics Technology" class="rounded-lg mb-4 w-full">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Electronics Technology</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        Explore the world of electronic circuits, microcontrollers, and communication systems. This discipline is essential for developing modern gadgets and high-tech devices.
                    </p>
                    <a href="#" class="inline-block px-4 py-2 text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">
                        View Details
                    </a>
                </div>

                <!-- Department Card: Power Technology -->
                <div class="bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <img src="https://placehold.co/400x250/6d28d9/FFFFFF?text=Power+Technology" alt="Power Technology" class="rounded-lg mb-4 w-full">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Power Technology</h3>
                    <p class="text-gray-600 text-sm mb-4">
                        This department provides detailed knowledge on power generation, transmission, distribution, and modern power systems. Students also get to work with renewable energy.
                    </p>
                    <a href="#" class="inline-block px-4 py-2 text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">
                        View Details
                    </a>
                </div>
            </div>
        </section>

        <!-- Why Choose Our Departments Section -->
        <section class="bg-blue-50 p-8 md:p-12 rounded-3xl shadow-xl">
            <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Why Choose Our Departments?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-6 bg-white rounded-2xl shadow-md">
                    <div class="text-5xl text-blue-600 mb-4"><i class="fas fa-handshake"></i></div>
                    <h3 class="text-xl font-semibold mb-2">Industry-Relevant Curriculum</h3>
                    <p class="text-gray-600 text-sm">Our courses are designed with input from industry experts to ensure students are well-prepared for market demands.</p>
                </div>
                <div class="p-6 bg-white rounded-2xl shadow-md">
                    <div class="text-5xl text-blue-600 mb-4"><i class="fas fa-flask"></i></div>
                    <h3 class="text-xl font-semibold mb-2">State-of-the-Art Lab Facilities</h3>
                    <p class="text-gray-600 text-sm">We provide hands-on learning with advanced equipment and high-quality lab facilities.</p>
                </div>
                <div class="p-6 bg-white rounded-2xl shadow-md">
                    <div class="text-5xl text-blue-600 mb-4"><i class="fas fa-users-gear"></i></div>
                    <h3 class="text-xl font-semibold mb-2">Experienced Faculty</h3>
                    <p class="text-gray-600 text-sm">Our teachers are highly experienced and dedicated to preparing students for their future careers.</p>
                </div>
            </div>
        </section>

        <!-- Faculty and Labs Section -->
        <section class="bg-white p-8 md:p-12 rounded-3xl shadow-xl border-t-4 border-blue-500">
            <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Our Faculty & Labs</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Teacher Card Example -->
                <div class="p-6 bg-gray-50 rounded-2xl shadow-md flex flex-col items-center text-center">
                    <img src="https://placehold.co/100x100/3b82f6/FFFFFF?text=Teacher" alt="Teacher" class="rounded-full mb-4 w-24 h-24 object-cover">
                    <h4 class="text-lg font-bold">Teacher Name</h4>
                    <p class="text-gray-600 text-sm">Department: Computer Technology</p>
                    <p class="text-gray-600 text-sm">Specialization: Cyber Security</p>
                    <a href="#" class="mt-4 text-blue-600 hover:text-blue-700 transition duration-300 font-semibold">View Profile</a>
                </div>
                 <!-- Teacher Card Example -->
                <div class="p-6 bg-gray-50 rounded-2xl shadow-md flex flex-col items-center text-center">
                    <img src="https://placehold.co/100x100/3b82f6/FFFFFF?text=Teacher" alt="Teacher" class="rounded-full mb-4 w-24 h-24 object-cover">
                    <h4 class="text-lg font-bold">Teacher Name</h4>
                    <p class="text-gray-600 text-sm">Department: Civil Technology</p>
                    <p class="text-gray-600 text-sm">Specialization: Infrastructure Design</p>
                    <a href="#" class="mt-4 text-blue-600 hover:text-blue-700 transition duration-300 font-semibold">View Profile</a>
                </div>
                 <!-- Teacher Card Example -->
                <div class="p-6 bg-gray-50 rounded-2xl shadow-md flex flex-col items-center text-center">
                    <img src="https://placehold.co/100x100/3b82f6/FFFFFF?text=Teacher" alt="Teacher" class="rounded-full mb-4 w-24 h-24 object-cover">
                    <h4 class="text-lg font-bold">Teacher Name</h4>
                    <p class="text-gray-600 text-sm">Department: Mechanical Technology</p>
                    <p class="text-gray-600 text-sm">Specialization: Machine Tools</p>
                    <a href="#" class="mt-4 text-blue-600 hover:text-blue-700 transition duration-300 font-semibold">View Profile</a>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="teachers.php" class="inline-block px-8 py-3 bg-blue-600 text-white font-bold rounded-full shadow-lg hover:bg-blue-700 transition duration-300">
                    View All Teachers
                </a>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <?php include_once '../includes/footer.php'; ?>

    <script>
        // Get the button and the dropdown menu elements
        const loginButton = document.getElementById('logoButton');
        const loginDropdown = document.getElementById('loginDropdown');
        const mobileMenuButton = document.getElementById('menuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileLoginButton = document.getElementById('mobileLoginButton');

        // Toggle the dropdown menu on button click
        loginButton.addEventListener('click', (event) => {
            loginDropdown.classList.toggle('show');
            event.stopPropagation();
        });
        
        // Hide the dropdown when clicking outside of it
        window.addEventListener('click', (event) => {
            if (!loginDropdown.contains(event.target) && !loginButton.contains(event.target)) {
                loginDropdown.classList.remove('show');
            }
        });

        // Toggle mobile menu visibility
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('show');
        });

        // Toggle login dropdown for mobile button
        mobileLoginButton.addEventListener('click', (event) => {
            event.preventDefault();
            event.stopPropagation();
            loginDropdown.classList.toggle('show');
        });

        // Hide mobile menu on link click
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('show');
            });
        });
    </script>
</body>

</html>
