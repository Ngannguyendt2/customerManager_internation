@extends('home')
@section('title', 'Chi tiet khach hang ')
@section('content')
    <div class="title m-b-md">
        Chi tiết khách hàng
    </div>
    <div class="row">
        @if(!isset($customer))
            <p class="text-danger">Không có khách hàng nào.</p>
        @else
            <div class="col-12">
                <div class="card text-left" style="width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $customer->name }}</h5>
                        <p class="card-text">{{ $customer->email }}</p>
                        <p class="card-text text-danger">Số lượt xem: {{ $customer->view_count }}</p>
                        <a href="{{ route('customers.index') }}" class="btn btn-primary">< Quay lại </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
