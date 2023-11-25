<section class="content">
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Formulaire de modification du profil d'administration</h4>
                    </div>
                    <div class="box-body">
                                <form action="{{ route('clients.update', Illuminate\Support\Facades\Crypt::encryptString($editData->email)) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Nom du client <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ $editData->name }}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                                            </div>
                                            @error('name')
                                                <span class="alert text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Champ de courrier électronique <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" value="{{ $editData->email }}" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                                            </div>
                                            @error('email')
                                                <span class="alert text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Type d'utilsateur <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="type" id="" class="form-control">
                                                    
                                                    <option value="10_n_452" <?php if ($editData->type == 1) echo "selected"; ?> >Client</option>
                                                    <option value="10_p8_452"  <?php if ($editData->type == 2) echo "selected"; ?>>Professionnel</option>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <h5>Password Input   <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password" class="form-control"   data-validation-required-message="This field is required"> <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Repeat Password  <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="confirm_password" data-validation-match-match="password" class="form-control"  > <div class="help-block"></div>
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <h5>Champ de saisie de fichiers <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image" id="image" class="form-control"> <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 widget-user-image">
                                            <img  id="show-image" class="rounded-circle" src="{{ !empty($editData->profile_photo_path) ? url('upload/admin_images/'.$editData->profile_photo_path) : url('upload/admin_images/blank_profile_photo.jpg') }}" alt="User Avatar" style="float: right" width="100px" height="100px">
                                        </div>
                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded btn-primary mb-5">Mise à jour</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </div>
    </section>
   