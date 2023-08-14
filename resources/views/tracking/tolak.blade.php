@extends('layouts.template')

@section('title')
    Dokumen Tertunda || Sistem Pelacakan Dokumen dengan Tanda Tangan Digital
@endsection

@section('breadcrumb')
    <div class="breadcomb-wp">
        <div class="breadcomb-icon">
            <i class="icon nalika-folder icon-wrap"></i>
        </div>
        <div class="breadcomb-ctn">
            <h2>Dokumen Tertunda</h2>
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
                        <div class="static-table-list text-light">
                            <div class="main ml-auto">
                                <form action="/tracking/tertunda" method="GET">
                                    <input class="responsive-input" type="text" style="height: 40px; width:95%; background-color: #152036;" name="search" placeholder="Cari Data" value="{{request('search')}}" aria-label="Search"> 
                                    <button class="btn btn-sm btn-warning ml-auto " type="submit" >
                                        <i class="fa fa-search "></i>
                                    </button>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table" style="text-align: center;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Judul Dokumen</th>
                                            <th style="text-align: center;">Deskripsi</th>
                                            <th style="text-align: center;">Status</th>
                                            <th style="text-align: center;">Uploaded By</th>
                                            <th style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($documents as $k => $d)
                                        <tr class="text-center">
                                            <td scope="row">{{ $k + 1 }}</td>
                                            <td scope="row">{{$d -> title}}</td>
                                            <td scope="row">{{$d -> description}}</td>
                                            <td scope="row">
                                                @php
                                                    if($d -> status == 1){
                                                        echo "<p class='btn btn-sm btn-warning'>Butuh Persetujuan</p>";
                                                    }else if($d -> status == 2){
                                                        echo "<p class='btn btn-sm btn-success'>Sudah Disetujui</p>";
                                                    }else if($d->status == 3){
                                                        echo "<p class='btn btn-sm btn-info'>Revisi</p>";
                                                    }else if($d->status == 4){
                                                        echo "<p class='btn btn-sm btn-danger'>Tidak Disetujui</p>";
                                                    }else {
                                                        echo "<p class='btn btn-sm btn-danger'>Status Tidak Valid</p>";
                                                    }
                                                @endphp
                                            </td>
                                            <td scope="row">{{$d -> user -> name}}</td>
                                            <td scope="row">
                                                <div class="btn-group" role="group">
                                                    <a data-toggle="tooltip" data-placement="bottom" title="Unduh Dokumen" href="{!! url('/approval/download') !!}/{{$d->document_id}}" class="btn btn-info btn-sm"><i class="fa fa-download"></i></a>
                                                    <a  data-toggle="tooltip" data-placement="bottom" title="Persetujuan Dokumen" href="{!! url('/tracking/detail') !!}/{{$d->document_id}}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
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
