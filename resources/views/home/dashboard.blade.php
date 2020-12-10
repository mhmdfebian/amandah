@extends('layout/main')

@section('title','Dashboard')

@section('customCss')
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  <link href="{{ asset('css/semi-circle.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('customJs')
  <script src="{{ asset('js/dashboard.js') }}"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
@endsection

@section('sideMenu')
  <li class="nav-item border-left border-sidemenu">
    <a class="ml-4 nav-link active" href="/dashboard/{{ date("Y-m-d") }}"><i class="fa fa-home fa-lg"></i><span class="ml-3">Dashboard</span></a>
  </li>
  <li class="nav-item border-left border-sidemenu-dummy">
    <a class="ml-4 nav-link" href="/sertifikasi"><i class="fa fa-id-card-o "></i><span class="ml-3">Sertifikat</span></a>
  </li>
  <li class="nav-item border-left border-sidemenu-dummy">
    <a class="ml-4 nav-link" href="/pekerja"><i class="fa fa-users"></i><span class="ml-3">Pekerja</span></a>
  </li>

  <div style="position:fixed; bottom: 0; ">
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        @if(session('admin'))
            <a class="ml-4 nav-link" href="#"><i class="fa fa-user-o"></i><span class="ml-3">Admin</span></a>
        @else
            <a class="ml-4 nav-link" href="#"><i class="fa fa-user-o"></i><span class="ml-3">Observer</span></a>
        @endif
      </li>
      <li class="nav-item">
        <a class="ml-4 nav-link" href="/notifikasi"><i class="fa fa-bell-o"></i><span class="ml-3">Notifikasi</span></a>
      </li>
      <li class="nav-item">
        <a class="ml-4 nav-link" href="/logout"><i class="fa fa-sign-out"></i><span class="ml-3">Logout</span></a>
      </li>
    </ul>
  </div>
@endsection

@section('main')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 pb-5 mb-3">
      <p class="h1">Safety Check</p>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div>
          <div class="btn-group">
            <button class="btn" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span style="font-size: 24px"class="mr-2">
              <?php
                  $date = strtotime($tanggal);
                  echo date('l, d F Y', $date);
              ?>
              </span>
              <i class="fa fa-calendar-o fa-2x"></i></button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/dashboard/{{ date("Y-m-d") }}">{{ date("l, d F Y") }}</a>
              <a class="dropdown-item" href="/dashboard/{{ date("Y-m-d",strtotime("-1 days")) }}"> {{date("l, d F Y",strtotime("-1 days"))}}</a>
              <a class="dropdown-item" href="/dashboard/{{ date("Y-m-d",strtotime("-2 days")) }}"> {{date("l, d F Y",strtotime("-2 days"))}}</a>
              <a class="dropdown-item" href="/dashboard/{{ date("Y-m-d",strtotime("-3 days")) }}"> {{date("l, d F Y",strtotime("-3 days"))}}</a>
              <a class="dropdown-item" href="/dashboard/{{ date("Y-m-d",strtotime("-4 days")) }}"> {{date("l, d F Y",strtotime("-4 days"))}}</a>
            </div>
          </div>

        </div>
      </div>
    </div>


    <div class="d-flex flex-row">
      <div class="p-2">
        <figure class="highcharts-figure">
          <div id="container-speed" class="chart-container"></div>
          <div id="container-line" class="chart-container"></div>
        </figure>
      </div>


      <div class="p-2">
        <table class="table" >
          <tbody>
            <tr>
              <th scope="row">{{ date("l, d F",strtotime(", -4 days")) }}</th>
              <td>{{ $countbekerja4 }}/{{ $countkaryawan }}</td>
              <td>{{ $countbekerja4/$countkaryawan*100 }}%</td>
            </tr>
            <tr>
              <th scope="row">{{ date("l, d F",strtotime(", -3 days")) }}</th>
              <td>{{ $countbekerja3 }}/{{ $countkaryawan }}</td>
              <td>{{ $countbekerja3/$countkaryawan*100 }}%</td>
            </tr>
            <tr>
              <th scope="row">{{ date("l, d F",strtotime(", -2 days")) }}</th>
              <td>{{ $countbekerja2 }}/{{ $countkaryawan }}</td>
              <td>{{ $countbekerja2/$countkaryawan*100 }}%</td>
            </tr>
            <tr>
              <th scope="row">{{ date("l, d F",strtotime(", -1 days")) }}</th>
              <td>{{ $countbekerja1 }}/{{ $countkaryawan }}</td>
              <td>{{ $countbekerja1/$countkaryawan*100 }}%</td>
            </tr>
            <tr>
              <th scope="row">{{ date("l, d F") }}</th>
              <td>{{ $countbekerja0 }}/{{ $countkaryawan }}</td>
              <td>{{ $countbekerja0/$countkaryawan*100 }}%</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
      <h2>Daftar Absen</h2>
      @if(session('admin'))
      <div class="btn-toolbar mb-2 mb-md-0">
        <div >
          <a href="/form" class="btn custom-yellow" role="button" aria-pressed="true">Absen Pekerja</a>
        </div>
      </div>
      @endif
    </div>

    @if(session('gagal'))
      <div class="alert alert-danger">
          {{ session('gagal') }}
      </div>
    @endif

    @if(session('berhasil'))
      <div class="alert alert-success">
          {{ session('berhasil') }}
      </div>
    @endif

  <div class="pb-4">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
          <tr>
            <th>Nama</th>
            <th>ID</th>
            <th>Jenis Kelamin</th>
            <th>Divisi</th>
            <th>Status</th>
            <th>Waktu</th>
            <th>Action</th>
          </tr>
      </thead>
      <tbody>
        @foreach($absen as $absen)
        <tr>
            <td>{{ $absen->namadepan }} {{ $absen->namabelakang }}</td>
            <td>{{ $absen->idkaryawan }}</td>
            <td>{{ $absen->jeniskelamin }}</td>
            <td>{{ $absen->divisi }}</td>
            @if ($absen->status === "Bekerja")
                <td style="color:green">{{ $absen->status }}</td>
            @else
                <td style="color:red">{{ $absen->status }}</td>
            @endif
            <td>{{ $absen->waktu }}</td>
            <td>
              <div class="d-flex justify-content-center">
                <a href="/detail-absen/{{ $absen->id }}"> <i style="color: #333; padding-right: 10px;" class="fa fa-info-circle fa-lg black"></i> </a>
                @if(session('admin'))
                    <form action ="{{ action('HomeController@destroyAbsen', $absen->id)}}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn d-inline py-0 pl-3 pr-0"><i class="fa fa-trash fa-lg"></i></button>
                    </form>
                @endif
              </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
  </div>


@endsection


@section('JSON')
    <script>

    var gaugeOptions = {
    chart: {
        type: 'solidgauge'
    },

    title: text="test",

    pane: {
        center: ['50%', '85%'],
        size: '100%',
        startAngle: -90,
        endAngle: 90,
        background: {
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            innerRadius: '60%',
            outerRadius: '100%',
            shape: 'arc'
        }
    },

    exporting: {
        enabled: false
    },

    tooltip: {
        enabled: false

    },

    // the value axis
    yAxis: {
        stops: [
            [0.1, '#F7CA18'], // green
        ],
        lineWidth: 0,
        tickWidth: 0,
        minorTickInterval: null,
        showFirstLabel: false,
        showLastLabel: false,
        tickAmount: 0,
        title: {
            y: -80
        },
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                padding:-50,
                borderWidth: 0,
                useHTML: true
            }
        }
    }
};

// The speed gauge
var chartSpeed = Highcharts.chart('container-speed', Highcharts.merge(gaugeOptions, {
    yAxis: {
        stops: [
            [0.3, '#DF5353'], // green
            [0.5, '#DDDF0D'], // yellow
            [0.7, '#55BF3B'] // red
        ],
        min: 0,
        max: 100,
        title: {
            text: 'Presentase Kehadiran'
        }
    },

    credits: {
        enabled: false
    },

    series: [{
        name: 'Bekerja',
        data: [{{ $persen }}],
        dataLabels: {
            format:
                '<div style="text-align:center">' +
                '<span style="font-size:25px">{y} %</span><br/>' +
                '</div>'
        },
        tooltip: {
        }
    }]

}));


// Per

Highcharts.chart('container-line', {

    title: {
        text: 'Per Minggu'
    },

    credits: {
        enabled: false
    },

    exporting: {
        enabled: false
    },


    yAxis: {
        title: {
            text: 'Jumlah Kehadiran Pekerja'
        }
    },

    xAxis: {
        type: 'datetime'

    },

    plotOptions: {
        series: {
            pointStart: Date.UTC({{ date("Y, m, d",strtotime("-1 month, -5 days")) }}),
            pointInterval: 24 * 3600 * 1000 // one day
        }

    },

    series: [{
        name: 'Pekerja',
        data: [{{ $countbekerja4 }},
               {{ $countbekerja3 }},
               {{ $countbekerja2 }},
               {{ $countbekerja1 }},
               {{ $countbekerja0 }},
              ]
    }]
});

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(){
        $("#idkaryawan").autocomplete({
            source: function( request, response ) {
                console.log(request.term)
                console.log(CSRF_TOKEN)

                $.ajax({
                    url:"{{route('idkaryawan')}}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        cari: request.term
                    },
                    success: function( data ) {
                         response( data );
                    }
                });

            },
            select: function (event, ui) {
                $('#idkaryawan').val(ui.item.label);
                $('#nama').val(ui.item.nama);
                $('#namabelakang').val(ui.item.namabelakang);
                $('#divisi').val(ui.item.divisi);
                $('#jeniskelamin').val(ui.item.jeniskelamin);
                $('#namasertifikat').val(ui.item.namasertifikat);
                $('#tanggalkadaluarsa').val(ui.item.tanggalkadaluarsa);
                console.log("A"+ui.item.label)
                return false;
            }
        });
    });



    </script>
@endsection



