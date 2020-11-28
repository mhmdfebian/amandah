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
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                  Sudah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Belum
                </label>
            </div>

            <label for="exampleFormControlInput1">Apakah sudah menggunakan Face shield?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                  Sudah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Belum
                </label>
            </div>

            <label for="exampleFormControlInput1">Apakah sudah menggunakan Safety glass/goggles?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                  Sudah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Belum
                </label>
            </div>

            <label for="exampleFormControlInput1">Apakah sudah menggunakan Ear plug/ear muff?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                  Sudah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Belum
                </label>
            </div>

            <label for="exampleFormControlInput1">Apakah sudah menggunakan Safety gloves?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                  Sudah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Belum
                </label>
            </div>

            <label for="exampleFormControlInput1">Apakah sudah menggunakan Safety shoes?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                  Sudah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                  Belum
                </label>
            </div>

            <label for="exampleFormControlInput1">Apakah sudah menggunakan Apron?</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                <label class="form-check-label" for="exampleRadios1">
                  Sudah
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
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
      <button type="submit" class="btn btn-primary" style="background-color: #f7f330;">Submit</button>
    </form>
  </main>
@endsection
