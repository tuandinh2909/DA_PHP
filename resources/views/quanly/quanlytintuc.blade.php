@extends('quanly')
@section('content')

    <table class="table table-light" id="tabletintuc">
        <thead class=" table-dark">
            <tr>
                
                <th>Tên người đăng</th>               
                <th>Loại tin</th>
                <th>Tiêu đề</th>              
                
                <th>Danh mục</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        {{-- <tbody>
            @foreach ($listTinTuc as $tintuc)
            
                <tr>
                    <td>{{ $tintuc->id}}</td>
                    <td>{{ $tintuc->username}}</td>
                    <td>{{ $tintuc->loai_tin}}</td>
                    <td>{{ $tintuc->tieu_de}}</td>
                    <td>{{ $tintuc->noi_dung}}</td>
                    <td>{{ $tintuc->anh}}</td>
                    <td>{{ $tintuc->danh_muc}}</td>
                    <td>
                        <a href="/admin/quan-ly-xoa-tin-tuc/{{$tintuc->id}}" class="btn btn-danger">Xóa</a>
                        <a href="/admin/quan-ly-cap-nhat-tin-tuc/{{$tintuc->id}}" class="btn btn-warning">Sửa</a>
                    </td>
                   
                </tr>
                
            @endforeach 
        </tbody> --}}
    </table>
@endsection

@section('js')
<script  src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script  src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {
    $('#tabletintuc').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('tintuc.lay-du-lieu') !!}',
        columns: [
            
            { data: 'username', name: 'username' },
            { data: 'loaitin', name: 'loaitin' },
            { data: 'tieude', name: 'tieude' },
           
           
            { data: 'danhmuc', name: 'danhmuc' },
            { data: 'chucnang', name: 'chucnang' },
            
        ]
    });
});
</script>
@endsection