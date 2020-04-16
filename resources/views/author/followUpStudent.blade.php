  
@include('frontend.frontend')
  <section>
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          @foreach ($number_student_follow_up as $studentFolowUp)
              <h4 class="text-center" class="card-category">{{$studentFolowUp['title']}}  <span class="badge badge-primary">{{$studentFolowUp['numberStudentFollowUp']}}</span></h4>
          @endforeach
          <hr>
            <div class="table-responsive">
              <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="th-sm">Profile</th>
                    <th class="th-sm">Name</th>
                    <td class="th-sm">Tutor</td>
                    <th class="th-sm">Class</th>
                    <th class="th-sm">Status</th>
                    <th class="th-sm">Student_ID</th>
                    <th class="th-sm">Comment</th>
                    <th class="th-sm">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($students as $student)
                      @if ($student->status == 1)
                      <tr>
                        <td><img src="{{asset('img_student/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
                        <td>{{$student->first_name}}.{{$student->last_name}}</td>
                        <td class="text-primary">
                          {{$student->User->first_name}}.&nbsp;{{ $student->User->last_name}}
                        </td>
                        <td>{{$student->class}}</td>
                        <td class="text-primary">
                            Follow Up
                        </td>
                        <td>{{$student->student_id}}</td>
                        <td>
                            <a href="{{route('author.showComment',[$student->id])}}"><i class="material-icons">comment</i>Comment</a>
                        </td>
                        <td>
                          <a data-toggle="modal" data-target="#basicExampleModal{{$student->id}}" href="{{route('admin.showSpecficStudent',$student->id)}}"><span class="material-icons">visibility</span></a>
                      <!-- Modal -->
                      <div class="modal fade" id="basicExampleModal{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">View Detail</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-header p-4 ">
                                    <div class="row d-flex justify-content-center">
                                        <div class="container-image">
                                            <img class="mx-auto d-block" src="{{asset('img_student/'.$student->picture)}}" width="105" style="border-radius: 105px;" height="105" alt="Avatar">
                                                <div class="overlay"><a href="" data-toggle="modal" data-target="#view{{$student->id}}"><span class="material-icons text-light">add_a_photo</span></a></div>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="view{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="view{{$student->id}}"
                                                        aria-hidden="true">
                                                    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Please picture</h5>
                                                        </button>
                                                        </div>
                                                            <form action="{{route('admin.changePictureStudent',$student->id)}}" method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="file" name="picture">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-sm btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                      <hr>
                                      <div class="row d-flex justify-content-between">
                                        <p> <strong>First Name: </strong>{{$student['first_name']}} </p>
                                        <p><strong>Last Name: </strong>{{$student['last_name']}}</p>
                                      </div>
                                      <div class="row d-flex justify-content-between">
                                          <p><strong>ID_Student: </strong>{{$student['student_id']}}</p>
                                          <p><strong>Class: </strong>{{$student['class']}}</p>
                                      </div>
                                      <div class="row d-flex justify-content-between">
                                          <p><strong>Year: </strong>{{$student['year']}}</p>
                                          <p><strong>Gender: </strong>{{$student['gender']}}</p>  
                                      </div>
                                      <div class="row d-flex justify-content-between">
                                        <p><strong>Province </strong>{{$student['province']}}</p>
                                        <p><strong>Student_ID: </strong>{{$student['student_id']}}</p>  
                                      </div>
                                      <div class="row d-flex justify-content-between">
                                        @if ($student['status']==false)
                                        <p class="text-primary"><strong>Status: </strong> Achive</p>
                                        @else
                                        <p class="text-primary"> <strong>Status: </strong> Follow Up</p>
                                        @endif
                                        <p><strong>Tutor Name </strong>{{$student->user['first_name']}}.{{$student->user['last_name']}}</p>
                                      </div>
                                </div>
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
                    <td class="th-sm">Tutor</td>
                    <th class="th-sm">Class</th>
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
    </div>
  </section>
</body>
</html>

{{-- Comment
<a data-toggle="modal" data-target="#comment{{$student->student_id}}" href="#"><i class="material-icons">comment</i>Comment</a>
<div class="modal fade" style="background-color:rgba(192,192,192,0.3);" id="comment{{$student->student_id}}" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="commentTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <div class="row">
        <img src="{{asset('img_student/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" />
        <p class="mt-2">{{$student->first_name}}.{{$student->last_name}}</p>
       </div>
          <button id="close{{$student->id}}" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      body
        <div class="modal-body p-1">
          @if (($student->comments)->isEmpty())
              No comment
          @else
          <img class="profile-image" src="{{asset('assets/img/'.$student->user['profile'])}}" width="40" height="40" style="border-radius: 50%;" alt="User" />
          <small>{{$student->user['first_name']}}</small><br>
          @foreach ($student->comments as $comment)
              <p id="{{$comment->id}}" class="ml-5 badge p-2 badge-light" style="margin-top:-10px;">{!!$comment->comment!!}</p>
              @if (Auth::id() == $comment->user_id)
              <a style="cursor: pointer" id="edit{{$comment->id}}"><i class="material-icons text-primary"  data-toggle="tooltip" data-placement="top" title="edit" style="font-size:10px">edit</i></a>
              <a href=""><i class="material-icons text-primary"  data-toggle="tooltip" data-placement="top" title="delete" style="font-size:10px">delete</i></a><br>
              @endif
          @endforeach
          @endif
      </div>
      footer
      @if ($student->user['id'] == Auth::id())
      <div class="modal-footer">
        insert form
        <form id="storeComment{{$student->id}}" action="{{route('admin.storeCommment',[$student->id,Auth::id()])}}" method="post">
          @csrf
          @method('PUT')
          <textarea name="comment" cols="52" rows="3" placeholder="Please write you comment"></textarea>
          <a href="#" id="send"  onclick="document.getElementById('storeComment{{$student->id}}').submit();" ><i class="material-icons"  style="margin-top:3px">send</i></a>                               
        </form>
        edit form
        <form id="editComment{{$student->id}}" action="{{route('admin.editComment',[$comment->id,$student->id])}}" method="post">
          @csrf
          @method('PUT')
        <textarea id="editForm{{$student->id}}" name="comment" cols="52" rows="3"></textarea>
        <a href="#" id="send"  onclick="document.getElementById('editComment{{$student->id}}').submit();" ><i class="material-icons"  style="margin-top:3px">send</i></a>                               
      </form>

        @foreach ($student->comments as $comment)
        <Script>
          $(document).ready(function(){
            $('#editComment{{$student->id}}').hide();
            $('#edit{{$comment->id}}').click(function(){
              var value = $('#{{$comment->id}}').text();
              $('#editForm{{$student->id}}').val(value);
              $('#storeComment{{$student->id}}').hide();
              $('#editComment{{$student->id}}').show();
              var id = this.id;
              var res = id.substring(4);
              console.log(res);
            });
            $('#close{{$student->id}}').click(function(){
              $('#editForm{{$student->id}}').val('');
            })
          });
        </Script>
        @endforeach

      </div>
      @else
          
      @endif
    </div>
  </div>
</div> --}}
