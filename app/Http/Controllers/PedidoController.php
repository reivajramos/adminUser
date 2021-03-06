<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use App\Models\Producto;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Support\Collection;
use PDF;
use Auth;

/**
 * Class PedidoController
 * @package App\Http\Controllers
 */
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::where('estado', '0')->where('pedidos.users_id',[Auth::id()])->paginate();

        $producto = Producto::pluck('descripcion', 'id');

        $costo1 = Producto::pluck('precio_1', 'id');
        $costo2 = Producto::pluck('precio_2', 'id');
        $costo3 = Producto::pluck('precio_3', 'id');


        $users = User::pluck('name', 'id');

        return view('users.pedido.index', compact('pedidos', 'producto','users','costo1','costo2','costo3'))
            ->with('i', (request()->input('page', 1) - 1) * $pedidos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pedido = new Pedido();
       
        $i = 0;
        $producto = DB::select("SELECT * 
                    FROM productos
                    WHERE not EXISTS (SELECT * FROM pedidos WHERE users_id = ? AND pedidos.productos_id = productos.id);", [Auth::id()]);
       
        $users = User::pluck('name', 'id');
       
        return view('users.pedido.create', compact('pedido', 'producto', 'users', 'i'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pedido::$rules);

        $pedido = Pedido::create($request->all());

        return redirect()->route('pedidos.create')
            ->with('success', 'Pedido created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

       // $producto = Producto::pluck('descripcion', 'id');

       // $users = User::pluck('name', 'id');

        return view('users.pedido.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::find($id);

        return view('users.pedido.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pedido $pedido, Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        DB::table('pedidos')
        ->where('users_id', [Auth::id()])
        ->update(['estado' => 1]);

        return redirect()->route('pedidos.index')
        ->with('success', 'Su pedido sera procesado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id)->delete();

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido deleted successfully');
    }


    public function pdf()
    {
        $indice = 0;

        $pedidos = Pedido::where('estado', '1')->where('pedidos.users_id',[Auth::id()])->paginate();

        $producto = Producto::pluck('descripcion', 'id');

        $costo1 = Producto::pluck('precio_1', 'id');
        $costo2 = Producto::pluck('precio_2', 'id');
        $costo3 = Producto::pluck('precio_3', 'id');


        $users = User::pluck('name', 'id');

        $pdf = PDF::loadView('users.pedido.pdf' , compact('pedidos', 'producto','users','costo1','costo2','costo3', 'indice'));
        
        return $pdf->stream();
    }
}