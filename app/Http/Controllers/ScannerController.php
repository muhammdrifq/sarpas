<?php

namespace App\Http\Controllers;

use App\Models\Scanner;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class ScannerController extends Controller
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
        $scanner = Inventaris::where('namaBarang','LIKE BINARY', '%scanner%')->get();
        return view('scanner.index', compact('scanner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('scanner.create');
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
            'kode' => 'required|unique:scanner',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $scanner = new Scanner();
        $scanner->kode = $request->kode;
        $scanner->namaBarang = $request->namaBarang;
        $scanner->merk = $request->merk;
        $scanner->jumlah = $request->jumlah;
        $scanner->hargaSatuan = $request->hargaSatuan;
        $scanner->lokasi = $request->lokasi;
        $scanner->tahunPembuatan = $request->tahunPembuatan;
        $scanner->tahunBeli = $request->tahunBeli;
        $scanner->hargaKeseluruhan = $scanner->jumlah * $scanner->hargaSatuan;
        $scanner->kondisi = $request->kondisi;
        $scanner->save();
        return redirect()->route('scanner.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scanner  $scanner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scanner = Scanner::findOrFail($id);
        return view('scanner.show', compact('scanner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scanner  $scanner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scanner = Scanner::findOrFail($id);
        return view('scanner.edit', compact('scanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scanner  $scanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:scanner',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $scanner = Scanner::findOrFail($id);
        $scanner->kode = $request->kode;
        $scanner->namaBarang = $request->namaBarang;
        $scanner->merk = $request->merk;
        $scanner->jumlah = $request->jumlah;
        $scanner->hargaSatuan = $request->hargaSatuan;
        $scanner->lokasi = $request->lokasi;
        $scanner->tahunPembuatan = $request->tahunPembuatan;
        $scanner->tahunBeli = $request->tahunBeli;
        $scanner->hargaKeseluruhan = $scanner->jumlah * $scanner->hargaSatuan;
        $scanner->kondisi = $request->kondisi;
        $scanner->save();
        return redirect()->route('scanner.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scanner  $scanner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scanner = Scanner::findOrFail($id);
        $scanner->delete();
        return redirect()->route('scanner.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
