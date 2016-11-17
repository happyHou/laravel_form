@extends('common.layouts')

@section('content')

@include('common.message')
        <!-- 自定义内容区域 -->
<div class="panel panel-default">
    <div class="panel-heading">学生列表</div>
    <table class="table table-striped table-hover table-responsive">
        <thead>
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>年龄</th>
            <th>性别</th>
            <th>添加时间</th>
            <th width="120">操作</th>
        </tr>
        </thead>
        <tbody>


        @foreach($students as $student)
            <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->name}}</td>
                <td>{{$student->age}}</td>
                <td>{{$student->sex($student->sex)}}</td>
                <td>{{date('Y-m-d',$student->created_at)}}</td>
                <td>
                    <a href="{{url('student/detail',['id'=>$student->id])}}">详情</a>
                    <a href="{{url('student/update',['id'=>$student->id])}}">修改</a>
                    <a href="{{url('student/delete',['id'=>$student->id])}}"
                       onclick="if(confirm('确认要删除吗')==false)return false"
                    >删除</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- 分页  -->
<div>
    <div class="pull-right">
        {{$students->render()}}
    </div>

    {{--<ul class="pagination pull-right">--}}
    {{--<li>--}}
    {{--<a href="#" aria-label="Previous">--}}
    {{--<span aria-hidden="true">&laquo;</span>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--<li class="active"><a href="#">1</a></li>--}}
    {{--<li><a href="#">2</a></li>--}}
    {{--<li><a href="#">3</a></li>--}}
    {{--<li><a href="#">4</a></li>--}}
    {{--<li><a href="#">5</a></li>--}}
    {{--<li>--}}
    {{--<a href="#" aria-label="Next">--}}
    {{--<span aria-hidden="true">&raquo;</span>--}}
    {{--</a>--}}
    {{--</li>--}}
    {{--</ul>--}}
</div>
@stop