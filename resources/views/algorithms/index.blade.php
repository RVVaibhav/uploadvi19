@extends('layouts.app', [
'namePage' => 'Algorithm',
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
                    <table width="100%">
                        <tr>
                            <!-- <td class="text-center"><button type="button" class="btn btn-primary btn-round text-white"
                                    data-toggle="modal" data-target="#addrolemodal">New Role</button></td> -->
                            <td class="text-right"><button type="button"
                                    class="btn btn-primary btn-round text-white">Pinned Top Post</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @if(count($level) > 0)
        @foreach ($level as $l)
        <div class="col-md-4">
            <div class="card" style="width:200px" align="center">
                <div class="card-body">
                    <h4 class="card-title">Level {{$l->levelno}}</h4>
                    <p class="card-text">From: {{$l->from_coin}} To : {{$l->to_coin}}</p>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#algorithmModal{{$l->id}}">Algorithm</button>

                    <a class="btn btn-info" href="{{ url('/addrole') }}" data-hover="tooltip" data-placement="top"
                        data-target="#addrolemodal{{$l->id}}" data-toggle="modal" id="modal-edit" title="Edit"><i
                            class="fa fa-fw fa-edit"></i></a>
                    <a href="{{ url('/algorithms/users/'.$l->id) }}" class="btn btn-dark"><i class="fa fa-fw fa-eye"></i></a>

                    <form action="{{ url('algorithms/'.$l->id) }}" method="post">
                          <button type="submit" value="Delete" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></button>
                          @method('delete')
                          @csrf
                      </form>
                      
                    <button class="btn btn-primary" data-toggle="modal" data-target="#slideuserModal{{$l->id}}">Slide Users</button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addrolemodal{{$l->id}}">
            <div class="modal-dialog modal-col-md-4">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Role</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('/addrole/'.$l->id.'/edit') }}">
                            <div class="card-body">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-6">
                                        <label><b>Level No</b> <sup class="text-danger">*</sup></label>
                                        <input type="number" value="{{$l->levelno}}" name="levelno" class="form-control"
                                            placeholder="Level No" required>
                                        @if ($errors->has('levelno'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('levelno') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-6">
                                        <label><b>From Coin</b> <sup class="text-danger">*</sup></label>
                                        <input type="number" value="{{$l->from_coin}}" name="from_coin"
                                            class="form-control" placeholder="From Coin" required>
                                        @if ($errors->has('from_coin'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('from_coin') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-6">
                                        <label><b>To Coin</b> <sup class="text-danger">*</sup></label>
                                        <input type="number" value="{{$l->to_coin}}" name="to_coin" class="form-control"
                                            placeholder="To Coin" required>
                                        @if ($errors->has('to_coin'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('to_coin') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Save">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- alogorithm model -->
        <div class="modal fade" id="algorithmModal{{$l->id}}">
            <div class="modal-dialog modal-col-md-4">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Level {{$l->levelno}} Algorithm</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                            <form method="POST" action="{{ url('/algorithms/') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{$l->id}}" name="level_id" />
                                @if(count($l->algorithms) > 0)
                                @foreach ($l->algorithms as $algorithm)
                                <div class="form-row">
                                    <div class="col-6">
                                        <label><b>Percantage</b> <sup class="text-danger">*</sup></label>
                                        <input type="number" name="percentage[]" class="form-control"
                                            placeholder="Percantage" value="{{$algorithm->percentage}}" required>
                                        @if ($errors->has('percentage'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('percentage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label><b>Reach To<sup class="text-danger">*</sup></label></b>
                                        <select name="reachto[]" id="select" value="{{$algorithm->reachto}}" class="form-control" required>
                                            <option value="">-Select-</option>
                                            <option value="all" {{$algorithm->reachto == 'all' ? 'selected' : ""}}>Bot All Level</option>
                                            <option value="1" {{$algorithm->reachto == '1' ? 'selected' : ""}}>Bot Level 1</option>
                                            <option value="2" {{$algorithm->reachto == '2' ? 'selected' : ""}}>Bot Level 2</option>
                                            <option value="3" {{$algorithm->reachto == '3' ? 'selected' : ""}}>Bot Level 3</option>
                                            <option value="verified" {{$algorithm->reachto == 'verified' ? 'selected' : ""}}>Verified</option>
                                            <option value="primary" {{$algorithm->reachto == 'primary' ? 'selected' : ""}}>Primary Accs</option>
                                            <option value="Male" {{$algorithm->reachto == 'Male' ? 'selected' : ""}}>Male</option>
                                            <option value="Female" {{$algorithm->reachto == 'Female' ? 'selected' : ""}}>Female</option>
                                            <option value="VideoCall" {{$algorithm->reachto == 'VideoCall' ? 'selected' : ""}}>Video Call enabled</option>
                                            <option value="AudioCall" {{$algorithm->reachto == 'AudioCall' ? 'selected' : ""}}>Audio Call ebabled</option>
                                        </select>
                                        @if ($errors->has('reachto'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('reachto') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                                @else
                                @for($i = 1; $i <= 5; $i++) 
                                <div class="form-row">
                                    <div class="col-6">
                                        <label><b>Percantage</b> <sup class="text-danger">*</sup></label>
                                        <input type="number" name="percentage[]" class="form-control"
                                            placeholder="Percantage" required>
                                        @if ($errors->has('percentage'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('percentage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label><b>Reach To<sup class="text-danger">*</sup></label></b>
                                        <select name="reachto[]" id="select" class="form-control" required>
                                            <option value="">-Select-</option>
                                            <option value="all">Bot All Level</option>
                                            <option value="1">Bot Level 1</option>
                                            <option value="2">Bot Level 2</option>
                                            <option value="3">Bot Level 3</option>
                                            <option value="verified">Verified</option>
                                            <option value="primary">Primary Accs</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="VideoCall">Video Call enabled</option>
                                            <option value="AudioCall">Audio Call ebabled</option>
                                        </select>
                                        @if ($errors->has('reachto'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('reachto') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @endfor
                                @endif
                                <label>&nbsp;</label>
                                <input type="submit" class="btn btn-primary" value="Save">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="slideuserModal{{$l->id}}">
            <div class="modal-dialog modal-col-md-4">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Level {{$l->levelno}} Slide Users</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body">
                        <form method="POST" action="{{ url('/level/slideuser') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{$l->id}}" name="level_id" />
                                @if(count($l->slideuser) > 0)
                                @foreach ($l->slideuser as $slideusr)
                                <div class="form-row">
                                    <div class="col-6">
                                        <label><b>Position</b> <sup class="text-danger">*</sup></label>
                                        <input type="number" name="position[]" class="form-control"
                                            placeholder="Percantage" value="{{$slideusr->position}}" required>
                                        @if ($errors->has('position'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('position') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label><b>Reach To<sup class="text-danger">*</sup></label></b>
                                        <select name="reachto[]" id="select" value="{{$slideusr->reachto}}" class="form-control" required>
                                            <option value="">-Select-</option>
                                        </select>
                                        @if ($errors->has('reachto'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('reachto') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                                @else
                                @for($i = 1; $i <= 4; $i++) 
                                <div class="form-row">
                                    <div class="col-6">
                                        <label><b>Position</b> <sup class="text-danger">*</sup></label>
                                        <input type="number" readonly name="position[]" class="form-control"
                                            placeholder="Percantage" value="{{$i}}" required>
                                        @if ($errors->has('position'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('position') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label><b>Reach To<sup class="text-danger">*</sup></label></b>
                                        <select name="reachto[]" id="select" class="form-control" required>
                                            <option value="">-Select-</option>
                                            <option value="Active">Active User</option>
                                            <!-- TODO::add list of level 1 user or search option -->
                                            <option value="1">User Name</option>
                                        </select>
                                        @if ($errors->has('reachto'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('reachto') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                @endfor
                                @endif
                                <label>&nbsp;</label>
                                <input type="submit" class="btn btn-primary" value="Save">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <!-- role model -->
    <div class="modal fade" id="addrolemodal">
        <div class="modal-dialog modal-col-md-4">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Role</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/addrole') }}">
                        <div class="card-body">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-6">
                                    <label><b>Level No</b> <sup class="text-danger">*</sup></label>
                                    <input type="number" name="levelno" class="form-control" placeholder="Level No"
                                        required>
                                    @if ($errors->has('levelno'))
                                    <span class="help-block text-danger">
                                        <strong class="text-danger">{{ $errors->first('levelno') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-6">
                                    <label><b>From Coin</b> <sup class="text-danger">*</sup></label>
                                    <input type="number" name="from_coin" class="form-control" placeholder="From Coin"
                                        required>
                                    @if ($errors->has('from_coin'))
                                    <span class="help-block text-danger">
                                        <strong class="text-danger">{{ $errors->first('from_coin') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-6">
                                    <label><b>To Coin</b> <sup class="text-danger">*</sup></label>
                                    <input type="number" name="to_coin" class="form-control" placeholder="To Coin"
                                        required>
                                    @if ($errors->has('to_coin'))
                                    <span class="help-block text-danger">
                                        <strong class="text-danger">{{ $errors->first('to_coin') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection