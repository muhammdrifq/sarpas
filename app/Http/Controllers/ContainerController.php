<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class ContainerController extends Controller
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
        $container = Inventaris::where('namaBarang','LIKE BINARY','%Container%')->get();
        return view('container.index', compact('container'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('container.create');
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
            'kode' => 'required|unique:container',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $container = new Container();
        $container->kode = $request->kode;
        $container->namaBarang = $request->namaBarang;
        $container->merk = $request->merk;
        $container->jumlah = $request->jumlah;
        $container->hargaSatuan = $request->hargaSatuan;
        $container->lokasi = $request->lokasi;
        $container->tahunPembuatan = $request->tahunPembuatan;
        $container->tahunBeli = $request->tahunBeli;
        $container->hargaKeseluruhan = $container->jumlah * $container->hargaSatuan;
        $container->kondisi = $request->kondisi;
        $container->save();
        return redirect()->route('container.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $container = Container::findOrFail($id);
        return view('container.show', compact('container'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $container = Container::findOrFail($id);
        return view('container.edit', compact('container'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:container',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $container = Container::findOrFail($id);
        $container->kode = $request->kode;
        $container->namaBarang = $request->namaBarang;
        $container->merk = $request->merk;
        $container->jumlah = $request->jumlah;
        $container->hargaSatuan = $request->hargaSatuan;
        $container->lokasi = $request->lokasi;
        $container->tahunPembuatan = $request->tahunPembuatan;
        $container->tahunBeli = $request->tahunBeli;
        $container->hargaKeseluruhan = $container->jumlah * $container->hargaSatuan;
        $container->kondisi = $request->kondisi;
        $container->save();
        return redirect()->route('container.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Container  $container
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $container = Container::findOrFail($id);
        $container->delete();
        return redirect()->route('container.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
