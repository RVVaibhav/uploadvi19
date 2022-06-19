@extends('layouts.app', [
'namePage' => 'Add New Test',
'class' => 'login-page sidebar-mini ',
'activePage' => 'test',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])
@section('content')
<div class="panel-header">
</div>
<div class="content">
    <div class="row">
       {{csrf_field()}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="places-buttons">
                        <div class="row">
                          {!! Form::open(['action' => 'TestController@store','method' => 'POST',]) !!}
                        <div class="form-group">
                           <!-- {!! Form::label('text', 'Quiz Name', ['class' => 'form-control'])!!} -->
                           {!! Form::label('text', 'Test Name:', ['class' => 'col-lg-8 control-label'])!!}
                           <div class="col-lg-12">
                               {!! Form::text('testname', '', ['class' => 'form-control', 'placeholder' => 'Quiz Name']) !!}
                           </div>
                       </div>
                       <div class="form-group">
                           {!! Form::label('description', 'Description:', ['class' => 'col-lg-8 control-label'])!!}
                           <div class="col-lg-12">
                            {!! Form::textarea('description', '', ['class' => 'col-lg-2 control-label summernote','placeholder' => 'Description'])!!}
                           </div>
                       </div>
                       <div class="form-group">
                          {!! Form::label('startdate', 'Start Date (Quiz can be attempted after this date. YYYY-MM-DD HH:ll:SS):', ['class' => 'col-lg-8 control-label'])!!}
                           <div class="col-lg-12">
                             <input type="enddate" id="birthdaytime" name="startdate" class= "form-control" value="{{date('Y-m-d H:i:s', time())}}">
                           </div>
                       </div>
                       <div class="form-group">
                          {!! Form::label('enddate', 'End Date (Quiz can be attempted after this date. YYYY-MM-DD HH:ll:SS):', ['class' => 'col-lg-8 control-label'])!!}
                           <div class="col-lg-12">
                            <input type="enddate" id="birthdaytime" name="enddate" class= "form-control" value="{{date('Y-m-d H:i:s', time())}}">
                           </div>
                       </div>
                       <div class="form-group">
                          {!! Form::label('duration', 'Duration (in min.):', ['class' => 'col-lg-8 control-label'])!!}
                           <div class="col-lg-12">
                           <input type="number" id="birthdaytime" name="duration" class= "form-control" value="120">
                           </div>
                       </div>
                       <div class="form-group">
                          {!! Form::label('allow_max_attept', 'Allow Maximum Attempt:', ['class' => 'col-lg-8 control-label'])!!}
                           <div class="col-lg-12">
                             {!! Form::text('allow_max','1', ['class' => 'form-control', 'placeholder' => 'Allow Maximum Attempt']) !!}
                           </div>
                       </div>
                       <div class="form-group">
                          {!! Form::label('minpercentage', 'Minimum Percentage Required to Pass:', ['class' => 'col-lg-8 control-label'])!!}
                           <div class="col-lg-12">
                             {!! Form::text('min_percent', '50', ['class' => 'form-control', 'placeholder' => 'Minimum Percentage Required to Pass']) !!}
                           </div>
                       </div>
                       <div class="form-group">
                          {!! Form::label('correctscore', 'Correct Score:', ['class' => 'col-lg-8 control-label'])!!}
                           <div class="col-lg-12">
                             {!! Form::text('correctScore', '4', ['class' => 'form-control', 'placeholder' => 'Correct Score']) !!}
                           </div>
                       </div>
                       <div class="form-group">
                          {!! Form::label('incorrectscore', 'Incorrect Score:', ['class' => 'col-lg-8 control-label'])!!}
                           <div class="col-lg-12">
                             {!! Form::text('incorrect','1', ['class' => 'form-control', 'placeholder' => 'Incorrect Score']) !!}
                           </div>
                       </div>
                       <div class="form-group">
                            {!! Form::label('radios', 'Allow to View Correct answer after Submitting Test:', ['class' => 'col-lg-8 control-label']) !!}
                            <div class="col-lg-12">
                                <div class="radio-inline">
                                <input type="radio" id="administrator" name="radio" value="YES" checked> YES
                                 <input type="radio" id="moderator" name="radio" value="NO"> NO
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                             {!! Form::label('radios', 'Batches', ['class' => 'col-lg-8 control-label']) !!}
                             <div class="col-lg-12">
                                  <div class="radio-inline">
                                   @foreach($testgroup  as $id => $name)
                                     <label> {!! Form::checkbox("testgroup[]", $name) !!} {{$name}} </label>
                                   @endforeach
                              </div>
                             </div>
                         </div>
                         <div class="form-group">
                            {!! Form::label('category', 'Tests', ['class' => 'col-lg-8 control-label'])!!}
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
                          {!! Form::label('headers', 'Headers One:', ['class' => 'col-lg-8 control-label'])!!}
                           <div class="col-lg-12">
                             <select name="country_id" id="country" class="form-control">
                                @foreach($items as $id => $country)
                                    <option value="{{ $id }}">
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                             @if($errors->has('test_header_1_id'))
                             <span class="help-block text-danger">{{$errors->first('test_header_1_id')}}</span>
                             @endif
                           </div>
                       </div>

                       <div class="form-group">
                          {!! Form::label('headers', 'Headers Two:', ['class' => 'col-lg-8 control-label'])!!}
                           <div class="col-lg-12">
                             <select name="city" id="country" class="form-control">
                            </select>
                             @if($errors->has('test_header_2_id'))
                             <span class="help-block text-danger">{{$errors->first('test_header_1_id')}}</span>
                             @endif
                           </div>
                       </div>
                       <div class="form-group">
                          {!! Form::label('headers', 'Headers Three:', ['class' => 'col-lg-8 control-label'])!!}
                           <div class="col-lg-12">
                             <select name="setting" id="country" class="form-control">
                            </select>
                             @if($errors->has('test_header_3_id'))
                             <span class="help-block text-danger">{{$errors->first('test_header_3_id')}}</span>
                             @endif
                           </div>
                       </div>
                       <div class="form-group">
                          {!! Form::label('headers', 'Headers Four:', ['class' => 'col-lg-8 control-label'])!!}
                           <div class="col-lg-12">
                             <select name="four" id="four" class="form-control">
                            </select>
                             @if($errors->has('test_header_3_id'))
                             <span class="help-block text-danger">{{$errors->first('test_header_3_id')}}</span>
                             @endif
                           </div>
                       </div>
                       <div class="form-group">
                             <div class="col-lg-4">
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
