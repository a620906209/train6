@extends('front.main')
@section('content')
<table class="table">
<br>
@if(isset($_GET['log']))
<h5 style='color:red;'>{{$_GET['log']}}</h5>
@endif
@if(Session::get('cust_id'))
    <form action="/cust_logout" method = "GET">
        @csrf
        <div class= "col">
            <button class="btn btn-outline-danger">登出</button>
        </div>
    </form>
@else
    <a class='btn btn-primary' href="/cust">登入</a>
@endif
@if(Session::get('cust_name') != NULL)
<div class= row>
    <h5 class='col-1'>你好</h5>
    <h5 class='col'>{{Session::get('cust_name')}}</h5>
</div>
@endif
    <form action="/order_page" method = "GET">
        <thead>
        <tr>
            <th scope="col">店家名稱</th>
            <th scope="col">商品名稱</th>
            <th scope="col">售價</th>
            <th scope="col">數量</th>
        </tr>
        </thead>
        <tbody>
            @if(isset($items))
            @foreach($items as $key => $item)
                    <tr>
                        <input type="hidden" name="" value="{{$item->item_id }}">
                        <input type="hidden" name="" value="{{$item->status }}">
                        <td>{{$item->store_name }}</td>
                        <td>{{$item->item_name }}</td>
                        <td>NT.{{$item->item_price }}</td>
                        <td>
                            <select name ="{{$item->item_id}}">
                                @for ($i=0;$i<=10;$i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </td>
                    </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <div class="row align-items-end" >
        <div class="col"> <input class="form-control" type="hidden" name="cust_id" value={{Session::get('cust_id')}}></div>
        {{-- <div class="col-3">客戶名稱<input class="form-control" type="text" name="cust_name" ></div> --}}
        <div class="col"><button type="submit" class="btn btn-primary" style="float:right"> 送出</button></div>
    </div>
    </form>

@endsection
