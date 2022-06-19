@extends('layouts.app', [
'namePage' => 'Users',
'class' => 'login-page sidebar-mini ',
'activePage' => 'users',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])

@section('content')
<div class="panel-header">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <form method="POST" action="{{ route('stores') }}" enctype="multipart/form-data">
                <div class="card-header">
                    <h4>Create User</h4>
                </div>
                <div class="card-body">
                        <div class="row">
                            {{ csrf_field() }}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>First Name <span style="color: red">*</span></label>
                                    <input type="text" name="fname" value=""
                                        class="form-control" required
                                        placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Mobile <span style="color: red">*</span></label>
                                    <input type="text" name="mobile" value=""
                                        class="form-control" required
                                        placeholder="">

                                </div>
                                <div class="form-group">
                                    <label>Email <span style="color: red">*</span></label>
                                    <input type="text" name="email" value=""
                                        class="form-control" required
                                        placeholder="">
                                </div>

                                <div class="form-group">
                                    <label>State  of UG<span style="color: red">*</span></label>
                                    <select placeholder="Filter" class="form-control" id="state_type" name="state_type">
                                      @foreach($state as $id => $country)
                                          <option value="{{ $id }}">
                                              {{ $country }}
                                          </option>
                                      @endforeach
                                    </select>
                                     @if($errors->has('id'))
                                     <span class="help-block text-danger">{{$errors->first('id')}}</span>
                                     @endif
                                </div>


                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                  <label>Last Name <span style="color: red">*</span></label>
                                  <input type="text" name="lname" value=""
                                      class="form-control" required
                                      placeholder="">
                              </div>
                              <div class="form-group">
                                  <label>UG College<span style="color: red">*</span></label>
                                  <input type="text" name="ugcollage" value=""
                                      class="form-control" required
                                      placeholder="">
                              </div>
                              <div class="form-group">
                                  <label>Password <span style="color: red">*</span></label>
                                  <input type="text" name="password" value=""
                                      class="form-control" required
                                      placeholder="">
                              </div>

                                    <div class="form-group">
                                        <label>City  of UG<span style="color: red">*</span></label>
                                        <select name="city" id="city" class="form-control">
                                       </select>
                                        @if($errors->has('id'))
                                        <span class="help-block text-danger">{{$errors->first('id')}}</span>
                                        @endif
                                    </div>

                        </div>
                </div>
                <div class="card-footer pull-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-dot-circle-o"></i> Create Now
                    </button>
                </div>
              </form>
              @if(count($users) > 0)
              <table class="table table-striped">
                     <thead>
                       <tr>
                          <th>Sr No</th>
                          <th>Student Name</th>
                          <th>Student Email</th>
                          <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                        @foreach($users as $post)
                        <tr>
                          <td>{{$post->user_id}}</td>
                          <td>{{$post->user_name}}</td>
                          <td>{{$post->user_email}}</td>
                          <td>
                              <div class="col-auto"><a class="btn btn-info" data-hover="tooltip" data-placement="top"
                                    data-target="#addnewgift{{$post->user_id}}" data-toggle="modal" id="modal-edit" title="Edit"><i
                                        class="fa fa-fw fa-edit"></i></a>
                                        {!!Form::open(['action' => ['UserController@destroy', $post->user_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                         {!!Form::hidden('_method', 'DELETE')!!}
                                        {!!Form::submit('Delete', ['class' => 'btn btn-danger'])!!}
                                        {!!Form::close()!!}
                               @csrf
                            </div>
                          </td>
                        </tr>
                        <div class="modal fade" id="addnewgift{{$post->user_id}}" tabindex="-1" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Student</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <!-- add here -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row">
                                          <form method="POST" action="{{ url('/edit/'.$post->user_id) }}" enctype="multipart/form-data">
                                        </div>
                                        <div class="row">
                                            {{ csrf_field() }}
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Name <span style="color: red">*</span></label>
                                                    <input type="text" name="name" value="{{$post->user_name}}"
                                                        class="form-control" required
                                                        placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Mobile <span style="color: red">*</span></label>
                                                    <input type="text" name="mobile" value="{{$post->user_mobile}}"
                                                        class="form-control" required
                                                        placeholder="">

                                                </div>
                                                <div class="form-group">
                                                    <label>Email <span style="color: red">*</span></label>
                                                    <input type="text" name="email" value="{{$post->user_email}}"
                                                        class="form-control" required
                                                        placeholder="">

                                                </div>
                                                <div class="form-group">
                                                    <label>Password <span style="color: red">*</span></label>
                                                    <input type="text" name="password" value="{{$post->user_password}}"
                                                        class="form-control" required
                                                        placeholder="">

                                                </div>
                                                <div class="form-group">
                                                    <label>UG Collage<span style="color: red">*</span></label>
                                                    <input type="text" name="ugcollage" value="{{$post->ug_college}}"
                                                        class="form-control" required
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>State  of UG</label>
                                                    <select placeholder="Filter" class="form-control" id="state_type" name="state_type">
                                                      @foreach($state as $id => $country)
                                                          <option value="{{ $id }}">
                                                              {{ $country }}
                                                          </option>
                                                      @endforeach
                                                    </select>
                                                     @if($errors->has('id'))
                                                     <span class="help-block text-danger">{{$errors->first('id')}}</span>
                                                     @endif
                                                </div>
                                                    <div class="form-group">
                                                        <label>City of UG</label>
                                                        <select name="city" id="city" class="form-control">
                                                       </select>
                                                        @if($errors->has('id'))
                                                        <span class="help-block text-danger">{{$errors->first('id')}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                         {!! Form::label('radios', 'Subscription', ['class' => 'col-lg-8 control-label']) !!}
                                                         <div class="col-lg-12">
                                                             <div class="radio-inline">
                                                             <input type="radio" id="administrator" name="radio" value="Paid" checked> YES
                                                              <input type="radio" id="moderator" name="radio" value="NO"> NO
                                                             </div>
                                                         </div>
                                                     </div>
                                        </div>
                                    </div>
                                  </div>



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
                        {{$users->links()}}
                        @else
                            <p>No posts found</p>
                        @endif
                     </tbody>

                  </table>
            </div>

        </div>
    </div>
</div>

@endsection
