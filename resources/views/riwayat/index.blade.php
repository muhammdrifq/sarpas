@extends('layouts.admin')

@section('content')
<div class="container ">
    <div class="row justify-content-center ">
        <div class="col-md-12 ">
            @include('layouts/_flash')
            <div class="card" >
                <div class="card-header">
                    Data riwayat
                    <a href="{{ route('riwayat.create') }}" class="btn btn-sm btn-primary" style="float: right">
                        Tambah Data 
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-hover" id="dataTable">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Peminjam</th>
                                    <th>Nama Barang</th>
                                    <th>Kode</th>
                                    <th>Jumlah</th>
                                    <th>Lokasi</th>
                                    <th>Kondisi</th>
                                    <th>Bagian Sarpras</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($riwayat as $index => $data)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ date('d M Y', strtotime($data->tglpeminjaman)) }}</td>
                                        <td>{{ $data->peminjam }}</td>
                                        <td>{{ $data->namabarang }}</td>
                                        <td>{{ $data->kode1 }}</td>
                                        <td>{{ $data->jumlah1 }}</td>
                                        <td>{{ $data->lokasi1 }}</td>
                                        <td>{{ $data->kondisi1 }}</td>
                                        <td>{{ $data->bagiansarpras }}</td> 
                                        <td>
                                            @if($data->tglpengembalian == NULL)
                                                Belum Dikembalikan
                                            @else
                                                {{ date('d M Y', strtotime($data->tglpengembalian)) }}
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('riwayat.destroy', $data->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('riwayat.edit', $data->id) }}"
                                                    class="btn btn-sm btn-outline-success">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                                <a href="{{ route('riwayat.show', $data->id) }}"
                                                    class="btn btn-sm btn-outline-warning">
                                                    <i class="bi bi-info-lg"></i>
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                    onclick="return confirm('Apakah Anda Yakin?')"><i class="bi bi-trash-fill"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection