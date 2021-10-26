@extends('layout.template')
@section('content')
<h3 class="text-center text-primary">Lokasi Ruang Terbuka Hijau Kab. Cilacap</h3>
<hr>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-auto bg-light">
            <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center">
                <ul class="nav nav-pills nav-flush flex-sm-column align-items-center">

                    <li>
                        <button id="tblmap" class="rounded border-primary mb-3"><i class="bi-map fs-1"></i></button>

                    </li>
                    <li>
                        <button id="tbltabel" class="rounded border-primary mb-3"><i
                                class="bi-table fs-1 border-0"></i></button>

                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm p-3 min-vh-100">
            <!-- content -->
            <div class="row">
                <div class="col">
                    <div id="mapid" style="height: 520px; display:block"></div>
                    <div class="table-responsive" id="tabel" style="display: none">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="bg-info text-center text-light">Id</th>
                                    <th class="bg-info text-center text-light">Nama Taman</th>
                                    <th class="bg-info text-center text-light">Lokasi</th>
                                    <th class="bg-info text-center text-light">Latitude</th>
                                    <th class="bg-info text-center text-light">Longitude</th>
                                    <th class="bg-info text-center text-light">Kecamatan</th>
                                    <th class="bg-info text-center text-light">Luas</th>
                                    <th class="bg-info text-center text-light">Aksi</th>
                                </tr>
                                <tr>
                                    <th class="bg-info text-center text-light">1</th>
                                    <th class="bg-info text-center text-light">2</th>
                                    <th class="bg-info text-center text-light">3</th>
                                    <th class="bg-info text-center text-light">4</th>
                                    <th class="bg-info text-center text-light">5</th>
                                    <th class="bg-info text-center text-light">6</th>
                                    <th class="bg-info text-center text-light">7</th>
                                    <th class="bg-info text-center text-light">8</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($maps as $map)
                                <tr>
                                    <td>{{ $map->id }}</td>
                                    <td>{{ $map->nama_taman }}</td>
                                    <td>{{ $map->lokasi }}</td>
                                    <td>{{ $map->latitude }}</td>
                                    <td>{{ $map->longitude }}</td>
                                    <td>{{ $map->kecamatan }}</td>
                                    <td>{{ $map->luas }}</td>
                                    <td><a href="" class="badge bg-info"><i class="fas fa-eye"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            {{ $maps->links('pagination::bootstrap-4') }}
                        </table>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col">

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $( "#tblmap" ).click(function() {     
   $('#mapid').toggle("slide", { direction: "right" }, 1000);
   $('#tabel').toggle("slide", { direction: "left" }, 1000);

});
$( "#tbltabel" ).click(function() {     
   $('#tabel').toggle("slide", { direction: "right" }, 1000);
   $('#mapid').toggle("slide", { direction: "left" }, 1000);

});
</script>
<script>
    var mymap = L.map('mapid').setView([-7.492276, 109.022849], 10);
    
    L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(mymap);

    var runLayer = omnivore.kml('/raw/kab_cilacap.kml')
    .on('ready', function() {
        map.fitBounds(runLayer.getBounds());
    })
    .addTo(mymap);

    var greenIcon = L.icon({
    iconUrl: '/img/marker/forest.png',

    iconSize:     [38, 41], // size of the icon
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    

    @foreach ($data as $row)
    var sutomoPopup = '<div class="text-center"><h5 class="text-success mb-1"><small>{{ $row['nama_taman'] }}</small></h5><br/><img src="/img/rth-sutomo/rthsutomo7.png" style="width: 100px; height:100px;" /><br/><br/><a href="/map/{{ $row['id'] }}" class="btn btn-warning text-center">Detail</a></div>';
    var sutomoOptions = {
    'maxWidth': '500',
    'className': 'custom',
    closeButton: false,
    autoClose: false
    }

    L.marker([{{ $row['latitude'] }}, {{ $row['longitude'] }}], {icon: greenIcon}).addTo(mymap).bindPopup(sutomoPopup, sutomoOptions);
    @endforeach
</script>
@endsection`