
@include('frontend.frontend')
  <section>
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <h3 class="text-center" >Archive list</h3>
          <hr>
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
                              @endif
                          </td>
                          <td>{{$student->student_id}}</td>
                          <td>{{$student->province}}</td>
                          <td>
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
    </div>
  </section>
</body>
</html>
