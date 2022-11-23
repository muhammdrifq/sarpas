<?php

namespace App\Http\Controllers;

use App\Models\TerminalKabel;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class TerminalKabelController extends Controller
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
        $terminalkabel = Inventaris::where('namaBarang','LIKE BINARY', '%terminalkabel%')->get();
        return view('terminalkabel.index', compact('terminalkabel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('terminalkabel.create');
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
            'kode' => 'required|unique:terminalkabel',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $terminalkabel = new TerminalKabel();
        $terminalkabel->kode = $request->kode;
        $terminalkabel->namaBarang = $request->namaBarang;
        $terminalkabel->merk = $request->merk;
        $terminalkabel->jumlah = $request->jumlah;
        $terminalkabel->hargaSatuan = $request->hargaSatuan;
        $terminalkabel->lokasi = $request->lokasi;
        $terminalkabel->tahunPembuatan = $request->tahunPembuatan;
        $terminalkabel->tahunBeli = $request->tahunBeli;
        $terminalkabel->hargaKeseluruhan = $terminalkabel->jumlah * $terminalkabel->hargaSatuan;
        $terminalkabel->kondisi = $request->kondisi;
        $terminalkabel->save();
        return redirect()->route('terminalkabel.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TerminalKabel  $terminalKabel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $terminalkabel = TerminalKabel::findOrFail($id);
        return view('terminalkabel.show', compact('terminalkabel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TerminalKabel  $terminalKabel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $terminalkabel = TerminalKabel::findOrFail($id);
        return view('terminalkabel.edit', compact('terminalkabel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TerminalKabel  $terminalKabel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:terminalkabel',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $terminalkabel = Terminalkabel::findOrFail($id);
        $terminalkabel->kode = $request->kode;
        $terminalkabel->namaBarang = $request->namaBarang;
        $terminalkabel->merk = $request->merk;
        $terminalkabel->jumlah = $request->jumlah;
        $terminalkabel->hargaSatuan = $request->hargaSatuan;
        $terminalkabel->lokasi = $request->lokasi;
        $terminalkabel->tahunPembuatan = $request->tahunPembuatan;
        $terminalkabel->tahunBeli = $request->tahunBeli;
        $terminalkabel->hargaKeseluruhan = $terminalkabel->jumlah * $terminalkabel->hargaSatuan;
        $terminalkabel->kondisi = $request->kondisi;
        $terminalkabel->save();
        return redirect()->route('terminalkabel.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TerminalKabel  $terminalKabel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $terminalkabel = TerminalKabel::findOrFail($id);
        $terminalkabel->delete();
        return redirect()->route('terminalkabel.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
