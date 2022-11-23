<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Http\Requests\StoreRiwayatRequest;
use App\Http\Requests\UpdateRiwayatRequest;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat = Riwayat::all();
        return view('riwayat.index', compact('riwayat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('riwayat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRiwayatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRiwayatRequest $request)
    {
        $validated = $request->validate([
            'tglpeminjaman' => 'required',
            'peminjam' => 'required',
            'namabarang' => 'required',
            'kode1' => 'required|unique:riwayat',
            'jumlah1' => 'required',
            'lokasi1' => 'required',
            'kondisi1' => 'required',
            'bagiansarpras' => 'required',
        ]);

        $riwayat = new Riwayat();
        $riwayat->tglpeminjaman = $request->tglpeminjaman;
        $riwayat->peminjam = $request->peminjam;
        $riwayat->namabarang = $request->namabarang;
        $riwayat->kode1 = $request->kode1;
        $riwayat->jumlah1 = $request->jumlah1;
        $riwayat->lokasi1 = $request->lokasi1;
        $riwayat->kondisi1 = $request->kondisi1;
        $riwayat->bagiansarpras = $request->bagiansarpras;
        $riwayat->tglpengembalian = $request->tglpengembalian;
        $riwayat->save();
        return redirect()->route('riwayat.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $riwayat = Riwayat::findOrFail($id);
        return view('riwayat.show', compact('riwayat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $riwayat = Riwayat::findOrFail($id);
        return view('riwayat.edit', compact('riwayat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRiwayatRequest  $request
     * @param  \App\Models\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRiwayatRequest $request, $id)
    {
        $validated = $request->validate([
            'tglpeminjaman' => 'required',
            'peminjam' => 'required',
            'namabarang' => 'required',
            'kode1' => 'required|unique:riwayat',
            'jumlah1' => 'required',
            'lokasi1' => 'required',
            'kondisi1' => 'required',
            'bagiansarpras' => 'required',
            'tglpengembalian' => 'required',
        ]);

        $riwayat = Riwayat::findOrFail($id);
        $riwayat->tglpeminjaman = $request->tglpeminjaman;
        $riwayat->peminjam = $request->peminjam;
        $riwayat->namabarang = $request->namabarang;
        $riwayat->kode1 = $request->kode1;
        $riwayat->jumlah1 = $request->jumlah1;
        $riwayat->lokasi1 = $request->lokasi1;
        $riwayat->kondisi1 = $request->kondisi1;
        $riwayat->bagiansarpras = $request->bagiansarpras;
        $riwayat->tglpengembalian = $request->tglpengembalian;
        $riwayat->save();
        return redirect()->route('riwayat.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Riwayat  $riwayat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $riwayat = Riwayat::findOrFail($id);
        $riwayat->delete();
        return redirect()->route('riwayat.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
