<x-guest-layout>
    @push('css')
        <link rel="stylesheet" href="{{mix('css/cardapio.css')}}">
    @endpush

    <x-header />

    <div class="d-flex my-5 justify-content-center">
        <div class="w-75">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <p class="nav-link active" id="nav-home-tab" data-toggle="tab" role="tab" aria-controls="nav-home" aria-selected="true">Categorias</p>
                </div>
            </nav>
            <div class="tab-content my-3" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>img  Código - Prato 1</td>
                                <td>Preço</td>
                                <td>Botão</td>
                            </tr>
                            <tr>
                                <td>img  Código - Prato 1</td>
                                <td>Preço</td>
                                <td>Botão</td>
                            </tr>
                            <tr>
                                <td>img  Código - Prato 1</td>
                                <td>Preço</td>
                                <td>Botão</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
