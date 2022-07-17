<x-app-layout>
    <x-slot name="header">
        {{ __('Pedidos') }}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="align-middle">{{$order->id}}</td>
                            <td class="align-middle">{{$order->client->name}}</td>
                            <td class="align-middle">{{$order->total}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('admin.categories.destroy', $order->id)}}" onclick="event.preventDefault(); document.getElementById('form-delete-{{$order->id}}').submit();" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    <form action="{{route('admin.categories.destroy', $order->id)}}" id="form-delete-{{$order->id}}" method="post" class="d-none">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$orders->links()}}
        </div>
    </div>
</x-app-layout>
