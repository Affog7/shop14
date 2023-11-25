@extends('dashboard')

@section('frontend_style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('userdashboard_content')

    @include('frontend.widgets.order.whistory')

@endsection

@section('frontend_script')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
    $('#myOrder').DataTable();
} );
</script>
@endsection
