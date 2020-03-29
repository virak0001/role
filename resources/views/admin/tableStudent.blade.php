
@include('frontend.frontend')
  <section>
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <h3 class="text-center" >Archive list</h3>
          <a href="{{route('admin.showAddStudent')}}"><i class="material-icons ml-5" style="margin-top:-5px; font-size:50px">add_circle</i></a>
          <p>Create New Student</p>
          <hr>
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
                      <th class="th-sm">Provinc</th>
                      <th class="th-sm">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($students as $student)
                        @if ($student->status == 0)
                        <tr>
                          <td><img src="{{asset('img_student/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
                          <td>{{$student->first_name}} {{$student->last_name}}</td>
                          <td>{{$student->class}}</td>
                          <td>{{$student->gender}}</td>
                          <td>{{$student->year}}</td>

                          <td> 
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
                          </td>
                          <td>{{$student->student_id}}</td>
                          <td>{{$student->province}}</td>
                          <td>
                            <a href="#"><span class="material-icons">edit</span></a> 
                            <a class="text-primary" tabindex="-1" type="button" data-toggle="modal" data-backdrop="false" aria-hidden="true" data-target="#exampleModal" href="#"><i class="material-icons">delete</i></a>
                      <!-- Modal -->
                      <div class="modal fade modal-open" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            </div>
                            <div class="modal-footer">
                              <form method="POST" action="{{route('admin.student.destroy')}}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Delete</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>  
                          </td>
                    </tr>
                        @endif
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