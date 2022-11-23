<?php

namespace App\Http\Controllers;

use App\Models\Telephone;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class TelephoneController extends Controller
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
        $telephone = Inventaris::where('namaBarang','LIKE BINARY', '%telephone%')->get();
        return view('telephone.index', compact('telephone'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('telephone.create');
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
            'kode' => 'required|unique:telephone',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $telephone = new Telephone();
        $telephone->kode = $request->kode;
        $telephone->namaBarang = $request->namaBarang;
        $telephone->merk = $request->merk;
        $telephone->jumlah = $request->jumlah;
        $telephone->hargaSatuan = $request->hargaSatuan;
        $telephone->lokasi = $request->lokasi;
        $telephone->tahunPembuatan = $request->tahunPembuatan;
        $telephone->tahunBeli = $request->tahunBeli;
        $telephone->hargaKeseluruhan = $telephone->jumlah * $telephone->hargaSatuan;
        $telephone->kondisi = $request->kondisi;
        $telephone->save();
        return redirect()->route('telephone.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Telephone  $telephone
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $telephone = Telephone::findOrFail($id);
        return view('telephone.show', compact('telephone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Telephone  $telephone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $telephone = Telephone::findOrFail($id);
        return view('telephone.edit', compact('telephone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Telephone  $telephone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:telephone',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $telephone = Telephone::findOrFail($id);
        $telephone->kode = $request->kode;
        $telephone->namaBarang = $request->namaBarang;
        $telephone->merk = $request->merk;
        $telephone->jumlah = $request->jumlah;
        $telephone->hargaSatuan = $request->hargaSatuan;
        $telephone->lokasi = $request->lokasi;
        $telephone->tahunPembuatan = $request->tahunPembuatan;
        $telephone->tahunBeli = $request->tahunBeli;
        $telephone->hargaKeseluruhan = $telephone->jumlah * $telephone->hargaSatuan;
        $telephone->kondisi = $request->kondisi;
        $telephone->save();
        return redirect()->route('telephone.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Telephone  $telephone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $telephone = Telephone::findOrFail($id);
        $telephone->delete();
        return redirect()->route('telephone.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
