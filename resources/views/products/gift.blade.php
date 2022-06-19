@extends('layouts.app', [
'namePage' => 'Products Gift',
'class' => 'login-page sidebar-mini ',
'activePage' => 'products',
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
                            <td class="text-left"><button type="button" class="btn btn-primary btn-round text-white"
                                    data-toggle="modal" data-target="#addnewgift">Add New Gift</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @if(count($gift) > 0)
        @foreach($gift as $g)
        <div class="col-md-4">
            <div class="card" style="width:200px" align="center">
                <div class="card-body">
                    <div class="autho">
                        <a href="#">
                            <img class="avatar border-gray" style="width: 100px;height: 100px;"
                                src="{{ Storage::url($g->gift_img)}}" alt="...">
                        </a>
                        <h5 class="title">{{$g->gift_name}}</h5>
                        <p class="card-text">{{$g->gift_coin}}</p>
                    </div>
                    <a class="btn btn-info" href="{{ url('/products/gift/'.$g->id) }}" data-hover="tooltip" data-placement="top"
                        data-target="#addnewgift{{$g->id}}" data-toggle="modal" id="modal-edit" title="Edit"><i
                            class="fa fa-fw fa-edit"></i></a>
                    <form action="{{ url('/products/gift/'.$g->id) }}" method="post" style="display: unset;">
                        <button type="submit" value="Delete" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></button>
                        @method('delete')
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addnewgift{{$g->id}}">
            <div class="modal-dialog modal-col-md-4">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Gift</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('/products/gift/'.$g->id) }}" enctype="multipart/form-data">
                            <div class="card-body">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-6">
                                        <label><b>Gift Name</b> <sup class="text-danger">*</sup></label>
                                        <input type="text" name="gift_name" value="{{$g->gift_name}}" class="form-control" placeholder="Gift Name"
                                            required>
                                        @if ($errors->has('gift_name'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('gift_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-6">
                                        <label><b>Gift Coin</b> <sup class="text-danger">*</sup></label>
                                        <input type="number" name="gift_coin" value="{{$g->gift_coin}}" class="form-control"
                                            placeholder="Gift Coin" required>
                                        @if ($errors->has('gift_coin'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('gift_coin') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-6">
                                        <label><b>Gift Image</b> <sup class="text-danger">*</sup></label>
                                        <input type="file" name="gift_img" class="form-control"
                                            id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <!-- <label class="custom-file-label" for="inputGroupFile01">Choose file</label> -->
                                        @if ($errors->has('gift_img'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('gift_img') }}</strong>
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
        @endforeach
        @endif
    </div>
    <!-- role model -->
    <div class="modal fade" id="addnewgift">
        <div class="modal-dialog modal-col-md-4">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Gift</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/products/gift') }}" enctype="multipart/form-data">
                        <div class="card-body">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="col-6">
                                    <label><b>Gift Name</b> <sup class="text-danger">*</sup></label>
                                    <input type="text" name="gift_name" class="form-control" placeholder="Gift Name"
                                        required>
                                    @if ($errors->has('gift_name'))
                                    <span class="help-block text-danger">
                                        <strong class="text-danger">{{ $errors->first('gift_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-6">
                                    <label><b>Gift Coin</b> <sup class="text-danger">*</sup></label>
                                    <input type="number" name="gift_coin" class="form-control" placeholder="Gift Coin"
                                        required>
                                    @if ($errors->has('gift_coin'))
                                    <span class="help-block text-danger">
                                        <strong class="text-danger">{{ $errors->first('gift_coin') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-6">
                                    <label><b>Gift Image</b> <sup class="text-danger">*</sup></label>
                                    <input type="file" required name="gift_img" class="form-control"
                                        id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <!-- <label class="custom-file-label" for="inputGroupFile01">Choose file</label> -->
                                    @if ($errors->has('gift_img'))
                                    <span class="help-block text-danger">
                                        <strong class="text-danger">{{ $errors->first('gift_img') }}</strong>
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