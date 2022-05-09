@extends('front.main')
@section('content')
<table class="table">
    <br>
    @if(isset($log))

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
    <div class="row align-items-end" style="float:right">
        <div class="col-3">客戶編號<input class="form-control" type="text" name="cust_id" value="5"></div>
        <div class="col-3">客戶名稱<input class="form-control" type="text" name="cust_name" value = "Hank"></div>
        <div class="col-3"><button type="submit" class="btn btn-primary" style="float:right"> 送出</button></div>
    </div>
    </form>

@endsection
