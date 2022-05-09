@extends('index')
@section('content')
@if(isset($log))
<?php echo $log; ?>
@endif
<br>
<a class="btn btn-primary" href="/order_cust">返回</a>
<hr>
<div class="container">
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item list-group-item-action active">客戶編號</li>
        <li class="list-group-item list-group-item-action active">客戶名稱</li>
        <li class="list-group-item list-group-item-action active">客戶身分證</li>
        <li class="list-group-item list-group-item-action active">客戶生日</li>
        <li class="list-group-item list-group-item-action active">客戶電話</li>
        <li class="list-group-item list-group-item-action active">郵遞區號</li>
        <li class="list-group-item list-group-item-action active">客戶地址</li>
    </ul>
    @if(isset($cust))
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item list-group-item-action ">{{$cust['cust_id']}}</li>
                <li class="list-group-item list-group-item-action ">{{$cust['name']}}</li>
                <li class="list-group-item list-group-item-action ">{{$cust['user_id']}}</li>
                <li class="list-group-item list-group-item-action ">{{$cust['birth']}}</li>
                <li class="list-group-item list-group-item-action ">{{$cust['tel']}}</li>
                <li class="list-group-item list-group-item-action ">{{$cust['postalCode']}}</li>
                <li class="list-group-item list-group-item-action ">{{$cust['address']}}</li>
            </ul>
    @endif
</div>
@endsection
