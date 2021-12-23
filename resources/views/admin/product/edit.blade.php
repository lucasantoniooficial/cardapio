<x-app-layout>
    <x-slot name="header">
        {{ __('Produtos') }}
    </x-slot>

    <div class="card">
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{route('admin.products.update',$product->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="photo">Imagem</label>
                    <br/>
                    <input type="file" name="photo" id="photo">
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="code">Código</label>
                            <input type="text" value="{{$product->code}}" class="form-control @error('code') is-invalid @enderror" value="{{old('code')}}" id="code" name="code">
                            @error('code')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" value="{{$product->name}}" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="name" name="name">
                            @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="category_id">Categoria</label>
                            <select name="category_id" id="category_id" name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="price">Valor</label>
                            <input type="text" value="{{$product->price}}" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" id="price" name="price">
                            @error('price')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control @error('description') is-invalid @enderror">
                        {{$product->description}}
                    </textarea>
                    @error('description')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <button class="btn btn-primary">Salvar</button>
                <a href="{{route('admin.products.index')}}" class="btn btn-dark">Voltar</a>
            </form>
        </div>
    </div>
</x-app-layout>
