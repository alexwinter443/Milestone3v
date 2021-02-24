@extends('layouts/layout')
<!-- Anh le-->
<!-- professor Hughes-->
<!-- Date: 2/21/2021-->
<!-- Milestone 2-->
<!-- this is my own work-->
@section('jobHistory')
<script src="{!!url('/js/jquery.min.js')!!}"></script>
	<h2>Job History Porfolio</h2>
	
     <div class="tab-content">
	<div class="tab-pane active" id="home">

		<form class="form" action="updateJobSaved" method="POST" id="jobHistoryForm">
		<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
			
			<div class="form-group">
				
				<div class="col-xs-6">
					<label for="title">Job Title</label> <input
						type="text" class="form-control" name="title" id="title"
						value= "{{ $job->getTitle() }}" title="enter your job title.">
				</div>
			</div>
			<div class="form-group">

				<div class="col-xs-6">
					<label for="position">Position</label> <input
						type="text" class="form-control" name="position" id="position"
						value= "{{ $job->getPosition() }}" title="enter your job position.">
				</div>
			</div>

			<div class="form-group">

				<div class="col-xs-6">
					<label for="dateStart">Date Start</label> <input type="text"
						class="form-control" name="dateStart" id="dateStart"
						value = "{{  $job->getDateStart() }}" title="">
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-6">
					<label for="dateEnd">Date End</label> <input type="text"
						class="form-control" name="dateEnd" id="dateEnd"
						value = "{{ $job->getDateEnd() }}"
						title="">
				</div>
			</div>
			<div class="form-group">

				<div class="col-xs-6">
					<label for="skills">Skills</label> <input type="text"
						class="form-control" name="skills" id="skills"
						value = "{{ $job->getSkills() }} "  title="enter your skills.">
				</div>
			</div>

			<div class="form-group">

				<div class="col-xs-6">
					<label for="schools">Schools</label> <input
						type="text" class="form-control" name="schools" id="schools"
						value = "{{  $job->getSchools() }}" title="enter your schools.">
				</div>
			</div>
			
			<div class="form-group">

				<div class="col-xs-6">
					<label for="highestDegree">Highest Degree</label> <input
						type="text" class="form-control" name="highestDegree" id="highestDegree"
						value = "{{ $job->getHighestDegree() }}" title="enter your highest degree.">
				</div>
				
				<div class="col-xs-6">
					<label for="highestDegree">Job ID </label> <input
						type="text" class="form-control" name="jobID" id="jobID"
						 readonly value = "{{ $job->getJobID() }}" title="enter your highest degree.">
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