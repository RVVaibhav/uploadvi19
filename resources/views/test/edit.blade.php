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
                          <div class="container" style="margin-top: 10px;">
			<div class="col-md-12">
				{!! csrf_field() !!}
			<table class="table table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>S.N</th>
							<th>Name</th>
						</tr>
					</thead>
					<tbody>
						@foreach($gift as $testdet)
						<tr>
							<td><input type="radio" name="student_id" value="{{$testdet->test_id}}"></td>
							<td>{{$testdet->test_id}}</td>
							<td>{{$testdet->test_name}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>

      <form action="{{ route('import-csv-excel-test') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
           {!! Form::label('text', 'Select Tests:', ['class' => 'col-lg-12 control-label'])!!}
           <div class="col-lg-12">
             <select name="country_id" id="country" class="form-control">
                @foreach($postsss as $id => $country)
                    <option value="{{ $id }}">
                        {{ $country }}
                    </option>
                @endforeach
            </select>
             @if($errors->has('id'))
             <span class="help-block text-danger">{{$errors->first('id')}}</span>
             @endif
           </div>
           <div class="col-lg-12" style="margin-top: 10px;">

              <select placeholder="Filter" class="form-control" name="names" style="height:40px">
                <option>Vision </option>
                 <option>Dr.Amol Sir</option>
                   <option>Dr.Suraj Sir</option>
                     <option>Dr.GauriShankar Sir </option>

             </select>

         </div>
        </div>
          {!! Form::label('sample_file','Select File to Import:',['class'=>'col-md-3']) !!}
          <div class="col-md-12">
           <input name="id" value="1" type="hidden">
            <input name="stred" value="{{$testdet->test_id}}" type="hidden">

          <input type="file" name="sample_file" class="form-control">
          {!! $errors->first('sample_file', '<p class="alert alert-danger">:message</p>') !!}
         </div>
          <button class="btn btn-success">Upload</button>
      </form>
{!! csrf_field() !!}
	</div>


                    </div>
                    <div class="col-md-12" style="margin-top: 10px;">
     <form action="{{ url('multiple-insert') }}" enctype="multipart/form-data">
        <table class="table table-striped">
               <thead>
               <tr>
                  <th>#</th>
                  <th>S.N</th>
                  <th>Question</th>
                  <th>Action</th>
               </tr>
               </thead>
               <tbody>
                  @foreach($posts as $subject)

                  <tr>
                    <td><input type="checkbox" name="subject_id[]" value="{{$subject->id}}"></td>
                  <td>{{$subject->question_id}}</td>
                  <td>{{$subject->question}}</td>
                    <td>
                      <div class="col-auto">
                                {!!Form::open(['action' => ['TestController@destroy',$subject->question_id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                 {!!Form::hidden('_method', 'DELETE')!!}
                                {!! Form::button('DELETE', array('class' => 'btn btn-block btn-primary', 'type' => 'DELETE')) !!}
                                {!!Form::close()!!}

                       @csrf
                    </div>
                  </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>

            <div class="form-group">

				</div>
				</form>

                </div>
            </div>
        </div>
    </div>
    @yield('scripts')
</div>


@endsection
