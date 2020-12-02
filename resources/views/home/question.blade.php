@extends('layout/main')

@section('title','Dashboard')

@section('customCss')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form-validation.css') }}" rel="stylesheet">
@endsection

@section('customJs')
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/form-validation.js') }}"></script>
@endsection

@section('mainSidebar')
  <li class="nav-item">
    <a class="nav-link active" href="/dashboard/{{ date("Y-m-d")}}">
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
    <a class="nav-link " href="/notifikasi">
      <span data-feather="file"></span>
      Notifikasi
    </a>
  </li>
  <li class="nav-item">
      <a class="nav-link " href="{{ route('logout') }}">
        <span data-feather="file"></span>
        Logout
      </a>
  </li>
@endsection

@section('main')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Safety Check Form</h1>
    </div>
    <form method="post" action="/dashboard/{{ date("Y-m-d") }}">
        @csrf
      {{-- ini ngide, gatau bener gini apa kaga kalo per pertanyaan dikasi form group --}}
      <div class="form-group">
            <label for="exampleFormControlInput1">Apakah sudah menggunakan Safety Helmet?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question1" id="sudah1" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                  Sudah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question1" id="belum1" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Belum
                </label>
            </div>

            <label for="exampleFormControlInput1">Apakah sudah menggunakan Face shield?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question2" id="sudah2" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                  Sudah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question2" id="belum2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Belum
                </label>
            </div>

            <label for="exampleFormControlInput1">Apakah sudah menggunakan Safety glass/goggles?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question3" id="sudah3" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                  Sudah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question3" id="belum3" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Belum
                </label>
            </div>

            <label for="exampleFormControlInput1">Apakah sudah menggunakan Ear plug/ear muff?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question4" id="sudah4" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                  Sudah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question4" id="belum4" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Belum
                </label>
            </div>

            <label for="exampleFormControlInput1">Apakah sudah menggunakan Safety gloves?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question5" id="sudah5" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                  Sudah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question5" id="belum5" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Belum
                </label>
            </div>

            <label for="exampleFormControlInput1">Apakah sudah menggunakan Safety shoes?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question6" id="sudah6" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                  Sudah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question6" id="belum6" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Belum
                </label>
            </div>

            <label for="exampleFormControlInput1">Apakah sudah menggunakan Apron?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question7" id="sudah7" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                  Sudah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="question7" id="belum7" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Belum
                </label>
            </div>

            <label for="exampleFormControlSelect1">Dapat Bekerja/Tidak</label>
            <select class="form-control" id="exampleFormControlSelect1" name="status">
                <option value = "Bekerja">Bekerja</option>
                <option value = "Tidak Bekerja">Tidak Bekerja</option>
            </select>
      </div>
      {{-- sampe sini ngidenya --}}

      <input type="hidden" name="idkaryawan" value="{{ $_POST['idkaryawan'] }}">
      <input type="hidden" name="tanggal" value="{{ date("Y-m-d") }}">
      <input type="hidden" name="waktu" value="{{ date("H:i:s") }}">

      <br>
      <button type="submit" class="btn custom-yellow">Submit</button>
    </form>
  </main>
@endsection
