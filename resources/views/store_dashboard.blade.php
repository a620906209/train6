@extends('index')
@section('content')
@if(isset($log))
<?php echo $log;?>
@endif

@if(Session::get('store_name'))
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
        <input type="text" value="{{Session::get('store_name')}}" name="store_name">
        <div>
            <button class="btn btn-outline-danger">送出</button>
        </div>
    </form>
@endif
@if(Session::get('store_name') == NULL)
    <form action="/store_login" method="POST">
        @csrf
    <div class="form-group">
        <label for="">店家帳號</label>
        <input type="" class="form-control" id="" aria-describedby="" placeholder="Sales Account" name="store_acct">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">店家密碼</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="store_pwd">
        <br>
    <button type="submit" class="btn btn-primary">送出</button>
    </form>
@endif
@endsection
