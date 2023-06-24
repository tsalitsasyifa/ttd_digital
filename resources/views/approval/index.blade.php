@extends('layouts.template')

@section('title')
    Persetujuan || Sistem Pelacakan Dokumen dengan Tanda Tangan Digital
@endsection

@section('breadcrumb')
    <div class="breadcomb-wp">
        <div class="breadcomb-icon">
            <i class="icon nalika-thumb-up icon-wrap"></i>
        </div>
        <div class="breadcomb-ctn">
            <h2>Permintaan Persetujuan</h2>
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
                            <table class="table" width="100%" style="text-align: center;">
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
                                                }else {
                                                    echo "<p class='btn btn-sm btn-danger'>Status Tidak Valid</p>";
                                                }
                                            @endphp
                                        </td>
                                        <td scope="row">{{$d -> user -> name}}</td>
                                        <td scope="row">
                                            <div class="btn-group" role="group">
                                                <a data-toggle="tooltip" data-placement="bottom" title="Unduh Dokumen" href="{!! url('/approval/download') !!}/{{$d->document_id}}" class="btn btn-info btn-sm"><i class="fa fa-download"></i></a>
                                                <a  data-toggle="tooltip" data-placement="bottom" title="Persetujuan Dokumen" href="{!! url('/approval/approve') !!}/{{$d->document_id}}" class="btn btn-success btn-sm"><i class="fa fa-thumbs-up"></i></a>
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
    <br>

    @if(session('additional_approval') && session('users'))
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Persetujuan Lainnya</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <p>Apakah Anda membutuhkan persetujuan dokumen dari divisi lain ?</p>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-primary" id="btnYes">Ya</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalLainnya">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Pilih Persetujuan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form method="POST" action="{{ route('approval.newApproval') }}">
                            @csrf
                            <select name="user_id" class="form-control" required autocomplete="user_id" autofocus>
                                <option value="" selected disabled hidden>Pilih Pengguna untuk Persetujuan</option>
                                @foreach(session('users') as $user)
                                    <option value="{{ $user->user_id }}">{{ $user->name }} || {{ $user->role }} {{ $user->division->division_name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="document_id" value="{{ session('document_id') }}">
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                $(document).ready(function() {
                    $('#myModal').modal('show');

                    $('#btnYes').click(function() {
                        $('#myModal').modal('hide');
                        $('#modalLainnya').modal('show');
                    });
                });
            </script>
        @endpush
    @endif

@endsection
