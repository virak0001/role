<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Manage Student Follow UP</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="../assets/css/ready.css">
	<link rel="stylesheet" href="../assets/css/demo.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	@if (Auth::user()->role->id == 1)
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="index.html" class="logo">
					Manage Student
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-envelope"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">3</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													New user registered
												</span>
												<span class="time">5 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													Rahmad commented on Admin
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-img"> 
												<img src="../assets/img/profile2.jpg" alt="Img Profile">
											</div>
											<div class="notif-content">
												<span class="block">
													Reza send messages to you
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
											<div class="notif-content">
												<span class="block">
													Farrah liked Admin
												</span>
												<span class="time">17 minutes ago</span> 
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
						<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="../assets/img/{{Auth::user()->profile}}" alt="user-img" width="36" class="img-circle"><span >{{Auth::user()->first_name}}.{{Auth::user()->last_name}}</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="../assets/img/{{Auth::user()->profile}}" alt="user"></div>										<div class="u-text">
											<h4>{{Auth::user()->first_name}}.{{Auth::user()->last_name}}</h4>
											<p class="text-muted">{{Auth::user()->email}}</p>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<form class="dropdown-item" action="{{route('admin.changeProfilePicture')}}" method="POST" enctype="multipart/form-data">
										@csrf
										@method('PUT')
										<div class="row">
											<input id="file" type="file" name="picture">
											<button id="btnsubmit" class="btn mt-2 btn-primary btn-sm btn-block" type="submit">Update Profile</button>
										</div>
									</form>
									<a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
									<a class="dropdown-item" href="#"></i> My Balance</a>
									<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="../assets/img/{{Auth::user()->profile}}"/>
						</div>
						<div class="info">
							<a>
								<span>
									{{Auth::user()->first_name}}.{{Auth::user()->last_name}}
									<span class="user-level">{{Auth::user()->role->role_name}}</span>
								</span>
							</a>
						
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a href="{{route('admin.dashboard')}}">
								<span class="material-icons text-primary">dashboard</span>
								<strong style="margin-left: 15px;">Dashboard</strong>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.tutor.index')}}"">
								<span class="material-icons">person</span>
								<p style="margin-left: 15px;">Turtor</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.achiveStudent')}}">
								<span class="material-icons text-success">people</span>
								<p style="margin-left: 15px;">Achive Student</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.followUpStudent.index')}}">
								<span class="material-icons text-info">people</span>
								<p style="margin-left: 15px;">Follow Up Student</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.unserMentor')}}">
								<span class="material-icons text-danger">people</span>
								<p style="margin-left: 15px;">Under Mentor</p>
							</a>
						</li>
					</ul>
				</div>
			</div>


	@else


	
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="index.html" class="logo">
					Manage Student
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-envelope"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">3</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													New user registered
												</span>
												<span class="time">5 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													Rahmad commented on Admin
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-img"> 
												<img src="../assets/img/profile2.jpg" alt="Img Profile">
											</div>
											<div class="notif-content">
												<span class="block">
													Reza send messages to you
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
											<div class="notif-content">
												<span class="block">
													Farrah liked Admin
												</span>
												<span class="time">17 minutes ago</span> 
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
						<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="../assets/img/{{Auth::user()->profile}}" alt="user-img" width="36" class="img-circle"><span >{{Auth::user()->first_name}}.{{Auth::user()->last_name}}</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="../assets/img/{{Auth::user()->profile}}" alt="user"></div>
										<div class="u-text">
											<h4>{{Auth::user()->first_name}}.{{Auth::user()->last_name}}</h4>
											<p class="text-muted">{{Auth::user()->email}}</p>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<form class="dropdown-item" action="{{route('author.changeProfilePicture')}}" method="POST" enctype="multipart/form-data">
										@csrf
										@method('PUT')
										<div class="row">
											<input id="file" type="file" name="picture">
											<button id="btnsubmit" class="btn mt-2 btn-primary btn-sm btn-block" type="submit">Update Profile</button>
										</div>
									</form>
									<a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
									<a class="dropdown-item" href="#"></i> My Balance</a>
									<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign Out</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="../assets/img/{{Auth::user()->profile}}"/>
						</div>
						<div class="info">
							<a>
								<span>
									{{Auth::user()->first_name}}.{{Auth::user()->last_name}}
									<span class="user-level">{{Auth::user()->role->role_name}}</span>
								</span>
							</a>
						
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a href="{{route('author.dashboard')}}">
								<span class="material-icons text-primary">dashboard</span>
								<strong style="margin-left: 15px;">Dashboard</strong>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('author.tutor')}}">
								<span class="material-icons">person</span>
								<p style="margin-left: 15px;">Turtor</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('author.achiveStudent')}}">
								<span class="material-icons text-success">people</span>
								<p style="margin-left: 15px;">Achive Student</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('author.followUpStudent')}}">
								<span class="material-icons text-info">people</span>
								<p style="margin-left: 15px;">Follow Up Student</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{Route('author.unserMentor')}}">
								<span class="material-icons text-danger">people</span>
								<p style="margin-left: 15px;">Under Mentor</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
	@endif
  <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/js/ready.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
  <script src="../assets/js/plugin/chartist/chartist.min.js"></script>
  <script src="../assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
  <script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
  <script src="../assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
  {{-- <script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> --}}
  <script src="../assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
  <script src="../assets/js/plugin/chart-circle/circles.min.js"></script>
  <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/js/ready.min.js"></script>
  
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/js/demo.js"></script>
  <script>
	$(document).ready(function() {
		$('#example').DataTable({
			"lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
		});

		$('#btnsubmit').hide();
		$('#file').click(function () {
			$("#btnsubmit").show();
		});
		$('.dropdown-toggle').click(function(){
			$("#btnsubmit").hide();
			$("#file").val("");
		})
	} ); 
	</script>