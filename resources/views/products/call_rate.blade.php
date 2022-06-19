@extends('layouts.app', [
'namePage' => 'Products Call Rate',
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
                            <td class="text-left"><h4>Call Rate</h4></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @if(count($callRate) > 0)
        @foreach($callRate as $cr)
        <div class="col-md-4">
            <div class="card" style="width:200px" align="center">
                <div class="card-body">
                    <div class="autho">
                        <h5 class="title">{{$cr->call_type}}</h5>
                        <p class="card-text">{{$cr->coin_per_sec}} Coins</p>
                    </div>
                    <a class="btn btn-info" href="#" data-hover="tooltip" data-placement="top"
                        data-target="#editCallRate{{$cr->id}}" data-toggle="modal" id="modal-edit" title="Edit"><i
                            class="fa fa-fw fa-edit"></i></a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editCallRate{{$cr->id}}">
            <div class="modal-dialog modal-col-md-4">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Gift</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('/products/call-rate/'.$cr->id) }}" enctype="multipart/form-data">
                            <div class="card-body">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-6">
                                        <label><b>Convert Coin Rs.</b> <sup class="text-danger">*</sup></label>
                                        <input type="text" name="call_type" readonly value="{{$cr->call_type}}" class="form-control" placeholder="Gift Name"
                                            required>
                                        @if ($errors->has('call_type'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('call_type') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-6">
                                        <label><b>Convert Coins</b> <sup class="text-danger">*</sup></label>
                                        <input type="number" name="coin_per_sec" value="{{$cr->coin_per_sec}}" class="form-control"
                                            placeholder="Gift Coin" required>
                                        @if ($errors->has('coin_per_sec'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('coin_per_sec') }}</strong>
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

</div>
@endsection