@extends('index')
@section('content')
<h6 style="color : red;">註冊店家</h6>
<form action="/addstore" method="POST">
    @csrf
  <div class="form-group">
    <label for="">店家帳號</label>
    <input type="" class="form-control" id="" aria-describedby="" placeholder="Sales Account" name="store_acct">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">店家密碼</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="store_pwd">
    <div class="form-group">
        <label for="">店家名稱</label>
        <input type="" class="form-control" id="" aria-describedby="" placeholder="Sales Account" name="store_name">
      </div>
  <button type="submit" class="btn btn-primary">送出</button>
</form>

@endsection
