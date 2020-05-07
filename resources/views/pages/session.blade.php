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
                <a class="nav-link" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!--Capture the Admission Number of the User -->
                    <i class="material-icons">person</i>{{$value}}
                </a>

                <!--Logout option -->
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="/logout">Logout</a>
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
        <div class="col-lg-12 col-md-6 col-sm-6">
          <div class="card ">
            <div class="card-header card-header-rose card-header-icon">
              <div class="card-icon">
                <i class="material-icons">info</i>
              </div>
              <h4 class="card-title">Session</h4>
            </div>

           <!-- Display notification messages here -->
           <div class="container" style="padding-top:10px;">
            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
              </div>
            @endif
          </div>
            
            <div class="card-body ">
              <form method="post" action="{{url('/session/upload')}}" enctype="multipart/form-data">
              {{ csrf_field() }}

              <br>
              <div class="form-group">
                <select class="form-control selectpicker" name="unit" data-style="btn btn-link" id="unitSelect" required>
                  <option value="" disabled selected>Select Unit</option>
                  @foreach ($units as $unit)
                  <option value="{{$unit->unitCode}}">{{$unit->unitTitle}}</option>
                  @endforeach
                </select>
              </div>   
              <div class="form-group">
              <select class="form-control selectpicker" name="day" data-style="btn btn-link" id="courseSelect" required>
                <option value="" disabled selected>Select day</option>
                <option value="Monday">Monday</option>  
                <option value="Tuesday">Tuesday</option>  
                <option value="Wednesday">Wednesday</option>   
                <option value="Thursday">Thursday</option>  
                <option value="Friday">Friday</option>   
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
                    <th>Unit Code</th>
                    <th>Unit Title</th>
                    <th>Day</th>
                    <th>Session Start</th>
                    <th>Session Stop</th>
                    <th class="disabled-sorting text-right">Action</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($sessions as $session)
                  <tr>
                  <td>{{$session->unitCode}}</td>
                  <td>{{$session->unitTitle}}</td>
                  <td>{{$session->day}}</td>
                  <td>{{$session->sessionStart}}</td>
                  <td>{{$session->sessionStop}}</td>
                  <td>
                    <form method="post" action="/" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-success btn-sm" value="EDIT">
                    </form>
                  </td>
                  <td>
                    <form method="post" action="/delete-session/{{$session->sessionId}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="submit" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm" value="DELETE">
                    </form>
                  </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Unit Code</th>
                    <th>Unit Title</th>
                    <th>Day</th>
                    <th>Session Start</th>
                    <th>Session Stop</th>
                    <th class="disabled-sorting">Action</th>
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
</div>
@endsection
