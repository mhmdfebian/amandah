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
    <form>


      {{-- ini ngide, gatau bener gini apa kaga kalo per pertanyaan dikasi form group --}}
      <div class="form-group">
          <label for="exampleFormControlInput1">Question 1</label>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
                  <label class="form-check-label" for="exampleRadios1">
                  Default radio
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                  <label class="form-check-label" for="exampleRadios2">
                  Second default radio
                  </label>
              </div>
      </div>
      {{-- sampe sini ngidenya --}}

      <p>Question 2</p>
      <div class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
          <label class="form-check-label" for="exampleRadios1">
          Default radio
          </label>
      </div>
      <div class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
          <label class="form-check-label" for="exampleRadios2">
          Second default radio
          </label>
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </main>
@endsection
