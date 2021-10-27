@extends('layout.admintemplate')
@section('admin-konten')
<div class="container">
    <h2 class="text-center">{{ $title }}</h2>
    <hr class="style14">
    <form action="/hitung/cari" class="d-inline" method="GET">
        @csrf
        <div class="row">
            <div class="col-4">
                {{-- <select class="livesearch form-control" name="cari"></select> --}}
                <input type="text" name="cari" class="form-control mt-0" placeholder="Cari Kecamatan"
                    value="{{ old('cari') }}">
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-outline-info mt-0"><i class="fas fa-search-location"></i></button>
            </div>
        </div>
    </form>
    <hr class="style8">
    <div class="table-responsive">
        <table class="table table-sm table-hover table-striped table-bordered" style="width: 100%">
            <thead>
                <th scope="col" class="text-center text-light bg-info">ID</th>
                <th scope="col" class="text-center text-light bg-info">Nama Taman</th>
                <th scope="col" class="text-center text-light bg-info">Lokasi</th>
                <th scope="col" class="text-center text-light bg-info">kecamatan</th>
                <th scope="col" class="text-center text-light bg-info" colspan="2">Luas</th>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <td class="text-center text-dark">
                        {{ $row->id }}
                    </td>
                    <td class="text-center text-dark">
                        {{ $row->nama_taman }}
                    </td>
                    <td class="text-center text-dark">
                        {{ $row->lokasi }}
                    </td>
                    <td class="text-center text-dark">
                        {{ $row->kecamatan }}
                    </td>
                    <td class="text-center text-dark">
                        {{ $row->luas }}
                    </td>
                    <td class="text-center text-dark">
                        M<sup>2</sup>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="bg-info text-white">
                <th></th>
                <th>Persentase</th>
                <th colspan="2"></th>
                <th>{{ $persen }}</th>
                <th>%</th>
            </tfoot>
            <tfoot class="bg-info text-white">
                <th></th>
                <th>Total Keseluruhan</th>
                <th colspan="2"></th>
                <th>{{ $luas }}</th>
                <th>M<sup>2</sup></th>
            </tfoot>

        </table>
        Halaman : {{ $data->currentPage() }} <br />
        Jumlah Data : {{ $data->total() }} <br />
        Data Per Halaman : {{ $data->perPage() }} <br />
        <br>
        {{ $data->links('pagination::bootstrap-4') }}
    </div>
</div>
<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Isikan nama kecamatan',
        ajax: {
            url: '/ajax-autocomplete-search',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.nama_kecamatan,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
@endsection