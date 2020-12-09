@extends('layout/main')

@section('title','Sertifikat')

@section('customCss')
  <link href="{{ asset('css/sertifikasi.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('customJs')
  <script src="{{ asset('js/sertifikasi.js') }}"></script>
@endsection

@section('sideMenu')
  <li class="nav-item border-left border-sidemenu-dummy">
    <a class="ml-4 nav-link" href="/dashboard/{{ date("Y-m-d") }}"><i class="fa fa-home fa-lg"></i><span class="ml-3">Dashboard</span></a>
  </li>
  <li class="nav-item border-left border-sidemenu">
    <a class="ml-4 nav-link active" href="/sertifikasi"><i class="fa fa-id-card-o "></i><span class="ml-3">Sertifikat</span></a>
  </li>
  <li class="nav-item border-left border-sidemenu-dummy">
    <a class="ml-4 nav-link" href="/pekerja"><i class="fa fa-users"></i><span class="ml-3">Pekerja</span></a>
  </li>

  <div style="position:fixed; bottom: 0; ">
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        @if(session('admin'))
        <a class="ml-4 nav-link" href="#"><i class="fa fa-user-o"></i><span class="ml-3">Admin</span></a>
        @endif
        @if(session('observer'))
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

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-5 mb-3">
      <p class="h1">Sertifikat</p>
      @if(session('admin'))
      <div class="btn-toolbar mb-2 mb-md-0">
        <div >
          <a href="/tambah-sertifikat" class="btn custom-yellow" role="button" aria-pressed="true">Tambah Sertifikat</a>
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
      <table id="example" class="table table-striped table-bordered yajra-datatable" style="width:100%">
        <thead>
            <tr>
              <th>Nama</th>
              <th>ID</th>
              <th>Divisi</th>
              <th>Nama Sertifikat</th>
              <th>Tanggal Kadaluarsa</th>
              <th>Status Sertifikat</th>
              @if(session('admin'))
                  <th>Action</th>
              @endif
            </tr>
        </thead>
        <tbody>
            @foreach($sertifikat as $sertifikat)
            <tr>
                <td>{{ $sertifikat->namadepan }} {{ $sertifikat->namabelakang }}</td>
                <td>{{ $sertifikat->idkaryawan }}</td>
                <td>{{ $sertifikat->divisi }}</td>
                <td>{{ $sertifikat->namasertifikat }}</td>
                <td>{{ date('d F Y', strtotime($sertifikat->tanggalkadaluarsa))
                }}</td>
                @if ($sertifikat->tanggalkadaluarsa < date("Y-m-d"))
                    <td style="color:red">Tidak Aktif</td>
                @else
                    <td style="color:green">Aktif</td>
                @endif
                @if(session('admin'))
                    <td>
                    <div class="d-flex justify-content-center">
                        <a href="/ubah-sertifikat/{{ $sertifikat->id }}" ><i class="fa fa-pencil-square-o fa-lg black"></i></a>
                        <form action ="{{ action('HomeController@destroySertifikat', $sertifikat->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn d-inline py-0 pl-3 pr-0"><i class="fa fa-trash fa-lg"></i></button>
                        </form>
                    </div>
                    </td>
                @endif
            </tr>
            @endforeach

          </tbody>
      </table>
    </div>

@endsection
