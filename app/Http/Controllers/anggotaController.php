<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\pinjamBukus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class anggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = books::latest()->paginate();
        return view('anggota.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = books::latest()->paginate();
        $pinjamBukus = pinjamBukus::latest()->paginate();
        return view('anggota.create', compact('books', 'pinjamBukus'));

        
    }


   

    public function kembalikanBuku(pinjamBukus $pinjam)
    {
        DB::beginTransaction();
    
        try {
            // Update status peminjaman
            $pinjam->status = 'available';
            $pinjam->tanggal_kembali = now();
            $pinjam->save();
    
            // Tambah stok buku
            $book = Books::findOrFail($pinjam->book_id);
            $book->jumlah_stock += 1;
            $book->status = true; // Set status to true (Tersedia)
            $book->loan_status = 'available';
            $book->save();
    
            $pinjam->delete();

            DB::commit();
    
            return redirect()->back()->with('success', 'Buku berhasil dikembalikan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengembalikan buku');
        }
    }

//     public function pinjaman()
// {
    
//     return view('anggota.pinjaman');
// }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal::tanggal_pinjam',
            
        ]);

        $book = books::find($request->input('book_id'));
        //kita akan mencari buku dengan id yang di pilih oleh user dan di masukan ke dalam $book

            if ($book->jumlah_stock <= 0 || $book->status === false) { 
                return back()->with('error', 'Buku tidak tersedia untuk dipinjam.');
                    

            }

            //jika buku tersedia maka akan menjalankan perintah berikut

            $book->decrement('jumlah_stock');
            //mengurangi jumlah stock buku

            

            pinjamBukus::create([
                'user_id' => Auth::id(),
                'book_id' => $request->input('book_id'),
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali,
                'status' => 'borrowed',
            ]);

        

       // Update status buku hanya jika stok habis
       if ($book->jumlah_stock <= 0) {
        $book->update([
            'status' => false,
            'loan_status' => 'borrowed',
        ]);
    } else {
        $book->update([
            'loan_status' => 'borrowed', // Buku tetap bisa dipinjam tapi statusnya tidak berubah jadi tidak tersedia
        ]);
    }



   
        return redirect()->back()->with('success', 'Buku berhasil dipinjam.');
        
    }



   


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
