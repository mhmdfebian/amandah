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
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
      <p class="h2">Safety Check Form</p>
    </div>
    <form method="post" action="/dashboard/{{ date("Y-m-d") }}">
        @csrf

      <div class="form-group">
            <label style="margin-top: 15px" for="exampleFormControlInput1">Apakah sudah menggunakan Safety Helmet?</label>
            <div style="margin-top: -10px" class="form-check">
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

            <label style="margin-top: 15px" for="exampleFormControlInput1">Apakah sudah menggunakan Face shield?</label>
            <div style="margin-top: -10px" class="form-check">
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

            <label style="margin-top: 15px" for="exampleFormControlInput1">Apakah sudah menggunakan Safety glass/goggles?</label>
            <div style="margin-top: -10px" class="form-check">
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

            <label style="margin-top: 15px"  for="exampleFormControlInput1">Apakah sudah menggunakan Ear plug/ear muff?</label>
            <div style="margin-top: -10px" class="form-check">
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

            <label style="margin-top: 15px"  for="exampleFormControlInput1">Apakah sudah menggunakan Safety gloves?</label>
            <div style="margin-top: -10px" class="form-check">
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

            <label style="margin-top: 15px" for="exampleFormControlInput1">Apakah sudah menggunakan Safety shoes?</label>
            <div style="margin-top: -10px" class="form-check">
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

            <label style="margin-top: 15px" for="exampleFormControlInput1">Apakah sudah menggunakan Apron?</label>
            <div style="margin-top: -10px" class="form-check">
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

            <label style="margin-top: 15px"  for="exampleFormControlSelect1">Dapat Bekerja/Tidak</label>
            <select style="margin-top: -10px" class="form-control" id="exampleFormControlSelect1" name="status">
                <option value = "Bekerja">Bekerja</option>
                <option value = "Tidak Bekerja">Tidak Bekerja</option>
            </select>

            {{-- dibikin if nya pep, kalo dipilih tidak bekerja, baru keluar form nya ? --}}
            <div style="margin-top: 15px" class="form-group pt-1">
              <label style="margin-top: -10px" for="exampleFormControlTextarea1">Notes</label>
              <textarea class="form-control" name ="notes" id="notes" rows="3"></textarea>
            </div>
      </div>

      <input type="hidden" name="idkaryawan" value="{{ $_POST['idkaryawan'] }}">
      <input type="hidden" name="tanggal" value="{{ date("Y-m-d") }}">
      <input type="hidden" name="waktu" value="{{ date("H:i:s") }}">
      <button type="submit" class="btn custom-yellow">Submit</button>
    </form>
@endsection
