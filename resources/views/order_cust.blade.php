@extends('index')
@section('content')
@if(isset($log))
<?php echo $log; ?>
@endif
<br>
<div class="container">
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item list-group-item-action active">商品名稱</li>
        <li class="list-group-item list-group-item-action active">銷售商品數量</li>
        <li class="list-group-item list-group-item-action active">購買人編號</li>
    </ul>
    @if(isset($sql))
        @foreach ($sql as $data)
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item list-group-item-action ">{{$data ->item_name}}</li>
                <li class="list-group-item list-group-item-action ">{{$data->qty}}</li>
                <li class="list-group-item list-group-item-action "><a  class = "btn btn-outline-info"href='/cust/{{$data->cust_id}}'>{{$data->cust_id}}</a></li>
            </ul>
        @endforeach
    @endif
</div>
@endsection
