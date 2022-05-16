<x-admin>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
                    <div class="card-header display-5  fw-bold text-info text-capitalize">{{ __('bienvenido') }} {{ Auth::user()->name }}</div>

                    <div class="card-body fs-5 mb-4">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        {{ __('La aplicación es 100% independiente que te ayudará a manipular de forma efectiva los productos seleccionados por lo Departamentos para los llamados.') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
