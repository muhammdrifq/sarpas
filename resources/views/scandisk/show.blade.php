
@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Inventaris
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Kode</label>
                            <input type="text" class="form-control " name="kode" value="{{ $scandisk->kode }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" class="form-control " name="namaBarang" value="{{ $scandisk->namaBarang }}" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Merk</label>
                            <input type="text" class="form-control " name="kode" value="{{ $scandisk->merk }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="text" class="form-control " name="kode" value="{{ $scandisk->jumlah }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Satuan</label>
                            <input type="text" class="form-control" name="hargaSatuan" value="{{ $scandisk->hargaSatuan }}"
                                readonly>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <textarea class="form-control" name="lokasi" readonly>{{ $scandisk->lokasi }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Pembuatan</label>
                            <textarea class="form-control" name="tahunPembuatan" readonly>{{ $scandisk->tahunPembuatan }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Beli</label>
                            <textarea class="form-control" name="tahunBeli" readonly>{{ $scandisk->tahunBeli }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Keseluruhan</label>
                            <textarea class="form-control" name="hargaKeseluruhan" readonly>{{ $scandisk->hargaKeseluruhan }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kondisi</label>
                            <textarea class="form-control" name="kondisi" readonly>{{ $scandisk->kondisi}}</textarea>

                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('scandisk.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection