@extends('layouts.master')

@section('content')
<div class="main-panel">
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="/session">Sessions</a>
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
      <!-- upload sessions card -->
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info</i>
              </div>
              <h4 class="card-title">Session</h4>
            </div>
            <div class="card-body ">
              <form method="post" action="{{url('/session/upload')}}" enctype="multipart/form-data">
              {{ csrf_field() }}

              <br>
              <div class="form-group">
              <select class="form-control selectpicker" name="day" data-style="btn btn-link" id="courseSelect" required>
                <option value="" disabled selected>Select day</option>
                @foreach ($days as $day)
                <option value="{{$day->dayId}}">{{$day->dayName}}</option>
                @endforeach                
              </select>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">Session Start</label>
                  <input type="time" name="start" class="form-control" required>
              </div>
              <div class="form-group">
                <label class="bmd-label-floating">Session Stop</label>
                  <input type="time" name="stop" class="form-control" required>
              </div>
              <div class="form-group">
              <select class="form-control selectpicker" name="course" data-style="btn btn-link" id="courseSelect" required>
                <option value="" disabled selected>Select course</option>
                @foreach ($courses as $course)
                <option value="{{$course->courseCode}}">{{$course->courseTitle}}</option>
                @endforeach                
              </select>
              </div>
              <div class="form-group">
              <select class="form-control selectpicker" name="unit" data-style="btn btn-link" id="unitSelect" required>
                <option value="" disabled selected>Select Unit</option>
                @foreach ($units as $unit)
                <option value="{{$unit->unitCode}}">{{$unit->unitTitle}}</option>
                @endforeach
              </select>
              </div>   
              <div class="form-group">
              <select class="form-control selectpicker" name="year" data-style="btn btn-link" id="yearSelect" required>
                <option value="" disabled selected>Select Academic Year</option>
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
         </div>
        </div>
    </div>
  </div>
</div>
</div>
@endsection
