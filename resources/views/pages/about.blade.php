@extends('layout.templatedocument')

@section('konten-dokumen')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h4>Tentang Aplikasi RTH-Cilacap v.1.0.0</h4>
            <p><strong>Spesifikasi Teknis</strong>
                <ol>
                    <li>
                        Menggunakan Front End HTML5, CSS 3
                    </li>
                    <li>
                        Menggunakan framework Front End <a href="https://getbootstrap.com/" target="_blank"
                            class="text-info">Bootstrap v5
                        </a>
                    </li>
                    <li>
                        Framework <a href="https://laravel.com" target="_blank" class="text-info">Laravel 8</a>
                    </li>
                    <li>
                        Map <a href="https://leafletjs.com/" target="_blank" class="text-info">LeafletJS</a>
                    </li>
                    <li>
                        Database <a href="https://www.mysql.com/" target="_blank" class="text-info">MariaDB MySQLi</a>
                    </li>
                </ol>
            </p>
            <p><strong>Tim Pengembang</strong>
                <ol>
                    <li>
                        Tim programer: <a href="https://www.facebook.com/gesang.multimedia/" target="_blank"
                            rel="noopener noreferrer" class="text-info">CV. Gesang Advertising</a>
                    </li>
                    <li>
                        Website pengembang: <a href="https://www.gesangmultimedia.co.id" target="_blank"
                            rel="noopener noreferrer" class="text-info">Gesang Multimedia</a>
                    </li>
                    <li>
                        Repository <a href="https://github.com/maslakonetop/rth-cilacap" target="_blank"
                            rel="noopener noreferrer" class="text-info"><i class="bi bi-github"></i></a>
                    </li>
                </ol>

            </p>
        </div>
    </div>
</div>
@endsection