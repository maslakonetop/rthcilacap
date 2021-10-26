@extends('layout.admintemplate')
@section('admin-content')
<div class="container-fluid">
    <h1 class="mt-4">Dashboard Utama</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard RTH Kab. Cilacap</li>
    </ol>
    <div class="card-header">
        <h5 class="text-center text-primary">Data Tabel Ruang Terbuka Hijau Kab. Cilacap</h5>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div id="mapid" style="height: 640px; display:block"></div>
        </div>
        <div class="col-md-6">
            <div id="piechart"></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    </thead>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->nama_taman }}</td>
                            <td>{{ $row->lokasi }}</td>
                            <td>{{ $row->latitude }}</td>
                            <td>{{ $row->longitude }}</td>
                            <td>{{ $row->kecamatan }}</td>
                            <td>{{ $row->luas }}</td>
                            <td><a href="" class="badge bg-info"><i class="fas fa-eye"></i></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links('pagination::bootstrap-4') }}
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

    

    @foreach ($maps as $map)
    var sutomoPopup = '<div class="text-center"><h5 class="text-success mb-1"><small>{{ $map['nama_taman'] }}</small></h5><br/><img src="/img/rth-sutomo/rthsutomo7.png" style="width: 100px; height:100px;" /><br/><br/><a href="/map/{{ $map['id'] }}" class="btn btn-warning text-center">Detail</a></div>';
    var sutomoOptions = {
    'maxWidth': '500',
    'className': 'custom',
    closeButton: false,
    autoClose: false
    }

    L.marker([{{ $map['latitude'] }}, {{ $map['longitude'] }}], {icon: greenIcon}).addTo(mymap).bindPopup(sutomoPopup, sutomoOptions);
    @endforeach
</script>
<script>
    // var total = 69000000;
    var rth = {{ $luas }};

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart(){
        var data = google.visualization.arrayToDataTable([
            ['Nama Data', 'Data'],
            [ 'total', '69000000'], 
            ['Ruang Terbuka Hijau', rth]
        ]);
        var options = {
                title: 'Luas RTH vs Luas Kabupaten',          
                curveType: 'function',
                legend: { position: 'bottom' },
                is3D:true
            };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
    }
</script>
@endsection