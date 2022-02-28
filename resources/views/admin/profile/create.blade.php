{{-- layouts/profile.blade.phpを読み込む --}}
@extends('layouts.profile')
{{-- profile.blade.phpの@yield('title')に'プロフィールの新規作成'を埋め込む --}}
@section('title','プロフィールの新規作成')
{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>マイプロフィール</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                    @if(count($errors)>0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                        <div class="form-group row">
                            <label class="col-md-2">名前</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">性別</label>
                            <div class="col-md-10">
                                <select type="text" class="form-control" name="gender_id">
                                    {{-- <option value=" " selected="selected">選択してください</option> --}}
                                    {{-- <option value="男性">男性</option>
                                    <option value="女性">女性</option>
                                    <option value="その他">その他</option>
                                    <option value="回答しない">回答しない</option> --}}
                                    
                                    <option value="0" @if(old('gender_id') == 0) selected="selected" @endif>選択してください</option>
                                    @foreach($genders as $gender)
                                    <option value="{{ $gender->id }}" @if(old('gender_id') == ($gender->id)) selected="selected" @endif>{{ $gender->name }}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">誕生日</label>
                            <div class="col-md-10">
                                <input type="date" class="form-control" name="birthday" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">趣味</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="hobby" rows="5">{{ old('hobby') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">自己紹介</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="introduction" rows="10">{{ old('introduction') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">画像</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control-file" name="image">
                            </div>
                        </div>
                        {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        
        <title>MyProfile</title>
    </head>
    <body>
        <h1>Myプロフィール画面作成</h1>
    </body>
</html> --}}