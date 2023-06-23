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
            <h2> Tambah Divisi </h2>
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
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1 style="color: white; text-align: center;">Ubah Data Divisi</h1>
                                <hr style="width: 25%; margin: auto;">
                                <br><br>
                            </div>
                        </div>
                        <div class="sparkline8">
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="{{route('division.update',$divisions -> division_id)}}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                                <label class="login2 pull-left pull-left-pro" style="color: white;">Nama Divisi</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <input type="text" class="form-control  @error('division_name') is-invalid @enderror" placeholder="Masukkan Judul Dokumen" style="color: white;" name="division_name" required autocomplete="division_name" autofocus value="{{ $divisions -> division_name }}">
                                                                @error('division_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                                            <button class="btn btn-success btn-block ">Tambah</button>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                                                    </div>
                                                </form>
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

