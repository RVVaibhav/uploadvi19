@extends('layouts.app', [
'namePage' => 'Subscrition',
'class' => 'login-page sidebar-mini ',
'activePage' => 'subscribe',
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
                         <div class="row" style="margin-top:20px;">
                           <div class="col-md-12">
                                 <ul class="nav nav-tabs" id="myTab" role="tablist">
                                   <li class="nav-item">
                                     <a class="nav-link active" id="home-tab" data-toggle="tab" href="#bams" role="tab" aria-controls="home" aria-selected="true">BAMS</a>
                                   </li>
                                   <li class="nav-item">
                                     <a class="nav-link" id="profile-tab" data-toggle="tab" href="#samhita" role="tab" aria-controls="profile" aria-selected="false">SAMHITA</a>
                                   </li>
                                   <li class="nav-item">
                                     <a class="nav-link" id="profile-tab" data-toggle="tab" href="#test_series" role="tab" aria-controls="profile" aria-selected="false">TEST SERIES</a>
                                   </li>
                                 </ul>
                                 <div class="tab-content" id="myTabContent">
                                   <div class="tab-pane fade show active my-4" id="bams" role="tabpanel" aria-labelledby="home-tab">
                                     {{csrf_field()}}
                                     {!! Form::open(['action' => 'SubscribeController@store','method' => 'POST','enctype' => 'multipart/form-data','files' => true]) !!}
                                     <div class="row">
                                     <div class="col-md-4">
                                             <div class="form-group ">
                                                 <label>1st Year <span style="color: red">*</span></label>
                                                 <input type="text" name="first_year" value=""
                                                     class="form-control" required
                                                     placeholder="&#8377;">
                                             </div>
                                             <div class="form-group ">
                                                 <label>3nd Year <span style="color: red">*</span></label>
                                                 <input type="text" name="third_year" value=""
                                                     class="form-control" required
                                                     placeholder="&#8377;">
                                             </div>
                                      </div>
                                    <div class="col-md-4">
                                          <div class="form-group ">
                                              <label>2nd Year <span style="color: red">*</span></label>
                                              <input type="text" name="second_year" value=""
                                                  class="form-control" required
                                                  placeholder="&#8377;">
                                          </div>
                                          <div class="form-group ">
                                              <label>4th Year <span style="color: red">*</span></label>
                                              <input type="text" name="fourth_year" value=""
                                                  class="form-control" required
                                                  placeholder="&#8377;">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          <label> Complete Package of BAMS <span style="color:red">* </span></label>
                                          <input type="text" name="complete" value=""
                                              class="form-control" required
                                              placeholder="&#8377;">
                                      </div>
                                      <div class="form-group">
                                          <label>Description<span style="color: red">*</span></label>
                                          <textarea name="user_bio" required maxlength="240"
                                              class="form-control"></textarea>
                                      </div>
                                      <input name="id" value="1" type="hidden">
                                       <div class="form-group">
                                         <button type="submit" class="btn btn-primary">
                                             <i class="fa fa-dot-circle-o"></i> Create Now
                                         </button>
                                        {!!Form::close()!!}
                                       </div>

                                  </div>
                                   <div class="tab-pane fade my-4" id="samhita" role="tabpanel" aria-labelledby="profile-tab">
                                     {{csrf_field()}}
                                     {!! Form::open(['action' => ['SubscribeController@store'], 'method' => 'POST']) !!}
                                     <div class="row">
                                     <div class="col-md-4">
                                             <div class="form-group ">
                                                 <label>CHARAKA Price <span style="color: red">*</span></label>
                                                 <input type="text" name="charaka_p" value=""
                                                     class="form-control" required
                                                     placeholder="&#8377;">
                                             </div>
                                             <div class="form-group ">
                                                 <label>SUSHRUT Price <span style="color: red">*</span></label>
                                                 <input type="text" name="Sushrut_p" value=""
                                                     class="form-control" required
                                                     placeholder="&#8377;">
                                             </div>
                                      </div>
                                    <div class="col-md-4">
                                          <div class="form-group">
                                              <label>VAGBHAT Price<span style="color: red">*</span></label>
                                              <input type="text" name="vaghbhat_p" value=""
                                                  class="form-control" required
                                                  placeholder="&#8377;">
                                          </div>
                                          <div class="form-group">
                                              <label>OTHER SAMITA Price<span style="color: red">*</span></label>
                                              <input type="text" name="other_samhita_s" value=""
                                                  class="form-control" required
                                                  placeholder="&#8377;">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          <label> Complete Package of Samhita <span style="color:red">* </span></label>
                                          <input type="text" name="complete_s" value=""
                                              class="form-control" required
                                              placeholder="&#8377;">
                                      </div>
                                      <div class="form-group">
                                          <label>Description<span style="color: red">*</span></label>
                                          <textarea name="user_bio_s" required maxlength="240"
                                              class="form-control"></textarea>
                                      </div>
                                      <input name="id" value="2" type="hidden">
                                       <div class="form-group">
                                         <button type="submit" class="btn btn-primary">
                                             <i class="fa fa-dot-circle-o"></i> Create Now
                                         </button>
                                          {!!Form::close()!!}
                                       </div>
                                   </div>
                                   <div class="tab-pane fade my-4" id="test_series" role="tabpanel" aria-labelledby="profile-tab">
                                     {{csrf_field()}}
                                     {!! Form::open(['action' => ['SubscribeController@store'], 'method' => 'POST']) !!}
                                     <div class="row">
                                     <div class="col-md-4">
                                             <div class="form-group ">
                                                 <label>1st Year <span style="color: red">*</span></label>
                                                 <input type="text" name="first_year_t" value=""
                                                     class="form-control" required
                                                     placeholder="&#8377;">
                                             </div>
                                             <div class="form-group ">
                                                 <label>3nd Year <span style="color: red">*</span></label>
                                                 <input type="text" name="third_year_t" value=""
                                                     class="form-control" required
                                                     placeholder="&#8377;">
                                             </div>
                                      </div>
                                    <div class="col-md-4">
                                          <div class="form-group ">
                                              <label>2nd Year <span style="color: red">*</span></label>
                                              <input type="text" name="second_year_t" value=""
                                                  class="form-control" required
                                                  placeholder="&#8377;">
                                          </div>
                                          <div class="form-group ">
                                              <label>4th Year <span style="color: red">*</span></label>
                                              <input type="text" name="fourth_year_t" value=""
                                                  class="form-control" required
                                                  placeholder="&#8377;">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          <label> Complete Package of Test Series <span style="color:red">* </span></label>
                                          <input type="text" name="complete_t" value=""
                                              class="form-control" required
                                              placeholder="&#8377;">
                                      </div>
                                      <div class="form-group">
                                          <label>Description<span style="color: red">*</span></label>
                                          <textarea name="user_bio_t" required maxlength="240"
                                              class="form-control"></textarea>
                                      </div>
                                      <input name="id" value="3" type="hidden">
                                       <div class="form-group">
                                         <button type="submit" class="btn btn-primary">
                                             <i class="fa fa-dot-circle-o"></i> Create Now
                                         </button>
                                        {!!Form::close()!!}
                                       </div>

                                   </div>
                                   </div>
                                 </div>

                           </div>

                         </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <!-- role model -->


</div>

@endsection
