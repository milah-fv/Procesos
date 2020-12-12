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
            <h3 class="text-themecolor">Colores</h3>
        </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
                <li class="breadcrumb-item active">Listado de colores</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row m-t-20">
                        <div class="col-6">
                            <div class="form-group">
                                <a href="{{ url('/admin/color/create') }}" class="btn waves-effect waves-light btn-success btn-sm text-white createCategorieIndex btn-rounded">Nuevo color</a>
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <div class="form-group">
                                <input id="demo-input-search2" type="text" placeholder="Buscar" autocomplete="off">
                                </div>
                        </div>
                    </div>
                    <table id="demo-foo-addrow2" class="table table-bordered table-hover toggle-circle" data-page-size="5">
                        <thead>
                            <tr>
                                <th data-sort-initial="true" data-toggle="true"> Color </th>
                                <!-- <th data-hide="phone"> Imagen </th> -->
                                <th data-sort-ignore="true" class="min-width"> Acciones </th>
                                @csrf
                            </tr>
                        </thead>
                        
                        <tbody id="tdBodyCategorie">
                            @foreach ($colors as $color)
                                <tr id="ColorTR{{ $color->id }}">
                                    <td style="text-align: center">
                                        <label name="colors" class="btn btn-default btn-rounded  " value="{{ $color->id }}" style="background:{{ $color->color }}; width: 50px; height: 50px;">
                                        </label>
                                    </td> 
                                    <td>
                                        <a href="{{ url("/admin/color/$color->id/edit") }}" style="margin: 0px 10px"><i class="icon icon-pencil text-inverse m-r-10" ></i> </a>
                                         <a href="javascript:void(0)" data-id="{{$color->id}}" id="DeleteColor"> <i class="icon icon-close text-danger"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <div class="text-right">
                                        <ul class="pagination pagination-split m-t-30"></ul>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('plugins/footable/js/footable.all.min.js') }}" type="text/javascript" ></script>
<script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/toast-master/js/jquery.toast.js')}}"></script>
<script src="{{ asset('js/toastr.js') }}"></script>
<script src="{{ asset('js/footable-init.js') }}" type="text/javascript" ></script>
<!-- <script src="{{ asset('plugins/sweetalert/sweetalert2.min.js') }}"></script> -->
<script type="text/javascript">
    $(document).on('click','#DeleteColor',function() 
    {
        var id = $(this).data('id');
        $.ajax({
            type: 'delete',
            url: '/admin/color/'+ id,
            data: {
            '_token': $('input[name=_token]').val(),
            'id': id
            },
            success: function(data) 
            {
                $('#ColorTR'+ id).remove();
                $.toast({
                    heading: 'Color eliminado correctamente..',
                    position: 'top-right',
                    loaderBg:'#9bde2c',
                    icon: 'success',
                    hideAfter: 2500,
                    stack: 6
                });
            },
            error: function(data) 
            {
            console.log(data);
            },

        });
    });
</script>
@endsection