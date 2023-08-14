@extends('layouts.layout')

@section('title')
    Digital Signature || Sistem Pelacakan Dokumen dengan Tanda Tangan Digital
@endsection

@section('content')
    <div class="hpanel">
        <div class="panel-body">
            <div class="text-center mb-3">
				<img type="image/x-icon" src="{{asset('antarmuka/img/logo/sitrack.png')}}"
                rel="stylesheet" type="text/css" width="100" height="100">
			</div>
            <h2 style="text-align: center;">Detail Digital Signature</h2>
            <hr>
            <form method="GET" action="/linkqr">
                <div class="row">
                    <div class="col-lg-10">
                        <label class="login2 pull-left pull-left-pro" style="color: black;">Judul Dokumen :</label>
                        <p class="login2 pull-left pull-left-pro " style="color: black; padding-left: 10px;">{{ $linkdoc-> title }}</p>
                    </div>
                </div>
                @php
                    $latestApproval = $linkapp->where('document_id', $document_id)->sortByDesc('approval_date')->first();
                @endphp
                @if($latestApproval)
                <div class="row">
                    <div class="col-lg-10">
                        <label class="login2 pull-left pull-left-pro" style="color: black;">Terakhir Disetujui Oleh :</label>
                        <p class="login2 pull-left pull-left-pro" style="color: black; padding-left: 10px;">{{$latestApproval -> user -> name}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10">
                        <label class="login2 pull-left pull-left-pro" style="color: black;">Waktu Persetujuan :</label>
                        <p class="login2 pull-left pull-left-pro" style="color: black; padding-left: 10px;">{{$latestApproval -> approval_date}}</p>
                    </div>
                </div>
                @endif
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline8-list">
                        <div class="static-table-list table-responsive">
                            <table class="table" style="color: white;">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Disetujui Oleh</th>
                                        <th style="text-align: center;">Waktu Disetujui</th>
                                        <th style="text-align: center;">Tanda Tangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($linkapp as $k => $l)
                                    <tr class="text-center">
                                        <td scope="row">{{ $k + 1 }}</td>
                                        <td scope="row">{{$l -> user -> name}}</td>
                                        <td scope="row">{{$l -> approval_date}}</td>
                                        <td scope="row">@if ($l->signature) 
                                            <img src="{{ asset('signatures/' . $l -> signature) }}" alt="Tanda Tangan"rel="stylesheet" type="text/css" width="400" height="400">
                                            @else
                                            Tidak Ada Tanda Tangan
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
            <hr>
            <br>
        </div>
    </div>
@endsection
