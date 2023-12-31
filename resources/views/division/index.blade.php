@extends('layouts.template')

@section('title')
    Divisi || Sistem Pelacakan Dokumen dengan Tanda Tangan Digital
@endsection

@section('breadcrumb')
    <div class="breadcomb-wp">
        <div class="breadcomb-icon">
            <i class="icon nalika-pie-chart icon-wrap"></i>
        </div>
        <div class="breadcomb-ctn">
            <h2> Data Divisi </h2>
            <p>Selamat Datang di <span class="bread-ntd">Sistem Pelacakan Dokumen dengan Tanda Tangan Digital</span></p>
        </div>
    </div>
@endsection

@section('content')
    <div class="static-table-area mg-t-15">
        <div class="container-fluid" style="color: white;">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline8-list">
                        <a href="{{route('division.create')}}" class="btn btn-success">Tambah Divisi</a>
                        <div class="static-table-list text-light">
                            <br>
                            <div class="table-responsive">
                                <table class="table" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Nama Divisi</th>
                                            <th style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($divisions as $k => $d)
                                        <tr class="text-center">
                                            <td scope="row">{{ $k + 1 }}</td>
                                            <td scope="row">{{$d -> division_name}}</td>
                                            <td scope="row">
                                                <div class="btn-group" role="group">
                                                    <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="{{route('division.edit',['division' => $d->division_id])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="{!! url('division/destroy') !!}/{{$d->division_id}}" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </div>
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
    </div>
    <br>

@endsection

