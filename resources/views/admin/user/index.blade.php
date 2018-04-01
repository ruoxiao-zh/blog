@extends('layouts.admin')

@section('title', '管理员列表')

@section('nav', '管理员列表')

@section('description', '博客管理员')

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="5%" style="text-align: center;">id</th>
            <th style="text-align: center;">用户名</th>
            <th style="text-align: center;">邮箱</th>
            <th width="15%" style="text-align: center;">创建日期</th>
            <th width="10%" style="text-align: center;">操作</th>
        </tr>
        @foreach($data as $k => $v)
            <tr>
                <td style="text-align: center;">{{ $v->id }}</td>
                <td style="text-align: center;">{{ $v->name }}</td>
                <td style="text-align: center;">{{ $v->email }}</td>
                <td style="text-align: center;">{{ $v->created_at }}</td>
                <td style="text-align: center;"><a href="{{ url('blog/admin/user/edit', [$v->id]) }}">编辑</a></td>
            </tr>
        @endforeach
    </table>
@endsection
