@extends('layouts.main')
@section('content')
    <form action=""method="get" class="form-inline mb-2">
        <div class="form-group">
            <label for=""> Tìm kiếm Từ Khóa</label>
            <input type="text" name="keyword" class="form-control">

        </div>

        <button type="submit" class="btn btn-primary btn-sm">Tìm kiếm</button>

    </form>
    <table class="table table-dark">
        <thead>
        <tr>
           
            <th>id</th>   
            <th>name</th>
            <th>show_menu</th>
            <th>
                <a href="{{getClientUrl('add-category')}}" class="btn btn-sm btn-danger">Thêm Mới</a>
            </th>      
            

        </tr>
        </thead>
        <tbody>
        @foreach($category as $showcate)
        <tr>
            <td>{{$showcate->id}}</td>
            <td>{{$showcate->cate_name}}</td>
            <td>{{$showcate->show_menu}}</td>
            <td>
                <a href="{{getClientUrl('delete-category', ['id'=>$showcate->id])}}" class="btn btn-sm btn-danger">Xóa</a>
                <a href="{{getClientUrl('edit-category', ['id'=>$showcate->id])}}" class="btn btn-sm btn-danger">Sửa</a>
           </td>
        </tr>
        @endforeach
        </tbody>
    </table>
@endsection
 