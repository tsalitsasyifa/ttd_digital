@extends('layouts.template')

@section('title')
    Dokumen || Sistem Pelacakan Dokumen dengan Tanda Tangan Digital
@endsection

@section('breadcrumb')
    <div class="breadcomb-wp">
        <div class="breadcomb-icon">
            <i class="icon nalika-new-file icon-wrap"></i>
        </div>
        <div class="breadcomb-ctn">
            <h2> Tambah Dokumen </h2>
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
                                <h1 style="color: white; text-align: center;">Tambahkan Dokumen Baru</h1>
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
                                                <form method="POST" action="#" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                                <label class="login2 pull-left pull-left-pro" style="color: white;">Judul Dokumen</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <input type="text" class="form-control  @error('title') is-invalid @enderror" placeholder="Masukkan Judul Dokumen" style="color: white;" name="title" required autocomplete="title" autofocus>
                                                                @error('title')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                                <label class="login2 pull-left pull-left-pro" style="color: white;">Deskripsi Dokumen</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <textarea id="description" type="text" placeholder="Masukkan Deskripsi Dokumen"  class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus ></textarea>
                                                                @error('description')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                                <label class="login2 pull-left pull-left-pro" style="color: white;">Pilih Persetujuan</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id') }}" required autocomplete="user_id" autofocus>
                                                                    <option value="" selected disabled hidden>Pilih Pengguna untuk Persetujuan</option>
                                                                    @foreach ($users as $u)
                                                                    <option value="{{ $u->user_id }}">{{ $u->name }} || {{ $u->role }} {{ $u->division->division_name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('user_id')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                                <label class="login2 pull-left pull-left-pro" style="color: white;">Upload Dokumen</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <div class="file-upload-inner ts-forms">
                                                                    <div class="input prepend-big-btn">
                                                                        <label class="icon-right" for="prepend-big-btn">
                                                                                <i class="fa fa-download"></i>
                                                                            </label>
                                                                        <div class="file-button">
                                                                            Browse
                                                                            <input type="file" accept=".pdf" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                        </div>
                                                                        <input type="text" id="prepend-big-btn" placeholder="no file selected">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="status" value="1">
                                                    <input type="hidden" name="uploaded_by" value="{{ Auth::user()->user_id }}">
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

