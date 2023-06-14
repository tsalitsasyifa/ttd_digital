@extends('layouts.template')

@section('title')
    Home || Sistem Ekspedisi Digital Bidang Pendapatan I BPKD Kota Pematangsiantar
@endsection

@section('breadcrumb')
    <div class="breadcomb-wp">
        <div class="breadcomb-icon">
            <i class="icon nalika-home icon-wrap"></i>
        </div>
        <div class="breadcomb-ctn">
            <h2> Home </h2>
            <p>Selamat Datang di <span class="bread-ntd">Sistem Tracking Document dengan Digital Signature</span></p>
        </div>
    </div>
@endsection

@section('content')
    <div class="section-admin container-fluid res-mg-t-15">
        <div class="row admin text-center">
            <div class="col-md-12">
                <div class="row">
                    <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="admin-content analysis-progrebar-ctn">
                            <h4 class="text-left text-uppercase"><b>Surat Masuk</b></h4>
                            <div class="row vertical-center-box vertical-center-box-tablet">
                                <div class="col-xs-12 cus-gh-hd-pro">
                                    <h2 class="text-right no-margin"></h2>
                                </div>
                            </div>
                            <div class="progress progress-mini">
                                <div style="width: 100%;" class="progress-bar bg-green"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" style="margin-bottom:1px;">
                        <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                            <h4 class="text-left text-uppercase"><b>Surat Keluar</b></h4>
                            <div class="row vertical-center-box vertical-center-box-tablet">
                                <div class="col-xs-12 cus-gh-hd-pro">
                                    <h2 class="text-right no-margin"></h2>
                                </div>
                            </div>
                            <div class="progress progress-mini">
                                <div style="width: 100%;" class="progress-bar progress-bar-danger bg-red"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                            <h4 class="text-left text-uppercase"><b>Pengguna</b></h4>
                            <div class="row vertical-center-box vertical-center-box-tablet">
                                <div class="col-xs-12 cus-gh-hd-pro">
                                    <h2 class="text-right no-margin"></h2>
                                </div>
                            </div>
                            <div class="progress progress-mini">
                                <div style="width: 100%;" class="progress-bar bg-blue"></div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <div class="author-area-pro mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <div class="widget-head-info-box" style="height: 100%;">
                                <div class="persoanl-widget-hd">
                                    <h1>Sistem Tracking Document</h1>
                                    <p>Bidang Pendapatan I Badan Pengelola Keuangan Daerah Kota Pematangsiantar </p>
                                </div>
                                <img src="{{ url('antarmuka/img/surat.png') }}" class="img-rounded rounded-border m-b-md" alt="profile" >
                            </div>
                        </div>
                </div>
            </div>
        </div>

@endsection
