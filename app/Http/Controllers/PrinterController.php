<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class PrinterController extends Controller
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
        $printer = Inventaris::where('namaBarang','LIKE BINARY', '%Printer%')->get();
        return view('printer.index', compact('printer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('printer.create');
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
            'kode' => 'required|unique:printer',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $printer = new Printer();
        $printer->kode = $request->kode;
        $printer->namaBarang = $request->namaBarang;
        $printer->merk = $request->merk;
        $printer->jumlah = $request->jumlah;
        $printer->hargaSatuan = $request->hargaSatuan;
        $printer->lokasi = $request->lokasi;
        $printer->tahunPembuatan = $request->tahunPembuatan;
        $printer->tahunBeli = $request->tahunBeli;
        $printer->hargaKeseluruhan = $printer->jumlah * $printer->hargaSatuan;
        $printer->kondisi = $request->kondisi;
        $printer->save();
        return redirect()->route('printer.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $printer = Printer::findOrFail($id);
        return view('printer.show', compact('printer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $printer = Printer::findOrFail($id);
        return view('printer.edit', compact('printer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:printer',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $printer = Printer::findOrFail($id);
        $printer->kode = $request->kode;
        $printer->namaBarang = $request->namaBarang;
        $printer->merk = $request->merk;
        $printer->jumlah = $request->jumlah;
        $printer->hargaSatuan = $request->hargaSatuan;
        $printer->lokasi = $request->lokasi;
        $printer->tahunPembuatan = $request->tahunPembuatan;
        $printer->tahunBeli = $request->tahunBeli;
        $printer->hargaKeseluruhan = $printer->jumlah * $printer->hargaSatuan;
        $printer->kondisi = $request->kondisi;
        $printer->save();
        return redirect()->route('printer.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $printer = Printer::findOrFail($id);
        $printer->delete();
        return redirect()->route('printer.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
