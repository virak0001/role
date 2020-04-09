@include('frontend.frontend')
<section>
    <div class="main-panel">
      <div class="content">
        <div class="container-fluid">
          <h4 class="page-title">View Specific Student</h4>
          <div class="row">
              <div class="col-sm-2 col-md-3"></div>
              <div class="col-sm-8 col-md-6">
                <div class="card">
                    <div class="card-header p-4 ">
                        
                        <div class="row d-flex justify-content-center">
                            <div class="container-image">
                                <img class="mx-auto d-block" src="{{asset('img_student/'.$student->picture)}}" width="105" style="border-radius: 105px;" height="105" alt="Avatar">
                                <div class="overlay"><a href="" data-toggle="modal" data-target="#exampleModalCenter"><span class="material-icons text-light">add_a_photo</span></a></div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                            aria-hidden="true">
                                        <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Please picture</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
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
                    </div>
                </div>
              </div>
              <div class="col-sm-2 col-md-3"></div>
          </div>
          
        </div>
      </div>	
    </div>
  </section>
</body> 
</html>