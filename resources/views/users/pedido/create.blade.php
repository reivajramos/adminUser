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
                        <form method="POST" action="{{ route('pedidos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('users.pedido.formPedidos')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-user>

{{ dd($producto) }}
