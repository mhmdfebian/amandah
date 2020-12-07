@extends('layout/main')

@section('title','Sertifikasi')

@section('customCss')
  <link href="{{ asset('css/pekerja.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('customJs')
  <script src="{{ asset('js/pekerja.js') }}"></script>
@endsection

@section('sideMenu')
  <li class="nav-item border-left border-sidemenu-dummy">
    <a class="ml-4 nav-link" href="/dashboard/{{ date("Y-m-d") }}"><i class="fa fa-home fa-lg"></i><span class="ml-3">Dashboard</span></a>
  </li>
  <li class="nav-item border-left border-sidemenu-dummy">
    <a class="ml-4 nav-link " href="/sertifikasi"><i class="fa fa-id-card-o "></i><span class="ml-3">Sertifikat</span></a>
  </li>
  <li class="nav-item border-left border-sidemenu">
    <a class="ml-4 nav-link active" href="/pekerja"><i class="fa fa-users"></i><span class="ml-3">Pekerja</span></a>
  </li>

  <div style="position:fixed; bottom: 0; ">
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="ml-4 nav-link" href="#"><i class="fa fa-user-o"></i><span class="ml-3">John Doe</span></a>
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
      <p class="h1">Daftar Pekerja</p>
      @if(session('admin'))
      <div class="btn-toolbar mb-2 mb-md-0">
        <div >
          <a href="/tambah-pekerja" class="btn custom-yellow" role="button" aria-pressed="true">Tambah Pekerja</a>
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
              <th>ID Pekerja</th>
              <th>Divisi</th>
              <th>TTL</th>
              <th>Jenis Kelamin</th>
              <th>Email</th>
              <th>No HP</th>
              <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pekerja as $pekerja)
            <tr>
                <td>{{ $pekerja->namadepan }} {{ $pekerja->namabelakang }}</td>
                <td>{{ $pekerja->idkaryawan }}</td>
                <td>{{ $pekerja->divisi }}</td>
                <td>{{ $pekerja->ttl }}</td>
                <td>{{ $pekerja->jeniskelamin }}</td>
                <td>{{ $pekerja->email }}</td>
                <td>{{ $pekerja->nohp }}</td>
                <td>
                  <div class="d-flex justify-content-center">
                    <a href="/ubah-pekerja/{{ $pekerja->id }}" ><i class="fa fa-pencil-square-o fa-lg black"></i></a>
                    <form action ="{{ action('HomeController@destroyPekerja', $pekerja->id)}}" method="post">
                      @method('delete')
                      @csrf
                      <button class="btn d-inline py-0 pl-3 pr-0"><i class="fa fa-trash fa-lg"></i></button>
                    </form>
                  </div>
                </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>

@endsection
