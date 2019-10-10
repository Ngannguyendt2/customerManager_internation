@extends('home')
@section('title', 'SỬA THÔNG TIN KHÁCH HÀNG ')
@section('content')
    <div class="error-message">
        @if ($errors->any())
            @foreach($errors->all() as $nameError)
                <p style="color:red">{{ $nameError }}</p>
            @endforeach

        @endif
    </div>
    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>SỬA THÔNG TIN KHÁCH HÀNG</h1></div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>
            <form method="post" action="{{route('customers.update',$customer->id)}}">
                @csrf
                <div class="form-group">
                    <label >@lang('message.name')</label>
                    <input type="text" class="form-control" placeholder="full name" name="name" value="{{$customer->name}}" >
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{$customer->email}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
