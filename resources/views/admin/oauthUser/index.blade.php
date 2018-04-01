@extends('layouts.admin')

@section('title', '第三方用户列表')

@section('nav', '第三方用户列表')

@section('description', '博客第三方用户')

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th style="text-align: center;">id</th>
            <th style="text-align: center;">用户名</th>
            <th style="text-align: center;">类型</th>
            <th style="text-align: center;">邮箱</th>
            <th style="text-align: center;">登录次数</th>
            <th style="text-align: center;">管理员</th>
            <th style="text-align: center;">最近登录</th>
            <th style="text-align: center;">第一次登录</th>
            <th style="text-align: center;">操作</th>
        </tr>
        @foreach($data as $k => $v)
            <tr>
                <td style="text-align: center;">{{ $v->id }}</td>
                <td style="text-align: center;">{{ $v->name }}</td>
                <td style="text-align: center;">
                    @if($v->type == 1)QQ @endif
                    @if($v->type == 2)新浪微博 @endif
                    @if($v->type == 3)github @endif
                </td>
                <td style="text-align: center;">{{ $v->email }}</td>
                <td style="text-align: center;">{{ $v->login_times }}</td>
                <td style="text-align: center;">
                    @if($v->is_admin == 1)
                        √️
                    @else
                        ×
                    @endif
                </td>
                <td style="text-align: center;">{{ $v->updated_at }}</td>
                <td style="text-align: center;">{{ $v->created_at }}</td>
                <td style="text-align: center;"><a href="{{ url('blog/admin/oauthUser/edit', [$v->id]) }}">编辑</a></td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $data->links() }}
    </div>
@endsection
