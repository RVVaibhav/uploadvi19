@extends('layouts.app', [
'namePage' => 'Create User',
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
               {!! Form::open(['action' => ['UserController@store'], 'method' => 'POST']) !!}
                <div class="card-header">
                    <h4>Create User</h4>
                </div>
                <div class="card-body">
                        <div class="row">
                            {{ csrf_field() }}

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name <span style="color: red">*</span></label>
                                    <input type="text" name="name" value=""
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
                                    <input type="text" name="mobile" value=""
                                        class="form-control" required
                                        placeholder="">

                                </div>
                                <div class="form-group">
                                    <label>Password <span style="color: red">*</span></label>
                                    <input type="text" name="mobile" value="{{ old('password') }}"
                                        class="form-control" required
                                        placeholder="">

                                </div>
                                <div class="form-group">
                                    <label>UG College<span style="color: red">*</span></label>
                                    <input type="text" name="mobile" value=""
                                        class="form-control" required
                                       placeholder="">

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>State<span style="color: red">*</span></label>
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
                        </div>
                </div>
                <div class="card-footer pull-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-dot-circle-o"></i> Create Now
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
