<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Handsontable Community CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable@14.3.0/dist/handsontable.full.min.css">
    <script src="https://cdn.jsdelivr.net/npm/handsontable@14.3.0/dist/handsontable.full.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #0f172a;
            color: #94a3b8;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            font-size: 0.8125rem;
            border-right: 1px solid rgba(255, 255, 255, 0.06);
        }
        .sidebar-heading {
            font-size: 0.6875rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #64748b;
            font-weight: 700;
            padding: 0.6rem 0.5rem 0.25rem 0.5rem;
        }
        .sidebar .nav-link {
            color: #94a3b8;
            padding: 0.45rem 0.65rem;
            border-radius: 0.375rem;
            margin: 0.1rem 0;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-weight: 500;
            font-size: 0.8125rem;
            text-decoration: none;
            transition: all 0.15s ease-in-out;
        }
        .sidebar .nav-link:hover {
            color: #f8fafc;
            background-color: rgba(255, 255, 255, 0.06);
        }
        .sidebar .nav-link.active {
            color: #ffffff;
            background: #059669;
            font-weight: 600;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        }
        .sidebar .sub-nav-link {
            color: #94a3b8;
            padding: 0.38rem 0.65rem 0.38rem 1.75rem;
            border-radius: 0.375rem;
            margin: 0.1rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.785rem;
            text-decoration: none;
            transition: all 0.15s ease-in-out;
        }
        .sidebar .sub-nav-link:hover {
            color: #f8fafc;
            background-color: rgba(255, 255, 255, 0.05);
        }
        .sidebar .sub-nav-link.active {
            color: #34d399;
            font-weight: 600;
            background-color: rgba(5, 150, 105, 0.15);
        }
        .main-content {
            margin-left: 250px;
            padding: 1.75rem;
            min-height: 100vh;
        }
        @media (max-width: 991.98px) {
            .sidebar {
                position: static;
                width: 100%;
                min-height: auto;
            }
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    @include('formulariometro.partials.sidebar')

    <main class="main-content">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
