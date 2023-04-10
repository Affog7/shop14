@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
    // $request = Request::is('/orders');
    // dd($route, $prefix, $request);
@endphp

<aside class="main-sidebar">
<!-- sidebar-->
<section class="sidebar">

    <div class="user-profile">
        <div class="ulogo">
                <a href="home">
                <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                      <!--   <img src="{{ asset('backend') }}/images/logo-dark.png" alt="">-->
                        <h3><b>SHOP</b> GESTION</h3>
                    </div>
            </a>
        </div>
    </div>

    <!-- sidebar menu-->
    <ul class="sidebar-menu" data-widget="tree">

    <li class="{{ ($route == 'admin.dashboard') ? 'active':'' }}">
        <a href="{{ route('admin.dashboard') }}">
            <i data-feather="pie-chart"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="treeview {{ Request::is('admin/orders*') ? 'active' : '' }}">
        <a href="#">
        <i data-feather="file"></i> <span>COMMANDES</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
            <li class=" {{ route('orders.index') ? 'active' : '' }}">
                <a href="{{ route('orders.index') }}"><i class="ti-more"></i>Toutes Commandes</a>
            </li>
            <li class=" {{ Request::is('admin/orders/pending') ? 'active' : '' }}">
                <a href="{{ route('pending.orders') }}"><i class="ti-more"></i>En attente Commandes</a>
            </li>
            <li class=" {{ Request::is('admin/orders/confirmed') ? 'active' : '' }}">
                <a href="{{ route('confirmed.orders') }}"><i class="ti-more"></i>Confirmé Commandes</a>
            </li>
            <li class=" {{ Request::is('admin/orders/processing') ? 'active' : '' }}">
                <a href="{{ route('processing.orders') }}"><i class="ti-more"></i>Traitement Commandes</a>
            </li>
            <li class=" {{ Request::is('admin/orders/picked') ? 'active' : '' }}">
                <a href="{{ route('picked.orders') }}"><i class="ti-more"></i>Choisie Commandes</a>
            </li>
            <li class=" {{ Request::is('admin/orders/shipped') ? 'active' : '' }} ">
                <a href="{{ route('shipped.orders') }}"><i class="ti-more"></i>Expédié Commandes</a>
            </li>
            <li class=" {{ Request::is('admin/order/delivered*') ? 'active' : '' }}">
                <a href="{{ route('delivered.orders') }}"><i class="ti-more"></i>Livré Commandes</a>
            </li>
            <li class=" {{ Request::is('admin/orders/cancel') ? 'active' : '' }}">
                <a href="{{ route('cancel.orders') }}"><i class="ti-more"></i>Annuler Commandes</a>
            </li>
            <li class=" {{ Request::is('admin/orders/return') ? 'active' : '' }}">
                <a href="{{ route('return.orders') }}"><i class="ti-more"></i>Retour Commandes</a>
            </li>
        </ul>
    </li>

    <li class="treeview {{ ($route == 'brands.index') ? 'active' : '' }}">
        <a href="#">
        <i data-feather="message-circle"></i>
        <span>Marques</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li class=" {{ ($route == 'brands.index') ? 'active' : '' }}">
            <a href="{{ route('brands.index') }}"><i class="ti-more"></i>Toute marque</a>
        </li>
        </ul>
    </li>
    <li class="treeview {{ ($route == 'categories.index') ? 'active' : '' }}">
        <a href="#">
        <i data-feather="message-circle"></i>
        <span>Category</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
            <li class=" {{ ($route == 'categories.index') ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}"><i class="ti-more"></i>Toute catégorie</a>
            </li>
            <li class=" {{ ($route == 'subcategories.index') ? 'active' : '' }}">
                <a href="{{ route('subcategories.index') }}"><i class="ti-more"></i>Toute sous-catégorie</a>
            </li>
            <li class=" {{ ($route == 'subsubcategories.index') ? 'active' : '' }}">
                <a href="{{ route('subsubcategories.index') }}"><i class="ti-more"></i>Toutes les sous-catégories</a>
            </li>
        </ul>
    </li>

    <li class="treeview {{ ($route == 'products.index') ? 'active' : '' }}">
        <a href="#">
        <i data-feather="mail"></i> <span>Catalogue de produits</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
            <li class=" {{ ($route == 'products.create') ? 'active' : '' }}">
                <a href="{{ route('products.create') }}"><i class="ti-more"></i>Ajouter le produit</a>
            </li>
            <li class=" {{ ($route == 'products.index') ? 'active' : '' }}">
                <a href="{{ route('products.index') }}"><i class="ti-more"></i>Gérer les produits</a>
            </li>
        </ul>
    </li>

    <li class="treeview {{ ($prefix == '/slider') ? 'active' : '' }}">
        <a href="#">
        <i data-feather="file"></i> <span>Les Caroussels (Slider)</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
            <li class=" {{ ($route == '/slider') ? 'active' : '' }}">
                <a href="{{ route('slider.index') }}"><i class="ti-more"></i>Gérer Slider</a>
            </li>
        </ul>
    </li>

    <li class="treeview {{ ($prefix == '/coupons') ? 'active' : '' }}">
        <a href="#">
        <i data-feather="file"></i> <span>Coupons</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
            <li class=" {{ ($route == '/coupons') ? 'active' : '' }}">
                <a href="{{ route('coupons.index') }}"><i class="ti-more"></i>Gérer Coupon</a>
            </li>
        </ul>
    </li>
    <li class="treeview {{ ($prefix == '/division') ? 'active' : '' }}">
        <a href="#">
        <i data-feather="file"></i> <span>Zone d'expedition</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
            <li class=" {{ ($route == '/division') ? 'active' : '' }}">
                <a href="{{ route('division.index') }}"><i class="ti-more"></i>Division des expéditions</a>
            </li>
            <li class=" {{ ($route == '/division') ? 'active' : '' }}">
                <a href="{{ route('district.index') }}"><i class="ti-more"></i>District des expéditions</a>
            </li>
            <li class=" {{ ($route == '/state') ? 'active' : '' }}">
                <a href="{{ route('state.index') }}"><i class="ti-more"></i>État des expéditions</a>
            </li>
        </ul>
    </li>

    <li class="header nav-small-cap">Interface utilisateur</li>

{{--    <li class="treeview">
        <a href="#">
        <i data-feather="grid"></i>
        <span>Components</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-right pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
        <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
        <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
        <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
        <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
        <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
        <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
        <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
        </ul>
    </li>
    </ul>
</section>
--}}
{{-- <div class="sidebar-footer">
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
    <!-- item-->
    <a href="{{ route('admin.logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
</div> --}}
</aside>
