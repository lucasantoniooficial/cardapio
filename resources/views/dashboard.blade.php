<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$totalOrders}}</h3>

                            <p>Pedidos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$totalCustomers}}</h3>

                            <p>Clientes</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="card">
                <div class="card-header">Últimos 5 pedidos</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Total</th>
                                <th>Data do pedido</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lastFiveOrders as $lastFiveOrder)
                                <tr>
                                    <td>
                                        {{$lastFiveOrder->client->name}}
                                    </td>
                                    <td>
                                        {{$lastFiveOrder->total}}
                                    </td>
                                    <td>
                                        {{$lastFiveOrder->created_at->format('d/m/Y H:i')}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

</x-app-layout>
