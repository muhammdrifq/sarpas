
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
                            <input type="text" class="form-control " name="kode" value="{{ $showcase->kode }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" class="form-control " name="namaBarang" value="{{ $showcase->namaBarang }}" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Merk</label>
                            <input type="text" class="form-control " name="kode" value="{{ $showcase->merk }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="text" class="form-control " name="kode" value="{{ $showcase->jumlah }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Satuan</label>
                            <input type="text" class="form-control" name="hargaSatuan" value="{{ $showcase->hargaSatuan }}"
                                readonly>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <textarea class="form-control" name="lokasi" readonly>{{ $showcase->lokasi }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Pembuatan</label>
                            <textarea class="form-control" name="tahunPembuatan" readonly>{{ $showcase->tahunPembuatan }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Beli</label>
                            <textarea class="form-control" name="tahunBeli" readonly>{{ $showcase->tahunBeli }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Keseluruhan</label>
                            <textarea class="form-control" name="hargaKeseluruhan" readonly>{{ $showcase->hargaKeseluruhan }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kondisi</label>
                            <textarea class="form-control" name="kondisi" readonly>{{ $showcase->kondisi}}</textarea>

                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('showcase.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection