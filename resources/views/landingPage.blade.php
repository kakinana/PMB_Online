<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow-md">
        <nav class="container mx-auto p-4">
            <ul class="flex justify-center space-x-8">
                <li><a href="#about" class="text-gray-700 font-semibold hover:text-orange-500">Academic</a></li>
                <li><a href="#about" class="text-gray-700 font-semibold hover:text-orange-500">Campus</a></li>
                <li><a href="#about" class="text-gray-700 font-semibold hover:text-orange-500">About Us</a></li>
                <li><a href="#testimoni" class="text-gray-700 font-semibold hover:text-orange-500">Contact</a></li>
                <li><a href="{{ route('login')}}" class="text-gray-700 font-semibold hover:text-orange-500">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="py-16">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold text-orange-500 mb-12">Most Demanding Major</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="information system" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-2 text-gray-800">Information System</h2>
                        <p class="text-gray-600 italic">Information Systems equips you to lead in a tech-driven world. Design and manage systems that transform businesses, combining technology and strategy to make a powerful impact.</p>
                    </div>
                </div>

                <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img src="https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?q=80&w=2069&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="electrical engineering" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-2 text-gray-800">Electrical Engineering</h2>
                        <p class="text-gray-600 italic">Electrical Engineering equips you to design and innovate the technology that powers our world. Drive progress and spark change.</p>
                    </div>
                </div>

                <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=1911&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="accounting" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold mb-2 text-gray-800">Accounting</h2>
                        <p class="text-gray-600 italic">Accounting gives you the skills to drive business success. Master finances, make strategic decisions, and shape a prosperous future.</p>
                    </div>
                </div>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/L_S6_MfAWmY?si=8ZPnb3ZvPB7gslpY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
    </section>
</body>
</html>
