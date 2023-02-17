@extends('admin.main')

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        {{$title}}
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên tỉnh</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th style="width: 200px">&nbsp;</th>
                    <th style="width: 200px">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Tên tỉnh</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th style="width: 200px">&nbsp;</th>
                    <th style="width: 200px">&nbsp;</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($province as $key => $pro)
                    <tr>
                        <td>{{$pro->id}}</td>
                        <td>{{$pro->provinceName}}</td>
                        <td  style="text-align: center; vertical-align: middle;"><a href="/template/admin/assets/img/tinhthanh/{{$pro->image}}.jpg"><img src="/template/admin/assets/img/tinhthanh/{{$pro->image}}.jpg" width="50px"/></a></td>
                        <td>{{$pro->description}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/province/edit/{{ $pro->id }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm"
                               onclick="removeRow({{$pro->id}}, '/admin/province/destroy')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection