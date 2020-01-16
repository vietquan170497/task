@extends('layout.index')

@section('content')
    <h4 class="title_page">Danh sách công việc con</h4>
    <a href="taskchild/add" class="btn btn-primary active" role="button" aria-pressed="true" style="margin-bottom: 10px">Thêm mới</a>
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
            <th scope="col">Công việc cha</th>
            <th scope="col">Bắt đầu</th>
            <th scope="col">Kết thúc</th>
            <th scope="col">Trạng thái</th>
            <th scope="col" >Hành động</th>
        </thead>
        @foreach($task_childs as $task_child)
            <tr>
                <th scope="row">{{$task_child->id}}</th>
                <td>{{$task_child->name}}</td>
                <td>{{$task_child->task->name}}</td>
                <td>{{$task_child->begin}}</td>
                <td>{{$task_child->end}}</td>
                <td class="td_center">
                    @if($task_child->status==0)
                        <div class="btn btn-danger" >
                            Chưa xử lý
                        </div>
                    @elseif($task_child->status==1)
                        <div class="btn btn-warning" >
                            Đang xử lý
                        </div>
                    @elseif($task_child->status==2)
                        <div class="btn btn-primary" >
                            Đã xử lý
                        </div>
                    @endif
                </td>
                <td >
                    <a href="taskchild/{{$task_child->id}}">
                        <i class="far fa-hand-point-left" style="font-size: 25px; color: #0e11d0; "></i>
                    </a>
                    <a href="taskchild/edit/{{$task_child->id}}">
                        <i class="fas fa-edit" style="font-size: 25px; color: #00d000; padding-left: 20px"></i>
                    </a>
                    <a onclick="return confirm('Bạn có xác nhận xóa!')" href="taskchild/delete/{{$task_child->id}}">
                        <i class="fas fa-trash" style="font-size: 25px; color: red; padding-left: 20px"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
