@extends('layouts.dashboard')

@section('content')

<div id="record">
    <div class="col-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body card-dashboard">
                    <div class="table-responsive">
                        <h1>Historial de Ordenes</h1>
                        <p>Para ver mas información dar click -> <img src="{{asset('assets/img/sistema/btn-plus.png')}}" alt=""></p>
                        <table class="table nowrap scroll-horizontal-vertical myTable table-striped">
                            <thead class="">

                                <tr class="text-center text-white bg-purple-alt2">
                                    <th>ID</th>
                                    <th>Categoria</th>
                                    <th>Servicio</th>
                                    <th>Monto</th>
                                    <th>Estatus</th>
                                    <th>Link</th>
                                    <th>Fecha de Creacion</th>
                                    <th>Acción</th>
                                </tr>

                            </thead>

                            <tbody>

                                @foreach ($orden as $item)
                                <tr class="text-center">
                                    <td>{{ $item->id}}</td>
                                    <td>{{ $item->getOrdenCategorie->name}}</td>
                                    <td>{{ $item->getOrdenService->package_name}}</td>
                                    <td>{{ $item->total}}</td>

                                    @if ($item->status == '0')
                                    <td> <a class=" btn btn-info text-white text-bold-600">En Espera</a></td>
                                    @elseif($item->status == '1')
                                    <td> <a class=" btn btn-warning text-white text-bold-600">Incompleto</a></td>
                                    @elseif($item->status == '2')
                                    <td> <a class=" btn btn-success text-white text-bold-600">Completada</a></td>
                                    @elseif($item->status == '3')
                                    <td> <a class=" btn btn-danger text-white text-bold-600">Cancelada</a></td>
                                    @endif

                                    <td>{{ $item->link}}</td>
                                    <td>{{ $item->created_at}}</td>

                                    @if($item->status == '0')
                                    <td><a href="{{ route('record_order.edit-user',$item->id) }}" class="btn btn-secondary text-bold-600">Editar</a></td>
                                    @else
                                    <td><a href="{{ route('record_order.show-user',$item->id) }}" class="btn btn-secondary text-bold-600">Revisar</a></td>
                                    @endif
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
@include('layouts.componenteDashboard.optionDatatable')


