@extends('layouts.admin')

@section('title', '添加分类')

@section('nav', '添加分类')

@section('description', '添加新的分类')

@section('content')

    <!-- 导航栏结束 -->
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li>
            <a href="{{ url('blog/admin/category/index') }}">分类列表</a>
        </li>
        <li class="active">
            <a href="{{ url('blog/admin/category/create') }}">添加分类</a>
        </li>
    </ul>
    <form class="form-horizontal " action="{{ url('blog/admin/category/store') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th style="text-align: center;display: table-cell;vertical-align: middle;margin: 0 auto;">分类名</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                </td>
            </tr>
            <tr>
                <th style="text-align: center;display: table-cell;vertical-align: middle;margin: 0 auto;">关键字</th>
                <td>
                    <input class="form-control" type="text" name="keywords" value="{{ old('keywords') }}">
                </td>
            </tr>
            <tr>
                <th style="text-align: center;display: table-cell;vertical-align: middle;margin: 0 auto;">描述</th>
                <td>
                    <input class="form-control" type="text" name="description" value="{{ old('description') }}">
                </td>
            </tr>
            <tr>
                <th style="text-align: center;display: table-cell;vertical-align: middle;margin: 0 auto;">排序</th>
                <td>
                    <input class="form-control" type="text" name="sort" value="{{ old('sort') }}">
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
