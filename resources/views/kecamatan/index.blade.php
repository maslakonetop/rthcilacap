@extends('layout.admintemplate')

@section('admin-konten')
<div class="container-fluid">
    @if (session()->has('Berhasil'))
    <div class="alert alert-success shadow" role="alert" style="border-left:#155724 5px solid; border-radius: 0px">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" style="color:#155724">&times;</span>
        </button>
        <div class="row">
            <svg width="1.25em" height="1.25em" viewBox="0 0 16 16" class="m-1 bi bi-shield-fill-check"
                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M8 .5c-.662 0-1.77.249-2.813.525a61.11 61.11 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.192 11.192 0 0 0 2.417 2.3c.371.256.715.451 1.007.586.27.124.558.225.796.225s.527-.101.796-.225c.292-.135.636-.33 1.007-.586a11.191 11.191 0 0 0 2.418-2.3c1.611-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61.09 61.09 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5zm2.854 6.354a.5.5 0 0 0-.708-.708L7.5 8.793 6.354 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
            </svg>
            <p style="font-size:18px" class="mb-0 font-weight-light"><b class="mr-1">Sukses!</b>{{ session('Terhapus')
                }}</p>
        </div>
    </div>
    {{-- <div class="alert alert-primary alert-dismissible fade show" role="alert">

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> --}}
    @endif
    <h3 class="mt-4">{{ $title }}</h3>
    <div class="card-body">
        <div class="table-responsive">
            <a href="/kecamatan/create" class="btn btn-sm btn-success mb-3">Data Baru</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="bg-info text-center text-light">Id</th>
                        <th class="bg-info text-center text-light">Nama Kecamatan</th>
                        <th class="bg-info text-center text-light">Aksi</th>
                    </tr>
                </thead>
                </tfoot>
                <tbody>
                    @foreach ($kecamatan as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->nama_kecamatan }}</td>
                        <td>
                            <a href="/kecamatan/{{ $row->id }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                            <a href="/kecamatan/{{ $row->id }}/edit" class="btn btn-warning"><i
                                    class="far fa-edit"></i></a>
                            <form action="/kecamatan/{{ $row->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0"
                                    onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini? Aksi ini tidak bisa dibatalkan')"><i
                                        class="fas fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <script>
                    $(document).ready(function() {
                        $('#dataTable').DataTable();
                    });    
                </script>
            </table>
            {{ $kecamatan->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

@endsection