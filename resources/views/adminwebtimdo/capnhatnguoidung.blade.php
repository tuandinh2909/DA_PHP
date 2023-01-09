@extends('nguoidung')
@section('content')
<form class="row g-3 needs-validation" novalidate  method="POST" action="{{route('xu-li-cap-nhat-nguoi-dung',['id'=>$NguoiDung->id])}}">
    @csrf
    
    <div class="col-12">
      <label for="yourUsername" class="form-label">Username</label>
      <div class="input-group has-validation">    
        <input type="text" name="username" class="form-control" id="" required value="{{$NguoiDung->username}}" readonly >
        <div class="invalid-feedback">Please choose a username.</div>
      </div>
    </div>

    {{-- <div class="col-12">
      <a href="">
        <button class="btn btn-primary">Đổi mật khẩu</button>
      </a>
    
    </div> --}}


    <div class="col-12">
      <label for="yourName" class="form-label">Phone</label>
      <input type="text" name="sdt" class="form-control" id="yourName" required value="{{$NguoiDung->sdt}}">
      <div class="invalid-feedback">Please, enter your phone!</div>
    </div>

    <div class="col-12">
      <label for="yourEmail" class="form-label">Your Email</label>
      <input type="email" name="email" class="form-control" id="yourEmail" required value="{{$NguoiDung->email}}">
      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
    </div>

    <div class="col-12">
      <button class="btn btn-primary w-100" type="submit">Cập nhật</button>
    </div>
  </form>

@endsection