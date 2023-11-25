@extends('admin.admin_master')

@section('dashboard_content')
    @include('admin.dashboard_layout.breadcrumb', [
    'name' => 'Clients',
    'url' => "clients.index",
    'section_name' => 'Tous les clients'
    ])
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="box">
                    <div class="box-header with-border d-flex justify-content-between align-items-center">
                        <h3 class="box-title"> TABLE DE DONNÉES DES CLIENTS</h3>
                     </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1" class="table table-bordered table-striped dataTable"
                                            role="grid" aria-describedby="example1_info">
                                            <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Image profile </th>
                                                    <th>Nom </th>
                                                    <th>Email </th>
                                                    <th>Statut</th>
                                                    <th>Commandes </th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($clients as $item)
                                                <tr role="row" class="odd">
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>
                                                        <img src="{{ asset($item->profile_photo_path) }}" alt="" style="width: 70px; height:40px;">
                                                    </td>
                                                    <td class="sorting_1">{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td> 
                                                        <input data-id="{{ $item->unique_key_client }}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $item->status ? 'checked' : '' }}>
                                                    </td>

                                                    <td>
                                                        <span>{{ $item->nombre_commandes }}</span>
                                                        <a href="{{ route('client.orders', $item->unique_key_client  ) }}" class="waves-effect waves-light btn btn-info btn-circle mx-5"><span class="mdi mdi-arrow-right"></span></a>
                                                    </td>
                                                    
                                                    <td>
                                                        <div class="input-group">
                                                            <a href="{{ route('client.edit', $item->unique_key_client  ) }}" class="waves-effect waves-light btn btn-secondary"><span class="mdi mdi-arrow-right"></span></a>
 
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    @section('dashboard_script')
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var _id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/changeclientstatus',
                    data: {'status': status, '_id': _id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
    @endsection
@endsection
