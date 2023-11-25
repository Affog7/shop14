@extends('admin.admin_master')

@section('title', 'Admin Profil')

@section('dashboard_content')
<section class="content">
<div class="row">
    <div class="col-12 col-lg-5 col-xl-6">
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-black">
            <a href="{{ route('admin.profile.edit') }}" class="btn btn-info" style="float: right">Edit Profile</a>
            <h3 class="widget-user-username">Nom de l'administrateur: {{ $adminData->name }}</h3>
            <h6 class="widget-user-desc"> E-mail administrateur: {{ $adminData->email }}</h6>
        </div>
        <div class="widget-user-image">
            <img class="rounded-circle" src="{{ !empty($adminData->profile_photo_path) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/admin_images/blank_profile_photo.jpg') }}" alt="User Avatar">
        </div>
        <div class="box-footer">
            <div class="row">
            <div class="col-sm-4">
                <div class="description-block">
                <h5 class="description-header">---</h5>
                <span class="description-text">----</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 br-1 bl-1">
                <div class="description-block">
                <h5 class="description-header">---</h5>
                <span class="description-text">----</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4">
                <div class="description-block">
                <h5 class="description-header">---</h5>
                <span class="description-text">----</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        </div>
    </div>
</div>
</section>
@endsection

