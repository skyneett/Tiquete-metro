<!-- TODO: proteger este layout con middleware de rol admin cuando se implemente autenticación real -->
<aside class="sidebar d-flex flex-column p-3">
    <!-- Encabezado de Marca -->
    <div class="mb-3 px-2 pt-1 border-bottom pb-3" style="border-color: rgba(255, 255, 255, 0.08) !important;">
        <span class="fs-5 fw-bold d-block text-light" style="letter-spacing: -0.01em;">Sapiencia</span>
        <small class="text-secondary" style="font-size: 0.75rem;">Educación Superior Medellín</small>
    </div>

    <!-- Menú de Navegación -->
    <div class="flex-grow-1 overflow-auto">
        <!-- SECCIÓN: FORMULARIOS -->
        <div class="sidebar-heading">
            <i class="bi bi-folder2 me-1"></i> Formularios
        </div>
        <ul class="nav flex-column mb-3">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('metro.create') ? 'active' : '' }}" 
                   data-bs-toggle="collapse" 
                   href="#menuFormularios" 
                   role="button" 
                   aria-expanded="{{ request()->routeIs('metro.create') ? 'true' : 'false' }}" 
                   aria-controls="menuFormularios">
                    <i class="bi bi-ui-checks"></i>
                    <span>Formularios</span>
                    <i class="bi bi-chevron-down ms-auto small opacity-75"></i>
                </a>
                <div class="collapse {{ request()->routeIs('metro.create') ? 'show' : '' }}" id="menuFormularios">
                    <ul class="nav flex-column mt-1">
                        <li class="nav-item">
                            <a href="{{ route('metro.create') }}" class="sub-nav-link {{ request()->routeIs('metro.create') ? 'active' : '' }}">
                                <i class="bi bi-file-earmark-text"></i>
                                <span>Inscripción Tiquete Metro</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

        <!-- SECCIÓN: ADMINISTRACIÓN (SOLO VISIBLE SI ES ADMIN) -->
        @if (session('es_admin'))
            <div class="sidebar-heading">
                <i class="bi bi-shield-lock me-1"></i> Administración
            </div>
            <ul class="nav flex-column mb-3">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('admin.metro.*') ? 'active' : '' }}" 
                       data-bs-toggle="collapse" 
                       href="#menuAdmin" 
                       role="button" 
                       aria-expanded="{{ request()->routeIs('admin.metro.*') ? 'true' : 'false' }}" 
                       aria-controls="menuAdmin">
                        <i class="bi bi-kanban"></i>
                        <span>Gestión Metro</span>
                        <i class="bi bi-chevron-down ms-auto small opacity-75"></i>
                    </a>
                    <div class="collapse {{ request()->routeIs('admin.metro.*') ? 'show' : '' }}" id="menuAdmin">
                        <ul class="nav flex-column mt-1">
                            <li class="nav-item">
                                <a href="{{ route('admin.metro.solicitudes') }}" class="sub-nav-link {{ request()->routeIs('admin.metro.*') ? 'active' : '' }}">
                                    <i class="bi bi-table"></i>
                                    <span>Solicitudes Tiquete Metro</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        @endif
    </div>

    <!-- Pie del Sidebar con sesión y rol -->
    <div class="pt-2 border-top mt-auto" style="border-color: rgba(255, 255, 255, 0.08) !important;">
        @if (session('cedula_usuario'))
            <div class="bg-dark bg-opacity-50 p-2 rounded-2 mb-2" style="border: 1px solid rgba(255, 255, 255, 0.06);">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="text-secondary" style="font-size: 0.72rem;">Usuario:</span>
                    @if (session('es_admin'))
                        <span class="badge bg-warning text-dark" style="font-size: 0.65rem;">Admin</span>
                    @else
                        <span class="badge bg-info text-dark" style="font-size: 0.65rem;">Estudiante</span>
                    @endif
                </div>
                <div class="text-light fw-semibold text-truncate" style="font-size: 0.78rem;">
                    <i class="bi bi-person me-1 text-secondary"></i>{{ session('cedula_usuario') }}
                </div>
            </div>
            <a href="{{ session('es_admin') ? route('admin.metro.logout') : route('metro.logout') }}" class="btn btn-outline-danger btn-sm w-100 py-1" style="font-size: 0.75rem;">
                <i class="bi bi-box-arrow-right me-1"></i> Cerrar Sesión
            </a>
        @else
            <a href="{{ request()->is('admin*') ? route('admin.metro.login') : route('metro.login') }}" class="btn btn-outline-success btn-sm w-100 py-1" style="font-size: 0.75rem;">
                <i class="bi bi-box-arrow-in-right me-1"></i> Iniciar Sesión
            </a>
        @endif
    </div>
</aside>
