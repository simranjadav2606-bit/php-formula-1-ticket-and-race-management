<!DOCTYPE html>
<html lang="en">

<head>
<?php
require("header.php");
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F1 User Panel - Home</title>
    <!-- Use Tailwind CSS for a modern and professional design -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-zinc-900 text-white">

    <!-- Hero Section -->
    <section class="relative h-[60vh] md:h-[80vh] w-full overflow-hidden">
        <img src="Image\pad.jpg" 
             class="absolute inset-0 w-full h-full object-cover" alt="Upcoming Race">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-end justify-start p-8 md:p-16">
            <div class="text-left max-w-2xl">
                <h1 class="text-4xl md:text-6xl font-extrabold text-white">Italian Grand Prix – Monza</h1>
                <p class="mt-4 text-xl text-zinc-300">Experience the thrill live. Book hotels now.</p>
                <a href="hospitality.php" class="mt-6 inline-block bg-red-600 text-white font-semibold py-3 px-8 rounded-full hover:bg-red-700 transition-colors">View Hotels</a>
            </div>
        </div>
    </section>

    <!-- Must-Watch Videos -->
    <section class="container mx-auto py-16 px-6">
        <h2 class="text-4xl font-bold text-center text-red-600 mb-12">Must Watch</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-zinc-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                <img src="Image\higglights'.jpg" class="w-full h-64 object-cover" alt="Qualifying Highlights">
                <div class="p-6">
                    <p class="text-white font-semibold text-lg text-center">Qualifying Highlights</p>
                </div>
            </div>
            <div class="bg-zinc-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                <img src="Image\Mexico.avif" class="w-full h-64 object-cover" alt="Race Day Action">
                <div class="p-6">
                    <p class="text-white font-semibold text-lg text-center">Race Day Action</p>
                </div>
            </div>
            <div class="bg-zinc-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                <img src="Image\onboard.jpg" class="w-full h-64 object-cover" alt="Onboard Camera">
                <div class="p-6">
                    <p class="text-white font-semibold text-lg text-center">Onboard Camera</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Driver Standings -->
    <section class="container mx-auto py-16 px-6 bg-zinc-800 rounded-xl shadow-lg mb-16">
        <h2 class="text-4xl font-bold text-center text-red-600 mb-8">2025 Standings</h2>
        <div class="text-center text-lg text-white">
            <p>
                <span class="font-bold text-red-600">1.</span> Lando Norris – 226 pts
                <span class="mx-4">|</span>
                <span class="font-bold text-red-600">2.</span> Oscar Piastri – 220 pts
                <span class="mx-4">|</span>
                <span class="font-bold text-red-600">3.</span> Max Verstappen – 198 pts
            </p>
        </div>
    </section>

    <!-- Spotlight Stories -->
    <section class="container mx-auto py-16 px-6">
        <h2 class="text-4xl font-bold text-center text-red-600 mb-12">Spotlight Stories</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <div class="bg-zinc-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                <img src="Image\2025.jpg" class="w-full h-48 object-cover" alt="Tech Insight: New Aero Rules">
                <div class="p-4">
                    <h5 class="text-white font-semibold text-lg">Tech Insight: New Aero Rules</h5>
                </div>
            </div>
            <div class="bg-zinc-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                <img src="Image\ferrari.avif" class="w-full h-48 object-cover" alt="Ferrari’s Comeback">
                <div class="p-4">
                    <h5 class="text-white font-semibold text-lg">Ferrari’s Comeback</h5>
                </div>
            </div>
            <div class="bg-zinc-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                <img src="Image\redbull.jpg" class="w-full h-48 object-cover" alt="Inside Red Bull Garage">
                <div class="p-4">
                    <h5 class="text-white font-semibold text-lg">Inside Red Bull Garage</h5>
                </div>
            </div>
            <div class="bg-zinc-800 rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                <img src="Image\daniel.jpeg" class="w-full h-48 object-cover" alt="Driver Lifestyle">
                <div class="p-4">
                    <h5 class="text-white font-semibold text-lg">Driver Lifestyle</h5>
                </div>
            </div>
        </div>
    </section>

<?php
require("footer.php");
?>

</body>
</html>
