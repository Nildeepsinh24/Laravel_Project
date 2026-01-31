@extends('admin.layouts.app')

@section('title','Orders')

@section('content')
@php $asset = asset('assets'); @endphp
<section id="hiro-section">
    <div class="container-fluid p-0">
        <div class="row hiro-main">
            <div class="col-md-12 hiro-bgclr" style="background: var(--og-primary); color: white;">
                <div class="hiro-cnct-btn text-center">
                    <h6 class="hiro-headsix">Admin Panel</h6>
                    <h1 class="hiro-head-one">Orders Management</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="cnct-one">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4" style="background: var(--og-card); border: 1px solid var(--og-primary-soft);">
                    <h4 class="mb-3" style="color: var(--og-text);">Order Records</h4>
                    <table class="table table-striped">
                        <thead style="background: var(--og-primary-soft);">
                            <tr>
                                <th style="color: var(--og-text);">ID</th>
                                <th style="color: var(--og-text);">Customer</th>
                                <th style="color: var(--og-text);">Total</th>
                                <th style="color: var(--og-text);">Status</th>
                                <th style="color: var(--og-text);">Date</th>
                                <th style="color: var(--og-text);">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td style="color: var(--og-text);">{{ $order->id }}</td>
                                <td style="color: var(--og-text);">{{ $order->user->name ?? ($order->first_name . ' ' . $order->last_name) ?? 'N/A' }}</td>
                                <td style="color: var(--og-text);">₹{{ number_format($order->total_amount, 2) }}</td>
                                <td style="color: var(--og-text);">{{ $order->status }}</td>
                                <td style="color: var(--og-text);">{{ $order->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm" style="background: var(--og-primary); color: white;">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
