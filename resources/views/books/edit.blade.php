@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<section class="bg-gray-100 py-8"> <!-- Mengurangi padding dari py-10 ke py-6 -->
    <div class="absolute inset-0 bg-pattern bg-opacity-10"></div>

    <div class="container mx-auto px-2 lg:px-4 relative z-10"> <!-- Mengurangi padding dari px-4 ke px-2 -->
        <h2 class="text-2xl font-bold text-black text-center mb-4">Edit Buku</h2>
        <!-- Mengurangi ukuran heading dari text-3xl ke text-2xl dan margin-bottom dari mb-6 ke mb-4 -->
        <form action="{{ route('books.update', $books->id) }}" method="POST"
            class="bg-white rounded-lg shadow-lg p-4 space-y-3 max-w-xl mx-auto backdrop-blur-sm">
            <!-- Mengurangi padding dari p-6 ke p-4 dan memperkecil max-width dari max-w-2xl ke max-w-xl -->
            @csrf
            @method('PUT')

            <!-- Input Judul Buku -->
            <div>
                <label for="judul" class="block mb-1 text-sm font-medium text-gray-700 dark:text-white">Judul
                    Buku</label>
                <!-- Mengurangi ukuran teks dari text-base ke text-sm -->
                <input value="{{ $books->judul }}" type="text" name="judul" id="judul"
                    class="bg-gray-50 border border-gray-200 text-gray-900 text-xs rounded-md focus:ring-2 focus:ring-teal-400 focus:border-teal-400 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 transition-all ease-in-out shadow-inner"
                    placeholder="Masukkan Judul Buku" required>
                <!-- Mengurangi padding dari p-3 ke p-2 dan memperkecil font ke text-xs serta border-radius ke rounded-md -->
            </div>

            <!-- Input Penulis -->
            <div>
                <label for="penulis"
                    class="block mb-1 text-sm font-medium text-gray-700 dark:text-white">Penulis</label>
                <input value="{{ $books->penulis }}" type="text" name="penulis" id="penulis"
                    class="bg-gray-50 border border-gray-200 text-gray-900 text-xs rounded-md focus:ring-2 focus:ring-teal-400 focus:border-teal-400 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 transition-all ease-in-out shadow-inner"
                    placeholder="Masukkan Nama Penulis" required>
            </div>

            <!-- Input Kategori -->
            <div>
                <label for="kategori"
                    class="block mb-1 text-sm font-medium text-gray-700 dark:text-white">Kategori</label>
                <select id="kategori" name="kategori"
                    class="bg-gray-50 border border-gray-200 text-gray-900 text-xs rounded-md focus:ring-2 focus:ring-teal-400 focus:border-teal-400 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 transition-all ease-in-out shadow-inner">
                    <option value="Novel" {{ $books->kategori == 'Novel' ? 'selected' : '' }}>Novel</option>
                    <option value="Fiksi" {{ $books->kategori == 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
                    <option value="Pendidikan" {{ $books->kategori == 'Pendidikan' ? 'selected' : '' }}>Pendidikan
                    </option>
                    <option value="Sejarah" {{ $books->kategori == 'Sejarah' ? 'selected' : '' }}>Sejarah</option>
                    <option value="Biografi" {{ $books->kategori == 'Biografi' ? 'selected' : '' }}>Biografi</option>
                </select>
            </div>

            <!-- Input Status -->
            <div>
                <label for="status"
                    class="block mb-1 text-sm font-medium text-gray-700 dark:text-white">Status</label>
                <select id="status" name="status"
                    class="bg-gray-50 border border-gray-200 text-gray-900 text-xs rounded-md focus:ring-2 focus:ring-teal-400 focus:border-teal-400 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 transition-all ease-in-out shadow-inner">
                    <option value="1" {{ $books->status == '1' ? 'selected' : '' }}>Tersedia</option>
                    <option value="0" {{ $books->status == '0' ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
            </div>

            <!-- Input Tahun Terbit -->
            <div>
                <label for="tahun_terbit" class="block mb-1 text-sm font-medium text-gray-700 dark:text-white">Tahun
                    Terbit</label>
                <input value="{{ $books->tahun_terbit }}" type="date" name="tahun_terbit" id="tahun_terbit"
                    class="bg-gray-50 border border-gray-200 text-gray-900 text-xs rounded-md focus:ring-2 focus:ring-teal-400 focus:border-teal-400 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 transition-all ease-in-out shadow-inner"
                    required>
            </div>

            <!-- Input Jumlah Stok -->
            <div>
                <label for="jumlah_stok" class="block mb-1 text-sm font-medium text-gray-700 dark:text-white">Jumlah
                    Stok</label>
                <input value="{{ $books->jumlah_stock }}" type="number" name="jumlah_stock" id="jumlah_stok"
                    class="bg-gray-50 border border-gray-200 text-gray-900 text-xs rounded-md focus:ring-2 focus:ring-teal-400 focus:border-teal-400 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 transition-all ease-in-out shadow-inner"
                    placeholder="Masukkan Jumlah Stok" required>
            </div>

            <!-- Input Deskripsi -->
            <div>
                <label for="deskripsi"
                    class="block mb-1 text-sm font-medium text-gray-700 dark:text-white">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="3"
                    class="bg-gray-50 border border-gray-200 text-gray-900 text-xs rounded-md focus:ring-2 focus:ring-teal-400 focus:border-teal-400 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-teal-500 dark:focus:border-teal-500 transition-all ease-in-out shadow-inner"
                    placeholder="Deskripsi buku" required>{{ $books->deskripsi }}</textarea>
            </div>

            <button type="submit" onclick="contoh()"
                class="inline-flex items-center px-4 py-2 mt-3 text-sm font-semibold text-center text-white bg-teal-600 rounded-md focus:ring-4 focus:ring-teal-200 dark:focus:ring-teal-800 hover:bg-teal-700 transition-all ease-in-out">
                Simpan
            </button>
            <a href="{{ route('books.index') }}"
                class="inline-flex items-center px-4 py-2 mt-3 text-sm font-semibold text-center text-white bg-red-600 rounded-md focus:ring-4 focus:ring-teal-200 dark:focus:ring-teal-800 hover:bg-red-700 transition-all ease-in-out">
                Kembali
            </a>
        </form>
        <script type="text/javascript">
            function contoh() {

                swal({

                    title: "Berhasil!",

                    text: "Pop-up berhasil di edit",

                    icon: "success",

                    button: true,

                    timer: 2000

                });

            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
    </div>
</section>
