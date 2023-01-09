@extends('quanly')
@section('content')

    <table class="table table-light" id="tabledanhmuc">
        <thead class=" table-dark">
            <tr>               
                <th>Tên danh mục</th>               
                <th>Chức năng</th>
            </tr>
        </thead>
        {{-- <tbody>
            @foreach ($listDanhMuc as $danhmuc)
            
                <tr>
                    <td>{{$danhmuc->id}}</td>
                    <td>{{$danhmuc->ten_danh_muc}}</td>                   
                    <td>
                        <a href="/admin/quan-ly-xoa-danh-muc/{{$danhmuc->id}}" class="btn btn-danger">Xóa</a>
                        <a href="/admin/quan-ly-cap-nhat-danh-muc/{{$danhmuc->id}}" class="btn btn-warning">Sửa</a>
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
    $('#tabledanhmuc').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('danhmuc.lay-du-lieu') !!}',
        columns: [
            // { data: 'DT_RowIndex', name: 'DT_RowIndex' },
            { data: 'tendanhmuc', name: 'tendanhmuc' },          
            { data: 'chucnang', name: 'chucnang' },            
        ]
    });
});
</script>
@endsection