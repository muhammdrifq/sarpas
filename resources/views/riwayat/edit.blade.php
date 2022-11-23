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
                        <form action="{{ route('riwayat.update', $riwayat->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="mb-3">
                                <label class="form-label">Tanggal Peminjaman</label>
                                <input type="date" class="form-control  @error('tglpeminjaman') is-invalid @enderror"
                                    name="tglpeminjaman" value="{{ $riwayat->tglpeminjaman }}">
                                @error('tglpeminjaman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Peminjam</label>
                                <input type="text" class="form-control  @error('peminjam') is-invalid @enderror"
                                    name="peminjam" value="{{ $riwayat->peminjam }}">
                                @error('peminjam')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Barang</label>
                                <input type="text" class="form-control  @error('namabarang') is-invalid @enderror"
                                    name="namabarang" value="{{ $riwayat->namabarang }}">
                                @error('namabarang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kode</label>
                                <input type="text" class="form-control  @error('kode1') is-invalid @enderror"
                                    name="kode1" value="{{ $riwayat->kode1 }}">
                                @error('kode1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                           
                            <div class="mb-3">
                                <label class="form-label">Jumlah</label>
                                <input type="text" class="form-control  @error('jumlah1') is-invalid @enderror"
                                    name="jumlah1" value="{{ $riwayat->jumlah1 }}">
                                @error('jumlah1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Lokasi</label>
                                <textarea class="form-control  @error('lokasi1') is-invalid @enderror" name="lokasi1">{{ $riwayat->lokasi1 }}</textarea>
                                @error('lokasi1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Kondisi</label>
                                <div class="form-check">
                                    <input class="form-check-input @error('kondisi1') is-invalid @enderror"
                                        type="radio" name="kondisi1" value="Ya"
                                        @if ($riwayat->kondisi1 == 'Ya') checked @endif>
                                    <label class="form-check-label">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('kondisi1') is-invalid @enderror"
                                        type="radio" name="kondisi1" value="Tidak"
                                        @if ($riwayat->kondisi1 == 'Tidak') checked @endif>
                                    <label class="form-check-label">
                                        Tidak
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('kondisi1') is-invalid @enderror"
                                        type="radio" name="kondisi1" value="Kurang"
                                        @if ($riwayat->kondisi1 == 'Kurang') checked @endif>
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                </div>
                                @error('kondisi1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Bagian Sarpras</label>
                                <input type="text" class="form-control  @error('bagiansarpras') is-invalid @enderror"
                                    name="bagiansarpras" value="{{ $riwayat->bagiansarpras }}">
                                @error('bagiansarpras')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Pengembalian</label>
                                <input type="date" class="form-control  @error('tglpengembalian') is-invalid @enderror"
                                    name="tglpengembalian" value="{{ $riwayat->tglpengembalian }}">
                                @error('tglpengembalian')
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