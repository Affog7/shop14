@extends('admin.admin_master')

@section('title', 'Client Profil')
 
@section('dashboard_content')
@include('admin.dashboard_layout.breadcrumb', [
    'name' => 'Clients',
    'url' => "clients",
    'section_name' => 'Tous les clients'
    ])
@include('admin.widgets.client.wprofile_edit')
 
@endsection
 <script type="text/javascript">
    $(document).ready(function(){
    $('#image').change(function(e){
        let reader = new FileReader();
        reader.onload = function(e){
            $('#show-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});
</script>
