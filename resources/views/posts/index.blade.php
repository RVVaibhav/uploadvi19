@extends('layouts.app', [
'namePage' => 'Posts',
'class' => 'login-page sidebar-mini ',
'activePage' => 'userposts',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form action="{{ url('/userposts') }}"  method="get">
                    <table width="100%">
                        <tr>
                            <td class="text-center"><input type="text" class="form-control pull-left"
                                    style="height:40px;width: 300px;" name="coins" value="{{ Request::get('coins')}}" placeholder="Enter Coin" /></td>
                            <td class="text-center">
                                <select placeholder="Filter" name="filter" class="form-control" style="height:40px">
                                    <option value="all" {{ Request::get('filter') == 'all'  ? 'selected' : '' }}>Bot All Level</option>
                                    <option value="1" {{ Request::get('filter') == '1'  ? 'selected' : '' }}>Bot Level 1</option>
                                    <option value="2" {{ Request::get('filter') == '2'  ? 'selected' : '' }}>Bot Level 2</option>
                                    <option value="3" {{ Request::get('filter') == '3'  ? 'selected' : '' }}>Bot Level 3</option>
                                    <option value="verified" {{ Request::get('filter') == 'verified'  ? 'selected' : '' }}>Verified</option>
                                    <option value="primary" {{ Request::get('filter') == 'primary'  ? 'selected' : '' }}>Primary Accs</option>
                                    <option value="Male" {{ Request::get('filter') == 'Male'  ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ Request::get('filter') == 'Female'  ? 'selected' : '' }}>Female</option>
                                    <option value="VideoCall" {{ Request::get('filter') == 'VideoCall'  ? 'selected' : '' }}>Video Call enabled</option>
                                    <option value="AudioCall" {{ Request::get('filter') == 'AudioCall'  ? 'selected' : '' }}>Audio Call ebabled</option>
                                </select>
                            </td>
                            <td class="text-center">
                            <button type="submit" class="btn btn-primary btn-round text-white pull-right"
                                    >Check Algorithm Based Posts</button></td>
                        </tr>
                    </table>
                    </form>
                </div>

                @foreach($posts as $post)
                <div class="card-body">
                    <div class="col-md-4">
                        <!-- Widget: user widget style 1 -->
                        <div class="card">
                            <table>
                                <tr>
                                    <td rowspan=3>
                                        @if($post->userDetails->profile_pic)
                                        <img class="img-circle" src="{{env('STORAGE_BASE_URL').$post->userDetails->profile_pic}}" style="width:50px;height:50px" alt="User">
                                        @else
                                        <img class="img-circle" src="/img/default-avatar.png" style="width:50px;height:50px" alt="User">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{$post->name}}</td>
                                </tr>
                                <tr>
                                    <td>Followers : 150K</td>
                                </tr>
                            </table>
                            <table CELLPADDING=20>
                                <tr>
                                    <td>{{$post->userDetails->user_bio}}</td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($post->userlastpost->file_type == 'image/png')
                                        <img class="img-circle" src="{{env('STORAGE_BASE_URL').$post->userlastpost->filename}}" alt="User Avatar">
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
