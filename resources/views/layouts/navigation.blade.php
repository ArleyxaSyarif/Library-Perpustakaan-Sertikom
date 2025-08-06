<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
        aria-label="Sidenav">
        <div
            class="overflow-y-auto py-5 px-3 h-full bg-gradient-to-r from-indigo-900 to-orange-700 border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <ul class="space-y-2">
                <h1 class="flex items-center text-2xl font-bold text-white dark:text-white">
                    <img src="/img/th.jpg" alt="Logo" class="w-15 h-8 mr-90 me-3">
                    E-Perpustakaan
                </h1>

                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-black dark:hover:bg-gray-700 group">
                        <svg aria-hidden="true"
                            class="w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 2.293l7 7V18a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4H8v4a1 1 0 01-1 1H3a1 1 0 01-1-1V9.293l7-7a1 1 0 011.414 0zM4 9v8h2v-4a1 1 0 011-1h6a1 1 0 011 1v4h2V9.414l-6-6-6 6V9z"
                                clip-rule="evenodd" />
                        </svg>

                        <span class="ml-3 text-white">Dashboard</span>
                    </a>
                </li>

                @if (auth()->user()->role == 'admin')
                    <li>
                        <button type="button"
                            class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-white transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6 3H18C19.1 3 20 3.9 20 5V19C20 20.1 19.1 21 18 21H6C4.9 21 4 20.1 4 19V5C4 3.9 4.9 3 6 3ZM6 5V19H18V5H6ZM9 7H8V9H9V7ZM16 7H15V9H16V7ZM8 11H9V13H8V11ZM16 11H15V13H16V11ZM9 15H8V17H9V15ZM16 15H15V17H16V15Z" />
                            </svg>
                            <span class="text-white flex-1 ml-3 text-left whitespace-nowrap">Lemari</span>
                            <svg aria-hidden="true" class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                            <li>
                                <a href="books/create"
                                    class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-black dark:text-white dark:hover:bg-gray-700">Tambah
                                    Buku</a>
                            </li>
                            <li>
                                <a href="/books"
                                    class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-black dark:text-white dark:hover:bg-gray-700">Data
                                    Buku</a>
                            </li>
                            <li>
                                <a href="{{ route('managepinjaman.loanHistory') }}""
                                    class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-black dark:text-white dark:hover:bg-gray-700">Informasi</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button type="button"
                            class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-sales" data-collapse-toggle="dropdown-sales">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24 "
                                class="flex-shrink-0 w-6 h-6 text-white transition duration-75 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12H9m6 0h-6m12 8.25V15.75a.75.75 0 00-.75-.75H3.75a.75.75 0 00-.75.75v4.5m.75-10.5a9 9 0 119 9 9 9 0 01-9-9z" />
                            </svg>


                            <span class="flex-1 ml-3 text-left text-white whitespace-nowrap">Data</span>
                            <svg aria-hidden="true" class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">

                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-sales" class="hidden py-2 space-y-2">

                            <li>
                                <a href="/users"
                                    class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group  hover:bg-black dark:text-white dark:hover:bg-gray-700">
                                    Data Anggota</a>
                            </li>

                        </ul>
                    </li>
                @endif

                @if (auth()->user()->role == 'anggota')
                    <li>
                        <button type="button"
                            class="flex items-center p-2 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-black dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                            <svg aria-hidden="true"
                                class="flex-shrink-0 w-6 h-6 text-white transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white"
                                fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6 3H18C19.1 3 20 3.9 20 5V19C20 20.1 19.1 21 18 21H6C4.9 21 4 20.1 4 19V5C4 3.9 4.9 3 6 3ZM6 5V19H18V5H6ZM9 7H8V9H9V7ZM16 7H15V9H16V7ZM8 11H9V13H8V11ZM16 11H15V13H16V11ZM9 15H8V17H9V15ZM16 15H15V17H16V15Z" />
                            </svg>

                            <span class="text-white flex-1 ml-3 text-left whitespace-nowrap ">Lemari</span>
                            <svg aria-hidden="true" class="w-6 h-6 hover:bg-black" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('anggota.index') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-black dark:text-white dark:hover:bg-gray-700">Lemari
                                    Buku</a>
                            </li>

                            <li>
                                <a href="{{ route('anggota.create') }}"
                                    class="flex items-center p-2 pl-11 w-full text-base font-normal text-white rounded-lg transition duration-75 group hover:bg-black dark:text-white dark:hover:bg-gray-700">Riwayat
                                    Pinjaman Buku</a>
                            </li>

                        </ul>
                    </li>


            </ul>
            @endif
            <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">
                        <span
                            class="text-white ml-3 flex items-center p-2 text-base font-normal  rounded-lg transition duration-75 hover:bg-black dark:hover:bg-gray-700 dark:text-white group">
                            <!-- Tambahkan ikon logout -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H3"></path>
                            </svg>
                            Log Out
                        </span>
                    </button>
                </form>
            </ul>

        </div>

    </aside>
</nav>
