@extends('front.main')
@section('content')
<table class="table">
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
        @foreach($items as $item)
            <tr>
            <td>{{$item->store_id }}</td>
            <td>{{$item->item_name }}</td>
            <td>{{$item->item_price }}</td>
          </tr>
        @endforeach
        @endif

    </tbody>
  </table>
@endsection
