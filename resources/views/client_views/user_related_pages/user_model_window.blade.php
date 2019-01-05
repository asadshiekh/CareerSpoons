@section('data')
<!-- Modal -->
<div id="DemoModal2" class="modal fade "> 

	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header"> <!-- modal header -->
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">Eduction Viewed</h4>
			</div>

			<div class="modal-body"> <!-- modal body -->
				<div class="row no-mrg">
					<div class="edit-pro">
						<div class="col-md-4 col-sm-6">
							<label>Degree Title</label>
							<input type="text" id="viewed_edu_degree_title" readonly="readonly" class="form-control" placeholder="Matthew">
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Degree Level</label>
							<input type="text" id="viewed_edu_degree_level" readonly="readonly" class="form-control" placeholder="Else">
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Institute Name</label>
							<input type="text" id="viewed_edu_institute_name" readonly="readonly" class="form-control" placeholder="Dana">
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Institute Location</label>
							<input type="email" id="viewed_edu_institute_location" readonly="readonly" class="form-control" placeholder="dana.mathew@gmail.com">
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Date From</label>
							<input type="text" id="viewed_edu_date_from" readonly="readonly" class="form-control" placeholder="+91 258 475 6859">
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Date To</label>
							<input type="text" id="viewed_edu_date_to" readonly="readonly" class="form-control" placeholder="258 457 528">
						</div>
							<div class="col-md-6 col-sm-6">
							<label>Majors</label>
							<input type="text" id="viewed_edu_majors" readonly="readonly"  class="form-control" placeholder="258 457 528">
						</div>
						<div class="col-md-6 col-sm-6">
							<label>CGP/Percentage</label>
							<input type="text" id="view_edu_cgp_percentage" readonly="readonly" class="form-control" placeholder="258 457 528">
						</div>
						
						<div class="col-sm-12">
							<label>Description</label>
							<textarea class="form-control" id="view_edu_description" readonly="readonly" placeholder="Write Something"></textarea>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer"> <!-- modal footer -->
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
				<!-- <button type="button" class="btn btn-primary">Download</button> -->
			</div>

		</div> <!-- / .modal-content -->

	</div> <!-- / .modal-dialog -->

</div><!-- / .modal -->



<!-- Modal -->
<div id="AddEductionModelWindow" class="modal fade "> 

	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header"> <!-- modal header -->
				<button type="button" class="close" 
				data-dismiss="modal" aria-hidden="true">×</button>

				<h4 class="modal-title">Add Eduction</h4>
			</div>

			<div class="modal-body"> <!-- modal body -->
				<div class="row no-mrg">
					<div class="edit-pro">
						<div class="col-md-4 col-sm-6">
							<label>Degree Title</label>
							<input type="text" id="viewed_edu_degree_title" readonly="readonly" class="form-control" placeholder="Matthew">
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Degree Level</label>
							<input type="text" id="viewed_edu_degree_level" readonly="readonly" class="form-control" placeholder="Else">
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Institute Name</label>
							<input type="text" id="viewed_edu_institute_name" readonly="readonly" class="form-control" placeholder="Dana">
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Institute Location</label>
							<input type="email" id="viewed_edu_institute_location" readonly="readonly" class="form-control" placeholder="dana.mathew@gmail.com">
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Date From</label>
							<input type="text" id="viewed_edu_date_from" readonly="readonly" class="form-control" placeholder="+91 258 475 6859">
						</div>
						<div class="col-md-4 col-sm-6">
							<label>Date To</label>
							<input type="text" id="viewed_edu_date_to" readonly="readonly" class="form-control" placeholder="258 457 528">
						</div>
							<div class="col-md-6 col-sm-6">
							<label>Majors</label>
							<input type="text" id="viewed_edu_majors" readonly="readonly"  class="form-control" placeholder="258 457 528">
						</div>
						<div class="col-md-6 col-sm-6">
							<label>CGP/Percentage</label>
							<input type="text" id="view_edu_cgp_percentage" readonly="readonly" class="form-control" placeholder="258 457 528">
						</div>
						
						<div class="col-sm-12">
							<label>Description</label>
							<textarea class="form-control" id="view_edu_description" readonly="readonly" placeholder="Write Something"></textarea>
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer"> <!-- modal footer -->
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close!</button>
				<!-- <button type="button" class="btn btn-primary">Download</button> -->
			</div>

		</div> <!-- / .modal-content -->

	</div> <!-- / .modal-dialog -->

</div><!-- / .modal -->

@stop
