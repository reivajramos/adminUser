<x-admin>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header text-center bg-info">
                        <h3><span class="card-title">Nuevo Proveedor</span></h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('proveedores.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('admin.proveedore.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin>
