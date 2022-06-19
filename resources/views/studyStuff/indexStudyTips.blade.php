@extends('layouts.app', [
'namePage' => 'Study Tips',
'class' => 'login-page sidebar-mini ',
'activePage' => 'study',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])
@section('content')
<div class="panel-header">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="margin-bottom:20px;">
                  <div class="container border">
                         <div class="row" style="margin-top:20px;">
                           <div class="col-md-12">
                                 <ul class="nav nav-tabs" id="myTab" role="tablist">
                                   <li class="nav-item">
                                     <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Text</a>
                                   </li>
                                   <li class="nav-item">
                                     <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Images</a>
                                   </li>
                                   <li class="nav-item">
                                     <a class="nav-link" id="profile-tab" data-toggle="tab" href="#video" role="tab" aria-controls="profile" aria-selected="false">Video</a>
                                   </li>
                                 </ul>
                                 <div class="tab-content" id="myTabContent">
                                   <div class="tab-pane fade show active my-4" id="home" role="tabpanel" aria-labelledby="home-tab">
                                     {{csrf_field()}}
                                     {!! Form::open(['action' => 'StudyTipsController@store','method' => 'POST','enctype' => 'multipart/form-data','files' => true]) !!}
                                             <div class="form-group">
                                          {!! Form::label('text', 'Title:', ['class' => 'col-lg-12 control-label'])!!}
                                          <div class="col-lg-12">
                                              {!! Form::text('_title', '', ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                                          </div>
                                      </div>
                                      <div class="form-group">
                                         <!-- {!! Form::label('text', 'Quiz Name', ['class' => 'form-control'])!!} -->
                                         {!! Form::label('text', 'Description:', ['class' => 'col-lg-8 control-label'])!!}
                                         <div class="col-lg-12">
                                              {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
                                         </div>
                                     </div>
                                     <div class="form-group">
                                        <div class="col-lg-12">
                                     <select placeholder="Filter" class="form-control" name="question_type" style="height:40px">
                                       <option>Vision </option>
                                      <option>Dr.Amol Sir</option>
                                        <option>Dr.Suraj Sir</option>
                                          <option>Dr.GauriShankar Sir </option>
                                    </select>
                                      </div>
                                    </div>
                                      <input name="id" value="1" type="hidden">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-left'] ) !!}
                                    {!!Form::close()!!}
                                   </div>
                                   <div class="tab-pane fade my-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                     {!! Form::open(['action' => 'StudyTipsController@store','method' => 'POST','enctype' => 'multipart/form-data','files' => true]) !!}

                                     {{csrf_field()}}
                                       <div class="form-group">
                                          {!! Form::label('text', 'Title:', ['class' => 'col-lg-12 control-label'])!!}
                                          <div class="col-lg-12">
                                              {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                                          </div>
                                      </div>
                                      <div class="form-group">
                                         <!-- {!! Form::label('text', 'Quiz Name', ['class' => 'form-control'])!!} -->
                                         {!! Form::label('text', 'Description:', ['class' => 'col-lg-8 control-label'])!!}
                                         <div class="col-lg-12">
                                                {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
                                         </div>
                                     </div>
                                     <div class="form-group">
                                        <div class="col-lg-12">
                                     <select placeholder="Filter" class="form-control" name="question_type" style="height:40px">
                                       <option>Vision </option>
                                      <option>Dr.Amol Sir</option>
                                        <option>Dr.Suraj Sir</option>
                                          <option>Dr.GauriShankar Sir </option>
                                     </select>
                                      </div>
                                    </div>
                                       {!! Form::label('sample_file','Select File to Import:',['class'=>'col-md-3']) !!}
                                       <input name="id" value="2" type="hidden">
                                       <div class="col-xs-3 col-lg-12">
                                         <input type="file" name="gift_img" class="form-control"
                                             id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                         <!-- <label class="custom-file-label" for="inputGroupFile01">Choose file</label> -->
                                         @if ($errors->has('gift_img'))
                                         <span class="help-block text-danger">
                                             <strong class="text-danger">{{ $errors->first('gift_img') }}</strong>
                                         </span>
                                         @endif
                                       </div>
                                      {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-left'] ) !!}
                                      {!!Form::close()!!}
                                   </div>
                                   <div class="tab-pane fade my-4" id="video" role="tabpanel" aria-labelledby="profile-tab">
                                     {!! Form::open(['action' => 'StudyTipsController@store','method' => 'POST','enctype' => 'multipart/form-data','files' => true]) !!}

                                     {{csrf_field()}}
                                       <div class="form-group">
                                          {!! Form::label('text', 'Title:', ['class' => 'col-lg-12 control-label'])!!}
                                          <div class="col-lg-12">
                                              {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                                          </div>
                                      </div>
                                      <div class="form-group">
                                         <!-- {!! Form::label('text', 'Quiz Name', ['class' => 'form-control'])!!} -->
                                         {!! Form::label('text', 'Description:', ['class' => 'col-lg-8 control-label'])!!}
                                         <div class="col-lg-12">
                                              {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
                                         </div>
                                     </div>
                                     <div class="form-group">
                                        <div class="col-lg-12">
                                     <select placeholder="Filter" class="form-control" name="question_type" style="height:40px">
                                       <option>Vision </option>
                                      <option>Dr.Amol Sir</option>
                                        <option>Dr.Suraj Sir</option>
                                          <option>Dr.GauriShankar Sir </option>
                                     </select>
                                      </div>
                                    </div>
                                       {!! Form::label('sample_file','Select File to Import:',['class'=>'col-md-3']) !!}
                                       <input name="id" value="3" type="hidden">
                                       <div class="col-xs-3 col-lg-12">
                                        <input type="file" name="sample_file" class="form-control">
                                         {!! $errors->first('sample_file', '<p class="alert alert-danger">:message</p>') !!}
                                      </div>
                                      {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-left'] ) !!}
                                      {!!Form::close()!!}
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
    <!-- role model -->


</div>
@endsection
