<?php

namespace App\Http\Controllers;

use App\Models\Dispenser;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class DispenserController extends Controller
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
        $dispenser = Inventaris::where('namaBarang','LIKE BINARY','%dispenser%')->get();
        return view('dispenser.index', compact('dispenser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dispenser.create');
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
            'kode' => 'required|unique:dispenser',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $dispenser = new Dispenser();
        $dispenser->kode = $request->kode;
        $dispenser->namaBarang = $request->namaBarang;
        $dispenser->merk = $request->merk;
        $dispenser->jumlah = $request->jumlah;
        $dispenser->hargaSatuan = $request->hargaSatuan;
        $dispenser->lokasi = $request->lokasi;
        $dispenser->tahunPembuatan = $request->tahunPembuatan;
        $dispenser->tahunBeli = $request->tahunBeli;
        $dispenser->hargaKeseluruhan = $dispenser->jumlah * $dispenser->hargaSatuan;
        $dispenser->kondisi = $request->kondisi;
        $dispenser->save();
        return redirect()->route('dispenser.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dispenser  $dispenser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dispenser = Dispenser::findOrFail($id);
        return view('dispenser.show', compact('dispenser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dispenser  $dispenser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dispenser = Dispenser::findOrFail($id);
        return view('dispenser.edit', compact('dispenser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dispenser  $dispenser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:dispenser',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $dispenser = Dispenser::findOrFail($id);
        $dispenser->kode = $request->kode;
        $dispenser->namaBarang = $request->namaBarang;
        $dispenser->merk = $request->merk;
        $dispenser->jumlah = $request->jumlah;
        $dispenser->hargaSatuan = $request->hargaSatuan;
        $dispenser->lokasi = $request->lokasi;
        $dispenser->tahunPembuatan = $request->tahunPembuatan;
        $dispenser->tahunBeli = $request->tahunBeli;
        $dispenser->hargaKeseluruhan = $dispenser->jumlah * $dispenser->hargaSatuan;
        $dispenser->kondisi = $request->kondisi;
        $dispenser->save();
        return redirect()->route('dispenser.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dispenser  $dispenser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dispenser = Dispenser::findOrFail($id);
        $dispenser->delete();
        return redirect()->route('dispenser.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
