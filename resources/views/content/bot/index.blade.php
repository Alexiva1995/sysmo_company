@extends('layouts/contentLayoutMaster')

@section('title', 'list-tickets-user')

@section('page-style')
{{-- Page Css files --}}
{{-- <link rel="stylesheet" type="text/css" href="{{asset('css/additional/data-tables/dataTables.min.css')}}"> --}}


@endsection

@section('content')

<div class="content-header row">
    <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <div class="breadcrumb-wrapper">
                    <ol class="breadcrumb">
                        <h1 class="content-header-title float-left mr-2">Sysmo Company</h1>
                        <li class="breadcrumb-item"><a href="#">Bot</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div id="chart"></div>
</div>

{{-- <div id="record">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body card-dashboard">
                        <h1 href="#" class="btn btn-primary float-right mb-0 waves-effect waves-light">Saldo Disponible: {{ $total }}$</h1>
                    <div class="table-responsive">
                        <table id="mytable" class="table nowrap scroll-horizontal-vertical myTable table-striped" data-order='[[ 1, "asc" ]]' data-page-length='10'>
                            <thead class="">
                                <tr class="text-center text-dark bg-purple-alt2">
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    <th>Descripción</th>
                                    <th>Monto</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wallets as $wallet)
                                <tr class="text-center">
                                    <td>{{$wallet->id}}</td>
                                    <td>{{date('d-m-Y', strtotime($wallet->created_at))}}</td>
                                    <td>{{$wallet->description}}</td>
                                    <td>{{$wallet->balance}}</td>
                                    <td>
                                        @if ($wallet->status == 1)
                                            Pagado
                                        @elseif ($wallet->status == 2)
                                            Cancelado
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
</div> --}}

@endsection
{{-- permite llamar a las opciones de las tablas --}}
@section('page-script')

{{-- <script src="{{ asset('js/additional/data-tables/dataTables.min.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>



<script>
    $(document).ready(function () {
        var options = {
  chart: {
    type: 'line',
    height: 350,
    zoom: {
                enabled: false
              }
  },
  series: [{
    name: 'Porcentaje',
    data: [30,40,35,50,49,91,125]
  }],
  xaxis: {
    categories: ['Lun','Mar','Mie','Jue','Vie','Sab','Dom']
  }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();
    });

</script>
@endsection
