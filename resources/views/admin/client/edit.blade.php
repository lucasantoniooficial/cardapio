<x-app-layout>
    <x-slot name="header">
        {{ __('Clientes') }}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.clients.update', $client->id)}}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$client->name}}" id="name" name="name">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="phone">Telefone</label>
                            <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{$client->phone}}" name="phone">
                            @error('phone')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="cell">Celular</label>
                            <input type="phone" class="form-control @error('cell') is-invalid @enderror" id="cell" value="{{$client->cell}}" name="cell">
                            @error('cell')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="zipcode">CEP</label>
                            <input type="text" value="{{$client->address->zipcode}}" class="form-control @error('address.zipcode') is-invalid @enderror" id="zipcode" name="address[zipcode]">
                            @error('address.zipcode')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="address">Endereço</label>
                            <input type="text" value="{{$client->address->address}}" class="form-control @error('address.address') is-invalid @enderror" id="address" name="address[address]">
                            @error('address.address')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="neighborhood">Bairro</label>
                            <input type="text" value="{{$client->address->neighborhood}}" class="form-control @error('address.neighborhood') is-invalid @enderror" id="neighborhood" name="address[neighborhood]">
                            @error('address.neighborhood')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="number">Número</label>
                            <input type="text" value="{{$client->address->number}}" class="form-control @error('address.number') is-invalid @enderror" id="number" name="address[number]">
                            @error('address.number')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="complement">Complemento</label>
                            <input type="text" value="{{$client->address->complement}}" class="form-control" id="complement" name="address[complement]">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="city">Cidade</label>
                            <input type="text" value="{{$client->address->city}}" class="form-control @error('address.city') is-invalid @enderror" id="city" name="address[city]">
                            @error('address.city')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="state">Estado</label>
                            <input type="text" value="{{$client->address->state}}" class="form-control @error('address.state') is-invalid @enderror" id="state" name="address[state]">
                            @error('address.state')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Salvar</button>
                <a href="{{route('admin.clients.index')}}" class="btn btn-dark">Voltar</a>
            </form>
        </div>
    </div>
</x-app-layout>
