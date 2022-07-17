<div class="header">
    <div class="d-flex justify-content-between  align-items-center">
        <div class="d-flex header-container align-items-center">
            <div class="logo">
                <img class="img-fluid rounded-circle" src="{{asset("storage/{$configuration->logo}")}}" alt="Avatar">
            </div>
            <div class="header_type">s
                <a href="{{route('menu.home')}}" class="text-white">
                    <p>{{$configuration->type}}</p>
                    <h2>{{$configuration->name}}</h2>
                </a>
                <div class="d-flex contact">
                    <div>
                        {{$configuration->phone}}
                    </div>
                    <div>
                        {{$configuration->cell}}
                    </div>
                </div>
            </div>
        </div>
        <a href="{{route('menu.cart')}}" class="text-white" title="Carrinho">
            <i class="fas fa-shopping-cart"></i>
        </a>
    </div>
</div>
<div class="d-flex info">
    <div class="info-item">
        <p class="text-success">Estamos abertos</p>
        <p>das {{$configuration->open->format('H:i')}} até as {{$configuration->close->format('H:i')}}</p>
    </div>
    <div class="info-item">
        <p class="font-weight-bolder">Formas de pagamento</p>
        <p>
            {{$typePayments->pluck('name')->join(', ', ' e ')}}
        </p>
    </div>
    <div class="info-item">
        <p class="font-weight-bolder">Entrega</p>
        <p>{{$configuration->delivery}} minutos (aprox.)</p>
    </div>
</div>
