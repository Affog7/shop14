<div class="box box-widget widget-user">
    <!-- Add the bg color to the header using any of the bg-* classes -->
<div class="widget-user-header bg-black">
    <a href="{{ route('client.edit', Illuminate\Support\Facades\Crypt::encryptString($client->email)  ) }}" class="waves-effect waves-light btn btn-info" style="float: right">Voir/Modifier</a>

     <h3 class="widget-user-username">Nom : {{ $client->name }}</h3>
    <h6 class="widget-user-desc"> E-mail : {{ $client->email }}</h6>
</div>
<div class="widget-user-image">
    <img class="rounded-circle" src="{{ !empty($client->profile_photo_path) ? url('upload/admin_images/'.$client->profile_photo_path) : url('upload/admin_images/blank_profile_photo.jpg') }}" alt="User Avatar">
</div>
<div class="box-footer">
    <div class="row">
    <div class="col-sm-4">
        <div class="description-block">
        <h5 class="description-header">Status</h5>
        @if ($client->status)
             <span title="Actif" class="avatar avatar-xs bg-success"></span>
        @else
             <span title="Non Actif" class="avatar avatar-xs bg-danger"></span>
        @endif
       
        
         </div>
        <!-- /.description-block -->
    </div>
    <!-- /.col -->
    <div class="col-sm-4 br-1 bl-1">
        <div class="description-block">
        <h5 class="description-header">Commandes</h5>
        <span class="description-text">{{ $client->nombre_commandes }}</span>
        </div>
        <!-- /.description-block -->
    </div>
    <!-- /.col -->
    <div class="col-sm-4">
        <div class="description-block">
        <h5 class="description-header">Total</h5>
        <span class="description-text">{{ $client->total }} {{ $client->currency }}</span>
        </div>
        <!-- /.description-block -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
</div>