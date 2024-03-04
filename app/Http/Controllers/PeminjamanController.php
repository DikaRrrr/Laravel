<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Buku;
use App\Models\Kategoribuku;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index($id)
    {
        $book=Buku::findOrfail($id);
        $ulasan=Ulasan::where('buku_id',$id)->get();
        return view('peminjaman', [
            'book' => $book,
            'ulasan' => $ulasan,
            'title' => "Peminjaman Buku"
        ]);
    }

    public function pinjam_buku(Request $request, $id)
    {
        $book = Buku::findOrFail($id);

        $peminjaman = new Peminjaman();
        $peminjaman->user_id = auth()->user()->id;
        $peminjaman->buku_id = $book->id;
        $peminjaman->tanggalpeminjaman = now();
        $peminjaman->tanggalpengembalian = now()->addDays(7); // Contoh: batas pengembalian 7 hari
        $peminjaman->statuspeminjaman = 'Dipinjam';
        $peminjaman->save();

        return redirect()->back()->with('success', 'Buku Berhasil Dipinjam, Dimohon Untuk Menunggu Buku Anda Sedang Diproses');


    }

    public function koleksi()
    {

        $peminjaman = Peminjaman::where('user_id', auth()->user()->id)
        ->where('statuspeminjaman', 'Dipinjam')
        ->with('buku')
        ->get();


        return view('koleksi', [
            'title' => "koleksi",
            'peminjaman' => $peminjaman
        ]);
    }

    public function add_comment(Request $request, $id)
    {

        $book = Buku::findOrFail($id);

        $validatedData = $request->validate([
            'rating' =>'required|numeric|between:1,10',
            'ulasan' =>'required|string'
        ]);

        $ulasan= new Ulasan();
        $ulasan->user_id = auth()->user()->id;
        $ulasan->buku_id = $book->id;
        $ulasan->rating = $validatedData['rating'];
        $ulasan->ulasan = $validatedData['ulasan'];

        $ulasan->save();

        return redirect()->back();
    }

    public function delete_comment($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        
        if (Auth::id() == $ulasan->user_id) {
            $ulasan->delete();
            return redirect()->back();
        }
        else {
            return redirect()->back();
        }
    }

}
