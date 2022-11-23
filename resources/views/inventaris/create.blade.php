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
                        <form action="{{ route('inventaris.store') }}" method="post">
                            @csrf
                            <table cellpadding="5">

                                <tr>
                                    <td><label class="form-label">Kode</label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" style=”width:100%;” class="form-control  @error('kode') is-invalid @enderror" name="kode">
                                        @error('kode')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td><label class="form-label">Nama Barang</label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control  @error('namaBarang') is-invalid @enderror" name="namaBarang">
                                        @error('namaBarang')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td><label class="form-label">Merk</label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control  @error('merk') is-invalid @enderror" name="merk">
                                        @error('merk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td><label class="form-label">Jumlah</label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="number" class="form-control  @error('jumlah') is-invalid @enderror" name="jumlah">
                                        @error('jumlah')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td><label class="form-label">Harga Satuan</label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="number" class="form-control  @error('hargaSatuan') is-invalid @enderror" name="hargaSatuan">
                                        @error('hargaSatuan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td><label class="form-label">Lokasi</label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control  @error('lokasi') is-invalid @enderror" name="lokasi">
                                        @error('lokasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td><label class="form-label">Tahun Pembuatan</label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="date" class="form-control  @error('tahunPembuatan') is-invalid @enderror" name="tahunPembuatan">
                                        @error('tahunPembuatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td><label class="form-label">Tahun Beli</label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="date" class="form-control  @error('tahunBeli') is-invalid @enderror" name="tahunBeli">
                                        @error('tahunBeli')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>

                                <tr></tr>

                                <tr>
                                    <td><label class="form-label">Kondisi Kelayakan</label></td>
                                    <td>:</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input @error('kondisi') is-invalid @enderror"
                                            type="radio" name="kondisi" value="Ya">
                                            <label class="form-check-label">
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('kondisi') is-invalid @enderror"
                                            type="radio" name="kondisi" value="Tidak">
                                            <label class="form-check-label">
                                                Tidak
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('kondisi') is-invalid @enderror"
                                            type="radio" name="kondisi" value="kurang">
                                            <label class="form-check-label">
                                                Kurang
                                            </label>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                                <br>
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" style="width: 100%;" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection