@extends('sale_index')
@section('content')
<div class="row">
@if(isset($log))
    <?php echo "<h6 style='color:red;'>".$log."</h6>";?>
@endif
@if(Session::get('sales_name'))
    <div class="col-4">
            @if(isset($log))
                <?php echo "<h5 style='color:red;'>".$log."</h5>"; ?>
            @endif
        <form action="/logout" method = "GET">
        @csrf
            <h8>你好</h8>
            <h9>{{Session::get('sales_name')}}</h9>
            <div>
            <button class="btn btn-outline-danger">登出</button>
            </div>
        </form>
        <br>
        <form action="/add_store_page">
            @csrf
            <button class="btn btn-outline-secondary">新增店家帳號</button>
        </form>
        <br>
        <form action="/disable" method="POST">
            @csrf
            <input type="text" name='store_acct' placeholder="店家帳號">
            <button class="btn btn-outline-success">停用店家</button>
        </form>
        <form action="/enable" method="POST">
            @csrf
            <input type="text" name='store_acct' placeholder="店家帳號">
            <button class="btn btn-outline-success">重啟店家</button>
        </form>
        <form action="/delete" method = 'POST'>
            @csrf
            <input type="text" name='store_acct' placeholder="店家帳號">
            <button class="btn btn-outline-danger">刪除店家</button>
        </form>
        <form action="/recovery" method='POST'>
            @csrf
            <input type="text" name='store_acct' placeholder="店家帳號">
            <button class="btn btn-outline-warning">恢復店家</button>
        </form>
    </div>
@endif
@if(Session::get('sales_name') == NULL)
    <form action="/login" method="POST">
        @csrf
    <div class="form-group">
        <label for="">業務帳號</label>
        <input type="" class="form-control" id="" aria-describedby="" placeholder="Sales Account" name="sales_acct">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">業務密碼</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="sales_pwd">
    </div>
    <div class="form-group form-check">
    </div>
    <button type="submit" class="btn btn-primary">登入</button>
    </form>
@endif
@if(isset($product))
        <div class="col">
            <div class="row">
                <div>
                    <h1 style="color:coral;">業務獎金:${{$bonus}}</h1>
                </div>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item list-group-item-action active">商品名稱</li>
                    <li class="list-group-item list-group-item-action active">商品數量</li>
                </ul>
                @foreach($product as $data)
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item list-group-item-action ">{{$data->item_name}}</li>
                        <li class="list-group-item list-group-item-action ">{{$data->total_qty}}</li>
                    </ul>
                @endforeach
            </div>
        </div>

@endif
</div>
@endsection
