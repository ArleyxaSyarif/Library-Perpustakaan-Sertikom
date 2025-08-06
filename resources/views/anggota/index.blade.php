<x-app-layout>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <section class="p-3 sm:p-5 lg:pl-64">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Judul Halaman -->

            <h1 class="text-4xl font-extrabold mb-6 text-orange-500  bg-clip-text text-center">
                Lemari Buku
            </h1>

            <!-- Paragraf Deskripsi Kecil -->
            <p class=" text-gray-800 dark:text-gray-300 text-center mb-12 max-w-2xl mx-auto ">
                Temukan berbagai koleksi buku menarik di sini. Pinjam buku favoritmu dan nikmati pengalaman membaca yang
                menyenangkan.
                <span class="text-indigo-600 font-semibold">Jelajahi dunia melalui halaman-halaman buku.</span>
            </p>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($books as $book)
                    <div
                        class="relative bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-2xl shadow-lg transform hover:scale-105 transition-transform duration-300 ease-in-out overflow-hidden">



                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                                {{ $book->judul }}
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                Penulis: <span class="font-medium">{{ $book->penulis }}</span>
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                Stock: <span class="font-medium">{{ $book->jumlah_stock }}</span>
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                Kategori: <span class="font-medium">{{ $book->kategori }}</span>
                            </p>

                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                Status:
                                <span
                                    class="
                                    {{ $book->status == '1' ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}
                                    px-3 py-1 rounded-full text-sm font-medium">

                                    {{ $book->status == '1' ? 'Tersedia' : 'Tidak Tersedia' }}
                                </span>
                            </p>

                            @if ($book->status == '1' && $book->jumlah_stock > 0)
                                {{-- jika buku tersedia dan stock > 0 maka tombol pinjam muncul --}}
                                <!-- Button Pinjam Buku -->
                                <div class="absolute bottom-4 right-4">
                                    <div class="flex justify-center m-5">
                                        <button id="defaultModalButton" data-modal-target="modal-{{ $book->id }}"
                                            data-modal-toggle="modal-{{ $book->id }}"
                                            class="block text-white bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                            type="button">
                                            Pinjam Buku
                                        </button>
                                    </div>
                                </div>
                            @endif

                        </div>


                    </div>



                    <!-- Main modal -->
                    <div id="modal-{{ $book->id }}" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                <!-- Modal header -->
                                <div
                                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Peminjaman Buku
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="modal-{{ $book->id }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form action="{{ route('anggota.store') }}" method="POST"
                                    multype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                        <div>
                                            <label for="name"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                Anggota</label>
                                            <input type="text" name="name" id="name"
                                                value="{{ auth()->user()->name }}" readonly
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Type product name" required="">
                                        </div>
                                        <div>
                                            <label for="brand"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                                            <input type="text" name="judul" id="judul" readonly
                                                value="{{ $book->judul }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="Product brand" required="">
                                        </div>
                                        <div>
                                            <label for="price"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                                            <input type="text" name="penulis" id="penulis" readonly
                                                value="{{ $book->penulis }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="$2999" required="">
                                        </div>
                                        <div>
                                            <label for="price"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penulis</label>
                                            <input type="text" name="kategori" id="kategori" readonly
                                                value="{{ $book->kategori }}"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                placeholder="$2999" required="">
                                        </div>
                                        <div class="w-full">
                                            <label for="tahun_terbit"
                                                class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Tanggal
                                                Kembali</label>
                                            <input type="date" name="tanggal_kembali" id="tanggal_kembali"
                                                class="w-full p-3 bg-gray-100 border border-gray-300 text-gray-900 rounded-lg focus:ring-orange-500 focus:border-orange-500 transition duration-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-400 dark:focus:border-indigo-400"
                                                required="">
                                        </div>

                                        <div class="w-full">
                                            <label for="tahun_terbit"
                                                class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Tanggal
                                                Pinjam</label>
                                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam"
                                                class="w-full p-3 bg-gray-100 border border-gray-300 text-gray-900 rounded-lg focus:ring-orange-500 focus:border-orange-500 transition duration-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-400 dark:focus:border-indigo-400"
                                                required="">
                                        </div>
                                    </div>
                                    <button type="submit" onclick="contoh()"
                                        class="text-white inline-flex items-center bg-orange-500 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">


                                        </svg>
                                        Pinjam
                                    </button>

                                </form>
                                <script type="text/javascript">
                                    function contoh() {

                                        swal({

                                            title: "Berhasil!",

                                            text: "Pop-up berhasil ditampilkan",

                                            icon: "success",

                                            button: true,



                                        });

                                    }
                                </script>

                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                                    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
                                </script>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </section>

</x-app-layout>
