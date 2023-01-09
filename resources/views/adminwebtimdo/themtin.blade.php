@extends('welcome')

@section('content')
<form class="row g-3 needs-validation"  method="POST" action="{{route('xu-li-them-tin')}}"  enctype="multipart/form-data" id="themtin">
                    @csrf
                    

                    <div class="col-12" >
                        <select name="loai_tin">
                            <option value="Tin tìm">Tin tìm</option>
                            <option value=" Tin nhặt">Tin nhặt</option>
                        </select>                
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Tiêu đề</label>
                      <input type="text" name="tieu_de" class="form-control" id="" required>
                      @error('tieu_de')
                      <span style="color: red">{{$message}}</span>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Nôi dung</label>
                      <input type="textfield" name="noi_dung" class="form-control" id="" required>
                      @error('noi_dung')
                      <span style="color: red">{{$message}}</span>
                      @enderror
                    </div>
                    
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Ảnh</label>
                      <input type="file" name="anhupload" class="form-control" id="yourPassword" required>                 
                    </div>

                    <div class="col-12" >
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

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $('#themtin').submit(function(e){
    e.preventDefault(e);
    Swal.fire({
  title: 'Mầy chắc chưa?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'chắc',
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Saved!', '', 'success')
    
  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
  }
})
  })
  
</script>
@endsection
