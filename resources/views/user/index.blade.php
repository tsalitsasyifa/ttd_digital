@extends('layouts.template')

@section('title')
    Pengguna || Sistem Pelacakan Dokumen dengan Tanda Tangan Digital
@endsection

@section('breadcrumb')
    <div class="breadcomb-wp">
        <div class="breadcomb-icon">
            <i class="icon nalika-user icon-wrap"></i>
        </div>
        <div class="breadcomb-ctn">
            <h2> Data Pengguna </h2>
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
                        <a href="{{route('user.create')}}" class="btn btn-success">Tambah Pengguna</a>
                        <div class="static-table-list text-light">
                            <br>
                            <div class="table-responsive">
                                <table class="table" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Nama</th>
                                            <th style="text-align: center;">Username</th>
                                            <th style="text-align: center;">E - Mail</th>
                                            <th style="text-align: center;">Divisi</th>
                                            <th style="text-align: center;">Jabatan</th>
                                            <th style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $k => $u)
                                        <tr class="text-center">
                                            <td scope="row">{{ $k + 1 }}</td>
                                            <td scope="row">{{$u -> name}}</td>
                                            <td scope="row">{{$u -> username}}</td>
                                            <td scope="row">{{$u -> email}}</td>
                                            <td scope="row">{{$u -> division -> division_name}}</td>
                                            <td scope="row">{{$u -> role}}</td>
                                            <td scope="row">
                                                <div class="btn-group" role="group">
                                                    <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="{{route('user.edit',['user' => $u->user_id])}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="{!! url('user/destroy') !!}/{{$u->user_id}}" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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

