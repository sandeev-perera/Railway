<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="bg-gray-100">

    <!-- Sidebar -->

    
    <div class="flex">
        <aside class="bg-[#05445E] text-white w-64 min-h-screen fixed left-0 top-0 hidden md:block">
            <div class="p-6 text-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto w-16">
                <h2 class="text-lg font-bold mt-2">Tap and Go</h2>
            </div>
            <nav class="mt-6 text-center">
                <ul>
                    <li class="p-4"><a href="#" class="block sidebar-link" data-page="dashboard">Dashboard</a></li>
                    <li class="p-4 hover:bg-[#189AB4]"><a href="#" class="sidebar-link" data-page="renew_ticket">Renew Ticket</a></li>
                    <li class="p-4 hover:bg-[#189AB4]"><a href="#" class="sidebar-link" data-page="support">Support</a></li>
                    <li class="p-4 hover:bg-[#189AB4]"><a href="#" class="sidebar-link" data-page="view_ticket">View Ticket</a></li>
                    <li class="p-4 hover:bg-[#189AB4]"><a href="#" class="sidebar-link" data-page="cancel_season">Cancel Season</a></li>
                    
                </ul>
            </nav>
        </aside>
        

<!-- Mobile Sidebar -->
<div class="md:hidden z-10">
    <button id="menu-btn" class="m-4 text-[#05445E]">
        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
        </svg>
    </button>
    <div id="mobile-menu" class="hidden fixed top-0 left-0 w-64 bg-[#05445E] text-white h-full transform -translate-x-full transition-all duration-1000 ease-in-out shadow-lg backdrop-blur-4xl">
        <button id="close-btn" class="absolute top-4 right-4 text-white text-3xl">&times;</button>
        <nav class="mt-25 text-center">
            <ul>
                <li class="p-4"><a href="#" class="block sidebar-link" data-page="dashboard">Dashboard</a></li>
                <li class="p-4 hover:bg-[#189AB4]"><a href="#" class="sidebar-link" data-page="renew_ticket">Renew Ticket</a></li>
                <li class="p-4 hover:bg-[#189AB4]"><a href="#" class="sidebar-link" data-page="support">Support</a></li>
                <li class="p-4 hover:bg-[#189AB4]"><a href="#" class="sidebar-link" data-page="view_ticket">View Ticket</a></li>
                <li class="p-4 hover:bg-[#189AB4]"><a href="#" class="sidebar-link" data-page="cancel_season">Cancel Season</a></li>
            </ul>
        </nav>
    </div>
</div>




<!-- Main Content -->
<div class="ml-0 md:ml-64 flex-1 p-6">
    <div class="bg-[#75E6DA] p-4 text-[#05445E] font-bold text-xl text-center relative ">
        DASHBOARD OVERVIEW

        <!-- Profile Section -->
        <div class="absolute top-1/2 right-4 transform -translate-y-1/2 ">
            <div class="relative">
                <!-- Profile Icon -->
                <button id="profile-btn" class="flex items-center space-x-1 bg-white p-1 rounded-full shadow-md focus:outline-none">
                    <img src="{{ asset('images/user.jpg') }}" alt="Profile" class="w-10 h-10 rounded-full">
                    <span class="hidden md:inline-block font-semibold text-sm text-[#05445E]">User</span>
                </button>

                <!-- Dropdown Menu -->
                <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-md overflow-hidden z-50">
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Edit Profile</a>
                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section (Will be loaded dynamically) -->
    <div id="content" class="mt-6">
        @include('passenger.dashboard') <!-- Default content -->
    </div>
</div>

<!-- JavaScript to Handle Dropdown -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const profileBtn = document.getElementById("profile-btn");
        const profileDropdown = document.getElementById("profile-dropdown");

        profileBtn.addEventListener("click", function () {
            profileDropdown.classList.toggle("hidden");
        });

        // Close dropdown when clicking outside
        document.addEventListener("click", function (event) {
            if (!profileBtn.contains(event.target) && !profileDropdown.contains(event.target)) {
                profileDropdown.classList.add("hidden");
            }
        });
    });
</script>




    <!-- Mobile Menu Script -->

    <script>
 // Load page content dynamically
document.querySelectorAll('.sidebar-link').forEach(item => {
    item.addEventListener('click', function (e) {
        e.preventDefault();
        const page = this.getAttribute('data-page');
        loadPage(page);
    });
});

// Function to load page content
function loadPage(page) {
    fetch(`/user_dashboard/pages/${page}`)
        .then(response => response.text())
        .then(data => {
            document.getElementById('content').innerHTML = data;
        })
        .catch(error => {
            console.error('Error loading page:', error);
            document.getElementById('content').innerHTML = '<p>Error loading page</p>';
        });
}

        // Sidebar toggle for mobile 
        const menuBtn = document.getElementById("menu-btn");
    const closeBtn = document.getElementById("close-btn");
    const mobileMenu = document.getElementById("mobile-menu");

    // Open menu with animation
    menuBtn.addEventListener("click", () => {
        mobileMenu.classList.remove("hidden");  // Make the menu visible
        setTimeout(() => {
            mobileMenu.classList.remove("-translate-x-full"); // Slide in after a slight delay
            mobileMenu.classList.add("translate-x-0");
        }, 10);  // Short delay to ensure the hidden class is removed before transition starts
    });

    // Close menu
    closeBtn.addEventListener("click", () => {
        mobileMenu.classList.remove("translate-x-0");
        mobileMenu.classList.add("-translate-x-full");
        setTimeout(() => {
            mobileMenu.classList.add("hidden");
        }, 500); // Wait for the animation to finish before hiding
    });     

//Active link color change
        
    document.addEventListener("DOMContentLoaded", function () {
        const sidebarLinks = document.querySelectorAll(".sidebar-link");

        function setActiveLink(page) {
            sidebarLinks.forEach(link => {
                if (link.getAttribute("data-page") === page) {
                    link.parentElement.classList.add("bg-[#75E6DA]", "text-black", "font-bold"); // Active styles
                } else {
                    link.parentElement.classList.remove("bg-[#75E6DA]", "text-black", "font-bold");
                }
            });
        }

        // Get stored active page or default to "dashboard"
        const currentPage = localStorage.getItem("activePage") || "dashboard";
        setActiveLink(currentPage);

        // Add event listener to all links
        sidebarLinks.forEach(link => {
            link.addEventListener("click", function (event) {
                event.preventDefault();

                const page = this.getAttribute("data-page");
                localStorage.setItem("activePage", page);
                setActiveLink(page);

                // Load page content dynamically (Optional)
                loadPageContent(page);
            });
        });

        // Function to load page content dynamically (Optional)
        function loadPageContent(page) {
            fetch(`/user_dashboard/pages/${page}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById("content-area").innerHTML = html;
                })
                .catch(error => console.error("Error loading page:", error));
        }
    });

</script>
</body>
</html>
