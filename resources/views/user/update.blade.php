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
            <h2> Ubah Pengguna </h2>
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
                                <h1 style="color: white; text-align: center;">Ubah Data Pengguna</h1>
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
                                                <form action="{{route('user.update',$users -> user_id)}}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
                                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                                <label class="login2 pull-left pull-left-pro" style="color: white;">Nama Pengguna</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <input type="text" class="form-control  @error('name') is-invalid @enderror" placeholder="Masukkan Nama Pengguna" style="color: white;" name="name" required autocomplete="name" value="{{$users->name}}" autofocus>
                                                                @error('name')
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
                                                                <label class="login2 pull-left pull-left-pro" style="color: white;">Username</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <input type="text" class="form-control  @error('username') is-invalid @enderror" placeholder="Masukkan Username" style="color: white;" name="username" required autocomplete="username" autofocus value="{{$users->username}}">
                                                                @error('username')
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
                                                                <label class="login2 pull-left pull-left-pro" style="color: white;">Email</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <input type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Masukkan Email" style="color: white;" name="email" required autocomplete="email" autofocus value="{{$users->email}}">
                                                                @error('email')
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
                                                                <label class="login2 pull-left pull-left-pro" style="color: white;">Password</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Masukkan Password" style="color: white;" name="password" required autocomplete="password" autofocus>
                                                                @error('password')
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
                                                                <label class="login2 pull-left pull-left-pro" style="color: white;">Pilih Jabatan</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <select name="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role') }}" required autocomplete="role" autofocus>
                                                                    <option value="" selected disabled hidden>Pilih Jabatan Pengguna</option>
                                                                    <option value="Admin" <?php if ($users->role ==  "Admin" ) echo "selected"; ?>>
                                                                        Admin Divisi
                                                                    </option>
                                                                    <option value="VP" <?php if ($users->role ==  "VP" ) echo "selected"; ?>>
                                                                        Vice President
                                                                    </option>
                                                                </select>
                                                                @error('role')
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
                                                                <label class="login2 pull-left pull-left-pro" style="color: white;">Pilih Divisi</label>
                                                            </div>
                                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                <select name="division_id" class="form-control @error('division_id') is-invalid @enderror" value="{{ old('division_id') }}" required autocomplete="division_id" autofocus>
                                                                    <option value="" selected disabled hidden>Pilih Divisi Pengguna</option>
                                                                    @foreach ($divisions as $d)
                                                                    <option value="{{ $d -> division_id }}" <?php if ($users->division_id ==  $d -> division_id ) echo "selected"; ?>>
                                                                        {{ $d -> division_name}}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('division_id')
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

