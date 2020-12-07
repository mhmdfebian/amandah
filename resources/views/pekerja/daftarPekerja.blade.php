@extends('layout/main')

@section('title','Sertifikasi')

@section('customCss')
  <link href="{{ asset('css/pekerja.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('customJs')
  <script src="{{ asset('js/pekerja.js') }}"></script>
@endsection

@section('mainSidebar')
<li class="nav-item">
    <span class="nav-link" data-feather="home"></span>
    Dashboard
    {{-- <span class="sr-only">(current)</span> --}}
</li>
<li class="nav-item">
  <a class="nav-link active" href="/sertifikasi">
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
    <a class="nav-link " href="/notifikasi">
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

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
      <h1>Daftar Pekerja</h1>
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
                <td><a href="/ubah-pekerja/{{ $pekerja->id }}" class="fa fa-bars">
                    <form action ="{{ action('HomeController@destroyPekerja', $pekerja->id)}}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn d-inline"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </main>

@endsection
