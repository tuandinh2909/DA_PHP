@extends('quanly')
@section('content')
@if (session('username'))
  <div class="alert alert-warning">
    {{session('usernameerror')}}
  </div> 
@endif
<form class="row g-3 needs-validation" novalidate  method="POST" action="{{route('admin-quan-xu-li-them-nguoi-dung')}}">
    @csrf
    <div class="col-12">
      <label for="yourUsername" class="form-label">Tên đăng nhập</label>
      <div class="input-group has-validation">     
        <input type="text" name="username" class="form-control" id="yourUsername" required>
        <div class="invalid-feedback">Please choose a username.</div>
      </div>
      @error('username')
                      <span style="color: red">{{$message}}</span>
                      @enderror
    </div>

    <div class="col-12">
      <label for="yourPassword" class="form-label">Mật khẩu</label>
      <input type="password" name="password" class="form-control" id="yourPassword" required>
      <div class="invalid-feedback">Please enter your password!</div>
      @error('password')
                      <span style="color: red">{{$message}}</span>
                      @enderror
    </div>


    <div class="col-12">
      <label for="yourName" class="form-label">Số điện thoại</label>
      <input type="text" name="sdt" class="form-control" id="yourName" required>
      <div class="invalid-feedback">Please, enter your phone!</div>
      @error('sdt')
                      <span style="color: red">{{$message}}</span>
                      @enderror
    </div>

    <div class="col-12">
      <label for="yourEmail" class="form-label">Email</label>
      <input type="email" name="email" class="form-control" id="yourEmail" required>
      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
      @error('email')
                      <span style="color: red">{{$message}}</span>
                      @enderror
    </div>

    <div class="col-12" >
      <select name="chucvu">
          <option value="User">User</option>
          <option value=" Admin">Admin</option>
      </select>                
  </div>
    
    <div class="col-12">
      <button class="btn btn-primary w-100" type="submit">Tạo tài khoản</button>
    </div>
    {{-- <div class="col-12">
      <p class="small mb-0">Already have an account? <a href="">Log in</a></p>
    </div> --}}
  </form>
@endsection