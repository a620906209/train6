@extends('index')
@section('content')
@if(isset($log))
<?php echo "<h6 style='color:red;'>".$log."</h6>";?>
@endif
<br>
<div class="row">
    <div class="col-md-4">
        @if(Session::get('store_id'))
            <form action="/store_logout" method = "GET">
                @csrf
                <h8>你好</h8>
                <br>
                <h9>{{Session::get('store_name')}}</h9>
                <div>
                    <button class="btn btn-outline-danger">登出</button>
                </div>
            </form>
            <form action="/edit_store_name" method = "POST">
                @csrf
                <br>
                <H5>更換店名</H5>
                <input type="text" name="store_name">
                <div>
                    <button class="btn btn-outline-primary">送出</button>
                </div>
            </form>
            <form action="/items" method = "GET">
                @csrf
                <br>
                <div>
                    <button class="btn btn-outline-warning">新增商品</button>
                </div>
            </form>
        @endif
        @if(Session::get('store_id') == NULL)
            <form action="/store_login" method="POST">
                @csrf
            <div class="form-group">
                <label for="">店家帳號</label>
                <input type="" class="form-control" id="" aria-describedby="" placeholder="Store Account" name="store_acct">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">店家密碼</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="store_pwd">
                <br>
            <button type="submit" class="btn btn-primary" >送出</button>
            </form>
        @endif
</div>
<div class="col-md-4">
    <div class="container">
    @if(isset($items))
    <a class="btn btn-primary" href="/show_store">商品銷售狀況</a>
    <a class="btn btn-primary" href="/order_cust">商品明細</a>
    <hr>
    <ul class="list-group list-group-horizontal-lg">
        <li class="list-group-item list-group-item-action active">商品名稱</li>
        <li class="list-group-item list-group-item-action active">商品價格</li>
    </ul>
    @foreach ( $items as $item )
    <ul class="list-group list-group-horizontal-lg">
        <li class="list-group-item list-group-item-action">{{ $item['item_name'] }}</li>
        <li class="list-group-item list-group-item-action">NT.{{ $item['item_price'] }}</li>
    </ul>
    <div class="row align-items-end">
        <form class ="col" action="/item_update_page" method="POST">
            @csrf
            <div class="col"><button class="btn btn-outline-success" style="margin :3px;" name = "item_id"value = "{{$item['item_id']}}">修改</button></div>
        </form>
        <div class= "col">
            <form action="/item_delete" method="POST">
                @csrf
                <button class="btn btn-outline-danger " name = "item_id" value = "{{ $item['item_id']}}" style="margin :3px;">刪除</button>
            </form>
        </div>

    </div>
    @endforeach
    @endif
</div>
</div>



</div>

@endsection
