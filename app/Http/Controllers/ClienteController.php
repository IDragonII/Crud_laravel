<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $entriesPerPage = $request->input('entries_count', 10);
    $query = Cliente::query();
    
    // Lógica de búsqueda
    if ($request->filled('search')) {
        $searchTerm = $request->input('search');
        $searchBy = $request->input('search_by', 'nombre'); // Campo predeterminado: nombre

        // Ajusta la lógica de búsqueda según el campo seleccionado
        if ($searchBy === 'nombre') {
            $query->where('nombre', 'like', "%$searchTerm%");
        } elseif ($searchBy === 'apellido') {
            $query->where('apellido', 'like', "%$searchTerm%");
        } elseif ($searchBy === 'direccion') {
            $query->where('direccion', 'like', "%$searchTerm%");
        } elseif ($searchBy === 'telefono') {
            $query->where('telefono', 'like', "%$searchTerm%");
        }
        // Puedes agregar más opciones según los campos de tu modelo
    }

    $clientes = $query->paginate($entriesPerPage);

    return view('cliente.index', compact('clientes'))
        ->with('i', ($clientes->currentPage() - 1) * $clientes->perPage());
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente();
        return view('cliente.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Cliente::$rules);

        $cliente = Cliente::create($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);

        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        request()->validate(Cliente::$rules);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id)->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente deleted successfully');
    }
}
