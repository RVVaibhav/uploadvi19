@extends('layouts.app', [
'namePage' => 'About Us',
'class' => 'login-page sidebar-mini ',
'activePage' => 'aboutus',
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
                          {!! Form::open(['action' => 'AboutUsController@store','method' => 'POST','enctype' => 'multipart/form-data','files' => true]) !!}
                        <div class="form-group">
                           {!! Form::label('text', 'Name:', ['class' => 'col-lg-12 control-label'])!!}
                           <div class="col-lg-12">
                               {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                           </div>
                       </div>
                       <div class="form-group">
                          {!! Form::label('text', 'Education:', ['class' => 'col-lg-12 control-label'])!!}
                          <div class="col-lg-12">
                              {!! Form::text('education', '', ['class' => 'form-control', 'placeholder' => 'Education']) !!}
                          </div>
                      </div>
                      <div class="form-group">
                         <!-- {!! Form::label('text', 'Quiz Name', ['class' => 'form-control'])!!} -->
                         {!! Form::label('text', 'About You:', ['class' => 'col-lg-8 control-label'])!!}
                         <div class="col-lg-12">
                              {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
                         </div>
                     </div>
                       <div class="form-row">
                           <div class="col-12">
                                {!! Form::label('text', 'Profile Photo:', ['class' => 'col-lg-12 control-label'])!!}
                          <div class="col-xs-3 col-lg-12">
                           <input type="file" name="image" class="form-control">
                            {!! $errors->first('image', '<p class="alert alert-danger">:message</p>') !!}
                          </div>
                            </div>
                    </div>

                    <div class="form-group">
                          <div class="col-lg-6">
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
