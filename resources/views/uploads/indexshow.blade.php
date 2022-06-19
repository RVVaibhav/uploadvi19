@extends('layouts.app', [
'namePage' => 'test new',
'class' => 'login-page sidebar-mini ',
'activePage' => 'show',
'backgroundImage' => asset('now') . "/img/bg14.jpg",
])
@section('content')
<div class="panel-header">
</div>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="margin-bottom:20px;">
                  <div class="container border">
                   @if(count($test) > 0)
                    @foreach($test as $tes)
                    <h2 class="text-center p-4">VISION AYURVED ACADEMY, NAGPUR</h2>
          <div class="row p-4">
             <div class="col-md-4"><strong>TIME: </strong>{{$tes->test_time}}</div>
             <div class="col-md-4"><strong>SUB: </strong>{{$tes->test_subject}}</div>
             <div class="col-md-4 float-right"><strong>MARKS: </strong>{{$tes->test_marks}}</div>
         </div>
           @endforeach
           @else
             <h2 class="text-center p-4">VISION AYURVED ACADEMY, NAGPUR</h2>
             <div class="row p-4">
                <div class="col-md-4"><strong>TIME: </strong>30 </div>
                <div class="col-md-4"><strong>SUB: </strong>Testing</div>
                <div class="col-md-4 float-right"><strong>MARKS: </strong>50</div>
            </div>
           @endif
         <div class="col-md-12 mt-2 table-responsive">
           @if(count($user) > 0)
           <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col" >No</th>
                      <th scope="col" >Question</th>
                      <th scope="col" >A</th>
                      <th scope="col" >B</th>
                      <th scope="col" >C</th>
                      <th scope="col" >D</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($user as $post)
                     <tr>
                       <td>{{$post->question_id}}</td>
                            <td>{{$post->question}}</td>
                            <td>{{$post->option_1}}</td>
                            <td>{{$post->option_2}}</td>
                            <td>{{$post->option_3}}</td>
                            <td>{{$post->option_4}}</td>
                     </tr>
                     @endforeach
                     @else
                         <p>No posts found</p>
                     @endif
                  </tbody>

               </table>
         </div>

        <a href="{{ url('word-export') }}" class="btn btn-sm btn-primary">Export Word</a>

                   </div>

               </div>

            </div>
            </div>
        </div>
    </div>
    <!-- role model -->


</div>
@endsection
