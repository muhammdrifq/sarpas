@extends('layouts.admin')

@section('content')
<div class="container ">
    <div class="row justify-content-center ">
        <div class="col-md-12 ">
            @include('layouts/_flash')
            <div class="card" >
                <div class="card-header container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            Data Inventaris
                        </div>
                        <div class="col-md-6" style="float: right">
                            <div class="mt-5 mx-auto">
                                <a href="{{ route('inventaris.create') }}" class="btn btn-xs btn-primary" >
                                    Tambah Data 
                                </a>
                                {{-- sm or md --}}
                                <a href="{{ route('export') }}" class="btn btn-xs btn-primary " >
                                    Export to Excel
                                </a>
            
                                <a href="{{ route('importInventaris') }}" class="btn btn-xs btn-primary "  data-toggle="modal" data-target="#importExcel">
                                    Import From Excel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle table-hover" id="dataTable">
                            <thead class="thead">
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
                                @foreach ($inventaris as $index => $data)
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
                                            <form action="{{ route('inventaris.destroy', $data->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('inventaris.edit', $data->id) }}"
                                                    class="btn btn-sm btn-outline-success">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                                <a href="{{ route('inventaris.show', $data->id) }}"
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

{{-- Modal / Popup --}}

<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="{{ route('importInventaris') }}" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                </div>
                <div class="modal-body">

                    {{ csrf_field() }}

                    <label>Pilih file excel</label>
                    <div class="form-group">
                        <input type="file" name="file" required="required">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection