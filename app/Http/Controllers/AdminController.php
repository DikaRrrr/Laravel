<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use App\Exports\BukuExport;
use App\Exports\UsersExport;

use App\Models\Kategoribuku;
use Illuminate\Http\Request;
use App\Exports\PeminjamanExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {

        $bookCount = Buku::count();
        $catagoryCount = Kategoribuku::count();
        $userCount = User::count();
        $peminjaman = Peminjaman::all();

        return view('admin.dashboard', [
            'book_count' => $bookCount,
            'catagory_count' => $catagoryCount,
            'user_count' => $userCount,
            'peminjaman' => $peminjaman,
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
        $book=Buku::all();
        return view('admin.buku',[
            'catagory' => $catagory,
            'book' => $book,
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
        $book->categories()->sync($request->categories);
        return redirect('add_book')->with('addSuccess', 'Buku Berhasil Ditambahkan');
    }

    public function delete_book($id)
    {
        $book=Buku::find($id);
        $book->delete();
        return redirect('add_book')->with('deleteSuccess', 'Buku Berhasil Dihapus');
    }

    public function update_book($id)
    {

        $book=Buku::find($id);
        $catagory=Kategoribuku::all();

        return view('admin.update_book', [
            'book' => $book,
            'catagory' => $catagory,
            'title' => "Update Buku"
        ]);
    }

    public function update_book_confirm(Request $request, $id)
    {

        $book=Buku::find($id);
        $book->update($request->all());

        if($request->categories) {
            $book->categories()->sync($request->categories);
        }

        return redirect('add_book')->with('addSuccess', 'Buku Berhasil Diupdate');
    }

    public function data_peminjaman()
    {
        $peminjaman =  Peminjaman::all();

        return view('admin.data_peminjaman', [
            'title' => "Data Peminjaman",
            'peminjaman' => $peminjaman
        ]);
    }

    public function kembalikan_buku($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Update status peminjaman
        $peminjaman->statuspeminjaman = 'Dikembalikan';
        $peminjaman->save();

        return redirect()->back()->with('success', 'Buku berhasil Dikembalikan.');
    }

    public function data_users ()
    {
        $user = User::all();

        return view('admin.data_users', [
            'title' => "Users",
            'user' => $user
        ]);
    }

    public function update_catagory($id)
    {

        $catagory=Kategoribuku::find($id);

        return view('admin.update_catagory', [
            'catagory' => $catagory,
            'title' => "Update Kategori"
        ]);
    }

    public function update_catagory_confirm(Request $request, $id)
{
    $catagory=Kategoribuku::find($id);
    $catagory->update($request->all());

    return redirect('catagory')->with('addSuccess', 'Kategori Berhasil Diupdate');
}

public function delete_user($id)
{
    $user=User::find($id);
    $user->delete();
    return redirect()->back()->with('addSuccess', 'Pengguna berhasil Dihapus.');
}

public function update_password($id)
{
    $user=User::find($id);

        return view('admin.update_password', [
            'user' => $user,
            'title' => "Update Password"
        ]);
}

public function update_password_confirm(Request $request, $id)
{
    $request->validate([
        'new_password' => 'required|min:8',
    ]);

    $user = User::findOrFail($id);

    // Update the password
    $user->password = Hash::make($request->new_password);
    $user->save();

    return redirect()->back()->with('addSuccess', 'Password updated successfully.');
}

public function add_user(Request $request)
{
    $user=User::all();

    return view('admin.add_user', [
        'title' => "Tambah User",
        'user' => $user
    ]);
}

public function add_user_confirm(Request $request)
{
   $validatedData = $request->validate([
    'username' => ['required', 'min:3'],
    'password' => ['required', 'min:8'],
    'email' => ['required', 'email:dns', 'unique:users'],
    'namalengkap' =>['required'],
    'alamat' =>['required'],
    'posisi' => 'required|in:user,admin,petugas',   ]);

   User::create($validatedData);
   return redirect('data_users')->with('addSuccess', 'User Berhasil Ditambahkan');

}

public function user_export()
{
    return Excel::download(new UsersExport, 'Laporan Users.xlsx');
}

public function buku_export()
{
    return Excel::download(new BukuExport, 'Laporan Buku.xlsx');
}

public function peminjaman_export()
{
    return Excel::download(new PeminjamanExport, 'Laporan Peminjaman.xlsx');
}

}
