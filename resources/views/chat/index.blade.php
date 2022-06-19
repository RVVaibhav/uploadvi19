@extends('layouts.app', [
'namePage' => 'Chat',
'class' => 'login-page sidebar-mini ',
'activePage' => 'chat',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="panel-header">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card" id="app">
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <td style="width:33%;" valign="top">
                                <table style="width:100%;">
                                    <tr>
                                        <td>
                                            <uselist :data="{{ $users }}">
                                                </userlist>
                                        </td>
                                    </tr>
                                </table>

                            </td>
                            <td style="width:33%" valign="top">
                                <welcome @openuserChat="openuserChat($event)"></welcome>
                            </td>
                            <td style="width:33%" valign="top">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                            role="tab" aria-controls="home" aria-selected="true">Voice Msg</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                            role="tab" aria-controls="profile" aria-selected="false">Assign</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">

                                        </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <assignuser :data="{{ $users }}"></assignuser>
                                        </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/app.js"></script>
@endsection
