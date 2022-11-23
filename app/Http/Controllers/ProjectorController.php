<?php

namespace App\Http\Controllers;

use App\Models\Projector;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class ProjectorController extends Controller
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
        $projector = Inventaris::where('namaBarang','LIKE BINARY', '%Projector%')->get();
        return view('projector.index', compact('projector'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projector.create');
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
            'kode' => 'required|unique:projector',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $projector = new Projector();
        $projector->kode = $request->kode;
        $projector->namaBarang = $request->namaBarang;
        $projector->merk = $request->merk;
        $projector->jumlah = $request->jumlah;
        $projector->hargaSatuan = $request->hargaSatuan;
        $projector->lokasi = $request->lokasi;
        $projector->tahunPembuatan = $request->tahunPembuatan;
        $projector->tahunBeli = $request->tahunBeli;
        $projector->hargaKeseluruhan = $projector->jumlah * $projector->hargaSatuan;
        $projector->kondisi = $request->kondisi;
        $projector->save();
        return redirect()->route('projector.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projector  $projector
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projector = Projector::findOrFail($id);
        return view('projector.show', compact('projector'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projector  $projector
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projector = Projector::findOrFail($id);
        return view('projector.edit', compact('projector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projector  $projector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:projector',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $projector = Projector::findOrFail($id);
        $projector->kode = $request->kode;
        $projector->namaBarang = $request->namaBarang;
        $projector->merk = $request->merk;
        $projector->jumlah = $request->jumlah;
        $projector->hargaSatuan = $request->hargaSatuan;
        $projector->lokasi = $request->lokasi;
        $projector->tahunPembuatan = $request->tahunPembuatan;
        $projector->tahunBeli = $request->tahunBeli;
        $projector->hargaKeseluruhan = $projector->jumlah * $projector->hargaSatuan;
        $projector->kondisi = $request->kondisi;
        $projector->save();
        return redirect()->route('projector.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projector  $projector
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projector = Projector::findOrFail($id);
        $projector->delete();
        return redirect()->route('projector.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
