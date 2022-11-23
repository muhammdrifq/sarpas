@extends('layouts.admin')

@section('content')
    <div class="container" >
        <div class="row justify-content-center">
            <div class="col-md-12" >
                @include('layouts/_flash')
                <div class="card" >
                    <div class="card-header">
                        Data Inventaris
                    </div>

                    {{-- <div class="card-body"> --}}
                        <div class="table-responsive-sm">
                            <table class="table align-middle table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama Barang</th>
                                        <th>Merek</th>
                                        <th>Jumlah</th>
                                        <th>Harga Satuan</th>
                                        <th>Lokasi</th>
                                        <th>Tahun Pembuatan</th>
                                        <th>Tahun Beli</th>
                                        <th>Harga Keseluruhan</th>
                                        <th>Kondisi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($container as $index => $data)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $data->kode }}</td>
                                            <td>{{ $data->namaBarang }}</td>
                                            <td>{{ $data->merk }}</td>
                                            <td>{{ $data->jumlah }}</td>
                                            <td>{{ $data->hargaSatuan }}</td>
                                            <td>{{ $data->lokasi }}</td>
                                            <td>{{ date('d M Y', strtotime($data->tahunPembuatan)) }}</td>
                                            <td>{{ date('Y', strtotime($data->tahunBeli)) }}</td>
                                            <td>{{ $data->hargaKeseluruhan }}</td> 
                                            <td>{{ $data->kondisi }}</td>
                                            <td>
                                                <form action="{{ route('container.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('container.show', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        <i class="bi bi-info-lg"></i>
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection