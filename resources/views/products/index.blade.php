@extends('layouts.app', [
'namePage' => 'Products',
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
                <div class="card-body">
                    <div class="places-buttons">
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto text-center">
                                <h4 class="card-title">
                                    Products Costing
                                </h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 ml-auto mr-auto">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="/products/gift" class="btn btn-primary btn-block" >Gift</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="/products/coin-center" class="btn btn-primary btn-block" >Coin
                                            Center</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="/products/secret-chat" class="btn btn-primary btn-block" >Secret Chat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 ml-auto mr-auto">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="/products/convert-coin" class="btn btn-primary btn-block" >Convert Coin</a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="/products/call-rate" class="btn btn-primary btn-block">Call Rate</a>
                                    </div>
                                    <div class="col-md-4">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection