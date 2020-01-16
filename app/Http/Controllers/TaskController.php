<?php

namespace App\Http\Controllers;

use App\Task;
use DB;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getList(){
        $tasks = Task::all();
        return view('task.list')->with(['tasks'=>$tasks]);
    }

    public function getAdd(){
        return view('task.add');
    }

    public function postAdd(Request $request){
        $this->validate($request,
            [
                'name'=>'required',
                'content_task'=>'required',
                'begin'=>'required',
                'end'=>'required',
                'status'=>'required'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên công việc',
                'content_task.required'=>'Bạn chưa nhập nội dung công việc',
                'begin.required'=>'Bạn chưa nhập thời gian bắt đầu',
                'end.required'=>'Bạn chưa nhập thời gian kết thúc',
                'status.required'=>'Bạn chưa chọn trạng thái',
            ]);
        if($request->end > $request->begin){
            $task = new Task();
            $task->name = $request->name;
            $task->content = $request->content_task;
            $task->begin = $request->begin;
            $task->end = $request->end;
            $task->status = $request->status;
            if ($task->save()){
                return redirect('task/list')->with('thongbao','Thêm công việc thành công');
            }else{
                return redirect('task/add')->with('loi','Thêm công việc thất bại');
            }
        } else{
            return redirect('task/add')->with('loi','Thời gian kết thúc lớn hơn thời gian bắt đầu');
        }
    }

    public function getEdit($id){
        $task = Task::find($id);
        return view('task.edit')->with(['task'=>$task]);
    }

    public function postEdit($id, Request $request){
        $task = Task::find($id);
        $this->validate($request,
            [
                'name'=>'required',
                'content_task'=>'required',
                'begin'=>'required',
                'end'=>'required',
                'status'=>'required'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên công việc',
                'content_task.required'=>'Bạn chưa nhập nội dung công việc',
                'begin.required'=>'Bạn chưa nhập thời gian bắt đầu',
                'end.required'=>'Bạn chưa nhập thời gian kết thúc',
                'status.required'=>'Bạn chưa chọn trạng thái',
            ]);
        if($request->end > $request->begin){
            $task->name = $request->name;
            $task->content = $request->content_task;
            $task->begin = $request->begin;
            $task->end = $request->end;
            $task->status = $request->status;
            if ($task->save()){
                return redirect('task/list')->with('thongbao','Sửa công việc id = '.$id.' thành công');
            }else{
                return redirect('task/edit/'.$id)->with('loi','Sửa công việc thất bại');
            }
        } else{
            return redirect('task/edit/'.$id)->with('loi','Thời gian kết thúc lớn hơn thời gian bắt đầu');
        }
    }

    public function getDelete($id){
        $task = Task::find($id);
        if($task){
            if($task->delete()){
                return redirect('task/list')->with('thongbao','Xóa công việc id = '.$id.' thành công');
            }else{
                return redirect('task/list')->with('loi','Xóa công việc thất bại');
            }
        } else{
            return redirect('task/list')->with('loi','Không tìm thấy công việc');
        }
    }

    public function getDetail($id){
        $task = Task::find($id);
        return view('task.detail',['task'=>$task]);
    }

}
