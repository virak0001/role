  
@include('frontend.frontend')
  <section>
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <h3 class="text-center">List Student In Follow up</h3>
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
                        <td>
                          @if ($student->user_id == null)
                            <div class="form-group p-0">
                            <a href="{{route('admin.showPageAddTutor',$student->id)}}" type="button">
                              <span class="material-icons">add_circle</span>
                            </a>
                            @else
                            <a class="text-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="false">{{$student->User->first_name}}.&nbsp;{{ $student->User->last_name}}</a>                            
                            <ul class="dropdown-menu">
                              <a href="{{route('admin.showPageAddTutor',$student->id)}}">Change</a>
                            </ul>  
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
                            <a href="{{route('admin.showComment',[$student->id])}}"><i class="material-icons">comment</i>Comment</a>
                        </td>
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
