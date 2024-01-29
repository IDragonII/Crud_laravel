@extends('tablar::page')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        ¡Bienvenido!
                    </div>
                    <h2 class="page-title">Explora y gestiona tu aplicación</h2>
                </div>
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                           data-bs-target="#modal-report">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            Nuevo reporte
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-hover-shadow">
                        <div class="card-body">
                            <h3 class="card-title">Estadísticas</h3>
                            <p class="card-text">Visualiza datos importantes y estadísticas de tu aplicación.</p>
                            <a href="#" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-hover-shadow">
                        <div class="card-body">
                            <h3 class="card-title">Usuarios</h3>
                            <p class="card-text">Administra los usuarios de tu aplicación y sus roles.</p>
                            <a href="#" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card card-hover-shadow">
                        <div class="card-body">
                            <h3 class="card-title">Configuración</h3>
                            <p class="card-text">Personaliza la configuración de tu aplicación.</p>
                            <a href="#" class="btn btn-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
