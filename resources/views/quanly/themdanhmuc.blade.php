@extends('quanly')
@section('content')
@if (session('loidanhmuc'))
   <div class="alert alert-warning">
    {{session('loidanhmuc')}}
    </div> 
@endif
<form class="row g-3 needs-validation" novalidate  method="POST" action="{{route('admin-xu-li-them-danh-muc')}}" >
    @csrf
    <div class="col-12">
      <label for="yourUsername" class="form-label">Danh mục</label>
      <div class="input-group has-validation">     
        <input type="text" name="ten_danh_muc" class="form-control" id="" >
      </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">Thêm danh mục</button>
      </div>
    
  </form>
@endsection

