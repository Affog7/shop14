<div class="col-md-2">
    <img class="rounded-circle" src="{{ !empty($user->profile_photo_path) ? url('storage/profile-photos/'.$user->profile_photo_path) : url('storage/profile-photos/blank_profile_photo.jpg') }}" alt="User Avatar" height="100%" width="100%">
    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Accueil</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile</a>
        <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Changer le mot de passe</a>
        <a href="{{ route('user.orders') }}" class="btn btn-primary btn-sm btn-block">Listes Commandes</a>
        <a href="{{ route('user.return-orders') }}" class="btn btn-primary btn-sm btn-block">Commandes Retournées</a>
        <a href="{{ route('user.cancel-orders') }}" class="btn btn-primary btn-sm btn-block">Commandes annulées</a>
        <a href="{{ route('user.logout') }}" class="btn btn-primary btn-sm btn-block">Déconnecter</a>
    </ul>
</div>
