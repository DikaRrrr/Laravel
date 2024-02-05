<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategoribuku;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {

        $bookCount = Buku::count();
        $catagoryCount = Kategoribuku::count();
        $userCount = User::count();

        return view('admin.dashboard', [
            'book_count' => $bookCount,
            'catagory_count' => $catagoryCount,
            'user_count' => $userCount,
            'title' => "Dashboard"
        ]);
    }

    public function catagory()
    {   
        $data=Kategoribuku::all();

        return view('admin.catagory',compact('data'), [
            'title' => "Kategori"
        ]);
    }

    public function add_catagory(Request $request)
    {
        $data=new Kategoribuku;
        $data->namakategori=$request->catagory;
        $data->save();
        return redirect('catagory')->with('addSuccess', 'Kategori Berhasil Ditambahkan');
    }

    public function delete_catagory($id)
    {
        $data=Kategoribuku::find($id);
        $data->delete();
        return redirect('catagory')->with('deleteSuccess', 'Kategori Berhasil Dihapus');
    }

    public function add_book()
    {

        $catagory=Kategoribuku::all();
        return view('admin.buku',compact('catagory'), [
            'title' => "Buku"
        ]);
    }

    public function store_book(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahunterbit' => 'required'
        ]);

        
        

        $book = Buku::create($request->all());
        return redirect('add_book')->with('addSuccess', 'Buku Berhasil Ditambahkan');
    }


}
