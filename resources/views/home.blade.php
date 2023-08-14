@extends('layouts.template')

@section('title')
    Home || Sistem Pelacakan Dokumen dengan Tanda Tangan Digital
@endsection

@section('breadcrumb')
    <div class="breadcomb-wp">
        <div class="breadcomb-icon">
            <i class="icon nalika-home icon-wrap"></i>
        </div>
        <div class="breadcomb-ctn">
            <h2> Home </h2>
            <p>Selamat Datang di <span class="bread-ntd">Sistem Pelacakan Dokumen dengan Tanda Tangan Digital</span></p>
        </div>
    </div>
@endsection

@section('content')
    <div class="author-area-pro mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col justify-content-center ">
                            <div class="card ">
                                <div class="text-white" style=" background-color: #b3d4fc;">
                                    {!! $dashboardChart->container() !!}
                                </div>
                            </div>
                        </div>

                            <div class="widget-head-info-box" style="height: 100%;">
                                <div class="persoanl-widget-hd">
                                    <h1>Sistem Pelacakan Dokumen</h1>
                                </div>
                                <img src="{{ url('antarmuka/img/surat.png') }}" class="img-rounded rounded-border m-b-md" alt="profile" >
                            </div>
                        </div>
                </div>
            </div>
        </div>

    <script src="{{ $dashboardChart->cdn() }}"></script>

    {{ $dashboardChart->script() }}
@endsection