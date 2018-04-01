@extends('layouts.admin')

@section('title', '随言碎语列表')

@section('nav', '随言碎语列表')

@section('description', '博客随言碎语')

@section('content')
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('blog/admin/chat/index') }}">随言碎语列表</a>
        </li>
        <li>
            <a href="{{ url('blog/admin/chat/create') }}">添加随言碎语</a>
        </li>
    </ul>

    <form class="form-inline" action="{{ url('blog/admin/chat/store') }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th style="text-align: center;display: table-cell;vertical-align: middle;margin: 0 auto;">内容</th>
                <td>
                    <textarea class="form-control modal-sm" name="content" cols="40" rows="10" placeholder="随言碎语内容">{{ old('content') }}</textarea>
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
