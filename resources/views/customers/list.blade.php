@extends('home')
@section('title', 'Danh sách khách hàng')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>Danh Sách Khách Hàng</h1></div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>
            <p style='color:green'>{{ (isset($success)) ? $success : '' }}</p>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($customers)==0)
                    <tr>
                        <td colspan="4">Không có dữ liệu</td>
                    </tr>
                @else
                    @foreach($customers as $key=>$customer)
                        <tr>
                            <th>{{++$key}}</th>
                            <th><a href="{{route('customers.detail',['id'=>$customer->id])}}">{{$customer->name}}</a></th>
                            <th><a href="{{route('customers.edit',['id'=>$customer->id])}}" class="btn btn-primary">Edit</a>|<a
                                    href="{{route('customers.destroy',['id'=>$customer->id])}}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure want to delete?')">Delete</a></th>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{route('customers.create')}}">ADD</a>
        </div>
    </div>
@endsection
