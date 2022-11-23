@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Inventaris
                    </div>
                    <div class="card-body">
                        <form action="{{ route('inventaris.update', $inventaris->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Kode</label>
                                <input type="text" class="form-control  @error('kode') is-invalid @enderror"
                                    name="kode" value="{{ $inventaris->kode }}">
                                @error('kode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" class="form-control  @error('namaBarang') is-invalid @enderror"
                                    name="namaBarang" value="{{ $inventaris->namaBarang }}">
                                @error('namaBarang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Merk</label>
                                <input type="text" class="form-control  @error('merk') is-invalid @enderror"
                                    name="merk" value="{{ $inventaris->merk }}">
                                @error('merk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah</label>
                                <input type="text" class="form-control  @error('jumlah') is-invalid @enderror"
                                    name="jumlah" value="{{ $inventaris->jumlah }}">
                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga Satuan</label>
                                <input type="number" class="form-control  @error('hargaSatuan') is-invalid @enderror"
                                    name="hargaSatuan" value="{{ $inventaris->hargaSatuan }}">
                                @error('hargaSatuan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lokasi</label>
                                <textarea class="form-control  @error('lokasi') is-invalid @enderror" name="lokasi">{{ $inventaris->lokasi }}</textarea>
                                @error('lokasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Pembuatan</label>
                                <input type="date" class="form-control  @error('tahunPembuatan') is-invalid @enderror"
                                    name="tahunPembuatan" value="{{ $inventaris->tahunPembuatan }}">
                                @error('tahunPembuatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tahun Beli</label>
                                <input type="date" class="form-control  @error('tahunBeli') is-invalid @enderror"
                                    name="tahunBeli" value="{{ $inventaris->tahunBeli }}">
                                @error('tahunBeli')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kondisi Kelayakan</label>
                                <div class="form-check">
                                    <input class="form-check-input @error('kondisi') is-invalid @enderror"
                                        type="radio" name="kondisi" value="Ya"
                                        @if ($inventaris->kondisi == 'Ya') checked @endif>
                                    <label class="form-check-label">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('kondisi') is-invalid @enderror"
                                        type="radio" name="kondisi" value="Tidak"
                                        @if ($inventaris->kondisi == 'Tidak') checked @endif>
                                    <label class="form-check-label">
                                        Tidak
                                    </label>
                                </div>
                                @error('kondisi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection