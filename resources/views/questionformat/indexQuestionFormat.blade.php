@extends('layouts.app', [
'namePage' => 'Add New Question Format',
'class' => 'login-page sidebar-mini ',
'activePage' => 'questionformat',
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
                          {!! Form::open(['action' => 'QuestionFormatController@store','method' => 'POST','enctype' => 'multipart/form-data','files' => true]) !!}
                        <div class="form-group">
                           {!! Form::label('text', 'Title:', ['class' => 'col-lg-12 control-label'])!!}
                           <div class="col-lg-12">
                               {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                           </div>
                       </div>
                      <div class="form-group">
                         {!! Form::label('category', 'Question Format Category', ['class' => 'col-lg-8 control-label'])!!}
                          <div class="col-lg-12">
                            <select name="category" id="category" class="form-control">
                               @foreach($category as $question_format_cat => $cat)
                                   <option value="{{ $cat }}">
                                       {{ $cat }}
                                   </option>
                               @endforeach
                           </select>
                            @if($errors->has('id'))
                            <span class="help-block text-danger">{{$errors->first('id')}}</span>
                            @endif
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
                             <div class="col-lg-6">
                                 {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
                             </div>
                         </div>
                         {!!Form::close()!!}
                    </div>
                </div>



        </div>
    </div>
    @yield('scripts')
</div>
@endsection
