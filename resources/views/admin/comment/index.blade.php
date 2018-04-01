@extends('layouts.admin')

@section('title', '评论列表')

@section('nav', '评论列表')

@section('description', '文章评论')

@section('content')
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="5%" style="text-align: center;">id</th>
            <th width="35%" style="text-align: center;">评论内容</th>
            <th width="25%" style="text-align: center;">文章</th>
            <th width="10%" style="text-align: center;">用户</th>
            <th width="15%" style="text-align: center;">评论日期</th>
            <th width="5%" style="text-align: center;">状态</th>
            <th width="5%" style="text-align: center;">操作</th>
        </tr>
        @foreach($data as $k => $v)
            <tr>
                <td style="text-align: center;">{{ $v->id }}</td>
                <td>{!! htmlspecialchars_decode($v->content) !!}</td>
                <td style="text-align: center;">
                    <a href="{{ url('blog/article', [$v->article_id]) }}#comment-{{ $v->id }}" target="_blank">{{ $v->title }}</a>
                </td>
                <td style="text-align: center;">{{ $v->name }}</td>
                <td style="text-align: center;">{{ $v->created_at }}</td>
                <td style="text-align: center;">
                    @if(is_null($v->deleted_at))
                        √
                    @else
                        ×
                    @endif
                </td>
                <td style="text-align: center;">
                    @if(is_null($v->deleted_at))
                        <a href="javascript:if(confirm('确认删除?'))location.href='{{ url('blog/admin/comment/destroy', [$v->id]) }}'">删除</a>
                    @else
                        <a href="javascript:if(confirm('确认恢复?'))location.href='{{ url('blog/admin/comment/restore', [$v->id]) }}'">恢复</a>
                        |
                        <a href="javascript:if(confirm('彻底删除?'))location.href='{{ url('blog/admin/comment/forceDelete', [$v->id]) }}'">彻底删除</a>
                    @endif

                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-center">
        {{ $data->links() }}
    </div>
@endsection
