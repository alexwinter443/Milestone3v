<!-- Anh le-->
<!-- professor Hughes-->
<!-- Date: 2/6/2021-->
<!-- Milestone 2-->
<!-- this is my own work-->
@extends('layouts/layout')
@section('adminManagement')
<div class="text-center">
	<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
		class="avatar img-circle img-thumbnail" alt="avatar">
	<h6>Upload a photo...</h6>
	<input type="file" class="text-center center-block file-upload">
</div>
<div class="tab-content">
	<div class="tab-pane active" id="home">

		<form class="form" action="myprofile" method="POST" id="userProfileForm">
		<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
			
			<div class="form-group">
				
				<div class="col-xs-6">
					<label for="firstname">First name</label> <input
						type="text" class="form-control" name="firstname" id="firstname"
						placeholder="first name" title="enter your first name if any.">
				</div>
			</div>
			<div class="form-group">

				<div class="col-xs-6">
					<label for="lastname">Last name</label> <input
						type="text" class="form-control" name="lastname" id="lastname"
						placeholder="last name" title="enter your last name if any.">
				</div>
			</div>

			<div class="form-group">

				<div class="col-xs-6">
					<label for="phone">Phone</label> <input type="text"
						class="form-control" name="phone" id="phone"
						placeholder="000-000-0000" title="enter your phone number if any.">
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-6">
					<label for="address">Address</label> <input type="text"
						class="form-control" name="address" id="address"
						placeholder="address"
						title="enter your address number if any.">
				</div>
			</div>
			<div class="form-group">

				<div class="col-xs-6">
					<label for="email">Email</label> <input type="email"
						class="form-control" name="email" id="email"
						placeholder="you@email.com" title="enter your email.">
				</div>
			</div>

			<div class="form-group">

				<div class="col-xs-6">
					<label for="dob">D.O.B</label> <input
						type="date" class="form-control" name="dob" id="dob"
						placeholder="password" title="enter your dob.">
				</div>
			</div>
			
			<div class="form-group">

				<div class="col-xs-6">
					<label for="career">Career</label> <input
						type="text" class="form-control" name="career" id="career"
						placeholder="career" title="enter your career.">
				</div>
			
				<div class="form-group">

				<div class="col-xs-6">
					<label for="skills">Skills</label> <input
						type="text" class="form-control" name="skills" id="skills"
						placeholder="skills" title="enter your skills.">
				</div>
				</div>


				<div class="form-group">
					<div class="col-xs-12">
						<br>
						<button class="btn btn-lg btn-success" type="submit">
							<i class="glyphicon glyphicon-ok-sign"></i> Save
						</button>
						<button class="btn btn-lg" type="reset">
							<i class="glyphicon glyphicon-repeat"></i> Reset
						</button>
					</div>
				</div>
		</div>
		</form>
	</div>
</div>
@endsection
@section('footer')
<h5>Copyright @2018 My Own Company Name</h5>
@endsection
<!-- @section('footer') -->
<!-- <p>hello there</p> -->
<!-- @endsection -->
