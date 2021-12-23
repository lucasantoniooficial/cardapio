<x-app-layout>
    <x-slot name="header">
        {{ __('Categorias') }}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.categories.update', $category->id)}}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="name" name="name">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" name="status" class="form-control">
                                <option value="active" {{$category->status == 'active' ? 'selected' : ''}}>Ativo</option>
                                <option value="inactive" {{$category->status == 'inactive' ? 'selected' : ''}}>Inativo</option>
                            </select>
                            @error('status')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">salvar</button>
                <a href="{{route('admin.categories.index')}}" class="btn btn-dark">Voltar</a>
            </form>
        </div>
    </div>
</x-app-layout>
