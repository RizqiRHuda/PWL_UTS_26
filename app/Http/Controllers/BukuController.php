<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\Auth;
class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if($request->has('judul')) {
            $judul = request('judul');
            $bukus = Buku::where('judul', 'LIKE', '%'.$judul.'%')->paginate(5);
            return view('bukus.index', compact('bukus'));
        } else {
            // Mengambil semua isi tabel
            $bukus = Buku::orderBy('kode_buku', 'asc')->paginate(5);
            return view('bukus.index', compact('bukus'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bukus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'jenis_buku' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);
        //fungsi eloquent untuk menambah data
        Buku::create($request->all());
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('bukus.index')->with('success', 'Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kode_buku)
    {
        //
        $Buku = Buku::find($kode_buku);
        return view('bukus.detail', compact('Buku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kode_buku)
    {
        //
        $Buku = Buku::find($kode_buku);
        return view('bukus.edit', compact('Buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_buku)
    {
        //
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'jenis_buku' => 'required',
            'harga' => 'required',
            'qty' => 'required',
        ]);
            //fungsi eloquent untuk mengupdate data inputan kita
            Buku::find($kode_buku)->update($request->all());
            //jika data berhasil diupdate, akan kembali ke halaman utama
            return redirect()->route('bukus.index')->with('success', 'Buku Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_buku)
    {
        //
        Buku::find($kode_buku)->delete();
        return redirect()->route('bukus.index') -> with('success', 'Buku Berhasil Dihapus');
    }
}
