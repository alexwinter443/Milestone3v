<!-- Anh le-->
<!-- professor Hughes-->
<!-- Date: 2/6/2021-->
<!-- Milestone 2-->
<!-- this is my own work-->

<!doctype html>
<html lang="{{str_replace('_', '_', app()->getLocale())}}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content-width=device-width, initial-scale=1>
	<title>My First Laravel Project</title>
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<div class="container">
		<ul class="nav">
          <li class="nav-item">
            <a class="nav-link href="/">Home</a>
            
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about-us">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact-us">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="customer">Customer</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="myprofile">My Profile</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="jobhistory">Job History Portfolio</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="readAllJobs">All jobs</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="admin">Admin</a>
          </li>
                
          <div class="container">
          	@yield('content')
          </div>
           <div class="container">
          	@yield('adminManagement')
          </div>
           <div class="container">
          	@yield('jobHistory')
          </div>
          <div class="footer">
          	@yield('footer')
          </div>
          
       </ul>
	</div>
</body>
</html>


