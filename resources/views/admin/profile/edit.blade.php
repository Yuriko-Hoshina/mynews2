@extends('layouts.profile')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            <select type="text" class="form-control" name="gender_id">
                                
                                {{-- プルダウンメニュー --}}
                                <option value=" " @if(old('gender_id', $profile->gender_id) == " ") selected="selected" @endif>選択してください</option>
                                @foreach($genders as $gender)
                                    <option value="{{ $gender->id }}" @if(old('gender_id', $profile->gender_id) == $gender->id) selected="selected" @endif>{{ $gender->name }}</option>
                                @endforeach
                                
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="birthday">誕生日</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="birthday" value="{{ $profile->birthday }}">
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味</label>
                        <div class="col-md-10">
                            {{-- テキスト入力ver --}}
                            {{-- <textarea class="form-control" name="hobby" rows="5">{{ $profile->hobby }}</textarea> --}}
                            
                            {{-- プルダウンメニューver --}}
                            {{-- <select type="text" class="form-control" name="hobby_id">
                                <option value="0" @if(old('hobby_id', $profile->hobby_id) == 0) selected="selected" @endif>選択してください</option>
                                @foreach($hobbies as $hobby)
                                    <option value="{{ $hobby->id }}" @if(old('hobby_id', $profile->hobby_id) == $hobby->id) selected="selected" @endif>{{ $hobby->name }}</option>
                                @endforeach
                            </select> --}}
                                
                            {{-- プルダウンメニュー連動ver --}}
                            <div class="col-md-7 py-2">
                                <select class="form-control" name="hobby_category_id" id="category" onChange="swapSelectOptions('category', 'hobby')">
                                    <option value=" " @if(old('hobby_category_id', $profile->hobby_category_id) == " ") selected="selected" @endif>選択してください</option>
                                    @foreach($hobbyCategories as $category)
                                        <option value="{{ $category->id }}" @if(old('hobby_category_id', $profile->hobby_category_id) == $category->id) selected="selected" @endif>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-7 py-2">
                                <select class="form-control" name="hobby_id" id="hobby">
                                    <option value=" " @if(old('hobby_id', $profile->hobby_id) == " ") selected="selected" @endif>選択してください</option>
                                    @foreach($hobbies as $hobby)
                                        <option value="{{ $hobby->id }}" @if(old('hobby_id', $profile->hobby_id) == $hobby->id) selected="selected" @endif>{{ $hobby->name }}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                    </div>
                
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="10">{{ $profile->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $profile->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                        
                        <div class="col-ml-md-5">
                            <a href={{ url('/admin/profile2') }}>一覧へ戻る</a>
                        </div>
                    </div>
                    
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if($profile->pro_histories != NULL)
                                @foreach($profile->pro_histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type = "text/javascript">
        let jsMatAry = {!! $jsAry !!};
        console.log(jsMatAry);
        function swapSelectOptions(id1, id2)
        {
          var select1 = document.getElementById(id1);//変数select1を宣言
          var select2 = document.getElementById(id2); //変数select2を宣言
          select2.options.length = 0; // 選択肢の数がそれぞれに異なる場合、これが重要
          var arr = [];
          var tmp = [];
          for (var i = 0; i < jsMatAry.length; i++) {
            tmp  = jsMatAry[i];
            if (tmp.id == select1.options[select1.selectedIndex].value) {
              arr = tmp.arr;
              break;
            }
          }
          select2.options[0] = new Option("選択してください", '0');
          for( let i = 0; i <=　arr.length; i++ ) {
            select2.options[i + 1] = new Option(arr[i].txt, arr[i].val);
          }
        }
    </script>
@endsection