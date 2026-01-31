@extends('admin.layouts.app')

@section('title','Customers')

@section('content')
@php $asset = asset('assets'); @endphp
<section id="hiro-section">
    <div class="container-fluid p-0">
        <div class="row hiro-main">
            <div class="col-md-12 hiro-bgclr" style="background: var(--og-primary); color: white;">
                <div class="hiro-cnct-btn text-center">
                    <h6 class="hiro-headsix">Admin Panel</h6>
                    <h1 class="hiro-head-one">Customers Management</h1>
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
                    <h4 class="mb-3" style="color: var(--og-text);">Customer Records</h4>
                    <table class="table table-striped">
                        <thead style="background: var(--og-primary-soft);">
                            <tr>
                                <th style="color: var(--og-text);">ID</th>
                                <th style="color: var(--og-text);">Name</th>
                                <th style="color: var(--og-text);">Email</th>
                                <th style="color: var(--og-text);">Orders</th>
                                <th style="color: var(--og-text);">Joined</th>
                                <th style="color: var(--og-text);">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td style="color: var(--og-text);">{{ $customer->id }}</td>
                                <td style="color: var(--og-text);">{{ $customer->name }}</td>
                                <td style="color: var(--og-text);">{{ $customer->email }}</td>
                                <td style="color: var(--og-text);">{{ $customer->orders->count() }}</td>
                                <td style="color: var(--og-text);">{{ $customer->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.customers.show', $customer) }}" class="btn btn-sm" style="background: var(--og-primary); color: white;">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $customers->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
