@extends('layouts.admin')

@section('title', '编辑友情链接')

@section('nav', '编辑友情链接')

@section('description', '编辑新的友情链接')

@section('content')

    <!-- 导航栏结束 -->
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('blog/admin/friendshipLink/index') }}">友情链接列表</a>
        </li>
        <li class="active">
            <a href="">编辑友情链接</a>
        </li>
    </ul>
    <form class="form-horizontal " action="{{ url('blog/admin/friendshipLink/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th style="text-align: center;display: table-cell;vertical-align: middle;margin: 0 auto;">名称</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $data->name }}">
                </td>
            </tr>
            <tr>
                <th style="text-align: center;display: table-cell;vertical-align: middle;margin: 0 auto;">链接</th>
                <td>
                    <input class="form-control" type="text" name="url" value="{{ $data->url }}">
                </td>
            </tr>
            <tr>
                <th style="text-align: center;display: table-cell;vertical-align: middle;margin: 0 auto;">排序</th>
                <td>
                    <input class="form-control" type="text" name="sort" value="{{ $data->sort }}">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input class="btn btn-success" type="submit" value="提交">
                </td>
            </tr>
        </table>
    </form>

@endsection
