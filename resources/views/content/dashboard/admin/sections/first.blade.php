<div class="card col-12">
    <h1 class="text-dark texto-card-2 p-2">Detalles</h1>
    <div class="card-body row">
        {{-- Usuarios --}}
        <div class="col-4">
            <div class="card text-center ">
                <div class="card-header d-flex flex-column align-items-center pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-users text-primary font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{$detalles['users']}}</h2>
                    <p class="mb-0">Total Usuarios</p>
                </div>
            </div>
        </div>
        {{-- total Ordenes --}}
        <div class="col-4">
            <div class="card text-center ">
                <div class="card-header d-flex flex-column align-items-center pb-0">
                    <i data-feather="icon-users"></i>
                    <h2 class="text-bold-700 mt-1">{{$detalles['orders']}}</h2>
                    <p class="mb-0">Total Ordenes</p>
                </div>
            </div>
        </div>
        {{-- Monto Total Ordenes --}}
        <div class="col-4">
            <div class="card text-center ">
                <div class="card-header d-flex flex-column align-items-center pb-0">
                    <div class="avatar bg-rgba-primary p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-users text-primary font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="text-bold-700 mt-1">{{$detalles['totalOrden']}} $</h2>
                    <p class="mb-0">Monto Total Ordenes</p>
                </div>
            </div>
        </div>
    </div>
</div>
