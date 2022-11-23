<?php

namespace App\Http\Controllers;

use App\Models\Socket;
use App\Models\Inventaris;
use Illuminate\Http\Request;

class SocketController extends Controller
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
        $socket = Inventaris::where('namaBarang','LIKE BINARY', '%Socket%')->get();
        return view('socket.index', compact('socket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('socket.create');
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
            'kode' => 'required|unique:socket',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required|date',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $socket = new Socket();
        $socket->kode = $request->kode;
        $socket->namaBarang = $request->namaBarang;
        $socket->merk = $request->merk;
        $socket->jumlah = $request->jumlah;
        $socket->hargaSatuan = $request->hargaSatuan;
        $socket->lokasi = $request->lokasi;
        $socket->tahunPembuatan = $request->tahunPembuatan;
        $socket->tahunBeli = $request->tahunBeli;
        $socket->hargaKeseluruhan = $socket->jumlah * $socket->hargaSatuan;
        $socket->kondisi = $request->kondisi;
        $socket->save();
        return redirect()->route('socket.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Socket  $socket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $socket = Socket::findOrFail($id);
        return view('socket.show', compact('socket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Socket  $socket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $socket = Socket::findOrFail($id);
        return view('socket.edit', compact('socket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Socket  $socket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode' => 'required|unique:socket',
            'namaBarang' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'hargaSatuan' => 'required',
            'lokasi' => 'required',
            'tahunPembuatan' => 'required',
            'tahunBeli' => 'required|date',
            'kondisi' => 'required',
        ]);

        $socket = Socket::findOrFail($id);
        $socket->kode = $request->kode;
        $socket->namaBarang = $request->namaBarang;
        $socket->merk = $request->merk;
        $socket->jumlah = $request->jumlah;
        $socket->hargaSatuan = $request->hargaSatuan;
        $socket->lokasi = $request->lokasi;
        $socket->tahunPembuatan = $request->tahunPembuatan;
        $socket->tahunBeli = $request->tahunBeli;
        $socket->hargaKeseluruhan = $socket->jumlah * $socket->hargaSatuan;
        $socket->kondisi = $request->kondisi;
        $socket->save();
        return redirect()->route('socket.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Socket  $socket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $socket = Socket::findOrFail($id);
        $socket->delete();
        return redirect()->route('socket.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
