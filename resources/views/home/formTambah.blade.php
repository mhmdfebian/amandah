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
      <h1 class="h2">Safety Check</h1>
    </div>

    <form name="form" action="{{ action('HomeController@question') }}" method="post">
        @csrf
      <div class="form-group mt-10" >
        <label for="exampleFormControlInput1">ID Pekerja</label>
        <input type="text" class="form-control" name="idkaryawan"id="idkaryawan" placeholder="contoh : ID0001">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Divisi</label>
        <input type="text" class="form-control" id="divisi" placeholder="Welding">
      </div>
      <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Nama Depan</label>
            <input type="text" class="form-control" id="nama">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Nama Belakang</label>
            <input type="text" class="form-control" id="inputlastName">
          </div>
      </div>
      <div class="form-group">
          <label for="exampleFormControlSelect1">Jenis Kelamin</label>
          <input type="text" class="form-control" id="jeniskelamin">
      </div>
      <div class="form-group">
          <label for="exampleFormControlFile1">Sertifikat</label>
          <input type="file" class="form-control-file" id="exampleFormControlFile1">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </main>

@endsection
@section('JSON')
<script type="text/javascript">
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
                $('#divisi').val(ui.item.divisi);
                $('#jeniskelamin').val(ui.item.jeniskelamin);
                console.log("A"+ui.item.label)
                return false;
            }

        });
    });
</script>
@endsection
