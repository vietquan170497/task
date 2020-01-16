@extends('layout.index')

@section('content')
    <h4 class="title_page">Sửa công việc</h4>
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
            <form action="task/edit/{{$task->id}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="form-group">
                    <label>Tên công việc</label>
                    <input type="text" class="form-control" placeholder="Nhập tên công việc" name="name" value="{{$task->name}}">
                </div>
                <div class="form-group">
                    <label>Nội dung</label>
                    <input type="text" class="form-control" placeholder="Nhập nội dung công việc" name="content_task" value="{{$task->content}}">
                </div>
                <div class="form-group">
                    <label>Thời gian bắt đầu</label>
                    <input type="text" class="form-control" placeholder="Thời gian bắt đầu" name="begin" value="{{$task->begin}}" >
                </div>
                <div class="form-group">
                    <label>Thời gian kết thúc</label>
                    <input type="text" class="form-control" placeholder="Thời gian kết thúc" name="end" value="{{$task->end}}" >
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control m-bot15" name="status">
                        <option value="0"
                            @if($task->status==0)
                                {{"selected"}}
                            @endif
                            >Chưa xử lý
                        </option>
                        <option value="1"
                            @if($task->status==1)
                                {{"selected"}}
                            @endif
                            >Đang xử lý
                        </option>
                        <option value="2"
                            @if($task->status==2)
                                {{"selected"}}
                            @endif
                            >Đã xử lý
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Sửa</button>
                <a class="btn btn-primary" href="task/list" role="button" >Hủy</a>
            </form>
        </div>
    </div>
@endsection

