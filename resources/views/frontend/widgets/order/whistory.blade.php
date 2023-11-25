<div class="table-responsive">
    <table id="myOrder" class="table table-hover table-bordered display">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Invoice No</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
            <tr>
                <td scope="row">{{ $loop->index+1 }}</td>
                <td>{{ $order->created_at->diffForHumans() }}</td>
                <td>{{ $order->invoice_number }}</td>
                <td>{{ $order->amount }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>
                    @if ($order->status == 'En vérification')
                    <span class="badge badge-primary">{{ $order->status }}</span>
                    @elseif ($order->status == 'confirmed')
                    <span class="badge badge-secondary">{{ $order->status }}</span>
                    @elseif ($order->status == 'En cours')
                    <span class="badge badge-info">{{ $order->status }}</span>
                    @elseif ($order->status == 'Prise')
                    <span class="badge badge-warning">{{ $order->status }}</span>
                    @elseif ($order->status == 'expédiée')
                    <span class="badge badge-light">{{ $order->status }}</span>
                    @elseif ($order->status == 'livrée')
                    <span class="badge badge-success">{{ $order->status }}</span>
                    @else
                    <span class="badge badge-danger">{{ $order->status }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('order-deatils', $order->id) }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-eye"></i>View
                    </a>
                    <a href="{{ route('invoice-download', $order->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-download"></i>Invoice</a>
                </td>
            </tr>
            @empty
            <tr>
                <td>No order placed yet!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>