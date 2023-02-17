@extends('admin.main')

@section('content')
    
    <form action="" method="POST" >
        
        <div class="card-body">
            @include('admin.alert')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên địa danh</label>
                        <input type="text" name="name_famous" class="form-control"  placeholder="Nhập tên địa danh">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Thuộc tỉnh</label>
                        <select class="form-control" name="id_province" id>
                            @foreach($province as $pro)
                                 <option value="{{ $pro->id }}">{{ $pro->provinceName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="address" class="form-control"  placeholder="Nhập địa chỉ cụ thể">
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Biên độ</label>
                        <input type="text" name="latitude" class="form-control"  placeholder="Nhập địa chỉ biên độ">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vĩ độ</label>
                        <input type="text" name="longitude" class="form-control"  placeholder="Nhập địa chỉ vĩ độ">
                    </div>
                </div>
            </div>
            <hr/>
            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description"  class="form-control"></textarea>
            </div>
            <hr/>
            <div class="form-group">
                <label for="menu">Hình ảnh</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                </div>
                <input type="hidden" name="image" id="thumb">
            </div>
            <hr/>
            <div class="form-group">
                <label>Tình trạng</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="active" name="ischecked" checked="">
                    <label for="active" class="custom-control-label">Kích hoạt</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="no_active" name="ischecked" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>
        @csrf
    </form>
@endsection



