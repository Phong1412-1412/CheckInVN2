@extends('admin.main')

@section('content')
    
    <form action="" method="POST" >
        
        <div class="card-body">
            @include('admin.alert')
            <div class="form-group">
                <label for="menu">Tên tỉnh</label>
                <input type="text" name="provinceName" class="form-control"  placeholder="Nhập tên tỉnh thành">
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
                    <input class="custom-control-input" value="0" type="radio" id="active" name="favoriteChecked" checked="">
                    <label for="active" class="custom-control-label">Kích hoạt</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="no_active" name="favoriteChecked" >
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



