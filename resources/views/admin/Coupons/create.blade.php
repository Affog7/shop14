@extends('admin.admin_master')

@section('dashboard_content')
    @include('admin.dashboard_layout.breadcrumb', [
    'name' => 'Coupon',
    'url' => "coupons.index",
    'section_name' => 'Tous les Coupons'
    ])
    <section class="content">
        <div class="row">
            {{-- Add Coupon Page --}}
            <div class="col-md-8 col-lg-8 offset-2">
                <div class="box">
                    <div class="box-header with-border d-flex justify-content-between align-items-center">
                        <h3 class="box-title">Ajouter un nouveau coupon</h3>
                        <a href="{{ route('coupons.index') }}" class="btn btn-primary">Coupon de liste de retour</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('coupons.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <h5>Nom de coupon <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="coupon_name" class="form-control" required="" data-validation-required-message="Ce champ est obligatoire"> <div class="help-block"></div>
                                </div>
                                @error('coupon_name')
                                    <span class="alert text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5>Remise des coupons (%) <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="number" name="coupon_discount" class="form-control" required="" data-validation-required-message="Ce champ est obligatoire"> <div class="help-block"></div>
                                </div>
                                @error('coupon_discount')
                                    <span class="alert text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5>Validité du coupon <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="date" name="coupon_validity" class="form-control" required="" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" data-validation-required-message="Ce champ est obligatoire"> <div class="help-block"></div>
                                </div>
                                @error('coupon_validity')
                                    <span class="alert text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5>Statut de coupon <span class="text-danger"></span></h5>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox"
                                    id="coupon_status" name="coupon_status" checked value="1">
                                    <label class="form-check-label" for="coupon_status">Statut actif</label>
                                </div>
                            </div>
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-rounded btn-info">Soumettre</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
