<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Cafe</title>
    <link rel="stylesheet" href="icon/fontawesome/css/all.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans text-gray-800">

    <!-- HEADER -->
    

    <!-- CATEGORY BUTTONS -->
    <div class="flex justify-center gap-3 mt-6">
        <button class="bg-green-600 text-white px-5 py-2 rounded-full font-medium shadow">Makanan</button>
        <button
            class="bg-white text-green-600 border border-green-500 px-5 py-2 rounded-full font-medium">Minuman</button>
    </div>

    <!-- PRODUCT SECTIONS -->
    <main class="px-4 mt-8 space-y-10">
        <section>
            <div class="flex justify-between items-center mb-3">
                <h3 class="font-semibold text-lg">Paling Disukai</h3>
                <a href="#" class="text-green-600 font-medium text-sm hover:underline">See all</a>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="bg-white p-3 rounded-2xl shadow hover:shadow-lg transition">
                    <img src="{{ asset('images/strawberry.PNG') }}" alt="Strawberry Vanilla"
                        class="rounded-xl w-full h-36 object-cover">
                    <h4 class="font-semibold mt-2 text-gray-800">Strawberry Vanilla</h4>
                    <p class="text-sm text-gray-500">Cyber Caffe Food</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="font-semibold text-gray-900">Rp. 120.000</span>
                        <button
                            class="bg-green-600 text-white rounded-full w-8 h-8 flex items-center justify-center text-lg hover:bg-green-700">+</button>
                    </div>
                </div>

                <div class="bg-white p-3 rounded-2xl shadow hover:shadow-lg transition">
                    <img src="{{ asset('images/matcha.PNG') }}" alt="Matcha Vanilla"
                        class="rounded-xl w-full h-36 object-cover">
                    <h4 class="font-semibold mt-2 text-gray-800">Matcha Vanilla</h4>
                    <p class="text-sm text-gray-500">Cyber Caffe Food</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="font-semibold text-gray-900">Rp. 50.000</span>
                        <button
                            class="bg-green-600 text-white rounded-full w-8 h-8 flex items-center justify-center text-lg hover:bg-green-700">+</button>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="flex justify-between items-center mb-3">
                <h3 class="font-semibold text-lg"></h3>Paling Laris
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="bg-white p-3 rounded-2xl shadow hover:shadow-lg transition">
                    <div class="relative">
                        <img src="{{ asset('images/coffee.PNG') }}" alt="Coffee Ice"
                            class="rounded-xl w-full h-36 object-cover">
                        <div
                            class="absolute top-2 left-2 bg-white/80 text-yellow-500 text-xs font-semibold px-2 py-1 rounded-full">
                            ⭐ 4.8
                        </div>
                    </div>
                    <h4 class="font-semibold mt-2 text-gray-800">Coffee Ice</h4>
                    <p class="text-sm text-gray-500">Cyber Caffe Food</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="font-semibold text-gray-900">Rp. 50.000</span>
                        <button
                            class="bg-green-600 text-white rounded-full w-8 h-8 flex items-center justify-center text-lg hover:bg-green-700">+</button>
                    </div>
                </div>

                <div class="bg-white p-3 rounded-2xl shadow hover:shadow-lg transition">
                    <img src="{{ asset('images/vanilla.PNG') }}" alt="Vanilla Coffee"
                        class="rounded-xl w-full h-36 object-cover">
                    <h4 class="font-semibold mt-2 text-gray-800">Vanilla Coffee</h4>
                    <p class="text-sm text-gray-500">Cyber Caffe Food</p>
                    <div class="flex justify-between items-center mt-2">
                        <span class="font-semibold text-gray-900">Rp. 50.000</span>
                        <button
                            class="bg-green-600 text-white rounded-full w-8 h-8 flex items-center justify-center text-lg hover:bg-green-700">+</button>
                    </div>
                </div>
            </div>
        </section>

    </main>

</body>

</html>
