@extends('layouts.app');

@section('content')
    <form class="" action="save" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label>作者</label>
            <input type="text" name="author" value="" />
        </div>
        <div class="form-group">
            <label>标题</label>
            <input type="text" name="title" value="" />
        </div>
        <div class="form-group">
            <label>内容</label>
            <input type="text" name="content" value="" />
        </div>
        <input type="submit" value="提交" />
    </form>
@endsection
