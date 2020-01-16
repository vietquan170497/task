<?php

namespace App\Http\Controllers;

use App\Task;
use App\TaskChild;
use Illuminate\Http\Request;

class TaskChildController extends Controller
{
    public function getList(){
        $task_childs = TaskChild::all();
        return view('taskchild.list')->with(['task_childs'=>$task_childs]);
    }
    public function getAdd(){
        $tasks = Task::all();
        return view('taskchild.add')->with(["tasks"=>$tasks]);
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'task'=>'required',
                'name'=>'required',
                'content_taskchild'=>'required',
                'begin'=>'required',
                'end'=>'required',
                'status'=>'required'
            ],
            [
                'task.required'=>'Bạn chưa nhập tên công việc cha',
                'name.required'=>'Bạn chưa nhập tên công việc con',
                'content_taskchild.required'=>'Bạn chưa nhập nội dung công việc',
                'begin.required'=>'Bạn chưa nhập thời gian bắt đầu',
                'end.required'=>'Bạn chưa nhập thời gian kết thúc',
                'status.required'=>'Bạn chưa chọn trạng thái',
            ]);
        if($request->end > $request->begin){
            $taskchild = new TaskChild();
            $taskchild->task_id = $request->task;
            $taskchild->name = $request->name;
            $taskchild->content = $request->content_taskchild;
            $taskchild->begin = $request->begin;
            $taskchild->end = $request->end;
            $taskchild->status = $request->status;
            if ($taskchild->save()){
                return redirect('taskchild/list')->with('thongbao','Thêm công việc con thành công');
            }else{
                return redirect('taskchild/add')->with('loi','Thêm công việc ocn thất bại');
            }
        } else{
            return redirect('taskchild/add')->with('loi','Thời gian kết thúc lớn hơn thời gian bắt đầu');
        }
    }
    public function getEdit($id){
        $tasks = Task::all();
        $task_clild = TaskChild::find($id);
        //var_dump($task_clild->task);exit();
        return view('taskchild.edit')->with(['tasks'=>$tasks,'task_child'=>$task_clild]);
    }

    public function postEdit($id, Request $request){
        $taskchild = TaskChild::find($id);
        $this->validate($request,
            [
                'task'=>'required',
                'name'=>'required',
                'content_taskchild'=>'required',
                'begin'=>'required',
                'end'=>'required',
                'status'=>'required'
            ],
            [
                'task.required'=>'Bạn chưa nhập tên công việc cha',
                'name.required'=>'Bạn chưa nhập tên công việc con',
                'content_taskchild.required'=>'Bạn chưa nhập nội dung công việc',
                'begin.required'=>'Bạn chưa nhập thời gian bắt đầu',
                'end.required'=>'Bạn chưa nhập thời gian kết thúc',
                'status.required'=>'Bạn chưa chọn trạng thái',
            ]);
        if($request->end > $request->begin){
            $taskchild->task_id = $request->task;
            $taskchild->name = $request->name;
            $taskchild->content = $request->content_taskchild;
            $taskchild->begin = $request->begin;
            $taskchild->end = $request->end;
            $taskchild->status = $request->status;
            if ($taskchild->save()){
                return redirect('taskchild/list')->with('thongbao','Sửa công việc con id = '.$id.' thành công');
            }else{
                return redirect('taskchild/edit/'.$id)->with('loi','Sửa công việc thất bại');
            }
        } else{
            return redirect('taskchild/edit/'.$id)->with('loi','Thời gian kết thúc lớn hơn thời gian bắt đầu');
        }
    }

    public function getDelete($id){
        $task_child = TaskChild::find($id);
        if($task_child){
            if($task_child->delete()){
                return redirect('taskchild/list')->with('thongbao','Xóa công việc con id = '.$id.' thành công');
            }else{
                return redirect('taskchild/list')->with('loi','Xóa công việc con thất bại');
            }
        } else{
            return redirect('taskchild/list')->with('loi','Không tìm thấy công việc');
        }
    }

    public function getTask($id){
        $task = TaskChild::find($id)->task;
        return view('taskchild.task')->with(['task'=>$task]);
    }

    public function getAddByTask($id){
        $task = Task::find($id);
        //var_dump($task);exit();
        return view('taskchild.addtaskchild')->with(["task"=>$task]);
    }
    public function postAddByTask($id, Request $request){
        $this->validate($request,
            [
                'task'=>'required',
                'name'=>'required',
                'content_taskchild'=>'required',
                'begin'=>'required',
                'end'=>'required',
                'status'=>'required'
            ],
            [
                'task.required'=>'Bạn chưa nhập tên công việc cha',
                'name.required'=>'Bạn chưa nhập tên công việc con',
                'content_taskchild.required'=>'Bạn chưa nhập nội dung công việc',
                'begin.required'=>'Bạn chưa nhập thời gian bắt đầu',
                'end.required'=>'Bạn chưa nhập thời gian kết thúc',
                'status.required'=>'Bạn chưa chọn trạng thái',
            ]);
        if($request->end > $request->begin){
            $taskchild = new TaskChild();
            $taskchild->task_id = $request->task;
            $taskchild->name = $request->name;
            $taskchild->content = $request->content_taskchild;
            $taskchild->begin = $request->begin;
            $taskchild->end = $request->end;
            $taskchild->status = $request->status;
            if ($taskchild->save()){
                return redirect('taskchild/list')->with('thongbao','Thêm công việc con thành công');
            }else{
                return redirect('taskchild/add')->with('loi','Thêm công việc ocn thất bại');
            }
        } else{
            return redirect('taskchild/add')->with('loi','Thời gian kết thúc lớn hơn thời gian bắt đầu');
        }
    }
}
