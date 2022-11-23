<?php

namespace App\Http\Controllers;

use App\Models\CekSuhu;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class ceksuhuController extends Controller
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
        $ceksuhu = Inventaris::where('namaBarang','LIKE BINARY','%ceksuhu%')->get();
        return view('ceksuhu.index', compact('ceksuhu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ceksuhu.create');
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
            'kode' => 'required|unique:ceksuhu',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ceksuhu = new Ceksuhu();
        $ceksuhu->kode = $request->kode;
        $ceksuhu->namaBarang = $request->namaBarang;
        $ceksuhu->merk = $request->merk;
        $ceksuhu->jumlah = $request->jumlah;
        $ceksuhu->hargaSatuan = $request->hargaSatuan;
        $ceksuhu->lokasi = $request->lokasi;
        $ceksuhu->tahunPembuatan = $request->tahunPembuatan;
        $ceksuhu->tahunBeli = $request->tahunBeli;
        $ceksuhu->hargaKeseluruhan = $ceksuhu->jumlah * $ceksuhu->hargaSatuan;
        $ceksuhu->kondisi = $request->kondisi;
        $ceksuhu->save();
        return redirect()->route('ceksuhu.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CekSuhu  $cekSuhu
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cermin = cermin::findOrFail($id);
        return view('cermin.show', compact('cermin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CekSuhu  $cekSuhu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ceksuhu = ceksuhu::findOrFail($id);
        return view('ceksuhu.edit', compact('ceksuhu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CekSuhu  $cekSuhu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:ceksuhu',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $ceksuhu = ceksuhu::findOrFail($id);
        $ceksuhu->kode = $request->kode;
        $ceksuhu->namaBarang = $request->namaBarang;
        $ceksuhu->merk = $request->merk;
        $ceksuhu->jumlah = $request->jumlah;
        $ceksuhu->hargaSatuan = $request->hargaSatuan;
        $ceksuhu->lokasi = $request->lokasi;
        $ceksuhu->tahunPembuatan = $request->tahunPembuatan;
        $ceksuhu->tahunBeli = $request->tahunBeli;
        $ceksuhu->hargaKeseluruhan = $ceksuhu->jumlah * $ceksuhu->hargaSatuan;
        $ceksuhu->kondisi = $request->kondisi;
        $ceksuhu->save();
        return redirect()->route('ceksuhu.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CekSuhu  $cekSuhu
     * @return \Illuminate\Http\Response
     */
    public function destroy(CekSuhu $cekSuhu)
    {
        $ceksuhu = CekSuhu::findOrFail($id);
        $ceksuhu->delete();
        return redirect()->route('ceksuhu.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
