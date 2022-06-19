@extends('layouts.app', [
'namePage' => 'Result',
'class' => 'login-page sidebar-mini ',
'activePage' => 'result',
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
                           <div class="container border">
                               <div class="row">
                                   <h4 class="px-3">Generate Report</h4>
                                   <div class="container">
                                       <div class="row">
                                           <div class="col">
                                               <select class="form-control" id="exampleFormControlSelect1" >
                                                   <option>Select Quiz</option>
                                                   <option>2</option>
                                                   <option>3</option>
                                                   <option>4</option>
                                                   <option>5</option>
                                               </select>
                                           </div>
                                           <div class="col">
                                                 <select class="form-control" id="exampleFormControlSelect1" >
                                                   <option>Select Group</option>
                                                   <option>2</option>
                                                   <option>3</option>
                                                   <option>4</option>
                                                   <option>5</option>
                                               </select>
                                           </div>
                                           <div class="col">
                                                <input type="date" name='entry_date' class="form-control" id="entry_date" value="2020-12-12" data-toggle="tooltip" data-placement="top" title="From Date">
                                           </div>
                                           <div class="col">
                                               <input type="date" name='to_date' class="form-control" id="to_date" value="2020-12-12"  data-toggle="tooltip" data-placement="top" title="End Date">
                                           </div>
                                           <div class="col">
                                               <a class="btn btn-primary" href="#" role="button">Generate Report</a>
                                           </div>
                                       </div>
                                   </div>
                                   <h4 class="p-3">Result List</h4>
                                   <div class="container">
                                       <div class="row">
                                           <div class="col-md-6">
                                               <form class="navbar-form" role="search">
                                                   <div class="input-group">
                                                       <input type="text" class="form-control" placeholder="Result List" name="q">
                                                       <div class="input-group-btn">
                                                           <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                                                       </div>
                                                   </div>
                                               </form>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="clearfix"></div>

                                   <div class="container mt-2">
                                       <div class="row">
                                       </div>
                                   </div>
                                   <div class="container mt-3">
                                       <div class="row">
                                           <div class="col-md-12">
                                               <div class="p-3 mb-2  text-danger" style="background-color: #F2DEDF;">Everything You Need For
                                                   Your Exam Preparation
                                                   Online Courses, Practice Question Bank, Mock Test Series, Study Notes, Strategy &
                                                   Preparation Plans, Guidance & Mentoring and more...</div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="col-md-12 mt-2 table-responsive">
                                       <table class="table table-bordered">
                                           <thead>
                                               <tr>
                                                   <th scope="col" style="width: 10%">Result Id:</th>
                                                   <th scope="col" style="width: 15%">Full Name</th>
                                                   <th scope="col" style="width: 15%">Quiz Name</th>
                                                   <th scope="col" style="width: 25%">
                                                       <div class="container">
                                                           <div class="row " style="margin-bottom: -10px;">
                                                               <div class="col-md-4">Status </div>
                                                               <div class="col-md-8">
                                                                   <select class="form-control" id="exampleFormControlSelect1"
                                                                       placeholder="fdf">
                                                                       <option>All</option>
                                                                       <option>2</option>
                                                                       <option>3</option>
                                                                       <option>4</option>
                                                                       <option>5</option>
                                                                   </select>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </th>
                                                   <th scope="col" style="width: 10%">Percentage</th>
                                                   <th scope="col" style="width: 25%">Action</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                               <tr>
                                                   <td>123</td>
                                                   <td>Vaibhav Rao</td>
                                                   <td>Set 22</td>
                                                   <td>Pass</td>
                                                   <td> 56.00%</td>
                                                   <td>
                                                       <div class="row">
                                                           <div class="col">
                                                               <ul class="list-inline">
                                                               <button class="btn btn-success">View</button>
                                                               <button class="btn btn-success">Download</button>
                                                               <i class="fa fa-times" aria-hidden="true" style="color: red;"></i>
                                                               </ul>
                                                           </div>
                                                       </div>
                                                   </td>
                                               </tr>
                                               <tr>
                                                   <td>256 </td>
                                                   <td>Vaibhav Rao</td>
                                                   <td>Set 22</td>
                                                   <td>Pass</td>
                                                   <td>89.04%
                                                   </td>
                                                   <td>
                                                       <div class="row">
                                                           <div class="col">
                                                               <ul class="list-inline">
                                                               <button class="btn btn-success">View</button>
                                                               <button class="btn btn-success">Download</button>
                                                               <i class="fa fa-times" aria-hidden="true" style="color: red;"></i>
                                                               </ul>
                                                           </div>
                                                       </div>
                                               </tr>
                                               <tr>
                                                   <td>7656</td>
                                                   <td>Vaibhav Rao </td>
                                                   <td>Set 22</td>
                                                   <td>Pass</td>
                                                   <td>48%</td>
                                                   <td>
                                                       <div class="row">
                                                       <div class="col">
                                                           <ul class="list-inline">
                                                           <button class="btn btn-success">View</button>
                                                           <button class="btn btn-success">Download</button>
                                                           <i class="fa fa-times" aria-hidden="true" style="color: red;"></i>
                                                           </ul>
                                                       </div>
                                                   </div>
                                               </tr>
                                           </tbody>
                                       </table>
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

@endsection
