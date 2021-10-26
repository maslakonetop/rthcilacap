@extends('layout.admintemplate')
@section('admin-konten')

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            @if (session()->has('Berhasil'))
                            <div class="alert alert-success shadow" role="alert"
                                style="border-left:#155724 5px solid; border-radius: 0px">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" style="color:#155724">&times;</span>
                                </button>
                                <div class="row">
                                    <svg width="1.25em" height="1.25em" viewBox="0 0 16 16"
                                        class="m-1 bi bi-shield-fill-check" fill="currentColor"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 .5c-.662 0-1.77.249-2.813.525a61.11 61.11 0 0 0-2.772.815 1.454 1.454 0 0 0-1.003 1.184c-.573 4.197.756 7.307 2.368 9.365a11.192 11.192 0 0 0 2.417 2.3c.371.256.715.451 1.007.586.27.124.558.225.796.225s.527-.101.796-.225c.292-.135.636-.33 1.007-.586a11.191 11.191 0 0 0 2.418-2.3c1.611-2.058 2.94-5.168 2.367-9.365a1.454 1.454 0 0 0-1.003-1.184 61.09 61.09 0 0 0-2.772-.815C9.77.749 8.663.5 8 .5zm2.854 6.354a.5.5 0 0 0-.708-.708L7.5 8.793 6.354 7.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                    </svg>
                                    <p style="font-size:18px" class="mb-0 font-weight-light"><b
                                            class="mr-1">Sukses!</b>{{ session('Berhasil') }}</p>
                                </div>
                            </div>
                            {{-- <div class="alert alert-primary alert-dismissible fade show" role="alert">

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div> --}}
                            @endif

                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Buat Akun</h3>
                                </div>
                                <div class="card-body">
                                    <form action="/user" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Nama Lengkap</label>
                                                    <input class="form-control py-4 @error('name') is-invalid @enderror"
                                                        id="inputFirstName" type="text" placeholder="Masukan Nama Awal"
                                                        name="name" value="{{ old('name') }}" required />
                                                    @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Nama User</label>
                                                    <input
                                                        class="form-control py-4 @error('username') is-invalid @enderror"
                                                        id="inputFirstName" type="text" placeholder="Masukan Nama User"
                                                        name="username" value="{{ old('username') }}" required />
                                                    @error('username')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4 @error('email') is-invalid @enderror"
                                                id="inputEmailAddress" type="email" aria-describedby="emailHelp"
                                                placeholder="email@email.com" name="email" value="{{ old('email') }}"
                                                required />
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Kata Sandi</label>
                                                    <input
                                                        class="form-control py-4 @error('password') is-invalid @enderror"
                                                        id="inputPassword" type="password"
                                                        placeholder="Masukan Kata Sandi" name="password" required />
                                                    @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputConfirmPassword">Konfirmasi Kata
                                                        Sandi</label>
                                                    <input
                                                        class="form-control py-4 @error('confirmpassword') is-invalid @enderror"
                                                        id="inputConfirmPassword" type="password"
                                                        placeholder="Konfirmasi Kata Sandi" name="confirmpassword"
                                                        required />
                                                    @error('confirmpassword')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4 mb-0">
                                            <button type="submit"
                                                class="btn btn-lg w-100 btn-outline-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
@endsection