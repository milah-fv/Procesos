@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Colores')
@section('micss')
<link href="{{ asset('css/floating-label.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/footable/css/footable.core.css') }}" rel="stylesheet">
<link href="{{ asset('plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('plugins/toast-master/css/jquery.toast.css') }}">
<!-- <link href="{{ asset('plugins/sweetalert/sweetalert2.min.css') }}" rel="stylesheet" type="text/css"> -->
@endsection
@section('menu-colores')
        <li class="nav-item nav-dropdown">
            <a href="/admin/color" class="nav-link active">
            <i class="icon icon-puzzle"></i> Colores 
            </a>
        </li>                
@endsection
@section('centro')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-themecolor">Crear Nuevo Color</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin/color') }}">Listado de colores</a></li>
                <li class="breadcrumb-item active">A√±adir nuevo</li>
            </ol>
        </div>
    </div>
    <form  class="row" action="{{ url('admin/color') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Datos del Color</h2> <br>
                    <div class="floating-labels m-t-40">
                        <div class="form-group {{ $errors->has('color') ? 'has-danger has-error has-feedback' : '' }} m-b-40" >
                            <input name="color" type="color" class="form-control" id="colorInput" style="width: 100%; height: 50px;" value="{{ old('color') }}">
                           <!-- <input type="color" class="form-control {{ $errors->has('color') ? 'form-control-danger' : '' }}" id="color" name="color" value="{{ old('color') }}"><br>
                            <label for="color">Color</label>
                            @if ($errors->has('color'))
                                <span class="form-control-feedback text-danger">
                                    <small>{{ $errors->first('color') }}</small>
                                </span>
                            @endif-->
                        </div>
                        
                        <!-- Habilitado-->
                        <div class="row">
                          <div class="col-md-4" style="margin-top: 50px; margin-bottom: 50px">
                              <label class="p-l-10 label-swicht" for="actived" >è¢ƒHabilitado?</label> 
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
                        <a href="{{ url('/admin/color') }}" class="btn btn-inverse">Cancelar</a>
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

