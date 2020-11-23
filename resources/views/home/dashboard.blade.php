@extends('layout/main')

@section('title','Dashboard')

@section('customCss')
  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
  <link href="{{ asset('css/semi-circle.css') }}" rel="stylesheet">

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


@section('mainSidebar')
  <li class="nav-item">
    <a class="nav-link active" href="/">
      <span data-feather="home"></span>
      Dashboard
      {{-- <span class="sr-only">(current)</span> --}}
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/sertifikasi">
      <span data-feather="file"></span>
      Sertifikasi
    </a>
  </li>
@endsection
@section('footerSidebar')
  <li class="nav-item">
    <a class="nav-link" href="/">
      <span data-feather="home"></span>
      Profile
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="/">
      <span data-feather="file"></span>
      Notifikasi
    </a>
  </li>
  <li class="nav-item">
      <a class="nav-link " href="/">
        <span data-feather="file"></span>
        Logout
      </a>
  </li>
@endsection

@section('main')
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Safety Check</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div >
          <h2>{{date("d F Y")}}</h2>
        </div>
      </div>
    </div>

    {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
     --}}


    <div class="my-4 w-100" style="background: ">
        <div id="container-speed"></div>
        <div id="container-line"></div>
        <table class="table">
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
                <td>{{ $countbekerja }}/{{ $countkaryawan }}</td>
                <td>{{ $countbekerja/$countkaryawan*100 }}%</td>
              </tr>

            </tbody>
          </table>
    </div>


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
      <h2>Daftar Absen</h2>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div >
          <a href="/form" class="btn btn-primary" role="button" aria-pressed="true">Absen Pekerja</a>
        </div>

      </div>
    </div>

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
            <th>Edit</th>
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
            <td>Edit Delete</td>
        </tr>
        @endforeach
        </tbody>
    </table>
  </div>



    {{-- <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Nama</th>
            <th>ID</th>
            <th>Jenis Kelamin</th>
            <th>Divisi</th>
            <th>Status</th>
            <th>Waktu</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
            @foreach($absen as $absen)
            <tr>
                <td>{{ $absen->namadepan }} {{ $absen->namabelakang }}</td>
                <td>{{ $absen->idkaryawan }}</td>
                <td>{{ $absen->jeniskelamin }}</td>
                <td>{{ $absen->divisi }}</td>
                <td>{{ $absen->status }}</td>
                <td>{{ $absen->waktu }}</td>
                <td>Edit Delete</td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div> --}}


  </main>
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
        size: '140%',
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
            [0.1, '#03fc66'], // green
        ],
        lineWidth: 0,
        tickWidth: 0,
        minorTickInterval: null,
        showFirstLabel: false,
        showLastLabel: false,
        tickAmount: 0,
        title: {
            y: -150
        },
        labels: {
            y: 16
        }
    },

    plotOptions: {
        solidgauge: {
            dataLabels: {
                padding:-75,
                borderWidth: 0,
                useHTML: true
            }
        }
    }
};

// The speed gauge
var chartSpeed = Highcharts.chart('container-speed', Highcharts.merge(gaugeOptions, {
    yAxis: {
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
            text: 'Number of Employees'
        }
    },

    xAxis: {
        type: 'datetime'


    },

    plotOptions: {
        series: {
            pointStart: Date.UTC({{ date("Y, m, d",strtotime("-1 month, -4 days")) }}),
            pointInterval: 24 * 3600 * 1000 // one day
        }
    },

    series: [{
        data: [{{ $countbekerja4 }},
               {{ $countbekerja3 }},
               {{ $countbekerja2 }},
               {{ $countbekerja1 }},
               {{ $countbekerja }},
              ]
    }]
});


    </script>
@endsection



