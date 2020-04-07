  
@include('frontend.frontend')
  <section>
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <h4 class="page-title">Dashboard</h4>
          <div class="row">
            <div class="col-md-3">
              <div class="card card-stats card-warning">
                <div class="card-body ">
                  <a href="" style="text-decoration:none">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="material-icons">person</i>
                        </div>
                      </div>
                      <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                          @foreach ($numbers_tutors as $number)
                            <p class="card-category h1">{{$number['title']}}</p>
                            <h4 class="card-title">{{$number['numberOfTutors']}}</h4>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card card-stats card-success">
                <div class="card-body ">
                  <a href="" style="text-decoration:none">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                          <i class="material-icons">group</i>
                        </div>
                      </div>
                      <div class="col-7 d-flex align-items-center">
                        <div class="numbers">
                          @foreach ($numbers_student as $student)
                        <p class="card-category">{{$student['title']}}</p>
                        <h4 class="card-title">{{$student['numberStudent']}}</h4>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card card-stats card-danger">
                <div class="card-body">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="material-icons">group</i>
                      </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                      <div class="numbers">
                        @foreach ($number_student_achive as $achive)
                        <p class="card-category">{{$achive['title']}}</p>
                        <h4 class="card-title">{{$achive['numberStudentAchive']}}</h4>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card card-stats card-primary">
                <div class="card-body ">
                  <div class="row">
                    <div class="col-5">
                      <div class="icon-big text-center">
                        <i class="material-icons">group</i>
                      </div>
                    </div>
                    <div class="col-7 d-flex align-items-center">
                      <div class="numbers">
                        @foreach ($number_student_follow_up as $studentFolowUp)
                        <p class="card-category">{{$studentFolowUp['title']}}</p>
                        <h4 class="card-title">{{$studentFolowUp['numberStudentFollowUp']}}</h4>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @foreach ($gender as $male)
            <span class="badge badge-primary">Male {{$male['male']}}</span>
            <span class="badge badge-primary">Female {{$male['female']}}</span>
          @endforeach
          <br><br>
          <h5 class="page-title">All student data</h5>
          <div class="table-responsive">
            <table id="example" class="table table-striped" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="th-sm">Profile</th>
                  <th class="th-sm">Name</th>
                  <th class="th-sm">Status</th>
                  <th class="th-sm">Student_ID</th>
                  <th class="th-sm">Comment</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $student)
                <tr>
                  <td><img src="{{asset('img_student/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
                  <td>{{$student->first_name}}.{{$student->last_name}}</td>
                  <td>
                    @if ($student->status == 0)
                        Achive
                    @else
                        Follow Up
                    @endif
                  </td>
                  <td>{{$student->student_id}}</td>
                    <td>
                      <form id="comment" action="" method="post">
                        @csrf
                        @method('DELETE')
                      <div class="input-group mb-3">
                        <textarea id ='ta'></textarea>
                        <div class="input-group-append">
                          <a href=""><i class="material-icons">send</i></a>
                        </div>
                      </div>
                    </form>
                    </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th class="th-sm">Profile</th>
                  <th class="th-sm">Name</th>
                  <th class="th-sm">Status</th>
                  <th class="th-sm">Student_ID</th>
                  <th class="th-sm">Comment</th>
                </tr>
              </tfoot>
            </table>
          </div>
      </div>	
    </div>
  </section>
</body> 
</html>