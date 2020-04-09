@include('frontend.frontend')
<section>
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <h4 class="page-title">Dashboard</h4>
          <div class="row">
            <div class="col-12">
                <div class="row d-flex justify-content-between">
                    @foreach ($gender as $male)
                    <p class="ml-3" style="margin-right:15px"><span class="badge badge-primary">Male {{$male['male']}}</span>&nbsp;<span class="badge badge-danger">Female {{$male['female']}}</span></p>
                    @endforeach
                </div>
            <div class="col-12 text-center">
                  @foreach ($numbers_student as $student)
                    <h5 class="card-category">{{$student['title']}} <span class="badge badge-primary">{{$student['numberStudent']}}</span></h5>
                  @endforeach
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
                  <th class="th-sm">Tutor_Name</th>
                  <th class="th-sm">Status</th>
                  <th class="th-sm">Student_ID</th>
                  <th class="th-sm">Comment</th>
                  
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
                  <td class="text-center">

                      @if ($student->user_id == null)
                        <p>Null</p>
                        @else
                        <p class="text-primary">{{$student->user['first_name']}}.{{$student->user['last_name']}}</p>
                      @endif

                  </td>
                  <td>
                    @if ($student->status == 0)
                      <p class="text-primary" type="button">Achive</p>                              
                    @else
                        <p class="text-primary">Follow Up</p>                            
                    @endif
                  </td>
                  <td>{{$student->student_id}}</td>
                    @if ($student->user_id!=null)
                    <td><a href="{{route('admin.showComment',[$student->id])}}"><i class="material-icons">comment</i>Comment</a></td>
                    @else
                    <td class="text-primary" style="cursor:pointer"><span class="material-icons ">speaker_notes_off</span>Comment</td>
                    @endif
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
                  <th class="th-sm">Tutor_Name</th>
                  <th class="th-sm">Status</th>
                  <th class="th-sm">Student_ID</th>
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