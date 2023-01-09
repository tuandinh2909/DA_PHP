@extends('start')
@section('content')


       
          <div class="col-lg-6">
            @foreach ($listTinTuc as $tintuc)
          <a href="/start/chi-tiet/{{$tintuc->id}}">
          <div class="card" style="width: 700px">
            <div class="card-body">
              <br>
              
              <h5 class="card-title">{{$tintuc->username}}</h5>
              <h5 class="card-title">{{$tintuc->tieu_de}}</h5>            
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ URL::to('/') }}/hinhanh/{{$tintuc->anh}}" class="d-block w-50" alt="hinhanh">
                  </div>
                </div>
              </div>
                
              <h5 class="card-title">{{$tintuc->created_at}}</h5>   
            </div>           
          </div>  
          </a>
        @endforeach   
          </div>


       
          
        
        

@endsection