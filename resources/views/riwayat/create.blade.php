@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Riwayat
                    </div>
                    <div class="card-body">
                        <form action="{{ route('riwayat.store') }}" method="post">
                            @csrf
                            <table cellpadding="5">

                                <tr>
                                    <td><label class="form-label">Tanggal Peminjaman</label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="date" class="form-control  @error('tglpeminjaman') is-invalid @enderror" name="tglpeminjaman">
                                        @error('tglpeminjaman')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td><label class="form-label">Peminjam</label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" class="form-control  @error('peminjam') is-invalid @enderror" name="peminjam">
                                        @error('peminjam')
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
                                        <input type="text" class="form-control  @error('namabarang') is-invalid @enderror" name="namabarang">
                                        @error('namabarang')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td><label class="form-label">Kode</label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="number" style=”width:100%;” class="form-control  @error('kode1') is-invalid @enderror" name="kode1">
                                        @error('kode1')
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
                                        <input type="number" class="form-control  @error('jumlah1') is-invalid @enderror" name="jumlah1">
                                        @error('jumlah1')
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
                                        <input type="text" class="form-control  @error('lokasi1') is-invalid @enderror" name="lokasi1">
                                        @error('lokasi1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>

                                <tr></tr>

                                <tr>
                                    <td><label class="form-label">Kondisi</label></td>
                                    <td>:</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input @error('kondisi1') is-invalid @enderror"
                                            type="radio" name="kondisi1" value="Ya">
                                            <label class="form-check-label">
                                                Bagus
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('kondisi1') is-invalid @enderror"
                                            type="radio" name="kondisi1" value="Tidak">
                                            <label class="form-check-label">
                                                Buruk
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input @error('kondisi1') is-invalid @enderror"
                                            type="radio" name="kondisi1" value="kurang">
                                            <label class="form-check-label">
                                                Kurang
                                            </label>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><label class="form-label">Bagian Sarpras</label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="text" style=”width:100%;” class="form-control  @error('bagiansarpras') is-invalid @enderror" name="bagiansarpras">
                                        @error('bagiansarpras')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="form-label">Tanggal Pengembalian</label></td>
                                    <td>:</td>
                                    <td>
                                        <input type="date" class="form-control  @error('tglpengembalian') is-invalid @enderror" name="tglpengembalian">
                                        @error('tglpengembalian')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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