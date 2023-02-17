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
                    <th>Tên tỉnh</th>
                    <th>Tên địa danh</th>
                    <th>Hình ảnh</th>
                    <th>Địa chỉ</th>
                    <th>Mô tả</th>
                    <th style="width: 200px">&nbsp;</th>
                    <th style="width: 200px">&nbsp;</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Tên tỉnh</th>
                    <th>Tên địa danh</th>
                    <th>Hình ảnh</th>
                    <th>Địa chỉ</th>
                    <th>Mô tả</th>
                    <th style="width: 200px">&nbsp;</th>
                    <th style="width: 200px">&nbsp;</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($FamousPlace as $key => $item)
                    <tr>
                        <td>{{$item->province->provinceName}}</td>
                        <td>{{$item->name_famous}}</td>
                        <td  style="text-align: center; vertical-align: middle;"><a href="{{$item->image}}"><img src="{{$item->image}}" width="50px"/></a></td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/admin/famousplace/edit/{{ $item->id }}">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm"
                               onclick="removeRow({{$item->id}}, '/admin/famousplace/destroy')">
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