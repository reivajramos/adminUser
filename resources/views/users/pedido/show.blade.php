<x-user>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('pedidos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $pedido->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Fechapedido:</strong>
                            {{ $pedido->fechapedido }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $pedido->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Productos Id:</strong>
                            {{ $producto[$pedido->productos_id] }}
                        </div>
                        <div class="form-group">
                            <strong>Users Id:</strong>
                            {{ $users[$pedido->users_id] }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-user>
