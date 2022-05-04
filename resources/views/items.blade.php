@extends('index')
@section('content')
@if(isset($log))
<?php echo $log; ?>
@endif
<br>
<form action = "/item_add" method = "POST">
    @csrf
  <div class="mb-3">
    <label class="form-label">商品名稱</label>
    <input class="form-control" name = "item_name">
  </div>
  <div class="mb-3">
    <label class="form-label">商品價格</label>
    <input class="form-control" name = "item_price">
  </div>
  <div class="mb-3">
    <input  type =hidden class="form-control" name = "store_id" value="{{Session ::get('store_id')}}">
  </div>
  <button type="submit" class="btn btn-primary">新增</button>
</form>
@endsection
