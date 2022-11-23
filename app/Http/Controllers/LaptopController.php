<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class LaptopController extends Controller
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
        $laptop = Inventaris::where('namaBarang','LIKE BINARY','%laptop%')->get();
        return view('laptop.index', compact('laptop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laptop.create');
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
            'kode' => 'required|unique:laptop',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $laptop = new Laptop();
        $laptop->kode = $request->kode;
        $laptop->namaBarang = $request->namaBarang;
        $laptop->merk = $request->merk;
        $laptop->jumlah = $request->jumlah;
        $laptop->hargaSatuan = $request->hargaSatuan;
        $laptop->lokasi = $request->lokasi;
        $laptop->tahunPembuatan = $request->tahunPembuatan;
        $laptop->tahunBeli = $request->tahunBeli;
        $laptop->hargaKeseluruhan = $laptop->jumlah * $laptop->hargaSatuan;
        $laptop->kondisi = $request->kondisi;
        $laptop->save();
        return redirect()->route('laptop.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $laptop = Laptop::findOrFail($id);
        return view('laptop.show', compact('laptop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laptop = Laptop::findOrFail($id);
        return view('laptop.edit', compact('laptop'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:laptop',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $laptop = Laptop::findOrFail($id);
        $laptop->kode = $request->kode;
        $laptop->namaBarang = $request->namaBarang;
        $laptop->merk = $request->merk;
        $laptop->jumlah = $request->jumlah;
        $laptop->hargaSatuan = $request->hargaSatuan;
        $laptop->lokasi = $request->lokasi;
        $laptop->tahunPembuatan = $request->tahunPembuatan;
        $laptop->tahunBeli = $request->tahunBeli;
        $laptop->hargaKeseluruhan = $laptop->jumlah * $laptop->hargaSatuan;
        $laptop->kondisi = $request->kondisi;
        $laptop->save();
        return redirect()->route('laptop.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laptop  $laptop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laptop = Laptop::findOrFail($id);
        $laptop->delete();
        return redirect()->route('laptop.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
