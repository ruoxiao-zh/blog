@extends('layouts.admin')

@section('title', '文章列表')

@section('nav', '文章列表')

@section('description', '已发布的文章列表')

@section('content')

    <!-- 导航栏结束 -->
    <ul id="myTab" class="nav nav-tabs bar_tabs">
        <li class="active">
            <a href="{{ url('blog/admin/article/index') }}">文章列表</a>
        </li>
        <li>
            <a href="{{ url('blog/admin/article/create') }}">发布文章</a>
        </li>
    </ul>
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th style="text-align: center;">文章id</th>
            <th style="text-align: center;">分类</th>
            <th style="text-align: center;">标题</th>
            <th style="text-align: center;">点击数</th>
            <th style="text-align: center;">状态</th>
            <th style="text-align: center;">发布时间</th>
            <th style="text-align: center;">操作</th>
        </tr>
        @foreach($article as $k => $v)
            <tr>
                <td style="text-align: center;">{{ $v->id }}</td>
                <td style="text-align: center;">{{ $v->category->name }}</td>
                <td>
                    <a href="{{ url('blog/article', [$v->id]) }}" target="_blank">{{ $v->title }}</a>
                </td>
                <td style="text-align: center;">{{ $v->click }}</td>
                <td style="text-align: center;">
                    @if(is_null($v->deleted_at))
                        √
                    @else
                        ×
                    @endif
                </td>
                <td style="text-align: center;">{{ $v->created_at }}</td>
                <td style="text-align: center;">
                    <a href="{{ url('blog/admin/article/edit', [$v->id]) }}">编辑</a>
                    |
                    @if(is_null($v->deleted_at))
                        <a href="javascript:if(confirm('确认删除?'))location.href='{{ url('blog/admin/article/destroy', [$v->id]) }}'">删除</a>
                    @else
                        <a href="javascript:if(confirm('确认恢复?'))location.href='{{ url('blog/admin/article/restore', [$v->id]) }}'">恢复</a>
                        |
                        <a href="javascript:if(confirm('彻底删除?'))location.href='{{ url('blog/admin/article/forceDelete', [$v->id]) }}'">彻底删除</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $article->links() }}
    </div>

@endsection
