@extends('layouts.master')

@section('content')
<div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="/course">Music</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="/logout">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<!-- End Navbar -->

  <div class="content">
    <div class="container-fluid">
      <div class="row">
      <!-- upload courses card -->
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info</i>
              </div>
              <h4 class="card-title">Register Course</h4>
            </div>
            <!-- Display notification messages here -->
            <div class="container" style="padding-top:10px;">
              @if ($message = Session::get('success1'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
              </div>
              @endif
            </div>

            <div class="card-body ">
              <form method="post" action="{{url('/course/upload')}}" enctype="multipart/form-data">
              {{ csrf_field() }}

              <br>
              <div class="form-group">
                <label class="bmd-label-floating">course code</label>
                  <input type="text" name="courseCode" class="form-control" required>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">course title</label>
                  <input type="text" name="courseTitle" class="form-control" required>
              </div>                                                         
              <div class="card-footer ">
                <button type="submit" class="btn btn-fill btn-rose">Save</button>
              </div>
              </form>
            </div>

            <!-- Display the courses available in the database -->
          <div class="card-body">
            <div class="toolbar">
              <!--        Here you can write extra buttons/actions for the toolbar              -->
            </div>
            <div class="material-datatables">

              <table id="datatables01" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                  <tr>
                  <td>Course Code</td>
                  <td>Course Title</td>
                </tr>
                </thead>
                <tbody>
                @foreach ($courses as $course)
                <tr>
                <td>{{$course->courseCode}}</td>
                <td>{{$course->courseTitle}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                  <tr>
                  <th>Course Code</th>
                  <th>Course Title</th>
                </tr>
                </tfoot>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
         </div>
        </div>

      <!-- upload units card -->
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info</i>
              </div>
              <h4 class="card-title">Register Unit</h4>
            </div>
            <!-- Display notification messages here -->
            @if ($message = Session::get('success2'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
              </div>
            @endif

            <div class="card-body ">
              <form method="post" action="{{url('/unit/upload')}}" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group">
                <label class="bmd-label-floating">unit code</label>
                  <input type="text" name="unitCode" class="form-control" required>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">unit title</label>
                  <input type="text" name="unitTitle" class="form-control" required>
              </div>   
              <div class="form-group">
                <select class="form-control selectpicker" name="course" data-style="btn btn-link" id="courseSelect" required>
                <option value="" disabled selected>Choose course</option>
                @foreach ($courses as $course)
                <option value="{{$course->courseCode}}">{{$course->courseTitle}}</option>
                @endforeach
                </select>
              </div>  
              <div class="form-group">
                <select class="form-control selectpicker" name="year" data-style="btn btn-link" id="yearSelect" required>
                <option value="" disabled selected>Choose academic year</option>
                @foreach ($years as $year)
                <option value="{{$year->yosId}}">Year {{$year->year}}</option>
                @endforeach
                </select>
              </div>                                                     
              <div class="card-footer ">
                <button type="submit" class="btn btn-fill btn-rose">Save</button>
              </div>
              </form>
            </div>

            <!-- Display the units available in the database -->
            <div class="card-body">
              <div class="toolbar">
                <!--        Here you can write extra buttons/actions for the toolbar              -->
              </div>
              <div class="material-datatables">
  
                <table id="datatables02" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                  <thead>
                    <tr>
                    <td>Unit Code</td>
                    <td>unit Title</td>
                    <td>course Code</td>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($units as $unit)
                  <tr>
                  <td>{{$unit->unitCode}}</td>
                  <td>{{$unit->unitTitle}}</td>
                  <td>{{$unit->courseCode}}</td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Unit Code</th>
                    <th>Unit Title</th>
                    <th>Course Code</th>
                  </tr>
                  </tfoot>
                  <tbody>
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
