<?php

namespace App\Http\Controllers;

use App\Models\AC;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class ACController extends Controller
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
    public function index()
    {
        //menampilkan semua data dari model ac
        $ac = Inventaris::where('namaBarang','LIKE BINARY','%AC%')->get();
        return view('ac.index', compact('ac'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ac.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'kode' => 'required|unique:ac',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ac = new AC();
        $ac->kode = $request->kode;
        $ac->namaBarang = $request->namaBarang;
        $ac->merk = $request->merk;
        $ac->jumlah = $request->jumlah;
        $ac->hargaSatuan = $request->hargaSatuan;
        $ac->lokasi = $request->lokasi;
        $ac->tahunPembuatan = $request->tahunPembuatan;
        $ac->tahunBeli = $request->tahunBeli;
        $ac->hargaKeseluruhan = $ac->jumlah * $ac->hargaSatuan;
        $ac->kondisi = $request->kondisi;
        $ac->save();
        return redirect()->route('ac.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AC  $ac
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ac = AC::findOrFail($id);
        return view('ac.show', compact('ac'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AC  $aC
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ac = AC::findOrFail($id);
        return view('ac.edit', compact('ac'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AC  $aC
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ac',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ac = AC::findOrFail($id);
        $ac->kode = $request->kode;
        $ac->namaBarang = $request->namaBarang;
        $ac->merk = $request->merk;
        $ac->jumlah = $request->jumlah;
        $ac->hargaSatuan = $request->hargaSatuan;
        $ac->lokasi = $request->lokasi;
        $ac->tahunPembuatan = $request->tahunPembuatan;
        $ac->tahunBeli = $request->tahunBeli;
        $ac->hargaKeseluruhan = $ac->jumlah * $ac->hargaSatuan;
        $ac->kondisi = $request->kondisi;
        $ac->save();
        return redirect()->route('ac.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AC  $aC
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ac = AC::findOrFail($id);
        $ac->delete();
        return redirect()->route('ac.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
