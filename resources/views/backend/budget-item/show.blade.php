<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Location")->class("control-label") !!}
					{!! html()->p($data->location)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Activity Description")->class("control-label") !!}
					{!! html()->p($data->activity_description)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Categorie Approvisionnement")->class("control-label") !!}
					{!! html()->p($data->categorie_approvisionnement_id)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Sap Output Code")->class("control-label") !!}
					{!! html()->p($data->sap_output_code)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Cost Centre")->class("control-label") !!}
					{!! html()->p($data->cost_centre)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Gl Account")->class("control-label") !!}
					{!! html()->p($data->gl_account)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Grant")->class("control-label") !!}
					{!! html()->p($data->grant)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Fund")->class("control-label") !!}
					{!! html()->p($data->fund)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Number Of Unit")->class("control-label") !!}
					{!! html()->p($data->number_of_unit)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Unit Of Measure")->class("control-label") !!}
					{!! html()->p($data->unit_of_measure)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Unit Cost")->class("control-label") !!}
					{!! html()->p($data->unit_cost)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Quantity")->class("control-label") !!}
					{!! html()->p($data->quantity)->class("form-control") !!}
				</div>
			</div>
		</div>
    </div>
</div>
<style>
    .modal-lg {
        max-width: 1000px !important;
    }
</style>
<script>
    $('.submit-data').hide();
    $('.modal-title').html('<i class="fa fa-search"></i> Detail Data {!! $page->title !!}');
</script>
