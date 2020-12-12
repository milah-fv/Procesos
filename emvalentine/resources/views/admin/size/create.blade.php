@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Tallas')
@section('micss')
<link href="{{ asset('css/floating-label.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/footable/css/footable.core.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('plugins/toast-master/css/jquery.toast.css') }}">
<!-- <link href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"> -->
@endsection
@section('menu-tallas')
        <li class="nav-item nav-dropdown">
            <a href="/admin/size" class="nav-link active">
            <i class="icon icon-puzzle"></i> Tallas 
            </a>
        </li>                
@endsection
@section('centro')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Crear Nueva Talla</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin/size') }}">Listado de tallas</a></li>
                <li class="breadcrumb-item active">A√±adir nueva</li>
            </ol>
        </div>
    </div>
    <form  class="row" action="{{ url('admin/size') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Datos de la Talla</h2> <br>
                    <div class="floating-labels m-t-40">
                        <div class="form-group {{ $errors->has('name') ? 'has-danger has-error has-feedback' : '' }} m-b-40">
                            <input type="text" class="form-control {{ $errors->has('name') ? 'form-control-danger' : '' }}" id="name" name="name" value="{{ old('name') }}"><br>
                            <label for="name">Nombre de la Talla</label>
                            @if ($errors->has('name'))
                                <span class="form-control-feedback text-danger">
                                    <small>{{ $errors->first('name') }}</small>
                                </span>
                            @endif
                        </div>
                        <!-- Habilitado-->
                        <div class="row">
                          <div class="col-md-4" style="margin-top: 50px; margin-bottom: 50px">
                              <label class="p-l-10 label-swicht" for="actived"> è¢ƒHabilitado?</label> 
                              <div class="form-group" style="margin-left: 150px">
                                  <label class="switch m-l-10" > <br>
                                  <input type="checkbox" name="actived" id="actived" checked="true">
                                  <span class="slider round_switch"></span>
                                  </label> <br> <hr>
                              </div>
                          </div>
                        </div>  
                        <button class="btn btn-success btn-rounded" type="submit">
                            <i class="icon icon-check"></i> Crear
                        </button>
                        <a href="{{ url('/admin/size') }}" class="btn btn-inverse">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
<script src="{{ asset('/admin_assets/vendor/stringToSlug/jquery.stringToSlug.min.js')}}"></script>
<script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
<script>
    $(document).ready(function()
    {
        // Basic
        $('.dropify').dropify();
    });
    $(document).ready(function(){
        $("#name, #slug").stringToSlug({
            callback:function(text){
                $('#slug').val(text);
            }
        });
    });
</script>


@endsection

