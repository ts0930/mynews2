
@extends('layouts.profile')

@section('title', 'プロフィールの新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール画面</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2"　for="gender">性別</label>
                        <div class="col-md-10">
                            @if (old('gender') == 'male' )
                            <input type="radio" name="gender" value="male" checeked="checked"> 男性{{ old('gender') }}
                            <input type="radio" name="gender" value="female">女性{{ old('gender') }}
                             @elseif (old('gender') == 'female')
                             <input type="radio" name="gender" value="male" > 男性{{ old('gender') }}
                             <input type="radio" name="gender" value="female" checeked="checked">女性{{ old('gender') }}
                             @else
                             <input type="radio" name="gender" value="male" > 男性{{ old('gender') }}
                              <input type="radio" name="gender" value="female">女性{{ old('gender') }}
                              @endif
                        </div>
                    </div>
                    
                     <div class="form-group row">
                     <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                     </div> 
                     
                    <div class="form-group row">
                         <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection