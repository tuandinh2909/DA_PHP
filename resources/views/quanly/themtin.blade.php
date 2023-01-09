@extends('quanly')
@section('content')
<form class="row g-3 needs-validation"  method="POST" action="{{route('admin-quan-ly-xu-li-them-tin')}}"  enctype="multipart/form-data">
    @csrf
    
    <div class="col-12" >
      <label for="yourPassword" class="form-label">Tên người đăng</label>
      <select name="username">
          
          @foreach ($listNguoiDung as $nguoidung)
          <option value={{$nguoidung->username}}>{{$nguoidung->username}}</option>
          @endforeach
      </select>                
  </div>

    <div class="col-12" >
      <label for="yourPassword" class="form-label">Loại tin</label>
        <select name="loai_tin">
            <option value="Tin tìm">Tin tìm</option>
            <option value=" Tin nhặt">Tin nhặt</option>
        </select>                
    </div>

    <div class="col-12">
      <label for="yourPassword" class="form-label">Tiêu đề</label>
      <input type="text" name="tieu_de" class="form-control" id="" required>
    </div>

    <div class="col-12">
      <label for="yourPassword" class="form-label">Nôi dung</label>
      <input type="textfield" name="noi_dung" class="form-control" id="" required>
    </div>
    
    <div class="col-12">
      <label for="yourPassword" class="form-label">Ảnh</label>
      <input type="file" name="anhupload" class="form-control" id="yourPassword" required>                 
    </div>

    <div class="col-12" >
      <label for="yourPassword" class="form-label">Danh mục</label>
                        <select name="danh_muc">
                            
                            @foreach ($listdanhmuc as $danhmuc)
                            <option value={{$danhmuc->ten_danh_muc}}>{{$danhmuc->ten_danh_muc}}</option>
                            @endforeach
                        </select>                
                    </div>
                       
    <div class="col-12">
      <button class="btn btn-primary w-100" type="submit">Đăng tin</button>
    </div>
    
  </form>
@endsection