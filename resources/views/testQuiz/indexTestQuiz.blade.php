@extends('layouts.app', [
'namePage' => 'Create Questions Set',
'class' => 'login-page sidebar-mini ',
'activePage' => 'testQuiz',
'backgroundImage' => asset('now')."/img/bg14.jpg",
])
@section('content')

<div class="panel-header">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</div>
<div class="content">

    <div class="row" style="margin-top:20px;">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="container border">
                    <div class="places-buttons">

                      <div style="margin-top:20px;">
         <div class="mx-auto pull-right">
             <div class="">
                 <form action="{{ route('testQuiz.index') }}" method="GET" role="search">
                   <div class="input-group-append">

                      <input type="text" class="form-control mr-2" name="term" placeholder="Search question" id="term">
                      <span class="input-group-btn mr-5 mt-1">
                              <button class="btn btn-info" type="submit" title="Search projects">
                                  <span class="fas fa-search"></span>
                              </button>
                          </span>
                      <a href="{{ route('testQuiz.index') }}" class=" mt-1">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>
                                </button>
                            </span>
                        </a>
                    </div>
                 </form>
             </div>
         </div>
     </div>

                       {{csrf_field()}}
                       @if(count($posts) > 0)
                          <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ url('myproductsDeleteAll') }}">Delete All Selected</button>
                           <table class="table table-striped">
                                  <thead>
                                  <tr>
                                     <th>#</th>
                                     <th width="50px"><input type="checkbox" id="master"></th>
                                     <th>Questions</th>
                                     <th>Question From</th>
                                     <th>Action</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                     @foreach($posts as $post)
                                      {{csrf_field()}}
                                     <tr>
                                       <td><input type="checkbox" class="sub_chk" data-id="{{$post->question_id}}"></td>
                                       <td>{{$post->question_id}}</td>
                                       <td>{{$post->question}}</td>
                                       <td>
                                         {{$post->question_type}}
                                      </td>
                                       <td>
                                         <div class="d-flex">
                                           <a class="btn btn-info  btn-sm" href="{{ url('/testQues'.$post->question_id) }}" data-hover="tooltip" data-placement="top"
                                               data-target="#addnewgift{{$post->question_id}}" data-toggle="modal" id="modal-edit" title="Edit"><i
                                                   class="fa fa-fw fa-edit"></i></a>
                                                   {!!Form::open(['action' => ['TestQuestionController@destroy', $post->question_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                    {!!Form::hidden('_method', 'DELETE')!!}
                                                   {!! Form::button('DEL', array('class' => 'btn btn-block btn-sm', 'type' => 'DELETE')) !!}
                                                   {!!Form::close()!!}

                                          @csrf
                                        </form>
                                       </div>
                                     </td>
                                     </tr>
                                     <div class="modal fade" id="addnewgift{{$post->question_id}}">
                                         <div class="modal-dialog modal-col-md-6">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title">Assign Question To Test</h5>
                                                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                 </div>
                                                 <div class="modal-body">
                                                       {!! Form::open(['action' => ['TestQuestionController@update', $post->question_id], 'method' => 'POST']) !!}
                                                         <div class="card-body">
                                                             {{ csrf_field() }}
                                                         <div class="form-group">
                                                             {!! Form::label('text', 'Select Test:', ['class' => 'col-lg-12 control-label'])!!}
                                                             <div class="col-lg-12">
                                                               <select placeholder="Filter" class="form-control" id="test_type" name="test_type">
                                                                 @foreach($items as $id => $country)
                                                                     <option value="{{ $id }}">
                                                                         {{ $country }}
                                                                     </option>
                                                                 @endforeach
                                                               </select>
                                                                @if($errors->has('test_id'))
                                                                <span class="help-block text-danger">{{$errors->first('test_id')}}</span>
                                                                @endif
                                                             </div>
                                                          </div>
                                                        </div>
                                                        <div class="form-group">
                                                           <div class="col-lg-8">
                                                             {!!Form::hidden('_method','PUT')!!}
                                                             {!!Form::submit('Assign', ['class'=>'btn btn-primary'])!!}
                                                             @csrf
                                                         </div>
                                                         </div>
                                                      </div>
                                                 </div>
                                                 </form>
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
      </div>
  </div>
</div>



@endsection
