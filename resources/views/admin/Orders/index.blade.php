@extends('admin.admin_master')

@section('dashboard_content')
    @include('admin.dashboard_layout.breadcrumb', [
    'name' => 'Orders',
    'url' => "orders.index",
    'section_name' => 'All Commandes'
    ])
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            @if (Request::is('admin/orders'))
                                All Commandes List
                            @else
                                Statuswise Commande List
                            @endif
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    @include('admin.widgets.order.whistory')
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
