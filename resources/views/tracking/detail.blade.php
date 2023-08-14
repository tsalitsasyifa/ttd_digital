@extends('layouts.template')

@section('title')
    Pelacakan || Sistem Pelacakan Dokumen dengan Tanda Tangan Digital
@endsection

@section('breadcrumb')
    <div class="breadcomb-wp">
        <div class="breadcomb-icon">
            <i class="icon nalika-folder icon-wrap"></i>
        </div>
        <div class="breadcomb-ctn">
            <h2>Detail Dokumen</h2>
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
                        <div class="sparkline8">
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                            <label class="login2 pull-left pull-left-pro" style="color: white;">Judul Dokumen :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <p class="login2 pull-left pull-left-pro" style="color: white;">{{ $document-> title }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                            <label class="login2 pull-left pull-left-pro" style="color: white;">Deskripsi Dokumen :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <p class="login2 pull-left pull-left-pro" style="color: white;">{{ $document-> description }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                            <label class="login2 pull-left pull-left-pro" style="color: white;">Status Dokumen :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            @php
                                                if($document -> status == 1){
                                                    echo "<p class='btn btn-sm btn-warning'>Butuh Persetujuan</p>";
                                                }else if($document -> status == 2){
                                                    echo "<p class='btn btn-sm btn-success'>Sudah Disetujui</p>";
                                                }else if($document -> status == 3){
                                                    echo "<p class='btn btn-sm btn-info'>Revisi</p>";
                                                }else if($document -> status == 4){
                                                    echo "<p class='btn btn-sm btn-danger'>Tidak Disetujui</p>";
                                                }else {
                                                    echo "<p class='btn btn-sm btn-danger'>Status Tidak Valid</p>";
                                                }
                                            @endphp
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                            <label class="login2 pull-left pull-left-pro" style="color: white;">Diunggah Oleh :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <p class="login2 pull-left pull-left-pro" style="color: white;">{{ $document-> user -> name }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                            <label class="login2 pull-left pull-left-pro" style="color: white;">Waktu Diunggah :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <p class="login2 pull-left pull-left-pro" style="color: white;">{{ $document-> created_at }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                            <label class="login2 pull-left pull-left-pro" style="color: white;">Terakhir Diubah :</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                            <p class="login2 pull-left pull-left-pro" style="color: white;">{{ $document-> updated_at }}</p>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="main-sparkline8-hd">
                                                <h4 style="color: white; text-align: center;">Riwayat Persetujuan</h4>
                                                <hr style="width: 25%; margin: auto;">

                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="sparkline8-list">
                                                <div class="static-table-list table-responsive">
                                                    <table class="table" style="color: white;">
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center;">No</th>
                                                                <th style="text-align: center;">Status</th>
                                                                <th style="text-align: center;">Disetujui Oleh</th>
                                                                <th style="text-align: center;">Waktu Disetujui</th>
                                                                <th style="text-align: center;">Catatan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($approvals as $k => $p)
                                                            <tr class="text-center">
                                                                <td scope="row">{{ $k + 1 }}</td>
                                                                <td scope="row">
                                                                    @if($p->status_ap == 1)
                                                                        <span class="badge badge-warning">Butuh Persetujuan</span>
                                                                    @elseif($p->status_ap == 2)
                                                                        <span class="badge badge-success">Sudah Disetujui</span>
                                                                    @elseif($p->status_ap == 3)
                                                                        <span class="badge badge-info">Revisi</span>
                                                                    @elseif($p->status_ap == 4)
                                                                        <span class="badge badge-danger">Tidak Disetujui</span>
                                                                    @else
                                                                        <span class="badge badge-secondary">Status Tidak Valid</span>
                                                                    @endif
                                                                </td>
                                                                <td scope="row">{{$p -> user -> name}}</td>
                                                                <td scope="row">{{$p -> approval_date}}</td>
                                                                <td scope="row">{{$p -> revisi_note}}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
@endsection
