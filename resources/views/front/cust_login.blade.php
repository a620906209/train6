@extends('front.main')
@section('content')
@if(isset($log))
    <?php echo "<h6 style='color:red;'>".$log."</h6>";?>
@endif
@if(Session::get('cust_id'))
    <form action="/cust_logout" method = "GET">
        @csrf
        <div class= "col">
            <button class="btn btn-outline-danger">登出</button>
        </div>
    </form>
@endif
@if(Session::get('cust_id') == NULL)
    <div class="row">
        <form action="/cust_login" method="POST">
            @csrf
        <div class="form-group">
            <label for="">客戶帳號</label>
            <input type="" class="form-control" id="" aria-describedby="" placeholder="Cust Account" name="user_id">
        </div>
            <div class="form-group">
                <label for="exampleInputPassword1">客戶密碼</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="tel">
            </div>
        <div class="form-group form-check">
            </div>
            <button type="submit" class="btn btn-primary">登入</button>
        </form>
@endif

@endsection
