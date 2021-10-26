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
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                {{ session('Berhasil') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif

                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Form Lupa Password {{ $user->name }}
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                                        @method('put')
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Nama Awal</label>
                                                    <input class="form-control py-4 @error('name') is-invalid @enderror"
                                                        id="inputFirstName" type="text" placeholder="Masukan Nama Awal"
                                                        name="name" value="{{ old('name', $user->name) }}" required
                                                        readonly />
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
                                                        name="username" value="{{ old('username', $user->username) }}"
                                                        required readonly />
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
                                                placeholder="email@email.com" name="email"
                                                value="{{ old('email', $user->email) }}" required readonly />
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
                                                        placeholder="Masukan Kata Sandi Baru" name="password"
                                                        required />
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