<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>F1 Store - Formula 1 Clothing</title>
    <!-- Use Tailwind CSS for a modern and professional design -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f5f5f5; /* Lighter background */
        }
    </style>
</head>


<body class="bg-zinc-900 text-white">

    <!-- Message Box -->
    <div id="messageBox" class="fixed top-5 right-5 z-50 p-4 bg-green-500 rounded-lg shadow-xl opacity-0 transition-opacity duration-500 ease-in-out"></div>

    <!-- Header -->
    <header class="bg-black text-white shadow-lg sticky top-0 z-40">
        <nav class="container mx-auto flex justify-between items-center py-4 px-6">
            <a href="#" class="text-2xl font-bold text-red-600 tracking-wider">F1 Store</a>
            <div class="hidden md:flex space-x-6">
                <a href="#" class="text-white hover:text-red-600 transition-colors">Home</a>
                <a href="#" class="text-white hover:text-red-600 transition-colors">New Arrivals</a>
                <a href="#" class="text-white hover:text-red-600 transition-colors">Men</a>
                <a href="#" class="text-white hover:text-red-600 transition-colors">Women</a>
                <a href="#" class="text-white hover:text-red-600 transition-colors">Accessories</a>
            </div>
            <!-- Currency Selector -->
            <div class="currency-selector">
                <select id="currency" class="bg-zinc-800 text-white p-2 rounded-md border border-zinc-700 focus:outline-none focus:ring-2 focus:ring-red-600">
                    <option value="INR" selected>₹ INR</option>
                    <option value="USD">$ USD</option>
                    <option value="EUR">€ EUR</option>
                </select>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="bg-zinc-900 text-white pt-24 pb-16 px-6">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-12">
            <div class="md:w-1/2">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight">
                    Experience the <br>
                    <span class="text-red-600">Thrill of F1</span> <br>
                    Collection
                </h1>
                <p class="mt-6 text-lg text-zinc-300">
                    Discover the latest official merchandise, engineered for performance, designed for passion. New arrivals for both Men and Women.
                </p>
                <a href="#" class="mt-8 inline-block bg-red-600 text-white font-semibold py-3 px-8 rounded-full hover:bg-red-700 transition-colors">Shop Now</a>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <img src="/img/mer_ng.jpg" alt="F1 Clothing" class="rounded-3xl shadow-2xl transform hover:scale-105 transition-transform duration-500">
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="bg-zinc-800 py-20 px-6">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center text-red-600 mb-16">New Arrivals</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Product Card 1 -->
                <div class="bg-zinc-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                    <img src="/img/jacket.webp" class="w-full h-64 object-cover" alt="Men's F1 Jacket">
                    <div class="p-6 flex flex-col items-center">
                        <h5 class="text-lg font-semibold text-white">Men's F1 Jacket</h5>
                        <p class="text-red-600 font-bold text-xl mt-2 price" data-price="3999">₹3999</p>
                        <div class="flex items-center gap-2 mt-4">
                            <label for="quantity-1" class="text-zinc-300">Qty:</label>
                            <input type="number" id="quantity-1" class="w-16 bg-zinc-600 text-center rounded-md border border-zinc-500 focus:outline-none focus:ring-1 focus:ring-red-600" value="1" min="1">
                        </div>
                        <button class="add-to-cart-btn mt-4 bg-red-600 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-700 transition-colors" onclick="addToCart('Men\'s F1 Jacket', 3999, 'quantity-1')">Add to Cart</button>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div class="bg-zinc-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                    <img src="/img/femalejac.jpg" class="w-full h-64 object-cover" alt="Women's F1 Jacket">
                    <div class="p-6 flex flex-col items-center">
                        <h5 class="text-lg font-semibold text-white">Women's F1 Jacket</h5>
                        <p class="text-red-600 font-bold text-xl mt-2 price" data-price="3999">₹3999</p>
                        <div class="flex items-center gap-2 mt-4">
                            <label for="quantity-2" class="text-zinc-300">Qty:</label>
                            <input type="number" id="quantity-2" class="w-16 bg-zinc-600 text-center rounded-md border border-zinc-500 focus:outline-none focus:ring-1 focus:ring-red-600" value="1" min="1">
                        </div>
                        <button class="add-to-cart-btn mt-4 bg-red-600 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-700 transition-colors" onclick="addToCart('Women\'s F1 Jacket', 3999, 'quantity-2')">Add to Cart</button>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div class="bg-zinc-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                    <img src="/img/womentee.avif" class="w-full h-64 object-cover" alt="Women's F1 T-shirt">
                    <div class="p-6 flex flex-col items-center">
                        <h5 class="text-lg font-semibold text-white">Women's F1 T-shirt</h5>
                        <p class="text-red-600 font-bold text-xl mt-2 price" data-price="2499">₹2499</p>
                        <div class="flex items-center gap-2 mt-4">
                            <label for="quantity-3" class="text-zinc-300">Qty:</label>
                            <input type="number" id="quantity-3" class="w-16 bg-zinc-600 text-center rounded-md border border-zinc-500 focus:outline-none focus:ring-1 focus:ring-red-600" value="1" min="1">
                        </div>
                        <button class="add-to-cart-btn mt-4 bg-red-600 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-700 transition-colors" onclick="addToCart('Women\'s F1 T-shirt', 2499, 'quantity-3')">Add to Cart</button>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div class="bg-zinc-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                    <img src="/img/mentee.webp" class="w-full h-64 object-cover" alt="Men's F1 T-shirt">
                    <div class="p-6 flex flex-col items-center">
                        <h5 class="text-lg font-semibold text-white">Men's F1 T-shirt</h5>
                        <p class="text-red-600 font-bold text-xl mt-2 price" data-price="2499">₹2499</p>
                        <div class="flex items-center gap-2 mt-4">
                            <label for="quantity-4" class="text-zinc-300">Qty:</label>
                            <input type="number" id="quantity-4" class="w-16 bg-zinc-600 text-center rounded-md border border-zinc-500 focus:outline-none focus:ring-1 focus:ring-red-600" value="1" min="1">
                        </div>
                        <button class="add-to-cart-btn mt-4 bg-red-600 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-700 transition-colors" onclick="addToCart('Men\'s F1 T-shirt', 2499, 'quantity-4')">Add to Cart</button>
                    </div>
                </div>

                <!-- Product Card 5 -->
                <div class="bg-zinc-700 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300 transform hover:-translate-y-2">
                    <img src="/img/mencap.webp" class="w-full h-64 object-cover" alt="Official F1 Cap">
                    <div class="p-6 flex flex-col items-center">
                        <h5 class="text-lg font-semibold text-white">Official F1 Cap</h5>
                        <p class="text-red-600 font-bold text-xl mt-2 price" data-price="1499">₹1499</p>
                        <div class="flex items-center gap-2 mt-4">
                            <label for="quantity-5" class="text-zinc-300">Qty:</label>
                            <input type="number" id="quantity-5" class="w-16 bg-zinc-600 text-center rounded-md border border-zinc-500 focus:outline-none focus:ring-1 focus:ring-red-600" value="1" min="1">
                        </div>
                        <button class="add-to-cart-btn mt-4 bg-red-600 text-white font-semibold py-2 px-6 rounded-full hover:bg-red-700 transition-colors" onclick="addToCart('Official F1 Cap', 1499, 'quantity-5')">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
   

    <!-- Scripts -->
    <script>
        // Function to show a temporary message box
        function showMessage(message) {
            const messageBox = document.getElementById('messageBox');
            messageBox.textContent = message;
            messageBox.classList.add('opacity-100');
            setTimeout(() => {
                messageBox.classList.remove('opacity-100');
            }, 3000); // Hide after 3 seconds
        }

        // Function to handle "Add to Cart" button clicks.
        function addToCart(productName, price, quantityId) {
            const quantityInput = document.getElementById(quantityId);
            const quantity = quantityInput.value;
            showMessage(Added ${quantity} x "${productName}" to cart.);
        }

        // --- Currency Conversion Logic ---
        document.addEventListener('DOMContentLoaded', () => {
            const currencySelect = document.getElementById('currency');
            const prices = document.querySelectorAll('.price');

            // Define exchange rates. These are for demonstration purposes.
            const exchangeRates = {
                'INR': { symbol: '₹', rate: 1 },
                'USD': { symbol: '$', rate: 0.012 }, 
                'EUR': { symbol: '€', rate: 0.011 }
            };

            // Function to update all prices on the page
            const updatePrices = (selectedCurrency) => {
                prices.forEach(priceEl => {
                    let basePrice = priceEl.getAttribute('data-price');
                    let converted = (basePrice * exchangeRates[selectedCurrency].rate).toFixed(2);
                    priceEl.textContent = ${exchangeRates[selectedCurrency].symbol}${converted};
                });
            };

            // Event listener for currency change
            currencySelect.addEventListener('change', (event) => {
                const selected = event.target.value;
                updatePrices(selected);
            });

            // Initial price update on page load based on default selection
            updatePrices(currencySelect.value);
        });
    </script>
    <?php
    require("footer.php");
    ?>
</body>
</html>