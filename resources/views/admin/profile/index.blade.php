@extends('layouts.profile')
@section('title','登録済みプロフィール一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\ProfileController@add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\ProfileController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">名前</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-profile col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-light">
                        <thead class="table table-light">
                            <tr>
                                <th width="10%">ID</th>
                                <th width="10%">名前</th>
                                <th width="10%">性別</th>
                                <th width="10%">誕生日</th>
                                <th width="20%">趣味</th>
                                <th width="40%">自己紹介</th>
                            </tr>
                        </thead>
                        <tbody class="table table-secondary">
                            @foreach($posts as $profile)
                            <tr>
                                <th>{{ $profile->id }}</th>
                                <td>{{ \Str::limit($profile->name,60) }}</td>
                                <td>{{ \Str::limit($profile->gender,50) }}</td>
                                <td>{{ \Str::limit($profile->birthday,50) }}</td>
                                <td>{{ \Str::limit($profile->hobby,500) }}</td>
                                <td>{{ \Str::limit($profile->introduction,500) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection