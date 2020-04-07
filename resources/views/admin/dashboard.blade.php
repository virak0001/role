  
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
          <div class="row">
            <div class="col-12">
                <div class="row">
                  <div class="col-sm-2">
                    <a href="{{route('admin.showAddStudent')}}"><i class="material-icons ml-5" style="margin-top:-5px; font-size:50px">add_circle</i></a><br>
                    <p class="ml-4">New Student</p>
                  </div>
                  <div class="col-xm-6">
                    <p class="ml-3">Gender numbers</p>
                    @foreach ($gender as $male)
                          <span class="badge badge-primary">Male {{$male['male']}}</span>
                          &nbsp&nbsp&nbsp&nbsp&nbsp;
                          <span class="badge badge-danger">Female {{$male['female']}}</span>
                    @endforeach
                  </div>
                </div>
              <div class="col-12 text-center">
              <h5 class="page-title">student data</h5>
            </div>
           </div>
          </div>
          <div class="table-responsive">
            <table id="example" class="table table-striped" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="th-sm">Profile</th>
                  <th class="th-sm">Name</th>
                  <th class="th-sm">Class</th>
                  <th class="th-sm">Gender</th>
                  <th class="th-sm">Year</th>
                  <th class="th-sm">Status</th>
                  <th class="th-sm">Student_ID</th>
                  <th class="th-sm">Comment</th>
                  <th class="th-sm">Provinc</th>
                  <th class="th-sm">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($students as $student)
                <tr>
                  <td><img src="{{asset('img_student/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
                  <td>{{$student->first_name}}.{{$student->last_name}}</td>
                  <td>{{$student->class}}</td>
                  <td>{{$student->gender}}</td>
                  <td>{{$student->year}}</td>
                  <td>
                    @if ($student->status == 0)
                    <div class="dropdown">
                      <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">Achive</a>                            
                      <ul class="dropdown-menu">
                        <form type="submit" method="POST" action="{{ route('admin.statusAchive',$student['id']) }}">
                            @csrf
                            @method('PUT')
                            <span><button class="btn" style="cursor:pointer">Follow Up</button></span>
                        </form>
                      </ul>  
                    </div>
                    @else
                      <div class="dropdown">
                        <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">Follow Up</a>                            
                        <ul class="dropdown-menu">
                          <form id="submit" method="POST" action="{{ route('admin.statusFollowUp',$student['id']) }}">
                              @csrf
                              @method('PUT')
                              <span><button class="btn" style="cursor:pointer">Achive</button></span>
                          </form>
                        </ul>  
                      </div>
                    @endif
                  </td>
                  <td>{{$student->student_id}}</td>
                    <td><a href="{{route('admin.showComment',[$student->id])}}"><i class="material-icons">comment</i>Comment</a></td>
                    <td>{{$student->province}}</td>
                    <td>

                      <a href="{{route('admin.showFormEditStudent',$student->id)}}"><span class="material-icons">edit</span></a> 
                      <a class="text-primary" tabindex="-1" type="button" data-toggle="modal" data-backdrop="false" aria-hidden="true" data-target="#exampleModal" href="#"><i class="material-icons">delete</i></a>
                      <!-- Modal -->
                      <div class="modal fade modal-open" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              Are you sure want to delelte?
                            </div>
                            <div class="modal-footer">
                              <form method="POST" action="{{route('admin.student.destroy',$student->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Delete</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>  
                      <a href="#"><span class="material-icons">visibility</span></a>
                    </td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th class="th-sm">Profile</th>
                  <th class="th-sm">Name</th>
                  <th class="th-sm">Class</th>
                  <th class="th-sm">Gender</th>
                  <th class="th-sm">Year</th>
                  <th class="th-sm">Status</th>
                  <th class="th-sm">Student_ID</th>
                  <th class="th-sm">Provinc</th>
                  <th class="th-sm">Comment</th>
                  <th class="th-sm">Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
      </div>	
    </div>
  </section>
</body> 
</html>