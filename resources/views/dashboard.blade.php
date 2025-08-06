<x-app-layout>
    <section class="bg-gray-100 dark:bg-gray-900 py-6 lg:pl-64">
        <!-- Header -->
        <div class="max-w-screen-xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">

                <div class="flex items-center space-x-4">
                    <span class="text-gray-600 dark:text-gray-300">{{ now()->format('l, M Y | H:i') }}</span>

                </div>
            </div>

            <!-- Hero Section -->
            <div
                class="bg-gradient-to-r from-orange-500 to-orange-800 p-6 rounded-lg shadow-xl flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0 transition-transform duration-500 hover:scale-105">
                <div class="lg:w-1/3 mt-6 lg:mt-0">
                    <img src="/img/image.png" alt="Library Illustration"
                        class="rounded-lg shadow-lg transition-transform duration-300">
                </div>
                <div class="lg:w-2/3 ps-5">
                    <h1 class="text-3xl font-bold text-white mb-4">Selamat Datang,
                        {{ Auth::user()->name }}!</h1>
                    <p class="text-gray-200 mb-6">
                        Buku adalah jendela dunia, dan perpustakaan adalah tempat di mana jendela-jendela itu terbuka
                        lebar. <br>Di setiap rak, ada cerita yang menunggu untuk diceritakan.
                    </p>
                    @if (auth()->user()->role == 'anggota')
                        <div class="space-x-4">
                            <a href="/anggota">
                                <button
                                    class="bg-green-500 text-white px-6 py-3 rounded-lg hover:scale-105 hover:bg-green-600 transition-colors duration-300">Temukan
                                    Buku</button></a>
                            <a href="/anggota/create">
                                <button
                                    class="bg-red-500 text-white px-6 py-3 rounded-lg hover:scale-105 hover:bg-red-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 transition-colors duration-300">Riwayat
                                    Buku</button></a>
                        </div>
                    @endif
                    @if (auth()->user()->role == 'admin')
                        <div class="space-x-4">
                            <a href="/books/create">
                                <button
                                    class="bg-orange-500 text-white px-6 py-3 rounded-lg hover:scale-105 hover:bg-orange-600 transition-colors duration-300">Tambah
                                    Buku</button></a>
                            <a href="/books">
                                <button
                                    class="bg-teal-500 text-white px-6 py-3 rounded-lg hover:scale-105 hover:bg-teal-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 transition-colors duration-300">Lemari
                                    Buku</button></a>
                            <a href="/users">
                                <button
                                    class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:scale-105 hover:bg-blue-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 transition-colors duration-300">Data
                                    Anggota</button></a>
                            <a href="/loanHistory">
                                <button
                                    class="bg-green-500 text-white px-6 py-3 rounded-lg hover:scale-105 hover:bg-green-600 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 transition-colors duration-300">Informasi</button></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Info -->
    <section class="py-8 bg-gray-50 dark:bg-gray-900 lg:pl-64">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-8">

            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Info Dashboard Buku</h2>
            <p class="text-gray-600 dark:text-gray-300 mb-6">Dashboard informasi buku total buku di lemari, sedang di
                pinjam, buku
                tersedia, buku tidak tersedia</p>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Buku -->
                <div
                    class="bg-blue-200 text-blue-800 dark:bg-blue-700 dark:text-blue-200 p-6 rounded-lg shadow-lg flex items-center justify-between hover:scale-105 transition-all duration-300">
                    <div>
                        <h3 class="text-2xl font-bold">{{ $totalBuku }}</h3>
                        <p>Total buku di lemari </p>
                    </div>
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold">{{ $totalBuku }}</span>
                    </div>
                </div>


                {{-- Buku sedang di pinjam --}}
                <div
                    class="bg-teal-200 text-teal-800 dark:bg-teal-700 dark:text-blue-200 p-6 rounded-lg shadow-lg flex items-center justify-between hover:scale-105 transition-all duration-300">
                    <div>
                        <h3 class="text-2xl font-bold">{{ $totalpinjam }}</h3>
                        <p>Total buku di pinjam </p>
                    </div>
                    <div class="w-16 h-16 bg-teal-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold">{{ $totalpinjam }}</span>
                    </div>
                </div>



                <!-- Buku tersedia  -->
                <div
                    class="bg-yellow-200 text-yellow-800 dark:bg-yellow-700 dark:text-yellow-200 p-6 rounded-lg shadow-lg flex items-center justify-between hover:scale-105 transition-all duration-300">
                    <div>
                        <h3 class="text-2xl font-bold"> {{ $totalstat }}</h3>
                        <p>Buku yang tersedia</p>
                    </div>
                    <div class="w-16 h-16 bg-yellow-600 rounded-full flex items-center justify-center">
                        <span class="text-white font-bold">{{ $totalstat }}</span>
                    </div>
                </div>

                <!-- Buku tidak tersedia -->
                <div
                    class="bg-red-200 text-red-800 dark:bg-red-700 dark:text-red-200 p-6 rounded-lg shadow-lg flex items-center justify-between hover:scale-105 transition-all duration-300">
                    <div>
                        <h3 class="text-2xl font-bold">{{ $totalava }}</h3>
                        <p>Buku yang tidak tersedia</p>
                    </div>
                    <div class="w-16 h-16 bg-red-600 rounded-full flex items-center justify-center">

                        <span class="text-white font-bold">{{ $totalava }}</span>
                    </div>
                </div>
            </div>






        </div>


    </section>
</x-app-layout>
