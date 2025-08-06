<?php

namespace App\Http\Controllers;

use App\Models\books;
use App\Models\pinjamBukus;
use Illuminate\Http\Request;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = books::latest()->paginate();
        return view('books.index', compact('books'));
    }

    public function dashboard()
{
    // Jumlah total buku di lemari
    $totalBuku = Books::count();

    //jumlah buku yang dipinjam
    $totalpinjam = pinjamBukus::count();

    // Jumlah buku yg tersedia
   $totalstat = books::where('status', true)->count();

   //buku yang sudah di kembalikan
   $totalava = books::where('status', false)->count();


    // Mengirimkan data ke view
    return view('dashboard', compact('totalBuku', 'totalpinjam', 'totalstat', 'totalava'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kategori' => 'required|string',
            'tahun_terbit' => 'required|date',
            'jumlah_stock' => 'required|integer',
            'status' => 'required|string',
            'deskripsi' => 'required|string',
        ]);


        books::create($validatedData);

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function loanHistory()
    {
        $books = books::all();
        $pinjamBukus = pinjamBukus::all();
        // return view('books.create', compact('books', 'pinjamBukus'));
        return view('books.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = books::findOrFail($id);
        return view('books.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kategori' => 'required|string',
            'tahun_terbit' => 'required|date',
            'jumlah_stock' => 'required|integer',
            'status' => 'required|boolean',
            'deskripsi' => 'required|string',
        ]);
        

        $books = books::findOrFail($id);


        $books->update($validatedData);



        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = books::findOrFail($id);
        $books->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
