
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
                            <input type="text" class="form-control " name="kode" value="{{ $lttgdd->kode }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" class="form-control " name="namaBarang" value="{{ $lttgdd->namaBarang }}" readonly>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Merk</label>
                            <input type="text" class="form-control " name="kode" value="{{ $lttgdd->merk }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah</label>
                            <input type="text" class="form-control " name="kode" value="{{ $lttgdd->jumlah }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Satuan</label>
                            <input type="text" class="form-control" name="hargaSatuan" value="{{ $lttgdd->hargaSatuan }}"
                                readonly>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <textarea class="form-control" name="lokasi" readonly>{{ $lttgdd->lokasi }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Pembuatan</label>
                            <textarea class="form-control" name="tahunPembuatan" readonly>{{ $lttgdd->tahunPembuatan }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Beli</label>
                            <textarea class="form-control" name="tahunBeli" readonly>{{ $lttgdd->tahunBeli }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Keseluruhan</label>
                            <textarea class="form-control" name="hargaKeseluruhan" readonly>{{ $lttgdd->hargaKeseluruhan }}</textarea>

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kondisi</label>
                            <textarea class="form-control" name="kondisi" readonly>{{ $lttgdd->kondisi}}</textarea>

                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('lttgdd.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection