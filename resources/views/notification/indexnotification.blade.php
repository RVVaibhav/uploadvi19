@extends('layouts.app', [
'namePage' => 'Notification',
'class' => 'login-page sidebar-mini ',
'activePage' => 'notification',
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
                                 </ul>
                                 <div class="tab-content" id="myTabContent">
                                   <div class="tab-pane fade show active my-4" id="home" role="tabpanel" aria-labelledby="home-tab">
                                     {{csrf_field()}}
                                     {!! Form::open(['action' => 'MkclController@store','method' => 'POST','enctype' => 'multipart/form-data','files' => true]) !!}
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
                                        <option>Amol Sir</option>
                                          <option> Suraj Sir</option>
                                            <option> GauriShankar Sir </option>
                                    </select>
                                      </div>
                                    </div>
                                      <input name="id" value="1" type="hidden">
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
