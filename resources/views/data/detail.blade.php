@extends('layout.admintemplate')
@section('admin-konten')
<style type="text/css">
    * {
        font-family: "Trebuchet MS";
    }

    h2 {
        text-transform: uppercase;
        color: salmon;
    }

    button {
        background-color: salmon;
        color: #fff;
        padding: 10px;
        text-decoration: none;
        font-size: 12px;
        border: 0px;
        margin-top: 20px;
    }

    label,
    textarea {
        float: left;
        text-align: left;
        width: 100%;
    }

    textarea {
        padding: 10px;
        line-height: 1.5;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-shadow: 1px 1px 1px #999;
    }

    input {
        padding: 6px;
        width: 100%;
        box-sizing: border-box;
        background: #f8f8f8;
        border: 2px solid #ccc;
        outline-color: salmon;
    }

    select {
        padding: 6px;
        width: 100%;
        box-sizing: border-box;
        background: #f8f8f8;
        border: 2px solid #ccc;
        outline-color: salmon;
    }

    /* div {
        width: 100%;
        height: auto;
    } */

    .base {
        width: 90%;
        height: auto;
        padding: 20px;
        margin-left: auto;
        margin-right: auto;
        background: #dcf0bd;
        margin-top: 15px;
    }

    .blink {
        animation: blinker 0.6s linear infinite;
        color: #8B0000;
        font-size: 10px;
        font-weight: bold;
        font-family: sans-serif;
    }

    @keyframes blinker {
        50% {
            opacity: 0;
        }
    }

    .blink-one {
        animation: blinker-one 1s linear infinite;
    }

    @keyframes blinker-one {
        0% {
            opacity: 0;
        }
    }

    .blink-two {
        animation: blinker-two 1.4s linear infinite;
    }

    @keyframes blinker-two {
        100% {
            opacity: 0;
        }
    }

    /* .dropbtn {
        background-color: grey;
        color: grey;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }


    /* Dropdown Content (Hidden by Default) */
    /* .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    } */

    /* Links inside the dropdown */
    /* .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    } */

    /* Change color of dropdown links on hover */
    /* .dropdown-content a:hover {
        background-color: #ddd;
    } */

    /* Show the dropdown menu on hover */
    /* .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    /* .dropdown:hover .dropbtn {
        background-color: #3e8e41;
    } */
</style>
<div class="container-fluid">
    <h2 class="text-center">{{ $title }} Id No {{ $data->nama_taman }}</h2>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group row">
                <label for="jenis_rth" class="col-sm-6 col-form-label">Jenis RTH</label>
                <div class="col-sm-6">
                    <input type="text" name="jenis_rth" id="jenis_rth" class="form-control"
                        value="{{ $data->jenis_rth }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama_taman" class="col-sm-6 col-form-label">Nama Taman</label>
                <div class="col-sm-6">
                    <input type="text" name="nama_taman" id="nama_taman" class="form-control"
                        value="{{ $data->nama_taman }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="lokasi" class="col-sm-6 col-form-label">Lokasi</label>
                <div class="col-sm-6">
                    <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{ $data->lokasi }}"
                        readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="latitude" class="col-sm-6 col-form-label">Latitude</label>
                <div class="col-sm-6">
                    <input type="text" name="latitude" id="latitude" class="form-control" value="{{ $data->latitude }}"
                        readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="longitude" class="col-sm-6 col-form-label">Longitude</label>
                <div class="col-sm-6">
                    <input type="text" name="longitude" id="longitude" class="form-control"
                        value="{{ $data->longitude }}" readonly>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group row">
                <label for="kecamatan" class="col-sm-6 col-form-label">Kecamatan</label>
                <div class="col-sm-6">
                    <input type="text" name="kecamatan" id="kecamatan" class="form-control"
                        value="{{ $data->kecamatan }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="luas" class="col-sm-6 col-form-label">Luas</label>
                <div class="col-sm-6">
                    <input type="text" name="luas" id="luas" class="form-control" value="{{ $data->luas }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="status_lahan" class="col-sm-6 col-form-label">Status Lahan</label>
                <div class="col-sm-6">
                    <input type="text" name="status_lahan" id="status_lahan" class="form-control"
                        value="{{ $data->status_lahan }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="keterangan" class="col-sm-6 col-form-label">Keterangan</label>
                <div class="col-sm-6">
                    <input type="text" name="keterangan" id="keterangan" class="form-control"
                        value="{{ $data->keterangan }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <a href="/data" class="btn btn-outline-success"><i class="far fa-hand-point-left"></i> Kembali</a>
                <a href="/data/{{ $data->id }}/edit" class="btn btn-outline-warning ms-3"><i
                        class="fas fa-pen-square"></i>
                    Edit</a>

            </div>
        </div>
    </div>
    @endsection