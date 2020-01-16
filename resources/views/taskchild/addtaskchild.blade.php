
@extends('layout.index')

@section('content')
    <h4 class="title_page">Thêm công việc con</h4>
    <div class="row">
        <div class="col-sm-2 clearfix"></div>
        <div class="col-sm-8">
            @if ($errors->any())
                <div class="alert alert-danger ">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session('thongbao'))
                <div class="alert alert-success center-block">
                    {{session('thongbao')}}
                </div>
            @endif
            @if(session('loi'))
                <div class="alert alert-danger">
                    {{session('loi')}}
                </div>
            @endif
            <form action="taskchild/add" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>Công việc cha</label>
                    <select class="form-control"  name="task" >
                        <option value="{{$task->id}}">{{$task->id}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tên công việc con</label>
                    <input type="text" class="form-control" placeholder="Nhập tên công việc con" name="name">
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <input type="text" class="form-control" placeholder="Nhập nội dung công việc" name="content_taskchild">
                </div>
                <div class="form-group">
                    <label>Thời gian bắt đầu</label>
                    <input type="datetime-local" class="form-control" placeholder="Thời gian bắt đầu" name="begin" >
                </div>
                <div class="form-group">
                    <label>Thời gian kết thúc</label>
                    <input type="datetime-local" class="form-control" placeholder="Thời gian kết thúc" name="end" >
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="status">
                        <option value="" >--Chọn trạng thái--</option>
                        <option value="0">--Chưa xử lý--</option>
                        <option value="1">--Đang xử lý--</option>
                        <option value="2">--Đã xử lý, hoàn thành--</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
                <a class="btn btn-primary" href="taskchild/list" role="button" >Hủy</a>
            </form>
        </div>
    </div>
@endsection

