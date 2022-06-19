@extends('layouts.app', [
'namePage' => 'Add New Motivational Quotes',
'class' => 'login-page sidebar-mini ',
'activePage' => 'motivationQuotes',
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
                      {{csrf_field()}}
                        <div class="row">
                          {!! Form::open(['action' => 'MotivationalQuotesController@store','method' => 'POST','enctype' => 'multipart/form-data','files' => true]) !!}
                        <div class="form-group">
                           {!! Form::label('text', 'SpecialDay:', ['class' => 'col-lg-12 control-label'])!!}
                           <div class="col-lg-12">
                               {!! Form::text('specialDay', '', ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                           </div>
                       </div>
                      <div class="form-row">
                          <div class="col-12">
                               {!! Form::label('text', 'SpecialDay Image:', ['class' => 'col-lg-12 control-label'])!!}
                         <div class="col-xs-3 col-lg-12">
                          <input type="file" name="thumbimage" class="form-control">
                           {!! $errors->first('thumbimage', '<p class="alert alert-danger">:message</p>') !!}
                         </div>
                           </div>
                     </div>
                       <div class="form-group">
                          {!! Form::label('Special Date', '', ['class' => 'col-lg-12 control-label'])!!}
                           <div class="col-lg-12">
                              <input type="datetime-local" id="birthdaytime" name="startdate" class= "form-control">
                          </div>
                       </div>
                       <div class="form-group">
                          {!! Form::label('text', 'Motivation Quotes:', ['class' => 'col-lg-12 control-label'])!!}
                          <div class="col-lg-12">
                              {!! Form::text('motivation', '', ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                          </div>
                      </div>
                      <div class="form-row">
                          <div class="col-12">
                               {!! Form::label('text', 'Motivation Image:', ['class' => 'col-lg-12 control-label'])!!}
                         <div class="col-xs-3 col-lg-12">
                          <input type="file" name="thumbimageM" class="form-control">
                           {!! $errors->first('thumbimageM', '<p class="alert alert-danger">:message</p>') !!}
                         </div>
                           </div>
                     </div>
                       <div class="form-group">
                             <div class="col-lg-8">
                                 {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
                             </div>
                         </div>
                         {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @yield('scripts')
</div>
@endsection
