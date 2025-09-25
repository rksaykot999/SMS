
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
            height: 50vh;
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

    <!-- Computer Technology -->
    <div class="bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
      <div class="h-48 w-full rounded-lg mb-4 overflow-hidden flex items-center justify-center bg-gradient-to-br from-indigo-600 to-blue-500">
        <i class="fas fa-laptop-code text-6xl text-white" aria-hidden="true"></i>
      </div>
      <h3 class="text-xl font-bold text-gray-800 mb-2">Computer Technology</h3>
      <p class="text-gray-600 text-sm mb-4">
        Modern computing, software development, networking & hardware design. Hands-on labs & projects.
      </p>
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <span class="inline-block px-3 py-1 text-xs font-semibold bg-blue-100 text-blue-800 rounded-full">Diploma</span>
          <span class="inline-block px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">4 Years</span>
        </div>
        <a href="#" class="inline-block px-4 py-2 text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">View Details</a>
      </div>
    </div>

    <!-- Civil Technology -->
    <div class="bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
      <div class="h-48 w-full rounded-lg mb-4 overflow-hidden flex items-center justify-center bg-gradient-to-br from-emerald-500 to-green-400">
        <i class="fas fa-building text-6xl text-white" aria-hidden="true"></i>
      </div>
      <h3 class="text-xl font-bold text-gray-800 mb-2">Civil Technology</h3>
      <p class="text-gray-600 text-sm mb-4">
        Design & construction of infrastructure — roads, bridges & buildings. Strong structural labs.
      </p>
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <span class="inline-block px-3 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded-full">Diploma</span>
          <span class="inline-block px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">4 Years</span>
        </div>
        <a href="#" class="inline-block px-4 py-2 text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">View Details</a>
      </div>
    </div>

    <!-- Electrical Technology -->
    <div class="bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
      <div class="h-48 w-full rounded-lg mb-4 overflow-hidden flex items-center justify-center bg-gradient-to-br from-yellow-500 to-orange-400">
        <i class="fas fa-plug text-6xl text-white" aria-hidden="true"></i>
      </div>
      <h3 class="text-xl font-bold text-gray-800 mb-2">Electrical Technology</h3>
      <p class="text-gray-600 text-sm mb-4">
        Electricity, electronics, control systems & renewable energy technologies with lab practice.
      </p>
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <span class="inline-block px-3 py-1 text-xs font-semibold bg-yellow-100 text-yellow-800 rounded-full">Diploma</span>
          <span class="inline-block px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">4 Years</span>
        </div>
        <a href="#" class="inline-block px-4 py-2 text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">View Details</a>
      </div>
    </div>

    <!-- Mechanical Technology -->
    <div class="bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
      <div class="h-48 w-full rounded-lg mb-4 overflow-hidden flex items-center justify-center bg-gradient-to-br from-red-500 to-pink-400">
        <i class="fas fa-cogs text-6xl text-white" aria-hidden="true"></i>
      </div>
      <h3 class="text-xl font-bold text-gray-800 mb-2">Mechanical Technology</h3>
      <p class="text-gray-600 text-sm mb-4">
        Machines, thermodynamics, fluid mechanics & manufacturing — strong workshop and CAD practice.
      </p>
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <span class="inline-block px-3 py-1 text-xs font-semibold bg-red-100 text-red-800 rounded-full">Diploma</span>
          <span class="inline-block px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">4 Years</span>
        </div>
        <a href="#" class="inline-block px-4 py-2 text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">View Details</a>
      </div>
    </div>

    <!-- Electronics Technology -->
    <div class="bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
      <div class="h-48 w-full rounded-lg mb-4 overflow-hidden flex items-center justify-center bg-gradient-to-br from-sky-500 to-indigo-400">
        <i class="fas fa-microchip text-6xl text-white" aria-hidden="true"></i>
      </div>
      <h3 class="text-xl font-bold text-gray-800 mb-2">Electronics Technology</h3>
      <p class="text-gray-600 text-sm mb-4">
        Microcontrollers, circuit design & communication systems — ideal for embedded systems projects.
      </p>
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <span class="inline-block px-3 py-1 text-xs font-semibold bg-sky-100 text-sky-800 rounded-full">Diploma</span>
          <span class="inline-block px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">4 Years</span>
        </div>
        <a href="#" class="inline-block px-4 py-2 text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">View Details</a>
      </div>
    </div>

    <!-- Power Technology -->
    <div class="bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
      <div class="h-48 w-full rounded-lg mb-4 overflow-hidden flex items-center justify-center bg-gradient-to-br from-violet-700 to-indigo-600">
        <i class="fas fa-bolt text-6xl text-white" aria-hidden="true"></i>
      </div>
      <h3 class="text-xl font-bold text-gray-800 mb-2">Power Technology</h3>
      <p class="text-gray-600 text-sm mb-4">
        Power generation, transmission & smart grid topics; practical labs with high-voltage safety training.
      </p>
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <span class="inline-block px-3 py-1 text-xs font-semibold bg-violet-100 text-violet-800 rounded-full">Diploma</span>
          <span class="inline-block px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">4 Years</span>
        </div>
        <a href="#" class="inline-block px-4 py-2 text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">View Details</a>
      </div>
    </div>

    <!-- Tourism & Hospitality -->
    <div class="bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
      <div class="h-48 w-full rounded-lg mb-4 overflow-hidden flex items-center justify-center bg-gradient-to-br from-pink-500 to-orange-400">
        <i class="fas fa-concierge-bell text-6xl text-white" aria-hidden="true"></i>
      </div>
      <h3 class="text-xl font-bold text-gray-800 mb-2">Tourism & Hospitality</h3>
      <p class="text-gray-600 text-sm mb-4">
        Hotel management, event planning, travel operations & customer service — real-world internships available.
      </p>
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <span class="inline-block px-3 py-1 text-xs font-semibold bg-pink-100 text-pink-800 rounded-full">Diploma</span>
          <span class="inline-block px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">4 Years</span>
        </div>
        <a href="#" class="inline-block px-4 py-2 text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">View Details</a>
      </div>
    </div>

    <!-- Electromedical Technology -->
    <div class="bg-gray-50 p-6 rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
      <div class="h-48 w-full rounded-lg mb-4 overflow-hidden flex items-center justify-center bg-gradient-to-br from-teal-500 to-cyan-400">
        <i class="fas fa-stethoscope text-6xl text-white" aria-hidden="true"></i>
      </div>
      <h3 class="text-xl font-bold text-gray-800 mb-2">Electromedical Technology</h3>
      <p class="text-gray-600 text-sm mb-4">
        Biomedical instruments, hospital equipment maintenance & diagnostics — prepares students for healthcare tech roles.
      </p>
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <span class="inline-block px-3 py-1 text-xs font-semibold bg-teal-100 text-teal-800 rounded-full">Diploma</span>
          <span class="inline-block px-3 py-1 text-xs font-medium bg-gray-100 text-gray-700 rounded-full">4 Years</span>
        </div>
        <a href="#" class="inline-block px-4 py-2 text-white font-semibold bg-blue-600 hover:bg-blue-700 rounded-full transition duration-300">View Details</a>
      </div>
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
