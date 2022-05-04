@extends('index')
@section('content')
@if(isset($log))
<?php echo $log; ?>
@endif
<h1 style="color:blueviolet;">商品更新</h1>
<br>
@if($items)
@foreach($items as $item)
@endforeach
@endif
<form action = "/item_update" method = "POST">
    @csrf
  <div class="mb-3">
    <label class="form-label">商品名稱</label>
    <input class="form-control" name = "item_name" value = '{{$item['item_name']}}'>
  </div>
  <div class="mb-3">
    <label class="form-label">商品價格</label>
    <input class="form-control" name = "item_price" value = '{{$item['item_price']}}'>
  </div>
  <div class="mb-3">
    <input  type =hidden class="form-control" name = "item_id" value="{{$item['item_id']}}">
  </div>
  <button type="submit" class="btn btn-primary">送出</button>
</form>
@endsection
