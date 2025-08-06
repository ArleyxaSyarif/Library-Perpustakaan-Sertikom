<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-teal-100 to-blue-200 min-h-screen flex items-center justify-center">

    <div
        class="bg-white shadow-xl rounded-xl p-10 md:p-16 max-w-5xl w-full flex flex-col md:flex-row items-center space-y-8 md:space-y-0 md:space-x-12 transform hover:scale-105 transition-transform duration-500">

        <!-- Left Image Section -->
        <div class="relative w-full md:w-1/2">
            <img src="/img/login.png" alt="Foto Perpustakaan" class="rounded-xl shadow-lg w-full  h-72 md:h-96">
            <div class="absolute top-8 left-8 bg-teal-500 text-white p-3 rounded-full shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19 8H5v8h14V8z" />
                    <path fill-rule="evenodd"
                        d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm2 2v8h12V8H6z"
                        clip-rule="evenodd" />
                </svg>
            </div>
            <div class="absolute bottom-8 right-8 bg-teal-500 text-white p-3 rounded-full shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M12 4.354a4 4 0 00-2.828 1.172l-6 6a4 4 0 000 5.656 4 4 0 005.656 0l6-6A4 4 0 0012 4.354zM8.586 8.586a2 2 0 112.828 2.828l-4 4a2 2 0 11-2.828-2.828l4-4z" />
                </svg>
            </div>
        </div>

        <!-- Right Text Section -->
        <div class="w-full md:w-1/2 text-center md:text-left">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800 leading-tight mb-4">
                Selamat Datang di <br>
                <span class="text-5xl font-extrabold text-teal-600">E-Perpustakaan</span>
            </h1>
            <p class="text-xl text-gray-600 mt-2 mb-6">SMK Pesat IT XPro</p>

            <div class="mt-4">
                <button
                    class="bg-gradient-to-r from-teal-600 to-blue-600 text-white px-8 py-3 text-lg font-medium rounded-full shadow-lg transform hover:scale-105 transition-all duration-300 ease-in-out">
                    <a href="{{ route('login') }}">Login</a>
                </button>
            </div>
        </div>
    </div>

</body>

</html>
