<x-app-layout>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <section class="bg-orange-50 dark:bg-gray-900">
        <div class="py-12 px-6 mx-auto max-w-3xl lg:py-16">
            <h2 class="mb-8 text-3xl font-bold text-center text-orange-500 dark:text-white">Tambah Buku</h2>
            <form action="{{ route('books.store') }}" method="POST"
                class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 space-y-6">
                @csrf
                <div class="grid gap-6 md:grid-cols-2">
                    <!-- Input Judul Buku -->
                    <div class="w-full">
                        <label for="judul"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Judul Buku</label>
                        <input type="text" name="judul" id="judul"
                            class="w-full p-4 bg-gray-100 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-400 dark:focus:border-indigo-400"
                            placeholder="Masukkan judul buku" required>
                    </div>

                    <!-- Input Penulis -->
                    <div class="w-full">
                        <label for="penulis"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Penulis</label>
                        <input type="text" name="penulis" id="penulis"
                            class="w-full p-4 bg-gray-100 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-400 dark:focus:border-indigo-400"
                            placeholder="Masukkan penulis" required>
                    </div>

                    <!-- Input Tahun Terbit -->
                    <div class="w-full">
                        <label for="tahun_terbit"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Tahun Terbit</label>
                        <input type="date" name="tahun_terbit" id="tahun_terbit"
                            class="w-full p-4 bg-gray-100 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-400 dark:focus:border-indigo-400"
                            required>
                    </div>

                    <!-- Input Jumlah Stok -->
                    <div class="w-full">
                        <label for="jumlah_stock"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Jumlah Stok</label>
                        <input type="number" name="jumlah_stock" id="jumlah_stock"
                            class="w-full p-4 bg-gray-100 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-400 dark:focus:border-indigo-400"
                            placeholder="Masukkan jumlah stok" required>
                    </div>

                    <!-- Select Kategori -->
                    <div>
                        <label for="kategori"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Kategori</label>
                        <select name="kategori" id="kategori"
                            class="w-full p-4 bg-gray-100 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-400 dark:focus:border-indigo-400">
                            <option value="" selected disabled>Pilih kategori</option>
                            <option value="novel">Novel</option>
                            <option value="fiksi">Fiksi</option>
                            <option value="sejarah">Sejarah</option>
                            <option value="biografi">Biografi</option>
                        </select>
                    </div>

                    <!-- Select Status -->
                    <div>
                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Status</label>
                        <select name="status" id="status"
                            class="w-full p-4 bg-gray-100 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-400 dark:focus:border-indigo-400">
                            <option value="" selected disabled>Pilih status</option>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>

                    <!-- Input Deskripsi -->
                    <div class="sm:col-span-2">
                        <label for="deskripsi"
                            class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-200">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" rows="6"
                            class="w-full p-4 bg-gray-100 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-indigo-400 dark:focus:border-indigo-400"
                            placeholder="Masukkan deskripsi buku"></textarea>
                    </div>
                </div>

                <button type="submit" onclick="contoh()"
                    class="mt-8 w-full py-3 text-center text-sm font-medium text-white bg-orange-500 rounded-lg hover:bg-orange-800 focus:ring-4 focus:ring-indigo-300 dark:focus:ring-indigo-900 transition duration-300">
                    Tambah Buku
                </button>


                <script type="text/javascript">
                    function contoh() {

                        swal({

                            title: "Berhasil!",

                            text: "Pop-up berhasil ditampilkan",

                            icon: "success",

                            button: true,

                            timer: 2000

                        });

                    }
                </script>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
                </script>


            </form>
        </div>
    </section>
</x-app-layout>
