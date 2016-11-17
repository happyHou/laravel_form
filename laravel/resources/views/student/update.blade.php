@extends('common.layouts')

@section('content')
    @include('common.validator')
    <div class="panel panel-default">
        <div class="panel-heading">修改用户信息</div>
        <div class="panel-body">
            @include('student._form')
        </div>
    </div>

@stop
