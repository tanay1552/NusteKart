



<style>
    /* ===== RESET ===== */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: system-ui, -apple-system, sans-serif;
}

/* ===== HEADER ===== */
.nk-header {
    background: #0ea5a4;
    color: white;
    position: sticky;
    top: 0;
    z-index: 1000;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

/* ===== CONTAINER ===== */
.nk-container {
    max-width: 1200px;
    margin: auto;
    padding: 14px 18px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* ===== LOGO ===== */
.nk-logo {
    font-size: 26px;
    font-weight: 700;
    letter-spacing: 0.5px;
}

/* ===== NAV ===== */
.nk-nav {
    display: flex;
    gap: 28px;
}

.nk-nav a {
    color: white;
    text-decoration: none;
    font-weight: 500;
    padding: 6px 10px;
    border-radius: 6px;
    transition: 0.25s ease;
}

.nk-nav a:hover {
    background: rgba(255,255,255,0.15);
}

/* ===== MOBILE MENU BUTTON ===== */
.nk-menu-toggle {
    display: none;
    font-size: 26px;
    background: none;
    border: none;
    color: white;
    cursor: pointer;
}

/* ===================================
   📱 MOBILE
=================================== */
@media (max-width: 768px) {

    .nk-menu-toggle {
        display: block;
    }

    .nk-nav {
        position: absolute;
        top: 60px;
        right: 0;
        background: #0ea5a4;
        flex-direction: column;
        width: 220px;
        padding: 12px;
        gap: 8px;
        transform: translateX(110%);
        transition: 0.3s ease;
        border-radius: 0 0 0 12px;
    }

    .nk-nav.show {
        transform: translateX(0);
    }

    .nk-nav a {
        padding: 10px;
    }
}

/* ===================================
   💻 TABLET
=================================== */
@media (min-width: 769px) and (max-width: 1024px) {

    .nk-logo {
        font-size: 24px;
    }

    .nk-nav {
        gap: 18px;
    }
}

/* ===================================
   🖥️ DESKTOP
=================================== */
@media (min-width: 1025px) {

    .nk-container {
        padding: 16px 24px;
    }

    .nk-logo {
        font-size: 28px;
    }
}

</style>
<header class="nk-header">
    <div class="nk-container">

        <h1 class="nk-logo">NusteKart</h1>

        <button class="nk-menu-toggle" id="menuToggle">
            ☰
        </button>

        <nav class="nk-nav" id="nkNav">
            <a href="/vendor">Vendor</a>
            <a href="/delivery">Delivery</a>
            <a href="/today">Today's Data</a>
            <a href="/orders">Orders</a>

        </nav>

    </div>
</header>
<script>
document.getElementById('menuToggle')
    .addEventListener('click', function () {
        document.getElementById('nkNav').classList.toggle('show');
    });
</script>
