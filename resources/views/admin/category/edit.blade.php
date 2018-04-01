@extends('layouts.admin')

@section('title', '编辑分类')

@section('nav', '编辑分类')

@section('description', '编辑分类')

@section('content')
    <form class="form-horizontal " action="{{ url('blog/admin/category/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th style="text-align: center;display: table-cell;vertical-align: middle;margin: 0 auto;">分类名</th>
                <td>
                    <input class="form-control" type="text" name="name" value="{{ $data['name'] }}">
                </td>
            </tr>
            <tr>
                <th style="text-align: center;display: table-cell;vertical-align: middle;margin: 0 auto;">关键字</th>
                <td>
                    <input class="form-control" type="text" name="keywords" value="{{ $data['keywords'] }}">
                </td>
            </tr>
            <tr>
                <th style="text-align: center;display: table-cell;vertical-align: middle;margin: 0 auto;">描述</th>
                <td>
                    <input class="form-control" type="text" name="description" value="{{ $data['description'] }}">
                </td>
            </tr>
            <tr>
                <th style="text-align: center;display: table-cell;vertical-align: middle;margin: 0 auto;">排序</th>
                <td>
                    <input class="form-control" type="text" name="sort" value="{{ $data['sort'] }}">
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
