<?php

namespace App\Http\Controllers;

use App\Models\KotakKayu;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class KotakKayuController extends Controller
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
        $kotakkayu = Inventaris::where('namaBarang','LIKE BINARY','%Kotak Kayu%')->get();
        return view('kotakkayu.index', compact('kotakkayu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kotakkayu.create');
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
            'kode' => 'required|unique:kotakkayu',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $kotakkayu = new KotakKayu();
        $kotakkayu->kode = $request->kode;
        $kotakkayu->namaBarang = $request->namaBarang;
        $kotakkayu->merk = $request->merk;
        $kotakkayu->jumlah = $request->jumlah;
        $kotakkayu->hargaSatuan = $request->hargaSatuan;
        $kotakkayu->lokasi = $request->lokasi;
        $kotakkayu->tahunPembuatan = $request->tahunPembuatan;
        $kotakkayu->tahunBeli = $request->tahunBeli;
        $kotakkayu->hargaKeseluruhan = $kotakkayu->jumlah * $kotakkayu->hargaSatuan;
        $kotakkayu->kondisi = $request->kondisi;
        $kotakkayu->save();
        return redirect()->route('kotakkayu.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KotakKayu  $kotakKayu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kotakkayu = KotakKayu::findOrFail($id);
        return view('kotakkayu.show', compact('kotakkayu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KotakKayu  $kotakKayu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kotakkayu = KotakKayu::findOrFail($id);
        return view('kotakkayu.edit', compact('kotakkayu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KotakKayu  $kotakKayu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:kotakkayu',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $kotakkayu = KotakKayu::findOrFail($id);
        $kotakkayu->kode = $request->kode;
        $kotakkayu->namaBarang = $request->namaBarang;
        $kotakkayu->merk = $request->merk;
        $kotakkayu->jumlah = $request->jumlah;
        $kotakkayu->hargaSatuan = $request->hargaSatuan;
        $kotakkayu->lokasi = $request->lokasi;
        $kotakkayu->tahunPembuatan = $request->tahunPembuatan;
        $kotakkayu->tahunBeli = $request->tahunBeli;
        $kotakkayu->hargaKeseluruhan = $kotakkayu->jumlah * $kotakkayu->hargaSatuan;
        $kotakkayu->kondisi = $request->kondisi;
        $kotakkayu->save();
        return redirect()->route('kotakkayu.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KotakKayu  $kotakKayu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kotakkayu = KotakKayu::findOrFail($id);
        $kotakkayu->delete();
        return redirect()->route('kotakkayu.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
