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
    <h2 class="text-center">{{ $title }} Id No {{ $data+1 }}</h2>
    <form action="/data" method="post" enctype="multipart/form-data" class="row g-3">
        @csrf
        {{-- <section class="base rounded-5">
            <h3 class="text-center text-primary">Entri Data Baru Ruang Terbuka Hijau</h3>
            <hr style="border-top: 4px double #8c8b8b; margin-top: 10px">
            <div class="row">
                <div class="col-lg-6 mt-3">
                    <div class="form-group row">
                        <label for="id" class="col-sm-4 col-form-label">ID Ruang Terbuka Hijau</label>
                        <div class="col-sm-3">
                            <input type="text" name="id" id="id" class="form-control" value="{{ $data+1 }}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_taman" class="col-sm-4 col-form-label">Nama Taman RTH</label>
                        <div class="col-sm-8">
                            <input type="text" name="nama_taman" id="nama_taman"
                                class="form-control @error('nama_taman') is-invalid @enderror" focusable required>
                        </div>
                        <div class="invalid-feedback">
                            @error('nama_taman')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="latitude" class="col-sm-4 col-form-label">Latitude</label>
                        <div class="col-sm-8">
                            <input type="text" name="latitude" id="latitude"
                                class="form-control @error('lattitude') is-invalid @enderror" required>
                        </div>
                        <div class="invalid-feedback">
                            @error('lattitude')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kecamatan" class="col-sm-4 col-form-label">Kecamatan</label>
                        <div class="col-sm-8">
                            <select name="kecamatan" id="kecamatan"
                                class="form-select @error('kecamatan') is-invalid @enderror" required>
                                <option selected>--Pilih Kecamatan--</option>
                                @foreach ($kecamatans as $k)
                                <option value="{{ $k->id }}">{{ $k->nama_kecamatan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="invalid-feedback">
                            @error('kecamatan')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status_lahan" class="col-sm-4 col-form-label">Status Lahan</label>
                        <div class="col-sm-8">
                            <select name="status_lahan" id="status_lahan"
                                class="form-select @error('status_lahan') is-invalid @enderror" required>
                                <option selected>--Pilih Status Lahan--</option>
                                @foreach ($status as $s)
                                <option value="{{ $s->id }}">{{ $s->pemilik_lahan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="invalid-feedback">
                            @error('status_lahan')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kml" class="col-sm-4 col-form-label">Upload File KML</label>
                        <div class="col-sm-8">
                            <div class="mb-3">
                                <input class="form-control @error('file_kml') is-invalid @enderror" type="file"
                                    id="formFile" name="file_kml">
                            </div>
                            <div class="invalid-feedback">
                                @error('file_kml')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-3">
                    <div class="form-group row">
                        <label for="nama_rth" class="col-sm-4 col-form-label">Jenis RTH</label>
                        <div class="col-sm-8">
                            <select class="form-select @error('jenis_rth') is-invalid @enderror" name="jenis_rth"
                                id="jenis_rth" required>
                                <option selected>--Pilih Jenis RTH--</option>
                                @foreach ($jenis as $j)
                                <option value="{{ $j->id }}">{{ $j->jenis_rth }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="invalid-feedback">
                            @error('jenis_rth')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lokasi" class="col-sm-4 col-form-label">Lokasi</label>
                        <div class="col-sm-8">
                            <input type="text" name="lokasi" id="lokasi"
                                class="form-control @error('lokasi') is-invalid @enderror" required>
                        </div>
                        <div class="invalid-feedback">
                            @error('lokasi')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="longitude" class="col-sm-4 col-form-label">Longitude</label>
                        <div class="col-sm-8">
                            <input type="text" name="longitude" id="longitude"
                                class="form-control @error('longitude') is-invalid @enderror" required>
                        </div>
                        <div class="invalid-feedback">
                            @error('longitude')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="luas" class="col-sm-4 col-form-label">Luas</label>
                        <div class="col-sm-5">
                            <input type="number" name="luas" id="luas"
                                class="form-control @error('luas') is-invalid @enderror" required>
                        </div>
                        <div class="invalid-feedback">
                            @error('luas')
                            {{ $message }}
                            @enderror
                        </div>
                        <label for="satuan" class="col-sm-3 col-form-label">m2</label>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-4 col-form-label">Status Lahan</label>
                        <div class="col-sm-8">
                            <select name="keterangan" id="keterangan"
                                class="form-select @error('keterangan') is-invalid @enderror">
                                <option selected>--Pilih Keterangan Lahan--</option>
                                <option value="HPG">HPG</option>
                                <option value="HPL">HPL</option>
                            </select>
                        </div>
                        <div class="invalid-feedback">
                            @error('keterangan')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group roq">
                        <button type="submit" class="btn btn-outline-success text-dark"><i class="far fa-save"></i>
                            Simpan</button>
                    </div>
                </div>
            </div>
        </section> --}}
        <div class="col-md-6">
            <label for="jenis_rth" class="form-label">Jenis Lahan</label>
            <select id="jenis_rth" class="form-select @error('jenis_rth') is-invalid @enderror" name="jenis_rth"
                value="{{ old('jenis_rth') }}">
                <option class="disable-selected">--Pilih Jenis RTH--</option>
                @foreach ($jenis as $j)
                <option value="{{ $j->jenis_rth }}">{{ $j->jenis_rth }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('jenis_rth')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <label for="nama_taman" class="form-label">Nama Taman</label>
            <input type="text" class="form-control @error('nama_taman') is-invalid @enderror" name="nama_taman"
                id="nama_taman" placeholder="Masukkan Nama Taman" value="{{ old('nama_taman') }}" autofocus>
            <div class="invalid-feedback">
                @error('nama_taman')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-6">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi"
                placeholder="Lokasi RTH" value="{{ old('lokasi') }}">
            <div class="invalid-feedback">
                @error('lokasi')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-6">
            <label for="latitude" class="form-label">Lattitude</label>
            <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude"
                id="latitude" placeholder="Masukan Koordinat latitude" value="{{ old('latitude') }}">
            <div class="invalid-feedback">
                @error('latitude')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude"
                id="longitude" placeholder="Masukkan Koordinat Longitude" value="{{ old('longitude') }}">
            <div class="invalid-feedback">
                @error('longitude')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <select name="kecamatan" id="kecamatan" class="form-select @error('kecamatan') is-invalid @enderror"
                value="{{ old('kecamatan') }}">
                <option selected>--Pilih Kecamatan--</option>
                @foreach ($kecamatans as $kecamatan)
                <option value="{{ $kecamatan->nama_kecamatan }}">{{ $kecamatan->nama_kecamatan }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('kecamatan')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label for="luas" class="form-label">Luas</label>
            <input type="number" class="form-control @error('luas') is-invalid @enderror" name="luas" id="luas"
                placeholder="Masukkan nilai luas dalam format m2" value="{{ old('luas') }}">
            <div class="invalid-feedback">
                @error('luas')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <label for="luas" class="form-label mt-5">M2</label>
        </div>
        <div class="col-md-6">
            <label for="status_lahan" class="form-label">Status Lahan</label>
            <select name="status_lahan" id="status_lahan"
                class="form-select @error('status_lahan') is-invalid @enderror" value="{{ old('status_lahan') }}">
                <option value="disable-selected">--Pilih Status Lahan--</option>
                @foreach ($status as $s)
                <option value="{{ $s->pemilik_lahan }}">{{ $s->pemilik_lahan }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                @error('status_lahan')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <label for="keterangan" class="form-label">Keterangan</label>
            <select name="keterangan" id="keterangan" class="form-select @error('keterangan') is-invalid @enderror"
                value="{{ old('keterangan') }}">
                <option value="disable-selected">--Pilih Keteangan Lahan--</option>
                <option value="HPL">HPL</option>
                <option value="HPG">HPG</option>
            </select>
            <div class="invalid-feedback">
                @error('keterangan')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <label for="file_kml" class="form-label">Upload File KML</label>
            <input class="form-control" type="file" name="file_kml" id="file_kml">
            <div class="invalid-feedback">
                @error('file_kml')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
        </div>
    </form>
</div>

@endsection