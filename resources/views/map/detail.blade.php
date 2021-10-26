@extends('layout.template')

@section('content')
<div class="container-fluid">
    <h3 class="text-center">Detail Ruang Terbuka Hijau {{ $maps->nama_taman }}</h3>
    <hr class="style2">
    <div class="row">
        <div class="col-lg-7">
            <div id="mapid" style="height: 520px"></div>
        </div>
        <div class="col-lg-5 border border-success rounded-3">
            <section class="base">
                <h5 class="text-center fw-bold">Data Ruang Terbuka Hijau</h5>
                <div class="form-group row">
                    <label for="nama_rth" class="col-sm-4 col-form-label">Nama RTH</label>
                    <label for="nama_rth" class="col-sm-8 col-form-label fw-bolder">{{ $maps->nama_taman }}</label>
                </div>
                <div class="form-group row">
                    <label for="nama_rth" class="col-sm-4 col-form-label">Jenis RTH</label>
                    <label for="nama_rth" class="col-sm-8 col-form-label fw-bolder">{{ $maps->jenis_rth }}</label>
                </div>
                <div class="form-group row">
                    <label for="nama_rth" class="col-sm-4 col-form-label">Lokasi</label>
                    <label for="nama_rth" class="col-sm-8 col-form-label fw-bolder">{{ $maps->lokasi }}</label>
                </div>
                <div class="form-group row">
                    <label for="nama_rth" class="col-sm-4 col-form-label">Kecamatan</label>
                    <label for="nama_rth" class="col-sm-8 col-form-label fw-bolder">{{ $maps->kecamatan }}</label>
                </div>
                <div class="form-group row">
                    <label for="nama_rth" class="col-sm-4 col-form-label">Luas</label>
                    <label for="nama_rth" class="col-sm-8 col-form-label fw-bolder">{{ $maps->luas }} m2</label>
                </div>
                <div class="form-group row">
                    <a href="/map" class="btn btn-outline-info">Kembali</a>
                </div>
            </section>
        </div>
        <hr class="style2">
    </div>
</div>

<script>
    var mymap = L.map('mapid').setView([{{ $maps->latitude }}, {{ $maps->longitude }}],18);
    
    L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(mymap);

    var runLayer = omnivore.kml('/raw/{{ $maps->file_kml }}')
    .on('ready', function() {
        map.fitBounds(runLayer.getBounds());
    })
    .addTo(mymap);

    var greenIcon = L.icon({
    iconUrl: '/img/marker/forest.png',
    iconSize:     [38, 41], // size of the icon
    });
    L.marker([{{ $maps->latitude }}, {{ $maps->longitude }}], {icon: greenIcon}).addTo(mymap);
</script>
@endsection