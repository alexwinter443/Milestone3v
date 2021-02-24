@extends('layouts/layout')
<!-- Anh le-->
<!-- professor Hughes-->
<!-- Date: 2/21/2021-->
<!-- Milestone 2-->
<!-- this is my own work-->
<!--  Anh --> 
@section('jobHistory')
<script src="{!!url('/js/jquery.min.js')!!}"></script>
	<h2>Job History Porfolio</h2>
	
     <div class="tab-content">

	<div class="tab-pane active" id="home">

		<form class="form" action="createJobHistory" method="POST" id="jobHistoryForm">
		<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
			
			<div class="form-group">
				
				<div class="col-xs-6">
					<label for="title">Job Title</label> <input
						type="text" class="form-control" name="title" id="title"
						placeholder="Job title" title="enter your job title.">
						<?php echo $errors->first('title')?>
				</div>
			</div>
			<div class="form-group">

				<div class="col-xs-6">
					<label for="position">Position</label> <input
						type="text" class="form-control" name="position" id="position"
						placeholder="Job position" title="enter your job position.">
						<?php echo $errors->first('position')?>
				</div>
			</div>

			<div class="form-group">

				<div class="col-xs-6">
					<label for="dateStart">Date Start</label> <input type="date"
						class="form-control" name="dateStart" id="dateStart"
						placeholder="Date start" title="">
						<?php echo $errors->first('dateStart')?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-6">
					<label for="dateEnd">Date End</label> <input type="date"
						class="form-control" name="dateEnd" id="dateEnd"
						placeholder="Date end"
						title="">
				</div>
			</div>
			<div class="form-group">

				<div class="col-xs-6">
					<label for="skills">Skills</label> <input type="text"
						class="form-control" name="skills" id="skills"
						placeholder="Your skills" title="enter your skills.">
						<?php echo $errors->first('skills')?>
				</div>
			</div>

			<div class="form-group">

				<div class="col-xs-6">
					<label for="schools">Schools</label> <input
						type="text" class="form-control" name="schools" id="schools"
						placeholder="Schools" title="enter your schools.">
						<?php echo $errors->first('schools')?>
				</div>
			</div>
			
			<div class="form-group">

				<div class="col-xs-6">
					<label for="highestDegree">Highest Degree</label> <input
						type="text" class="form-control" name="highestDegree" id="highestDegree"
						placeholder="Your highest degree" title="enter your highest degree.">
						<?php echo $errors->first('highestDegree')?>
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