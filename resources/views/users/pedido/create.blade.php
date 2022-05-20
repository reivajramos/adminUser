<x-user>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Pedido</span>
                    </div>
                    <div class="card-body">
                        

                            @include('users.pedido.formPedidos')

                        
                    </div>
                </div>
                {!! $producto->links() !!}
            </div>
        </div>
    </section>
</x-user>

{{ dd($producto) }}
