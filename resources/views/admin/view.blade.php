@extends('layout.admintemplate')
@section('admin-konten')
<div class="card-header">
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
            <p style="font-size:18px" class="mb-0 font-weight-light"><b class="mr-1">Sukses!</b>{{ session('Berhasil')
                }}</p>
        </div>
    </div>
    {{-- <div class="alert alert-primary alert-dismissible fade show" role="alert">

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> --}}
    @endif
    <h5 class="text-center text-primary">Data Pengguna Aplikasi Database RTH Kab. Cilacap</h5>
    <a href="/user/create" class="btn btn-info btn-sm">Register Pengguna Baru</a>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nama Penguna</th>
                    <th>email</th>
                    <th>Grup Admin</th>
                    <th>Di buat pada</th>
                    <th>Di perbaharui pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row['name'] }}</td>
                    <td>{{ $row['username'] }}</td>
                    <td>{{ $row['email'] }}</td>
                    <td>{{ $row['is_admin'] }}</td>
                    <td>{{ $row['created_at'] }}</td>
                    <td>{{ $row['updated_at'] }}</td>
                    <td>
                        <form action="{{ route('user.edit', $row['id']) }}" method="get">
                            {{-- @method('put') --}}
                            @csrf
                            <button class="btn btn-warning border-0"><i class="fas fa-user-edit"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('user.destroy', $row['id']) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0"
                                onclick="return confirm('Yakin akan menghapus data ini?')"><i
                                    class="fas fa-user-times"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $user->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection