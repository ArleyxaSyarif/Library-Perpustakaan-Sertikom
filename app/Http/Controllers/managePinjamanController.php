<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\pinjamBukus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class managePinjamanController extends Controller
{
    
    public function perpanjangTanggal(Request $request, pinjamBukus $pinjam)
    {
        $request->validate([
            'tanggal_kembali' => 'required|date|after:'.$pinjam->tanggal_kembali,
        ]);

        $pinjam->update([
            'tanggal_kembali' => $request->input('tanggal_kembali'),
        ]);

        return redirect()->back()->with('success', 'Tanggal pengembalian berhasil diperpanjang.');
    }
   
    public function kembalikanPaksa($id)
{
    $pinjam = pinjamBukus::findOrFail($id);

    // Lakukan logika pengembalian paksa
    DB::beginTransaction();

    try {
        // Update status peminjaman
        $pinjam->status = 'returned';
        $pinjam->tanggal_kembali = now();
        $pinjam->save();

        // Tambah stok buku
        $book = books::findOrFail($pinjam->book_id);
        $book->increment('jumlah_stock');
        $book->status = true; // Set status buku menjadi tersedia lagi
        $book->save();

        // Hapus data pinjaman
        // $pinjam->delete();

        DB::commit();

        return redirect()->back()->with('success', 'Buku berhasil dikembalikan secara paksa.');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Terjadi kesalahan saat mengembalikan buku.');
    }
}
public function loanHistory()
{
    $books = books::latest()->paginate();
    $pinjamBukus = pinjamBukus::latest()->paginate();
    return view('admin.loansHistory', compact('books', 'pinjamBukus'));

}

}
