<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Code")->class("control-label") !!}
					{!! html()->p($data->code)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Full Name")->class("control-label") !!}
					{!! html()->p($data->full_name)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Short Name")->class("control-label") !!}
					{!! html()->p($data->short_name)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Donor")->class("control-label") !!}
					{!! html()->p($data->donor_name)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("National Organisation")->class("control-label") !!}
					{!! html()->p($data->national_organisation_name)->class("form-control") !!}
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Start Date")->class("control-label") !!}
					{!! html()->p($data->start_date)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Grant End Date")->class("control-label") !!}
					{!! html()->p($data->grant_end_date)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Gik")->class("control-label") !!}
					{!! html()->p($data->gik)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Tracking Fad")->class("control-label") !!}
					{!! html()->p($data->tracking_fad)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Name Framework")->class("control-label") !!}
					{!! html()->p($data->name_framework)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Approved Country Cost Ratio")->class("control-label") !!}
					{!! html()->p($data->approved_country_cost_ratio)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Direct cost")->class("control-label") !!}
					{!! html()->p($data->direct_cost)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Apportioned Cost")->class("control-label") !!}
					{!! html()->p($data->apportioned_cost)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("No Cost In Co Buget")->class("control-label") !!}
					{!! html()->p($data->no_cost_in_co_buget)->class("form-control") !!}
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Manager Name")->class("control-label") !!}
					{!! html()->p($data->manager_name)->class("form-control") !!}
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
