<?php

namespace App\Http\Controllers;

use App\Models\Camera;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class CameraController extends Controller
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
        $camera = Inventaris::where('namaBarang','LIKE BINARY','%Camera%')->get();
        return view('camera.index', compact('camera'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('camera.create');
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
            'kode' => 'required|unique:camera',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $camera = new Camera();
        $camera->kode = $request->kode;
        $camera->namaBarang = $request->namaBarang;
        $camera->merk = $request->merk;
        $camera->jumlah = $request->jumlah;
        $camera->hargaSatuan = $request->hargaSatuan;
        $camera->lokasi = $request->lokasi;
        $camera->tahunPembuatan = $request->tahunPembuatan;
        $camera->tahunBeli = $request->tahunBeli;
        $camera->hargaKeseluruhan = $camera->jumlah * $camera->hargaSatuan;
        $camera->kondisi = $request->kondisi;
        $camera->save();
        return redirect()->route('camera.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $camera = Camera::findOrFail($id);
        return view('camera.show', compact('camera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $camera = Camera::findOrFail($id);
        return view('camera.edit', compact('camera'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:camera',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $camera = Camera::findOrFail($id);
        $camera->kode = $request->kode;
        $camera->namaBarang = $request->namaBarang;
        $camera->merk = $request->merk;
        $camera->jumlah = $request->jumlah;
        $camera->hargaSatuan = $request->hargaSatuan;
        $camera->lokasi = $request->lokasi;
        $camera->tahunPembuatan = $request->tahunPembuatan;
        $camera->tahunBeli = $request->tahunBeli;
        $camera->hargaKeseluruhan = $camera->jumlah * $camera->hargaSatuan;
        $camera->kondisi = $request->kondisi;
        $camera->save();
        return redirect()->route('camera.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Camera  $camera
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $camera = Camera::findOrFail($id);
        $camera->delete();
        return redirect()->route('camera.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
