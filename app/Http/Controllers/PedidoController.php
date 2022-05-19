<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use App\Models\Producto;
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
        $pedidos = Pedido::paginate();

        $producto = Producto::pluck('descripcion', 'id');

        $users = User::pluck('name', 'id');

        return view('users.pedido.index', compact('pedidos', 'producto','users'))
            ->with('i', (request()->input('page', 1) - 1) * $pedidos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedido = new Pedido();

        $producto = DB::select('SELECT *
                    FROM productos
                    WHERE NOT EXISTS (
                    SELECT *
                    FROM pedidos
                    WHERE pedidos.users_id = ?
                    AND pedidos.productos_id = productos.id)', [Auth::id()]);

        $users = User::pluck('name', 'id');

        return view('users.pedido.create', compact('pedido', 'producto', 'users'));
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

        return redirect()->route('pedidos.index')
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
     * @param  Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        request()->validate(Pedido::$rules);

        $pedido->update($request->all());

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido updated successfully');
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
