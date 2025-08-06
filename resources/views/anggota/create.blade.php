<x-app-layout>
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 lg:pl-64">
        <h1 class="text-4xl font-extrabold mb-6 text-orange-500  bg-clip-text text-center">
            Riwayat Peminjaman
        </h1>
        <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead
                            class="text-xs text-white uppercase bg-gradient-to-r from-orange-500 to-purple-500 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">NO</th>
                                <th scope="col" class="px-4 py-3">Pengingat</th>


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

                                    <td class="px-4 py-3 ">
                                        @php
                                            $today = \Carbon\Carbon::now();
                                            $tanggal_kembali = \Carbon\Carbon::parse($item->tanggal_kembali);
                                            $days_left = $today->diffInDays($tanggal_kembali, false);
                                        @endphp

                                        @if ($days_left > 0)
                                            {{ floor($days_left) }} hari
                                        @elseif ($days_left === 0)
                                            Hari ini
                                        @else
                                            {{ floor(abs($days_left)) }} hari
                                        @endif
                                    </td>




                                    <th scope="row"
                                        class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->book->judul }}
                                    </th>
                                    <td class="px-4 py-3">{{ $item->tanggal_pinjam }}</td>
                                    <td class="px-4 py-3">{{ $item->tanggal_kembali }}</td>
                                    <td class="px-4 py-3">{{ $item->status }}</td>
                                    <td class="px-4 py-3">
                                        @if ($item->status === 'borrowed')
                                            <form action="{{ route('anggota.kembalikan', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium">Kembalikan</button>
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
</x-app-layout>
