@extends('layouts.app', [
'namePage' => 'Algorithm Users',
'class' => 'login-page sidebar-mini ',
'activePage' => 'algorithms',
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
                    <!-- <table width="100%">
                        <tr>
                            <td><input type="text" class="form-control pull-left" style="height:40px;width: 300px;"
                                    placeholder="Search" /></td>
                            <td class="text-center">
                                <select placeholder="Filter" class="form-control" style="height:40px">
                                    <option>Bot All Level</option>
                                    <option>Bot Level 1</option>
                                    <option>Bot Level 2</option>
                                    <option>Bot Level 3</option>
                                    <option>Verified</option>
                                    <option>Primary Accs</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                    <option>Video Call enabled</option>
                                    <option>Audio Call ebabled</option>
                                </select>
                            </td>
                            <td><a class="btn btn-primary btn-round text-white pull-right"
                                    href="{{route('users.create')}}">Create New User</a></td>
                        </tr>
                    </table> -->
                </div>
            </div>
        </div>
        @if(count($users) > 0)
        @foreach ($users as $user)
        <div class="col-md-4">
            <div class="card">
                <div class="card-body ">
                    <table>
                        <tr>
                            <td rowspan=3>
                            @if($user->userDetails['profile_pic'])
                                <img class="img-circle" src="{{ Storage::url($user->userDetails['profile_pic'])}}"
                                    style="border-radius: 50%;width: 50px;height: 50px;">
                            @else
                                <img class="img-circle" src="/img/default-avatar.png"
                                    style="border-radius: 50%;width: 50px;height: 50px;">
                            @endif
                            </td>
                        </tr>
                        <tr>
                            <td><span style="font-size:20px">{{$user->name}}</span></td>
                        </tr>
                        <tr>
                            <td>150K Followers</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer ">
                    <div class="stats">
                        {{$user->userDetails['bot'] ? 'Bot' : ''}} | 150 Voice | Video Call | Level
                        {{$user->userDetails['level_id']}} | {{$user->userDetails['status']}} |
                        <a class="btn btn-link" href="/users/{{$user->id}}" ><i class="fa fa-fw fa-edit"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{$users->render()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection