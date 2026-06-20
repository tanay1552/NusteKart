<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NusteKart</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ===== RESET ===== */
        body {
            margin: 0;
            font-family: system-ui, -apple-system, Arial, sans-serif;
            background: #f5f7fb;
        }

        /* ===== HEADER ===== */
        .nk-header {
            position: sticky;
            top: 0;
            z-index: 999;
            background: #0d6efd;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        .nk-header-inner {
            display: flex;
            flex-direction: column;
            padding: 12px 14px;
        }

        .nk-logo {
            color: white;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .nk-nav {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding-bottom: 4px;
        }

        .nk-nav::-webkit-scrollbar {
            display: none;
        }

        .nk-nav a {
            flex: 0 0 auto;
            text-decoration: none;
            color: white;
            padding: 8px 14px;
            border-radius: 20px;
            background: rgba(255,255,255,0.15);
            font-size: 14px;
            font-weight: 500;
            white-space: nowrap;
        }

        .nk-nav a.active {
            background: white;
            color: #0d6efd;
            font-weight: 600;
        }

        /* ===== CONTENT ===== */
        .nk-container {
            padding: 14px;
            min-height: calc(100vh - 120px);
        }

        /* ===== FOOTER ===== */
        .nk-footer {
            background: #111;
            color: #bbb;
            text-align: center;
            padding: 14px;
            margin-top: 30px;
            font-size: 13px;
        }

        /* ===== DESKTOP ===== */
        @media (min-width: 768px) {
            .nk-header-inner {
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
            }

            .nk-logo {
                margin-bottom: 0;
                font-size: 24px;
            }

            .nk-nav a {
                font-size: 15px;
                padding: 9px 18px;
            }

            .nk-container {
                padding: 20px 40px;
            }
        }
    </style>
</head>
<body>

    <!-- ===== HEADER ===== -->
    <header class="nk-header">
        <div class="nk-header-inner">

            <div class="nk-logo">NusteKart</div>

            <nav class="nk-nav">
                <a href="/today" class="{{ request()->is('today') ? 'active' : '' }}">Today</a>
                <a href="/orders" class="{{ request()->is('orders') ? 'active' : '' }}">Orders</a>
                <a href="/vendor" class="{{ request()->is('vendor') ? 'active' : '' }}">Vendor</a>
                <a href="/delivery" class="{{ request()->is('delivery') ? 'active' : '' }}">Delivery</a>
            </nav>

        </div>
    </header>

    <!-- ===== PAGE CONTENT ===== -->
    <main class="nk-container">
        @yield('content')
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="nk-footer">
        © {{ date('Y') }} NusteKart • Fresh Seafood Delivery
    </footer>

</body>
</html>
