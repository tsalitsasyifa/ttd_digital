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
                                        @foreach ($documents as $k => $d)
                                            <tr class="text-center">
                                                <td>{{ $k + 1 }}</td>
                                                <td>{{ $d->title }}</td>
                                                <td>{{ $d->description }}</td>
                                                <td>
                                                    @php
                                                        if ($d->status == 1) {
                                                            echo "<p class='btn btn-sm btn-warning'>Butuh Persetujuan</p>";
                                                        } elseif ($d->status == 2) {
                                                            echo "<p class='btn btn-sm btn-success'>Sudah Disetujui</p>";
                                                        } elseif ($d->status == 3) {
                                                            echo "<p class='btn btn-sm btn-info'>Revisi</p>";
                                                        } elseif ($d->status == 4) {
                                                            echo "<p class='btn btn-sm btn-danger'>Tidak Disetujui</p>";
                                                        } else {
                                                            echo "<p class='btn btn-sm btn-danger'>Status Tidak Valid</p>";
                                                        }
                                                    @endphp
                                                </td>
                                                <td>{{ $d->user->name }}</td>
                                                <td>
                                                    <div class="btn-group d-block" role="group">
                                                        <a data-toggle="tooltip" data-placement="bottom"
                                                            title="Unduh Dokumen"
                                                            href="{!! url('/approval/download') !!}/{{ $d->document_id }}"
                                                            class="btn btn-info btn-sm"><i class="fa fa-download"></i></a>

                                                        <!-- <a  data-toggle="tooltip" data-placement="bottom" title="Approve" href="{!! url('approval/approve') !!}/{{ $d->document_id }}" class="btn btn-success btn-sm"><i class="fa fa-thumbs-up"></i></a> -->
                                                        <!-- <a data-toggle="tooltip" data-placement="bottom" title="Revisi" href="{!! url('/approval/revisi') !!}/{{ $d->document_id }}" class="btn btn-warning btn-sm" onclick="return confirm('Anda yakin akan merevisi proposal ini?')"><i class="fa fa-check"></i></a> -->
                                                        <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                                            data-target="#signatureModal"><i
                                                                class="fa fa-thumbs-up"></i></a>

                                                        <a data-placement="bottom" title="Revisi"
                                                            class="btn btn-warning btn-sm" data-toggle="modal"
                                                            data-target="#modalRevisi{{ $d->document_id }}"><i
                                                                class="fa fa-check"></i></a>

                                                        <a data-toggle="tooltip" data-placement="bottom"
                                                            title="Tidak Disetujui"
                                                            href="{!! url('/approval/tolak') !!}/{{ $d->document_id }}"
                                                            class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Anda yakin akan menolak dokumen ini?')"><i
                                                                class="fa fa-close"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        <!-- Modal for Revisi -->
                                        @foreach ($documents as $d)
                                            <div class="modal fade" id="modalRevisi{{ $d->document_id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modalRevisi{{ $d->document_id }}Label"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title"
                                                                id="modalRevisi{{ $d->document_id }}Label"
                                                                style="color: black;">CATATAN REVISI</h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ url('/approval/revisi') }}/{{ $d->document_id }}"
                                                                method="POST">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="revisi_note"
                                                                        style="color: black;">Revisi:</label>
                                                                    <textarea class="form-control" name="revisi_note" rows="5" required></textarea>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-success">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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



    <div class="modal fade" id="signatureModal" tabindex="-1" role="dialog" aria-labelledby="signatureModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="signatureModalLabel">Signature Pad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="signature-container">
                            <canvas id="signaturePad" width="500" height="200"></canvas>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="clearButton">Hapus Tanda Tangan</button>

                        @if (isset($d))
                            <form action="{!! url('approval/approve') !!}/{{ $d->document_id }}" method="post">
                                @csrf

                                <input type="hidden" name="document_id" id="documentIdInput"
                                    value="{{ session('document_id') }}">
                                <input type="hidden" name="signature_data" id="signature_data">
                                <button type="submit" class="btn btn-primary" data-dismiss="modal"
                                    id="approveButton">Setujui</button>
                            </form>
                        @else
                            <p>Tidak ada data yang tersedia.</p>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>
    <script>
        var canvas = document.getElementById('signaturePad');
        canvas.style.backgroundColor = 'navy';
        var signaturePad = new SignaturePad(canvas, {
        penColor: 'white' // Ubah warna tinta menjadi putih
    });

        var clearButton = document.getElementById('clearButton');
        clearButton.addEventListener('click', function() {
            signaturePad.clear();
        });

        var approveButton = document.getElementById('approveButton');
        approveButton.addEventListener('click', function() {
            var signatureData = signaturePad.toDataURL();
            document.getElementById('signature_data').value = signatureData;

            $('#signatureModal').modal('hide');
        });
    </script>





    @if (session('teruskan') && session('users'))
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
                                @foreach (session('users') as $user)
                                    <option value="{{ $user->user_id }}">{{ $user->name }} || {{ $user->role }}
                                        {{ $user->division->division_name }}</option>
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
