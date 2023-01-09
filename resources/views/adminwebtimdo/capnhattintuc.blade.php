@extends('nguoidung')
@section('content')
<form class="row g-3 needs-validation"  method="POST" action="{{route('xu-li-cap-nhat-tin-tuc',['id'=>$tintuc->id])}}"  enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                       
                        <input type="text" name="username" class="form-control" id="yourUsername" required value="{{$tintuc->username}}" readonly>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12" >
                        <select name="loai_tin">
                          @foreach($listLoaiTin as $loaitin)
                          {
                            @if($tintuc->loai_tin==$loaitin)
                            {
                              <option value="{{$loaitin}}" selected>{{$loaitin}}</option>
                            }                                                           
                            @else
                            <option value="{{$loaitin}}">{{$loaitin}}</option>
                            @endif
                          }
                          @endforeach
                        </select>                
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Tiêu đề</label>
                      <input type="text" name="tieu_de" class="form-control" id="" required value="{{$tintuc->tieu_de}}" >
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Nôi dung</label>
                      <input type="textfield" name="noi_dung" class="form-control" id="" required value="{{$tintuc->noi_dung}}">
                    </div>
                    
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Ảnh</label>
                      <input type="file" name="anhupload" class="form-control" id="yourPassword"  value="{{$tintuc->anhupload}}">                 
                    </div>

                    <div class="col-12" >
                        <select name="danh_muc">
                            
                            @foreach($listDanhMuc as $danhmuc)
                            {
                              @if($tintuc->danh_muc==$danhmuc)
                              {
                                <option value="{{$danhmuc}}" selected>{{$danhmuc}}</option>
                              }
                                                             
                              @else
                              <option value="{{$danhmuc}}">{{$danhmuc}}</option>
                              @endif
                            }
                            @endforeach
                        </select>                
                    </div>
                                       
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Cập nhật tin </button>
                    </div>
                    
                  </form>
@endsection