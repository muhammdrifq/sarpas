<?php

namespace App\Http\Controllers;

use App\Models\CPU;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class CPUController extends Controller
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
        $cpu = Inventaris::where('namaBarang','LIKE BINARY','%CPU%')->get();
        return view('cpu.index', compact('cpu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpu.create');
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
            'kode' => 'required|unique:cpu',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $cpu = new CPU();
        $cpu->kode = $request->kode;
        $cpu->namaBarang = $request->namaBarang;
        $cpu->merk = $request->merk;
        $cpu->jumlah = $request->jumlah;
        $cpu->hargaSatuan = $request->hargaSatuan;
        $cpu->lokasi = $request->lokasi;
        $cpu->tahunPembuatan = $request->tahunPembuatan;
        $cpu->tahunBeli = $request->tahunBeli;
        $cpu->hargaKeseluruhan = $cpu->jumlah * $cpu->hargaSatuan;
        $cpu->kondisi = $request->kondisi;
        $cpu->save();
        return redirect()->route('cpu.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CPU  $cPU
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cpu = CPU::findOrFail($id);
        return view('cpu.show', compact('cpu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CPU  $cPU
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cpu = CPU::findOrFail($id);
        return view('cpu.edit', compact('cpu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CPU  $cPU
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:cpu',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $cpu = CPU::findOrFail($id);
        $cpu->kode = $request->kode;
        $cpu->namaBarang = $request->namaBarang;
        $cpu->merk = $request->merk;
        $cpu->jumlah = $request->jumlah;
        $cpu->hargaSatuan = $request->hargaSatuan;
        $cpu->lokasi = $request->lokasi;
        $cpu->tahunPembuatan = $request->tahunPembuatan;
        $cpu->tahunBeli = $request->tahunBeli;
        $cpu->hargaKeseluruhan = $cpu->jumlah * $cpu->hargaSatuan;
        $cpu->kondisi = $request->kondisi;
        $cpu->save();
        return redirect()->route('cpu.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CPU  $cPU
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cpu = CPU::findOrFail($id);
        $cpu->delete();
        return redirect()->route('cpu.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
