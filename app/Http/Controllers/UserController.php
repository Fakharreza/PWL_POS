<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user yang terdaftar dalam sistem'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        $level = LevelModel::all();

        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');

        if ($request->level_id) {
            $users->where('level_id', $request->level_id);
        }

        return DataTables::of($users)
            ->addIndexColumn() // Menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($user) { // Menambahkan kolom aksi
                $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/user/' . $user->user_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // Memberitahu bahwa kolom aksi adalah HTML
            ->make(true);
    }
    // Menampilkan halaman form tambah user
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User', 'Tambah']

        ];

        $page = (object) [
            'title' => 'Tambah user baru'
        ];

        $level = LevelModel::all(); // ambil data level untuk ditampilkan di form
        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'level' => $level, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username', // username harus diisi, minimal 3 karakter, unik di tabel m_user kolom username
            'nama' => 'required|string|max:100', // nama harus diisi, maksimal 100 karakter
            'password' => 'required|min:5', // password harus diisi dan minimal 5 karakter
            'level_id' => 'required|integer' // level_id harus diisi dan berupa angka
        ]);

        // Menyimpan data ke dalam database
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password), // password dienkripsi sebelum disimpan
            'level_id' => $request->level_id
        ]);

        // Redirect ke halaman user dengan pesan sukses
        return redirect('/user')->with('success', 'Data user berhasil disimpan');
    }

    public function show(string $id)
    {
        // Mendapatkan data user berdasarkan ID beserta relasi level
        $user = UserModel::with('level')->find($id);

        // Membuat breadcrumb
        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User', 'Detail']
        ];

        // Membuat objek halaman
        $page = (object) [
            'title' => 'Detail User'
        ];

        // Set menu yang sedang aktif
        $activeMenu = 'user';

        // Menampilkan view dengan data yang diperlukan
        return view('user.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $user = UserModel::find($id); // Memperbaiki nama variabel dari Şuser menjadi $user
        $level = LevelModel::all();

        // Membuat breadcrumb
        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User', 'Edit']
        ];

        // Membuat objek halaman
        $page = (object) [
            'title' => 'Edit User'
        ];

        // Set menu yang sedang aktif
        $activeMenu = 'user';

        // Menampilkan view untuk edit
        return view('user.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }


    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id', // validasi unik kecuali user saat ini
            'nama' => 'required|string|max:100', // nama harus diisi, berupa string, dan maksimal 100 karakter
            'password' => 'nullable|min:5', // password bersifat opsional, minimal 5 karakter jika diisi
            'level_id' => 'required|integer' // level_id harus diisi dan berupa angka
        ]);

        // Mengupdate data user
        UserModel::find($id)->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => $request->password ? bcrypt($request->password) : UserModel::find($id)->password, // Enkripsi password jika diisi
            'level_id' => $request->level_id
        ]);

        // Redirect ke halaman user dengan pesan sukses
        return redirect('/user')->with('success', 'Data user berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = UserModel::find($id); // Mencari user berdasarkan ID

        // Mengecek apakah data user ditemukan atau tidak
        if (!$check) {
            return redirect('/user')->with('error', 'Data user tidak ditemukan');
        }

        try {
            // Hapus data user berdasarkan ID
            UserModel::destroy($id);

            // Redirect dengan pesan sukses jika berhasil dihapus
            return redirect('/user')->with('success', 'Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika terjadi error saat penghapusan, tampilkan pesan error
            return redirect('/user')->with('error', 'Data user gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}