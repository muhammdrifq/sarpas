<?php

namespace App\Http\Controllers;

use App\Models\Sofa;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class SofaController extends Controller
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
        $sofa = Inventaris::where('namaBarang','LIKE BINARY', '%sofa%')->get();
        return view('sofa.index', compact('sofa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sofa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:sofa',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $sofa = new Sofa();
        $sofa->kode = $request->kode;
        $sofa->namaBarang = $request->namaBarang;
        $sofa->merk = $request->merk;
        $sofa->jumlah = $request->jumlah;
        $sofa->hargaSatuan = $request->hargaSatuan;
        $sofa->lokasi = $request->lokasi;
        $sofa->tahunPembuatan = $request->tahunPembuatan;
        $sofa->tahunBeli = $request->tahunBeli;
        $sofa->hargaKeseluruhan = $sofa->jumlah * $sofa->hargaSatuan;
        $sofa->kondisi = $request->kondisi;
        $sofa->save();
        return redirect()->route('sofa.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sofa  $sofa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sofa = Sofa::findOrFail($id);
        return view('sofa.show', compact('sofa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sofa  $sofa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sofa = sofa::findOrFail($id);
        return view('sofa.edit', compact('sofa'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sofa  $sofa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:sofa',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $sofa = Sofa::findOrFail($id);
        $sofa->kode = $request->kode;
        $sofa->namaBarang = $request->namaBarang;
        $sofa->merk = $request->merk;
        $sofa->jumlah = $request->jumlah;
        $sofa->hargaSatuan = $request->hargaSatuan;
        $sofa->lokasi = $request->lokasi;
        $sofa->tahunPembuatan = $request->tahunPembuatan;
        $sofa->tahunBeli = $request->tahunBeli;
        $sofa->hargaKeseluruhan = $sofa->jumlah * $sofa->hargaSatuan;
        $sofa->kondisi = $request->kondisi;
        $sofa->save();
        return redirect()->route('sofa.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sofa  $sofa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sofa = Sofa::findOrFail($id);
        $sofa->delete();
        return redirect()->route('sofa.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
