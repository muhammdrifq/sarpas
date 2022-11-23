
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Riwayat
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label">Tanggal Peminjaman</label>
                            <textarea class="form-control" name="tglpeminjaman" readonly>{{ $riwayat->tglpeminjaman }}</textarea>

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Peminjam</label>
                            <input type="text" class="form-control " name="peminjam" value="{{ $riwayat->peminjam }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" class="form-control " name="namabarang" value="{{ $riwayat->namabarang }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kode</label>
                            <input type="text" class="form-control " name="kode1" value="{{ $riwayat->kode1 }}" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="text" class="form-control " name="kode1" value="{{ $riwayat->jumlah1 }}"
                                readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <textarea class="form-control" name="lokasi1" readonly>{{ $riwayat->lokasi1 }}</textarea>

                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Kondisi</label>
                            <textarea class="form-control" name="kondisi1" readonly>{{ $riwayat->kondisi1}}</textarea>

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bagian Sarpras</label>
                            <input type="text" class="form-control " name="bagiansarpras" value="{{ $riwayat->bagiansarpras }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Pengembalian</label>
                            <textarea class="form-control" name="tglpengembalian" readonly>{{ $riwayat->tglpengembalian }}</textarea>

                        </div>

                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('riwayat.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection