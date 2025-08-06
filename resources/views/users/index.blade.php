<x-app-layout>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 lg:pl-64">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <div
                class="bg-white dark:bg-gray-800 relative shadow-xl sm:rounded-lg overflow-hidden transition-all duration-300 hover:shadow-2xl">

                <!-- Header dan Tombol -->
                <div
                    class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-6 bg-gradient-to-r from-indigo-600 to-indigo-600 dark:from-blue-700 dark:to-indigo-700 text-white">
                    <h2 class="text-2xl font-bold">Manajemen Anggota</h2>
                    <div class="w-full md:w-auto flex justify-end">
                        <button id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal"
                            class="text-white bg-orange-500 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-green-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-all transform hover:scale-105 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">
                            Tambah Anggota
                        </button>
                    </div>
                </div>

                <!-- Modal -->
                <div id="defaultModal" tabindex="-1" aria-hidden="true"
                    class="hidden fixed inset-0 z-50 justify-center items-center bg-black bg-opacity-60 overflow-y-auto overflow-x-hidden">
                    <div
                        class="relative p-6 w-full max-w-lg h-full md:h-auto bg-white rounded-lg shadow-lg dark:bg-gray-800">
                        <div class="flex justify-between items-center pb-4 mb-4 border-b dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tambah Anggota</h3>
                            <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                                data-modal-toggle="defaultModal">
                                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        Lengkap</label>
                                    <input type="text" name="name" id="name"
                                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Nama Lengkap" required="">
                                </div>
                                <div>
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukan email" required="">
                                </div>
                                <div>
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password"
                                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Masukan Password" required="">
                                </div>
                            </div>
                            <button type="submit" onclick="contoh()"
                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-transform duration-300 transform hover:scale-105">
                                Tambah Anggota
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Tabel Users -->
                <div class="overflow-x-auto p-4">
                    <table class="w-full text-sm text-left text-gray-600 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">ID</th>
                                <th scope="col" class="px-4 py-3">Nama</th>
                                <th scope="col" class="px-4 py-3">Email</th>
                                <th scope="col" class="px-4 py-3">Role</th>
                                <th scope="col" class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ $user->name }}
                                    </td>
                                    <td class="px-4 py-3">{{ $user->email }}</td>
                                    <td class="px-4 py-3">{{ $user->role }}</td>
                                    <td class="px-4 py-3">

                                        <button type="button" data-modal-target="editModal-{{ $user->id }}"
                                            data-modal-toggle="editModal-{{ $user->id }}"
                                            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Edit</button>




                                        <button type="button" data-modal-target="deleteModal-{{ $user->id }}"
                                            data-modal-toggle="deleteModal-{{ $user->id }}"
                                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete
                                        </button>



                                    </td>
                                </tr>

                                <div id="editModal-{{ $user->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden fixed inset-0 z-50 justify-center items-center bg-black bg-opacity-60 overflow-y-auto overflow-x-hidden">
                                    <div
                                        class="relative p-6 w-full max-w-lg h-full md:h-auto bg-white rounded-lg shadow-lg dark:bg-gray-800">
                                        <div
                                            class="flex justify-between items-center pb-4 mb-4 border-b dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Anggota
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                                                data-modal-toggle="editModal-{{ $user->id }}">
                                                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <form action="{{ route('users.update', $user->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                                <div>
                                                    <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                        Lengkap</label>
                                                    <input type="text" name="name" id="name"
                                                        value="{{ $user->name }}"
                                                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required>
                                                </div>
                                                <div>
                                                    <label for="email"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                    <input type="email" name="email" id="email"
                                                        value="{{ $user->email }}"
                                                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        required>
                                                </div>

                                                <div>
                                                    <label for="password"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                                                        Baru</label>
                                                    <input type="password" name="password" id="password"
                                                        class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                        placeholder="Masukan Password Baru">
                                                </div>

                                            </div>
                                            <button type="submit" onclick="contoh()"
                                                class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-transform duration-300 transform hover:scale-105">
                                                Simpan Perubahan
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Modal Konfirmasi Delete -->
                                <div id="deleteModal-{{ $user->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden fixed inset-0 z-50 justify-center items-center bg-black bg-opacity-60 overflow-y-auto overflow-x-hidden">
                                    <div
                                        class="relative p-6 w-full max-w-lg h-full md:h-auto bg-white rounded-lg shadow-lg dark:bg-gray-800">
                                        <div
                                            class="flex justify-between items-center pb-4 mb-4 border-b dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Hapus
                                                Anggota</h3>
                                            <button type="button"
                                                class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                                                data-modal-toggle="deleteModal-{{ $user->id }}">
                                                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <p class="mb-4 text-sm text-gray-600 dark:text-gray-400">Apakah Anda yakin
                                            ingin menghapus anggota ini?</p>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="contoh()"
                                                class="w-full bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-transform duration-300 transform hover:scale-105">
                                                Hapus Anggota
                                            </button>
                                        </form>
                                        <script type="text/javascript">
                                            function contoh() {

                                                swal({

                                                    title: "Berhasil!",

                                                    text: "Pop-up berhasil",

                                                    icon: "success",


                                                    button: true,

                                                    timer: 2000

                                                });

                                            }
                                        </script>

                                    </div>
                                </div>
                            @endforeach




                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->

            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</x-app-layout>
