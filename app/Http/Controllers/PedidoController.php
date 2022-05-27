<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use App\Models\Producto;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
        $pedidos = Pedido::where('estado', '0')->paginate();

        $producto = Producto::pluck('descripcion', 'id');

        $costo1 = Producto::pluck('precio_1', 'id');
        $costo2 = Producto::pluck('precio_2', 'id');
        $costo3 = Producto::pluck('precio_3', 'id');

        $cant1 = DB::table('pedidos')
                ->where('pedidos.users_id',[Auth::id()])
                ->sum('cantidad');

        $C1 = DB::table('pedidos')
                ->leftJoin('productos','productos.id', 'pedidos.productos_id')
                ->where('pedidos.users_id',[Auth::id()])
                ->sum('productos.precio_1');
       /* $C2 = DB::table('pedidos')
                ->leftJoin('productos','productos.id', 'pedidos.productos_id')
                ->where('pedidos.users_id',[Auth::id()])
                ->sum('productos.precio_2');
        $C3 = DB::table('pedidos')
                ->leftJoin('productos','productos.id', 'pedidos.productos_id')
                ->where('pedidos.users_id',[Auth::id()])
                ->sum('productos.precio_3');

        $costoTotal = (($C1+$C2+$C3));*/
        $costoTotal = ($C1);


        

        $users = User::pluck('name', 'id');

        return view('users.pedido.index', compact('pedidos', 'producto','users','costo1','costo2','costo3', 'costoTotal'))
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

        $buscar = trim($request->get('buscar'));

        $producto = DB::table('productos')
                    ->select('productos.id','productos.codigo_descripcion','productos.descripcion','productos.especificacion','productos.presentacion','productos.precio_1','productos.precio_2','productos.precio_3','productos.proveedores_id','productos.categorias_id')
                    ->leftJoin('pedidos', 'pedidos.productos_id','productos.id')
                    ->where('productos.codigo_descripcion','LIKE', '%'.$buscar.'%')
                    ->whereNull('pedidos.users_id')
                    ->orwhereNotIn('pedidos.users_id',[Auth::id()])
                    ->paginate();
           

        $users = User::pluck('name', 'id');
       
        return view('users.pedido.create', compact('pedido', 'producto', 'users', 'buscar'))
            ->with('i', (request()->input('page', 1) - 1) * $producto->perPage());
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
        $pedido = Pedido::find($id);

        $producto = Producto::pluck('descripcion', 'id');

        $users = User::pluck('name', 'id');

        return view('users.pedido.show', compact('pedido', 'producto', 'users'));
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
}