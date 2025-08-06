<x-app-layout>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 lg:pl-64">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-orange-500 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">No</th>
                                <td class="px-4 py-3">Nama</td>

                                <th scope="col" class="px-4 py-3">Judul</th>
                                <th scope="col" class="px-4 py-3">Tanggal Pinjam</th>
                                <th scope="col" class="px-4 py-3">Tanggal Kembali</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pinjamBukus as $item)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ $loop->iteration }}</td>

                                    <td class="px-4 py-3">{{ $item->user->name }}</td>


                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->book->judul }}
                                    </th>

                                    <td class="px-4 py-3">{{ $item->tanggal_pinjam }}</td>
                                    <td class="px-4 py-3">{{ $item->tanggal_kembali }}</td>
                                    <td class="px-4 py-3">{{ $item->status }}</td>
                                    <td class="px-4 py-3 flex items-center justify-end">
                                        <!-- Tombol Edit -->

                                        @if ($item->status === 'borrowed')
                                            <!-- Tombol Perpanjang Tanggal -->
                                            <form action="{{ route('managepinjaman.perpanjang', $item->id) }}"
                                                method="POST" class="inline-block ms-2">
                                                @csrf
                                                @method('POST')
                                                <input type="date" name="tanggal_kembali"
                                                    class="text-sm px-2 py-1 rounded" required>
                                                <button type="submit" name="perpanjang"
                                                    class="text-white bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded">
                                                    Perpanjang
                                                </button>
                                            </form>

                                            <!-- Tombol Kembalikan Paksa -->

                                            <!-- Cek status peminjaman -->
                                            <form action="{{ route('managepinjaman.kembalikanpaksa', $item->id) }}"
                                                method="POST" class="inline-block ms-2">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" onclick="contoh()"
                                                    class="text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded">
                                                    Kembalikan Paksa
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-3 text-center">Tidak ada data peminjaman</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</x-app-layout>
