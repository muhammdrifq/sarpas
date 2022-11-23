
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data inventaris
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Kode</label>
                            <input type="text" class="form-control " name="kode" value="{{ $inventaris->kode }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" class="form-control " name="namaBarang" value="{{ $inventaris->namaBarang }}" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Merk</label>
                            <input type="text" class="form-control " name="kode" value="{{ $inventaris->merk }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="text" class="form-control " name="kode" value="{{ $inventaris->jumlah }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Satuan</label>
                            <input type="text" class="form-control" name="hargaSatuan" value="{{ $inventaris->hargaSatuan }}"
                                readonly>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <textarea class="form-control" name="lokasi" readonly>{{ $inventaris->lokasi }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Pembuatan</label>
                            <input type="text" class="form-control" name="tahunPembuatan" value="{{ $inventaris->tahunPembuatan }}"
                                readonly>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Beli</label>
                            <input type="text" class="form-control" name="tahunBeli" value="{{ $inventaris->tahunBeli }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Keseluruhan</label>
                            <input type="text" class="form-control" name="hargaKeseluruhan" value="{{ $inventaris->hargaKeseluruhan }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kondisi</label>
                            <input type="text" class="form-control" name="kondisi" value="{{ $inventaris->kondisi }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('inventaris.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection