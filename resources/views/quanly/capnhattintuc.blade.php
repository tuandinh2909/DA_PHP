@extends('quanly')
@section('content')
<form class="row g-3 needs-validation"  method="POST" action="{{route('admin-xu-li-cap-nhat-tin-tuc',['id'=>$tintuc->id])}}"  enctype="multipart/form-data">
    @csrf
    
    <div class="col-12">
        <label for="" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" id="" required readonly value="{{$tintuc->username}}">
    </div>

    <div class="col-12" >
        <select name="loai_tin">
            <option value="Tin tìm">Tin tìm</option>
            <option value=" Tin nhặt">Tin nhặt</option>
        </select>                
    </div>

    <div class="col-12">
      <label for="yourPassword" class="form-label">Tiêu đề</label>
      <input type="text" name="tieu_de" class="form-control" id="" required value="{{$tintuc->tieu_de}}">
    </div>

    <div class="col-12">
      <label for="yourPassword" class="form-label">Nôi dung</label>
      <input type="textfield" name="noi_dung" class="form-control" id="" required value="{{$tintuc->noi_dung}}">
    </div>
    
    <div class="col-12">
      <label for="yourPassword" class="form-label">Ảnh</label>
      <input type="file" name="anhupload" class="form-control" id="yourPassword" required>                 
    </div>

    <div class="col-12" >
        <select name="danh_muc">
            <option value="Ví">Ví</option>
            <option value="Giấy tờ">Giấy tờ</option>
            <option value="Điện thoại">Điện thoại</option>
        </select>                
    </div>
                       
    <div class="col-12">
      <button class="btn btn-primary w-100" type="submit">Cập nhật</button>
    </div>
    
  </form>
@endsection