@extends('admin.admin_master')

@section('title', 'Client Profil')

@section('dashboard_content')
@include('admin.dashboard_layout.breadcrumb', [
    'name' => 'Clients',
    'url' => "clients.index",
    'section_name' => 'Détails commandes clients'
    ])
<section class="content">
<div class="row">
    <div class="col-12 col-lg-5 col-xl-6">
        @include('admin.widgets.client.wprofile')
    </div>
</div>
@include('admin.widgets.order.whistory')
</section>
@endsection

