@include('layouts.header')

<body class="off-canvas-sidebar">
  @include('sweetalert::alert')
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
        <div class="container">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="/register">Registration Page</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a href="/register" class="nav-link">
                  <i class="material-icons">person_add</i> Register
                </a>
              </li>
              <li class="nav-item">
                <a href="/" class="nav-link">
                  <i class="material-icons">fingerprint</i> Login
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
        <div class="wrapper wrapper-full-page">
          <div class="page-header register-page header-filter" filter-color="black" style="background-image: url('../../assets/img/form.jpeg')">
            <div class="container">
                    <div class="row">
                      <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                        <form class="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
            
                          <div class="card card-login card-hidden">
                            <div class="card-header card-header-rose text-center">
                              <h4 class="card-title">Registration Form</h4>
                            </div><br>

                          <!-- Display notification messages here -->
                          <div class="container" style="padding-top:10px;">
                            @if ($message = Session::get('error'))
                              <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>    
                                <strong>{{ $message }}</strong>
                              </div>
                            @endif
                          </div>


                            <div class="card-body ">
                              <span class="bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="material-icons">account_circle</i>
                                    </span>
                                  </div>
                                  <input type="text" name="admissionNumber" class="form-control" placeholder="Admission Number" required>
                                </div>
                              </span><br>
                              <span class="bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="material-icons">face</i>
                                    </span>
                                  </div>
                                  <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                                </div>
                              </span><br>
                              <span class="bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="material-icons">email</i>
                                    </span>
                                  </div>
                                  <input type="text" name="email" class="form-control" placeholder="Email Address" required>
                                </div>
                              </span><br>
                              <span class="bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="material-icons">phone</i>
                                    </span>
                                  </div>
                                  <input type="text" name="phoneNumber" class="form-control" placeholder="Phone Number" required>
                                </div>
                              </span><br>
                              <span class="bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="material-icons">lock</i>
                                    </span>
                                  </div>
                                  <input type="text" name="idNumber" class="form-control" placeholder="Id Number" required>
                                </div>
                              </span><br>
                              <span class="bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="material-icons">school</i>
                                    </span>
                                  </div>
                                  <input type="text" name="courseCode" class="form-control" placeholder="Course Code" required>
                                  <br>
                                  <input type="text" name="courseTitle" class="form-control" placeholder="Course Title" required>
                                </div>
                              </span><br>
                              <span class="bmd-form-group">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="material-icons">date_range</i>
                                    </span>
                                  </div>
                                  <select class="" name="year">
                                    <option value="" disabled selected>Choose Academic Year </option>
                                    <option value="1">Academic Year 1</option>
                                    <option value="2">Academic Year 2</option>
                                    <option value="3">Academic Year 3</option>
                                    <option value="4">Academic Year 4</option>
                                    <option value="5">Academic Year 5</option>
                                    <option value="6">Academic Year 6</option>
                                  </select>
                                </div>
                              </span><br>
                            </div>
                            <div class="card-footer justify-content-center">
                                <div class="card-footer ">
                                 <button type="submit" class="btn btn-fill btn-rose">Register</button>
                                </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </body>
</html>