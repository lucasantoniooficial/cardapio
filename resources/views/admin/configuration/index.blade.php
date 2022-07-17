<x-app-layout>
    <x-slot name="header">
        {{ __('Configurações') }}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{route('admin.configurations.update', $configuration->id)}}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" accept="image/*" class="form-control-file" name="logo" id="logo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="open">Horário de abrir</label>
                            <input type="time" value="{{$configuration->open->format('H:i')}}" name="open" id="open" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="close">Horário de fechar</label>
                            <input type="time" value="{{$configuration->close->format('H:i')}}" name="close" id="close" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="name">Nome do estabelecimento</label>
                            <input type="text" value="{{$configuration->name}}" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="type">Segmento</label>
                            <input type="text" value="{{$configuration->type}}" class="form-control" id="type" name="type">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="delivery">Tempo de preparo (Min)</label>
                            <input type="text" value="{{$configuration->delivery}}" class="form-control" id="delivery" name="delivery">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="delivery_fee">Tarifa de entraga</label>
                            <input type="text" value="{{$configuration->delivery_fee}}" class="form-control" id="delivery_fee" name="delivery_fee">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="phone">Telefone</label>
                            <input type="text" value="{{$configuration->phone}}" class="form-control" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cell">Celular (Whatsapp)</label>
                            <input type="text" value="{{$configuration->cell}}" class="form-control" id="cell" name="cell">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</x-app-layout>
