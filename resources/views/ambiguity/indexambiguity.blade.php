@extends('layouts.app', [
'namePage' => 'Ambiguity',
'class' => 'login-page sidebar-mini ',
'activePage' => 'ambiguity',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="places-buttons">
                      {{csrf_field()}}
                        <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="{{ url('myamDeleteAll') }}">Delete All Selected</button>
                      <table class="table table-striped table-hover table-reflow">

             <thead>
           <tr>
              <th width="50px"><input type="checkbox" id="master"></th>
               <th scope="col">ID</th>
               <th scope="col">S-name</th>
               <th scope="col">Test</th>
               <th scope="col">CreatedBy</th>
               <th scope="col">Question</th>
              <th scope="col">Reference</th>
              <th scope="col">Question Comment</th>
                <th scope="col">Action</th>
           </tr>
       </thead>
       <tbody>

             @foreach ($items as $user)
             <tr>
                <td><input type="checkbox" class="sub_chk" data-id="{{$user->report_id}}"></td>
                  <th scope="row">{{ $user->report_id}}</th>


                    <td>{{ $user->username}}</td>
                    <td>{{ $user->test}}</td>
                    <td>{{ $user->createdBy}}</td>
                    <td>{{$user->question}}</td>
                    <td>{{ $user->reference}}</td>
                   <td>{{ $user->question_Comment}}</td>
                    <td>
                         <div class="d-flex">
                      <a class="btn btn-info  btn-sm" href="#" data-hover="tooltip" data-placement="top"
                          data-target="#editCallRate{{$user->report_id}}" data-toggle="modal" id="modal-edit" title="Edit"><i
                              class="fa fa-fw fa-edit"></i></a>
                      <a href = 'destroy/{{ $user->report_id}}'>Delete</a>
                    </div>
                    </td>
                </tr>
                <div class="modal fade" id="editCallRate{{$user->report_id}}">
                    <div class="modal-dialog modal-col-md-4">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Solution</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('/ambiguity/addAnswer/'.$user->report_id) }}" enctype="multipart/form-data">
                                    <div class="card-body">
                                        {{ csrf_field() }}
                                        <div class="form-row">
                                          <div class="col-12">
                                              <div class="form-group">
                                             <select placeholder="Filter" class="form-control" name="names" style="height:40px">
                                                 <option>Vision </option>
                                                <option>Dr.Amol Sir</option>
                                                  <option>Dr.Suraj Sir</option>
                                                    <option>Dr.GauriShankar Sir </option>

                                            </select>
                                         </div>
                                        </div>
                                          </div>

                                        <div class="form-row">
                                            <div class="col-12">
                                              <div class="form-group">
                                                   {!! Form::text('reference', '', ['class' => 'form-control', 'placeholder' => 'Reference']) !!}
                                             </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                          <div class="col-12">
                                            <div class="form-group">
                                                {{Form::textarea('solution', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Solution'])}}
                                           </div>

                                          </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Save">
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
             @endforeach
           </tbody>
          </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
    @yield('scripts')
</div>
@endsection
