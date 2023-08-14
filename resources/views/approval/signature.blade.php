@extends('layouts.layout')

@section('title')
    Digital Signature|| Sistem Pelacakan Dokumen dengan Tanda Tangan Digital
@endsection

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Signature Pad</title>
    <link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>
</head>
<body>
    <div class="container">
        <h1 id="h1">Digital Signature</h1>
        <div class="signature-container">
            <canvas id="signaturePad" width="500" height="200"></canvas>
            <button id="clearButton">Hapus</button>
        </div>
        <form action="{{ route('simpan_ttd') }}" method="POST" class="button-group">
            @csrf
            <input type="hidden" name="signature_data" id="signatureData">
            <button id="submitButton" type="submit" >Simpan</button>
        </form>
    </div>
    <script>
        var canvas = document.getElementById('signaturePad');
        var signaturePad = new SignaturePad(canvas);

        var clearButton = document.getElementById('clearButton');
        var form = document.querySelector('form');

        clearButton.addEventListener('click', function () {
            signaturePad.clear();
        });

        form.addEventListener('submit', function (event) {
            var signatureData = signaturePad.toDataURL();
            document.getElementById('signatureData').value = signatureData;
        });
    </script>
</body>
</html>

@endsection
     

