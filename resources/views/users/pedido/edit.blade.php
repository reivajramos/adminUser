<x-user>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Pedido</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('users.pedido.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-user>
