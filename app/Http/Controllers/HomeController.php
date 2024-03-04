<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategoribuku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        $kategori=Kategoribuku::all();

        if ($request->judul) {
            $book = Buku::where('judul', 'like', '%'.$request->judul. '%')->get();
        }
        else {
            $book=Buku::all();
            $book=Buku::with('categories')->get();
        }

        return view('home', [
            'title' => "Home",
            'book' => $book,
            'kategori' => $kategori
        ]);
    }
}
