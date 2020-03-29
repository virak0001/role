  
@include('frontend.frontend')
  <section>
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <h3 class="text-center">List Student In Follow up</h3>
          <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="th-sm">Profile</th>
                <th class="th-sm">Name</th>
                <td class="th-sm">Tutor</td>
                <th class="th-sm">Class</th>
                <th class="th-sm">Status</th>
                <th class="th-sm">Student_ID</th>
                <th class="th-sm">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($students as $student)
                  @if ($student->status == 1)
                  <tr>
                    <td><img src="{{asset('img_student/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
                    <td>{{$student->first_name}}.{{$student->last_name}}</td>
                    <td>
                      @if ($student->user_id == null)
                        <div class="form-group p-0">
                        <a href="{{route('admin.showPageAddTutor',$student->id)}}" type="button">
                          <span class="material-icons">add_circle</span>
                        </a>
                        @else
                           {{$student->User->first_name}}.&nbsp;{{ $student->User->last_name}}
                        @endif
                    <td>{{$student->class}}</td>
                    <td>
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
                    </td>
                    <td>{{$student->student_id}}</td>
                    <td>
                      <a href="#"><span class="material-icons">edit</span></a> 
                      <a href="#"><span class="material-icons">delete</span></a>
                      <a href="#"><span class="material-icons">visibility</span></a> 
                    </td>
              </tr>
                  @endif
              @endforeach

            </tbody>
            <tfoot>
              <tr>
                <th class="th-sm">Profile</th>
                <th class="th-sm">Name</th>
                <td class="th-sm">Tutor</td>
                <th class="th-sm">Class</th>
                <th class="th-sm">Status</th>
                <th class="th-sm">Student_ID</th>
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