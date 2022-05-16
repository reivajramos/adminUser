<x-admin>
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header bg-info text-center">
                        <h3><span class="card-title">Actualizar Proveedor</span></h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('proveedores.update', $proveedore->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('admin.proveedore.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin>