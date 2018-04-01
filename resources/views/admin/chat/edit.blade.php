@extends('layouts.admin')

@section('title', '编辑随言碎语')

@section('nav', '编辑随言碎语')

@section('description', '编辑随言碎语')

@section('content')
    <form class="form-inline" action="{{ url('blog/admin/chat/update', [$data->id]) }}" method="post">
        {{ csrf_field() }}
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th style="text-align: center;display: table-cell;vertical-align: middle;margin: 0 auto;">内容</th>
                <td>
                    <textarea class="form-control modal-sm" name="content" cols="40" rows="10" placeholder="随言碎语内容">{{ $data['content'] }}</textarea>
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
