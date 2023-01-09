@extends('quanly')
@section('content')
<form class="row g-3 needs-validation" novalidate  method="POST" action="{{route('admin-xu-li-cap-nhat-danh-muc',['id'=>$danhmuc->id])}}" >
    @csrf
    <div class="col-12">
      <label for="yourUsername" class="form-label">Danh mục</label>
      <div class="input-group has-validation">     
        <input type="text" name="ten_danh_muc" class="form-control" id="" value="{{$danhmuc->ten_danh_muc}}">
      </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">Cập nhật</button>
      </div>
    
  </form>
@endsection