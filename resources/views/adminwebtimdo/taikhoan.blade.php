
@extends('nguoidung')
@section('content')


  
     
  
  <section class="section" class="section profile">

    
      <h1>Thông tin người dùng</h1>     
      <div class="card" style="width: 700">
        <div class="card-body">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-left">
            
            
          </div>
          <br>
          <h5 type="">Username :  {{$account->username}}</h5>  
          <br>       
          <h5 type="">Phone : {{$account->sdt}}</h5>     
          <br>     
          <h5 type="">Email : {{$account->email}}</h5>
                   
        </div>           
      </div> 
   
      
      <a href="/admin/cap-nhat-nguoi-dung/{{$account->id}}" class="btn btn-primary">Cập nhật</a>    
  </section>
@endsection