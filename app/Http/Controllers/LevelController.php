<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LevelController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Level Pengguna',
            'list' => ['Home', 'Level']
        ];

        $page = (object) [
            'title' => 'Daftar level pengguna yang terdaftar dalam sistem'
        ];

        $activeMenu = 'level'; // set menu yang sedang aktif

        return view('level.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

public function list(Request $request)
{
    // Mengambil data level termasuk kolom level_kode dan level_nama
    $levels = LevelModel::select('level_id', 'level_kode', 'level_nama');

    return DataTables::of($levels)
        ->addIndexColumn() // Menambahkan kolom index
        ->addColumn('aksi', function ($level) { // Menambahkan kolom aksi
            $btn = '<a href="' . url('/level/' . $level->level_id) . '" class="btn btn-info btn-sm">Detail</a> ';
            $btn .= '<a href="' . url('/level/' . $level->level_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="' . url('/level/' . $level->level_id) . '">'
                . csrf_field() . method_field('DELETE') .
                '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
            return $btn;
        })
        ->rawColumns(['aksi']) // Kolom aksi adalah HTML
        ->make(true);
}


    // Menampilkan halaman form tambah level
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah level baru'
        ];

        $activeMenu = 'level'; // set menu yang sedang aktif

        return view('level.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'level_kode' => 'required|string|min:3|unique:m_level,level_kode',
            'level_nama' => 'required|string|max:100', 
        ]);

        // Menyimpan data ke dalam database
        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        // Redirect ke halaman level dengan pesan sukses
        return redirect('/level')->with('success', 'Data level berhasil disimpan');
    }

    public function show(string $id)
    {
        // Mendapatkan data level berdasarkan ID
        $level = LevelModel::find($id);

        // Membuat breadcrumb
        $breadcrumb = (object) [
            'title' => 'Detail Level',
            'list' => ['Home', 'Level', 'Detail']
        ];

        // Membuat objek halaman
        $page = (object) [
            'title' => 'Detail Level'
        ];

        // Set menu yang sedang aktif
        $activeMenu = 'level';

        // Menampilkan view dengan data yang diperlukan
        return view('level.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $level = LevelModel::find($id);

        // Membuat breadcrumb
        $breadcrumb = (object) [
            'title' => 'Edit Level',
            'list' => ['Home', 'Level', 'Edit']
        ];

        // Membuat objek halaman
        $page = (object) [
            'title' => 'Edit Level'
        ];

        // Set menu yang sedang aktif
        $activeMenu = 'level';

        // Menampilkan view untuk edit
        return view('level.edit', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'level' => $level,
            'activeMenu' => $activeMenu
        ]);
    }

    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'level_kode' => 'required|string|min:3|unique:m_level,level_nama,'. $id . ',level_id',
            'level_nama' => 'required|string|max:100',  // validasi unik kecuali level saat ini
        ]);

        // Mengupdate data level
        LevelModel::find($id)->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        // Redirect ke halaman level dengan pesan sukses
        return redirect('/level')->with('success', 'Data level berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = LevelModel::find($id); // Mencari level berdasarkan ID

        // Mengecek apakah data level ditemukan atau tidak
        if (!$check) {
            return redirect('/level')->with('error', 'Data level tidak ditemukan');
        }

        try {
            // Hapus data level berdasarkan ID
            LevelModel::destroy($id);

            // Redirect dengan pesan sukses jika berhasil dihapus
            return redirect('/level')->with('success', 'Data level berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            // Jika terjadi error saat penghapusan, tampilkan pesan error
            return redirect('/level')->with('error', 'Data level gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}