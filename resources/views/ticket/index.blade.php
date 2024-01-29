@extends('tablar::page')

@section('title')
    Ticket
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        List
                    </div>
                    <h2 class="page-title">
                        {{ __('Ticket ') }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('tickets.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Create Ticket
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @if(config('tablar','display_alert'))
                @include('tablar::common.alert')
            @endif
            <div class="row row-deck row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Ticket</h3>
                        </div>
                        <div class="card-body border-bottom py-3">
                            <div class="d-flex">
                            <form action="{{ route('tickets.index') }}" method="GET">
    <div class="text-muted">
        Show
        <div class="mx-2 d-inline-block">
            <input type="text" class="form-control form-control-sm" value="{{ $tickets->perPage() }}" name="entries_count" size="3" aria-label="Invoices count">
        </div>
        entries
    </div>
</form>

<form action="{{ route('tickets.index') }}" method="GET" class="ms-auto text-muted">
    Search:
    <!-- Nuevo campo para la selección del campo de búsqueda -->
    <div class="ms-2 d-inline-block">
        <select class="form-select form-select-sm" name="search_by" aria-label="Search by">
            <option value="nombre" @if(request('search_by') === 'nombre') selected @endif>Nombre</option>
            <option value="tipo" @if(request('search_by') === 'tipo') selected @endif>Tipo</option>
            <option value="problema" @if(request('search_by') === 'problema') selected @endif>Problema</option>
            <option value="descripcion" @if(request('search_by') === 'descripcion') selected @endif>Descripcion</option>
            <!-- Agrega más opciones según los campos de tu modelo -->
        </select>
    </div>
    <div class="ms-2 d-inline-block">
        <input type="text" class="form-control form-control-sm" name="search" aria-label="Search invoice" value="{{ request('search') }}">
    </div>

    <button type="submit" class="btn btn-sm btn-primary">Apply</button>
</form>
                            </div>
                        </div>
                        <div class="table-responsive min-vh-100">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                <tr>
                                    <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                                           aria-label="Select all invoices"></th>
                                    <th class="w-1">No.
                                        <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="icon icon-sm text-dark icon-thick" width="24" height="24"
                                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                             stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <polyline points="6 15 12 9 18 15"/>
                                        </svg>
                                    </th>
                                    
										<th>Nombre Cliente</th>
										<th>Tipo</th>
										<th>Problema</th>
										<th>Descripcion</th>

                                    <th class="w-1"></th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse ($tickets as $ticket)
                                    <tr>
                                        <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                                   aria-label="Select ticket"></td>
                                        <td>{{ ++$i }}</td>
                                        
											<td>{{ $ticket->nombre_cliente }}</td>
											<td>{{ $ticket->tipo }}</td>
											<td>{{ $ticket->problema }}</td>
											<td>{{ $ticket->descripcion }}</td>

                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                            data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item"
                                                           href="{{ route('tickets.show',$ticket->id) }}">
                                                            View
                                                        </a>
                                                        <a class="dropdown-item"
                                                           href="{{ route('tickets.edit',$ticket->id) }}">
                                                            Edit
                                                        </a>
                                                        <form
                                                            action="{{ route('tickets.destroy',$ticket->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    onclick="if(!confirm('Do you Want to Proceed?')){return false;}"
                                                                    class="dropdown-item text-red"><i
                                                                    class="fa fa-fw fa-trash"></i>
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <td>No Data Found</td>
                                @endforelse
                                </tbody>

                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">
                            {!! $tickets->appends(['entries_count' => $tickets->perPage(), 'search' => request('search')])->links('tablar::pagination') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
