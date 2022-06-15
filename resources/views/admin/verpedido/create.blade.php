@section('linkExternos')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  
    <script type="text/javascript" class="init">
        $(document).ready(function () {
            $('#pedidosTable').DataTable({
                "language": {
                     "search": "Buscar Productos:",
                     "paginate": {
                                "first":      "Primero",
                                "last":       "Ultimo",
                                "next":       "Siguiente",
                                "previous":   "Anterior"
                                },
                    "info":           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "lengthMenu":     "Mostrando _MENU_ entradas",
                    "infoEmpty":      "Mostrando 0 a 0 de 0 registros"
                             }
                                        });
        });
    </script>

@endsection
<x-user>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title text-center"><h3>Crear Pedidos</h3></span>

                        
                       
                    </div>
                    <div class="card-body">
                     

                            @include('users.pedido.formPedidos')

                        
                    </div>
                </div>
           
        
             
            </div>
        </div>
        
    </section>
</x-user>

