@extends('nguoidung')
@section('content')
<section class="section">
        @foreach ($listTinTuc as $tintuc)
          <a href="/admin/chi-tiet/{{$tintuc->id}}" >
          <div class="card" style="width: 700px">
            <div class="card-body">
              <div >
                
                <h5 class="card-title">{{$tintuc->username}}</h5>
              </div>
              
              <h5 class="card-title">{{$tintuc->tieu_de}}</h5>            
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ URL::to('/') }}/hinhanh/{{$tintuc->anh}}" class="d-block w-50" alt="hinhanh">
                  </div>
                </div>
              </div>
                 
              <h5 class="card-title">{{$tintuc->created_at}}</h5>   
            <a href="/admin/cap-nhat-tin-tuc/{{$tintuc->id}}" class="btn btn-primary">Cập nhật</a>
            <a href="/admin/xoa-tin-tuc/{{$tintuc->id}}" class="btn btn-warning">Xóa</a>
            </div>    
          </div>  
          </a>
        @endforeach   
        </section>
@endsection