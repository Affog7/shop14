@extends('admin.admin_master')

@section('dashboard_content')
    @include('admin.dashboard_layout.breadcrumb', [
    'name' => 'Order Details',
    'url' => "orders.index",
    'section_name' => 'View Commande'
    ])
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-lg-6">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Les détails d'expédition</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <th> Nom pour la livraison : </th>
                                <th> {{ $order->name }} </th>
                            </tr>
                            <tr>
                                <th> Téléphone d'expédition : </th>
                                <th> {{ $order->phone }} </th>
                            </tr>
                            <tr>
                                <th> E-mail d'expédition : </th>
                                <th> {{ $order->email }} </th>
                            </tr>
                            <tr>
                                <th> Région : </th>
                                <th> {{ $order->division->division_name }} </th>
                            </tr>
                            <tr>
                                <th> Département : </th>
                                <th> {{ $order->district->district_name }} </th>
                            </tr>
                            <tr>
                                <th> Ville : </th>
                                <th>{{ $order->state->state_name }} </th>
                            </tr>
                            <tr>
                                <th> Code postal : </th>
                                <th> {{ $order->post_code }} </th>
                            </tr>
                            <tr>
                                <th> Commande Date : </th>
                                <th> {{ $order->order_date }} </th>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-6 col-lg-6">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">détails de la commande</h3>
                        <span class="text-danger"> Facture : {{ $order->invoice_number }}</span>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table">
                            <tr>
                                <th> Nom : </th>
                                <th> {{ $order->user->name }} </th>
                            </tr>
                            <tr>
                                <th> Téléphone : </th>
                                <th> {{ $order->user->phone }} </th>
                            </tr>
                            <tr>
                                <th> Type de paiement : </th>
                                <th> {{ $order->payment_method }} </th>
                            </tr>
                            <tr>
                                <th> Tranx ID : </th>
                                <th> {{ $order->transaction_id }} </th>
                            </tr>
                            <tr>
                                <th> Facture : </th>
                                <th class="text-danger"> {{ $order->invoice_number }} </th>
                            </tr>
                            <tr>
                                <th> Commande Total : </th>
                                <th>$ {{ $order->amount }} </th>
                            </tr>
                            <tr>
                                <th> Statut : </th>
                                <th>
                                    <span class="badge badge-success">{{ $order->status }}
                                    </span>
                                </th>
                            </tr>
                            <tr>
                                <th> Raison de retour: <p>{{ $order->return_reason }}</p></th>
                                <th>
                                    @if ($order->status == 'En vérification')
                                    <a href="{{ route('order-status.update', [
                                        'order_id' => $order->id,
                                        'status' => 'confirmed'
                                    ]) }}" class="btn btn-block btn-success">Commande Confirmée</a>
                                    @elseif ($order->status == 'confirmed')
                                    <a href="{{ route('order-status.update', [
                                        'order_id' => $order->id,
                                        'status' => 'En cours'
                                    ]) }}" class="btn btn-block btn-success"> Commande en cours</a>
                                    @elseif ($order->status == 'En cours')
                                    <a href="{{ route('order-status.update', [
                                        'order_id' => $order->id,
                                        'status' => 'Prise'
                                    ]) }}" class="btn btn-block btn-success"> Commande prise</a>
                                    @elseif ($order->status == 'Prise')
                                    <a href="{{ route('order-status.update', [
                                        'order_id' => $order->id,
                                        'status' => 'expédiée'
                                    ]) }}" class="btn btn-block btn-success"> Commande expédiée</a>
                                    @elseif ($order->status == 'expédiée')
                                    <a href="{{ route('order-status.update', [
                                        'order_id' => $order->id,
                                        'status' => 'livrée'
                                    ]) }}" class="btn btn-block btn-success"> Commande livrée</a>
                                    @elseif ($order->status == 'cancel')
                                    <a href="{{ route('order-status.update', [
                                        'order_id' => $order->id,
                                        'status' => 'retournée'
                                    ]) }}" class="btn btn-block btn-danger"> Commande retournée</a>
                                    @endif
                                </th>
                            </tr>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-8 col-lg-8">
                <div class="box box-bordered border-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Vue de la commande</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr style="background: #e3e3e3;">
                                        <td class="text-dark">
                                            <label for=""> Image</label>
                                        </td>
                                        <td class="text-dark">
                                            <label for=""> Nom de produit </label>
                                        </td>
                                        <td class="text-dark">
                                            <label for="">Code produit</label>
                                        </td>
                                        <td class="text-dark">
                                            <label for=""> Couleur </label>
                                        </td>
                                        <td class="text-dark">
                                            <label for=""> Taille </label>
                                        </td>
                                        <td class="text-dark">
                                            <label for=""> Quantité </label>
                                        </td>
                                        <td class="text-dark">
                                            <label for=""> Prix </label>
                                        </td>
                                        <td class="text-dark">
                                            <label for=""> Télécharger </label>
                                        </td>
                                    </tr>
                                    @foreach ($orderItems as $item)
                                        <tr>
                                            <td class="col-md-1">
                                                <label for=""><img src="{{ asset( $item->product->product_thumbnail ) }}"
                                                        height="50px;" width="50px;"> </label>
                                            </td>
                                            <td class="col-md-3">
                                                <label for=""> {{ $item->product->product_name_en }}</label>
                                            </td>
                                            <td class="col-md-3">
                                                <label for=""> {{ $item->product->product_code }}</label>
                                            </td>
                                            <td class="col-md-2">
                                                <label for=""> {{ $item->color }}</label>
                                            </td>
                                            <td class="col-md-2">
                                                <label for=""> {{ $item->size }}</label>
                                            </td>
                                            <td class="col-md-2">
                                                <label for=""> {{ $item->qty }}</label>
                                            </td>

                                            <td class="col-md-3">
                                                <label for=""> ${{ $item->unit_price }} ( $ {{ $item->unit_price * $item->qty }} ) </label>
                                            </td>
                                            @php
                                                $file = App\Models\Product::where('id', $item->product_id)->first();
                                            @endphp

                                            <td class="col-md-1">
                                                @if ($order->status == 'En vérification')
                                                    <strong>
                                                        <span class="badge badge-pill badge-success" style="background: #418DB9;"> No
                                                            Fichier</span> </strong>

                                                @elseif($order->status == 'confirm')

                                                    <a target="_blank" href="{{ asset('upload/pdf/' . $file->digital_file) }}">
                                                        <strong>
                                                            <span class="badge badge-pill badge-success" style="background: #FF0000;">
                                                               Télécharger prêt</span> </strong> </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-4 col-lg-4">
                @include('admin.widgets.messages.wmessage',[
                    'type' => 'admin'
                    ])
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
