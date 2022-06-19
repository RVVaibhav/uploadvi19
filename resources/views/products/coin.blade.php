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
                            <td class="text-left"><h4>Coin Control</h4></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @if(count($coin) > 0)
        @foreach($coin as $c)
        <div class="col-md-4">
            <div class="card" style="width:200px" align="center">
                <div class="card-body">
                    <div class="autho">
                        <h5 class="title">Rs. {{$c->coin_rs}}</h5>
                        <p class="card-text">{{$c->coins}} Coins</p>
                    </div>
                    <a class="btn btn-info" href="{{ url('/products/gift/'.$c->id) }}" data-hover="tooltip" data-placement="top"
                        data-target="#editcoin{{$c->id}}" data-toggle="modal" id="modal-edit" title="Edit"><i
                            class="fa fa-fw fa-edit"></i></a>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editcoin{{$c->id}}">
            <div class="modal-dialog modal-col-md-4">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Gift</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('/products/coin-center/'.$c->id) }}" enctype="multipart/form-data">
                            <div class="card-body">
                                {{ csrf_field() }}
                                <div class="form-row">
                                    <div class="col-6">
                                        <label><b>Coin Rs.</b> <sup class="text-danger">*</sup></label>
                                        <input type="number" name="coin_rs" value="{{$c->coin_rs}}" class="form-control" placeholder="Coin Rs"
                                            required>
                                        @if ($errors->has('coin_rs'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('coin_rs') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-6">
                                        <label><b>Coins</b> <sup class="text-danger">*</sup></label>
                                        <input type="number" name="coins" value="{{$c->coins}}" class="form-control"
                                            placeholder="Coins" required>
                                        @if ($errors->has('coins'))
                                        <span class="help-block text-danger">
                                            <strong class="text-danger">{{ $errors->first('coins') }}</strong>
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