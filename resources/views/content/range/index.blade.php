@extends('layouts/contentLayoutMaster')

@section('title', 'Pagos')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/additional/data-tables/dataTables.min.css')}}">
@endsection

@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <h1 class="content-header-title float-left mr-2">Sysmo Company</h1>
                        <li class="breadcrumb-item"><a href="#">Financiero</a></li>
                        <li class="breadcrumb-item"><a href="#">Flujo de Ganancia</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="record">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body card-dashboard">
                        {{-- <h1 href="#" class="btn btn-primary float-right mb-0 waves-effect waves-light">Comisiones sin liquidar: {{$user}}</h1> --}}
                    <div class="table-responsive">
                        <table id="mytable" class="table nowrap scroll-horizontal-vertical myTable table-striped" data-order='[[ 1, "asc" ]]' data-page-length='10'>
                            <thead class="">
                                <tr class="text-center text-dark bg-purple-alt2">
                                    <th>#</th>
                                    <th>Skrill</th>
                                    <th>Referencia</th>
                                    <th>Monto</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($liquidations as $liquidation)
                                <tr class="text-center">
                                    <td>{{$liquidation->id}}</td>
                                    <td></td>
                                    <td>{{$liquidation->hash}}</td>
                                    <td>{{$liquidation->total}}</td>
                                    <td>{{date('d-m-Y', strtotime($liquidation->created_at))}}</td>
                                    <td>
                                        @if ($liquidation->status == 1)
                                            Pagado
                                        @else
                                            En Espera
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- permite llamar a las opciones de las tablas --}}
@section('page-script')

<script src="{{ asset('js/additional/data-tables/dataTables.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#mytable').DataTable({
            //dom: 'flBrtip',
            responsive: true,
            searching: false,
            ordering: true,
            paging: true,
            select: true,
        });
    });

</script>
@endsection
