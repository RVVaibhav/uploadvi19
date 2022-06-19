@extends('layouts.app', [
'namePage' => 'Create User',
'class' => 'login-page sidebar-mini ',
'activePage' => 'users',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{ url('/users') }}" enctype="multipart/form-data" method="post">
                <div class="card-header">
                    <h4>Create User</h4>
                </div>
                <div class="card-body">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="col-md-4 text-center">
                                <div class="card" style="width:200px" align="center">
                                    <img class="card-img-top" src="/img/default-avatar.png" alt="Card image">
                                    <!-- <div class="card-body">
                                    <a href="#" class="btn btn-primary">See Profile</a>
                                </div> -->
                                </div>
                                <br>
                                <div class="custom-file">
                                    <input type="file" required name="profile_pic" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    @if ($errors->has('profile_pic'))
                                    <span class="help-block text-danger">
                                        <strong class="text-danger">{{ $errors->first('profile_pic') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Call<span style="color: red">*</span></label>
                                    <div class="form-check-inline form-check">
                                        <label for="status1" class="form-check-label ">
                                            <input type="radio" required id="status1" name="status" value="Video"
                                                class="form-check-input">Video
                                        </label>
                                        <label for="status2" class="form-check-label ">
                                            <input type="radio" required id="status2" name="status" value="Audio"
                                                class="form-check-input">Audio
                                        </label>
                                        <label for="status3" class="form-check-label ">
                                            <input type="radio" required id="status3" name="status" value="Offline"
                                                class="form-check-input" checked>Offline
                                        </label>
                                    </div>
                                    @if($errors->has('status'))
                                    <span class="help-block text-danger">{{$errors->first('status')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name <span style="color: red">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required
                                        placeholder="">
                                    @if($errors->has('name'))
                                    <span class="help-block text-danger">{{$errors->first('name')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Mobile <span style="color: red">*</span></label>
                                    <input type="text" name="mobile" value="{{ old('mobile') }}"
                                        class="form-control {{ $errors->has('mobile') ? 'is-invalid':'' }}" required
                                        placeholder="">
                                    @if($errors->has('mobile'))
                                    <span class="help-block text-danger">{{$errors->first('mobile')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Gender<span style="color: red">*</span></label>
                                    <div class="form-check-inline form-check">
                                        <label for="gender1" class="form-check-label ">
                                            <input type="radio" required id="gender1" name="gender" value="Male"
                                                class="form-check-input" checked>Male
                                        </label>
                                        <label for="gender2" class="form-check-label ">
                                            <input type="radio" required id="gender2" name="gender" value="Female"
                                                class="form-check-input">Female
                                        </label>
                                    </div>
                                    @if($errors->has('gender'))
                                    <span class="help-block text-danger">{{$errors->first('gender')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>User Bio <span style="color: red">*</span></label>
                                    <textarea name="user_bio" required maxlength="240"
                                        class="form-control {{ $errors->has('user_bio') ? 'is-invalid':'' }}">{{ old('user_bio') }}</textarea>
                                    @if($errors->has('user_bio'))
                                    <span class="help-block text-danger">{{$errors->first('user_bio')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Age</label>
                                    <select class="form-control  {{ $errors->has('age') ? 'is-invalid':'' }}"
                                        name="age" required>
                                        <option value="">-Select age-</option>
                                        @for($i = 12; $i <= 120; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                         @endfor
                                    </select>
                                    @if($errors->has('age'))
                                    <span class="help-block text-danger">{{$errors->first('age')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Verification</label>
                                    <select class="form-control  {{ $errors->has('verification') ? 'is-invalid':'' }}"
                                        name="verification" required>
                                        <option value="">-Select Verification-</option>
                                        <option value="Not Verified">Not Verified</option>
                                        <option value="Blue">Blue</option>
                                        <option value="Red">Red</option>
                                        <option value="Orange">Orange</option>

                                    </select>
                                    @if($errors->has('verification'))
                                    <span class="help-block text-danger">{{$errors->first('verification')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Algorithm</label>
                                    <select class="form-control  {{ $errors->has('level_id') ? 'is-invalid':'' }}"
                                        name="level_id" required>
                                        <option value="">-Select Level-</option>
                                        @foreach($level as $l)
                                        <option value="{{$l->id}}">Level {{$l->levelno}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('level_id'))
                                    <span class="help-block text-danger">{{$errors->first('level_id')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Primary<span style="color: red">*</span></label>
                                    <div class="form-check-inline form-check">
                                        <label for="is_primary1" class="form-check-label ">
                                            <input type="radio" required id="is_primary1" name="is_primary" value="true"
                                                class="form-check-input">Yes
                                        </label>
                                        <label for="is_primary2" class="form-check-label ">
                                            <input type="radio" required id="is_primary2" name="is_primary" value="false"
                                                class="form-check-input" checked>No
                                        </label>
                                    </div>
                                    @if($errors->has('is_primary'))
                                    <span class="help-block text-danger">{{$errors->first('is_primary')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Bot<span style="color: red">*</span></label>
                                    <div class="form-check-inline form-check">
                                        <label for="is_bot1" class="form-check-label ">
                                            <input type="radio" required id="is_bot1" name="is_bot" value="true"
                                                class="form-check-input">Yes
                                        </label>
                                        <label for="is_bot2" class="form-check-label ">
                                            <input type="radio" required id="is_bot2" name="is_bot" value="false"
                                                class="form-check-input" checked>No
                                        </label>
                                    </div>
                                    @if($errors->has('is_bot'))
                                    <span class="help-block text-danger">{{$errors->first('is_bot')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer pull-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-dot-circle-o"></i> Create Now
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
