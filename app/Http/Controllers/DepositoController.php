<?php

namespace App\Http\Controllers;

use App\Models\Deposito;
use Illuminate\Http\Request;

/**
 * Class DepositoController
 * @package App\Http\Controllers
 */
class DepositoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $entriesPerPage = $request->input('entries_count', 10);
    $query = Deposito::query();
    
    // Lógica de búsqueda
    if ($request->filled('search')) {
        $searchTerm = $request->input('search');
        $searchBy = $request->input('search_by', 'nombre'); // Valor predeterminado: nombre

        // Ajusta este bloque según los campos de tu modelo
        switch ($searchBy) {
            case 'direccion':
                $query->where('direccion', 'like', "%$searchTerm%");
                break;
            case 'tipo':
                $query->where('tipo', 'like', "%$searchTerm%");
                break;
            default: // 'nombre' y otros campos
                $query->where('nombre', 'like', "%$searchTerm%");
                break;
        }
    }

    $depositos = $query->paginate($entriesPerPage);

    return view('deposito.index', compact('depositos'))
        ->with('i', ($depositos->currentPage() - 1) * $depositos->perPage());
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deposito = new Deposito();
        return view('deposito.create', compact('deposito'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Deposito::$rules);

        $deposito = Deposito::create($request->all());

        return redirect()->route('depositos.index')
            ->with('success', 'Deposito created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deposito = Deposito::find($id);

        return view('deposito.show', compact('deposito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deposito = Deposito::find($id);

        return view('deposito.edit', compact('deposito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Deposito $deposito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposito $deposito)
    {
        request()->validate(Deposito::$rules);

        $deposito->update($request->all());

        return redirect()->route('depositos.index')
            ->with('success', 'Deposito updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $deposito = Deposito::find($id)->delete();

        return redirect()->route('depositos.index')
            ->with('success', 'Deposito deleted successfully');
    }
}
