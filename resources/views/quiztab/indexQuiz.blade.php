@extends('layouts.app', [
'namePage' => 'Add New Questions',
'class' => 'login-page sidebar-mini ',
'activePage' => 'quiz',
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
                             {!! Form::open(['action' => 'QuizController@store','method' => 'POST',]) !!}
                             <div class="form-group">
                                <!-- {!! Form::label('text', 'Quiz Name', ['class' => 'form-control'])!!} -->
                                {!! Form::label('text', 'Question:', ['class' => 'col-lg-8 control-label'])!!}
                                <div class="col-lg-12">
                                     {!! Form::textarea('question', '', ['class' => 'col-lg-2 control-label summernote','placeholder' => 'Description'])!!}
                                  
                                </div>
                            </div>
                             <div class="form-group">
                              {!! Form::label('text', 'Question By:', ['class' => 'col-lg-8 control-label'])!!}
                              <div class="col-lg-12">
                            <select placeholder="Filter" class="form-control" name="question_type" style="height:40px">
                              <option>Vision </option>
                             <option>Dr.Amol Sir</option>
                               <option>Dr.Suraj Sir</option>
                                 <option>Dr.GauriShankar Sir </option>
                            </select>
                              </div>
                            </div>
                            <div class="form-group">
                               {!! Form::label('category', 'Subjects', ['class' => 'col-lg-8 control-label'])!!}
                                <div class="col-lg-12">
                                  <select name="category" id="category" class="form-control">
                                     @foreach($category as $id => $cat)
                                         <option value="{{ $id }}">
                                             {{ $cat }}
                                         </option>
                                     @endforeach
                                 </select>
                                  @if($errors->has('test_header_1_id'))
                                  <span class="help-block text-danger">{{$errors->first('test_header_1_id')}}</span>
                                  @endif
                                </div>
                            </div>

                            <div class="form-group">
                               <!-- {!! Form::label('text', 'Quiz Name', ['class' => 'form-control'])!!} -->
                               {!! Form::label('text', 'Description:', ['class' => 'col-lg-8 control-label'])!!}
                               <div class="col-lg-12">
                                     {!! Form::textarea('description', '', ['class' => 'col-lg-2 control-label summernote','placeholder' => 'Description'])!!}
                               </div>
                           </div>
                            <div class="form-group">
                              <div class="col-md-12">
                                <h6 class="quiztitle">Option 1)</h6><input type="radio" id="administrator" name="radio" value="1">Select Correct Answer
                                <textarea  name="option_1" class='form-control' ></textarea>
                              </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                            <h6 class="quiztitle">Option 2)</h6><input type="radio" id="administrator" name="radio" value="2">Select Correct Answer
                            <textarea  name="option_2" class='form-control'></textarea>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                            <h6 class="quiztitle">Option 3)</h6><input type="radio" id="administrator" name="radio" value="3">Select Correct Answer

                            <textarea  name="option_3" class='form-control'></textarea>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                            <h6 class="quiztitle">Option 4)</h6><input type="radio" id="administrator" name="radio" value="4">Select Correct Answer

                            <textarea  name="option_4" class='form-control'></textarea>
                        </div>
                        </div>

                        <div class="form-group">
                              <div class="col-lg-12">
                                  {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info'] ) !!}
                              </div>
                          </div>
                           {!!Form::close()!!}
                    </div>
                         </div>
                     </div>
                </div>
             </div>
         </div>
     </div>
</div>

@endsection
