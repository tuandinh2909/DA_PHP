@extends('quanly')
@section('content')
{{-- <section class="section"> --}}
    <table class="table table-light" id="tablenguoidung">
        <thead class=" table-dark">
            <tr>
                
                <th>Tên đăng nhập</th>               
                <th>Điện thoại</th>
                <th>Email</th>
                <th>Chức vụ</th>
                
            </tr>
        </thead>
        {{-- <tbody>
            @foreach ($listNguoiDung as $nguoidung)
            
                <tr>
                    <td>{{$nguoidung->id}}</td>
                    <td>{{$nguoidung->username}}</td>
                    <td>{{$nguoidung->sdt}}</td>
                    <td>{{$nguoidung->email}}</td>
                    <td>
                        <a href="/admin/quan-ly-xoa-nguoi-dung/{id}" class="btn btn-danger">Xóa</a>
                        <a href="/admin/quan-ly-cap-nhat-nguoi-dung/{id}" class="btn btn-warning">Sửa</a>
                    </td>
                   
                </tr>
                
            @endforeach 
        </tbody> --}}
        
    </table>
    {{-- </section> --}}
    
@endsection
@section('js')
<script  src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script  src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {
    $('#tablenguoidung').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('nguoidung.lay-du-lieu') !!}',
        columns: [
            
            { data: 'name', name: 'name' },
            { data: 'sdt', name: 'sdt' },
            { data: 'email', name: 'email' },
            { data: 'chucvu', name: 'chucvu' },
          
            
        ]
    });
});
</script>
@endsection
