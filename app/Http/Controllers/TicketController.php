<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

/**
 * Class TicketController
 * @package App\Http\Controllers
 */
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $entriesPerPage = $request->input('entries_count', 10);
    $query = Ticket::query();
    
    if ($request->filled('search')) {
        $searchTerm = $request->input('search');
        $searchBy = $request->input('search_by', 'nombre_cliente'); // Valor predeterminado: nombre_cliente

        // Ajusta este bloque según los campos de tu modelo
        switch ($searchBy) {
            case 'tipo':
                $query->where('tipo', 'like', "%$searchTerm%");
                break;
            case 'problema':
                $query->where('problema', 'like', "%$searchTerm%");
                break;
            case 'descripcion':
                $query->where('descripcion', 'like', "%$searchTerm%");
                break;
            default: // 'nombre_cliente' y otros campos
                $query->where('nombre_cliente', 'like', "%$searchTerm%");
                break;
        }
    }

    $tickets = $query->paginate($entriesPerPage);

    return view('ticket.index', compact('tickets'))
        ->with('i', ($tickets->currentPage() - 1) * $tickets->perPage());
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ticket = new Ticket();
        return view('ticket.create', compact('ticket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ticket::$rules);

        $ticket = Ticket::create($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);

        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);

        return view('ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ticket $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        request()->validate(Ticket::$rules);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id)->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket deleted successfully');
    }
}
