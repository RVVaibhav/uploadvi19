@extends('layouts.app', [
'namePage' => 'Add New Headers',
'class' => 'login-page sidebar-mini ',
'activePage' => 'headers',
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
                          {!! Form::open(['action' => 'HeadersController@store','method' => 'POST']) !!}
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
                             <select name="three" id="three" class="form-control">
                            </select>
                             @if($errors->has('test_header_2_id'))
                             <span class="help-block text-danger">{{$errors->first('test_header_1_id')}}</span>
                             @endif
                           </div>
                       </div>

                       <div class="form-group">
                          <!-- {!! Form::label('text', 'Quiz Name', ['class' => 'form-control'])!!} -->
                          {!! Form::label('text', 'Headers three:', ['class' => 'col-lg-8 control-label'])!!}
                          <div class="col-lg-12">
                              {!!Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])!!}
                          </div>
                      </div>


                       <div class="form-group">
                             <div class="col-lg-10">
                                 {!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
                             </div>
                         </div>
                          {!!Form::close()!!}
                    </div>
                    @if(count($posts) > 0)
                    <table class="table table-striped">
                           <thead>
                           <tr>
                              <th>SrNo</th>
                              <th>Header 1</th>
                              <th>Header 2</th>
                              <th>Header 3</th>
                              <th>Header 4</th>
                              <th>Action</th>
                           </tr>
                           </thead>
                           <tbody>
                              @foreach($posts as $post)
                              <tr>
                                <td>{{$post->test_header_3_id}}</td>
                                <td>{{$post->headerOne->header_1}}</td>
                                <td>{{$post->headerTwo->test_header_2}}</td>
                                <td>{{$post->headerThree->test_header_3}}</td>
                                <td>{{$post->test_header_4}}</td>
                                <td>
                                    <div class="col-auto"><a class="btn btn-info" href="{{ url('/headers'.$post->test_header_4_id) }}" data-hover="tooltip" data-placement="top"
                                          data-target="#addnewgift{{$post->test_header_4_id}}" data-toggle="modal" id="modal-edit" title="Edit"><i
                                              class="fa fa-fw fa-edit"></i></a>
                                              {!!Form::open(['action' => ['HeadersController@destroy', $post->test_header_3_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                               {!!Form::hidden('_method', 'DELETE')!!}
                                              {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                                              {!!Form::close()!!}

                                     @csrf
                                  </div>
                                </td>
                              </tr>
                              <div class="modal fade" id="addnewgift{{$post->test_header_4_id}}" tabindex="-1" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Edit Headers</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <!-- add here -->

                                      <div class="row">
                                          <div class="col-md-6">
                                            <div class="container mt-2">
                                              <div class="row">
                                                {!! Form::open(['action' => ['HeadersController@update', $post->test_header_4_id], 'method' => 'POST']) !!}
                                                  <div class="col">
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
                                              </div>
                                          </div>
                                          <div class="container mt-2">
                                              <div class="row">
                                                  <div class="col">
                                                    {!! Form::label('headers', 'Headers Two:', ['class' => 'col-lg-8 control-label'])!!}
                                                     <div class="col-lg-12">
                                                       <select name="city" id="country" class="form-control">
                                                      </select>
                                                       @if($errors->has('test_header_2_id'))
                                                       <span class="help-block text-danger">{{$errors->first('test_header_3_id')}}</span>
                                                       @endif
                                                     </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="container mt-2">
                                              <div class="row">
                                                  <div class="col">
                                                    {!! Form::label('headers', 'Headers Three:', ['class' => 'col-lg-8 control-label'])!!}
                                                     <div class="col-lg-12">
                                                       <select name="three" id="three" class="form-control">
                                                      </select>
                                                       @if($errors->has('test_header_3_id'))
                                                       <span class="help-block text-danger">{{$errors->first('test_header_3_id')}}</span>
                                                       @endif
                                                     </div>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="container mt-2">
                                              <div class="row">
                                                <div class="col">
                                                  {!! Form::label('headers', 'Headers Four:', ['class' => 'col-lg-8 control-label'])!!}
                                                  <div class="col-lg-12">
                                                    {!!Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])!!}
                                                  </div>
                                              </div>
                                              </div>
                                          </div>

                                        </div>
                                          <div class="col-md-6">
                                              <fieldset disabled>
                                              <div class="container mt-2">
                                              <div class="row" style="margin-top:32px;">
                                                  <div class="col">
                                                      <input type="text" name="" value="{{$post->headerOne->header_1}}" placeholder="Header1" disabled>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="container mt-2">
                                              <div class="row" style="margin-top:32px;">
                                                  <div class="col">
                                                       <input type="text" name="" value="{{$post->headerTwo->test_header_2}}" placeholder="Header2" disabled>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="container mt-2">
                                              <div class="row" style="margin-top:32px;">
                                                  <div class="col">
                                                       <input type="text" name="" value="{{$post->headerThree->test_header_3}}" placeholder="Header2" disabled>
                                                  </div>
                                              </div>
                                          </div>

                                      </div>
                                        </fieldset>

                                      </div>
                                      <!-- End Herre -->
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      {!!Form::hidden('_method','PUT')!!}
                                     {!!Form::submit('Edit', ['class'=>'btn btn-primary'])!!}
                                      @csrf
                                    </div>
                                    {!! Form::close() !!}
                                  </div>
                                </div>
                              </div>
                              @endforeach
                              {{$posts->links()}}
                              @else
                                  <p>No posts found</p>
                              @endif
                           </tbody>

                        </table>



            </div>

            </div>
        </div>
    </div>
    @yield('scripts')
</div>
@endsection
