@extends('layout.index')

@section('content')
    <h4 class="title_page">Công việc cha</h4>
    <a href="task/add" class="btn btn-primary active" role="button" aria-pressed="true" style="margin-bottom: 10px">Thêm mới</a>
    <a href="task/list" class="btn btn-primary active" role="button" aria-pressed="true" style="margin-bottom: 10px">DS công việc</a>
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
    <table class="table table-bordered td_center">
        <thead class="thead-dark ">
        <th scope="col">ID</th>
        <th scope="col">Công việc</th>
        <th scope="col">Nội dung</th>
        <th scope="col">Bắt đầu</th>
        <th scope="col">Kết thúc</th>
        <th scope="col">Trạng thái</th>
        <th scope="col" >Hành động</th>
        </thead>

            <tr>
                <th scope="row">{{$task->id}}</th>
                <td>{{$task->name}}</td>
                <td>{{$task->content}}</td>
                <td>{{$task->begin}}</td>
                <td>{{$task->end}}</td>
                <td class="td_center">
                    @if($task->status==0)
                        <div class="btn btn-danger" >
                            Chưa xử lý
                        </div>
                    @elseif($task->status==1)
                        <div class="btn btn-warning" >
                            Đang xử lý
                        </div>
                    @elseif($task->status==2)
                        <div class="btn btn-primary" >
                            Đã xử lý
                        </div>
                    @endif
                </td>
                <td >
                    <a href="task/taskdetail/{{$task->id}}">
                        <i class="fas fa-info-circle" style="font-size: 25px; color: #0e11d0; "></i>
                    </a>
                    <a href="task/edit/{{$task->id}}">
                        <i class="fas fa-edit" style="font-size: 25px; color: #00d000; padding-left: 20px"></i>
                    </a>
                    <a onclick="return confirm('Bạn có xác nhận xóa!')" href="task/delete/{{$task->id}}">
                        <i class="fas fa-trash" style="font-size: 25px; color: red; padding-left: 20px"></i>
                    </a>
                </td>
            </tr>
    </table>
@endsection
