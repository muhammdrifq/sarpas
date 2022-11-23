<?php

namespace App\Http\Controllers;

use App\Models\Monitor;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class MonitorController extends Controller
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
        $monitor = Inventaris::where('namaBarang','LIKE BINARY', '%Monitor%')->get();
        return view('monitor.index', compact('monitor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monitor.create');
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
            'kode' => 'required|unique:monitor',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $monitor = new Monitor();
        $monitor->kode = $request->kode;
        $monitor->namaBarang = $request->namaBarang;
        $monitor->merk = $request->merk;
        $monitor->jumlah = $request->jumlah;
        $monitor->hargaSatuan = $request->hargaSatuan;
        $monitor->lokasi = $request->lokasi;
        $monitor->tahunPembuatan = $request->tahunPembuatan;
        $monitor->tahunBeli = $request->tahunBeli;
        $monitor->hargaKeseluruhan = $monitor->jumlah * $monitor->hargaSatuan;
        $monitor->kondisi = $request->kondisi;
        $monitor->save();
        return redirect()->route('monitor.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $monitor = Monitor::findOrFail($id);
        return view('monitor.show', compact('monitor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $monitor = Monitor::findOrFail($id);
        return view('monitor.edit', compact('monitor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:monitor',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $monitor = Monitor::findOrFail($id);
        $monitor->kode = $request->kode;
        $monitor->namaBarang = $request->namaBarang;
        $monitor->merk = $request->merk;
        $monitor->jumlah = $request->jumlah;
        $monitor->hargaSatuan = $request->hargaSatuan;
        $monitor->lokasi = $request->lokasi;
        $monitor->tahunPembuatan = $request->tahunPembuatan;
        $monitor->tahunBeli = $request->tahunBeli;
        $monitor->hargaKeseluruhan = $monitor->jumlah * $monitor->hargaSatuan;
        $monitor->kondisi = $request->kondisi;
        $monitor->save();
        return redirect()->route('monitor.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $monitor = Monitor::findOrFail($id);
        $monitor->delete();
        return redirect()->route('monitor.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
