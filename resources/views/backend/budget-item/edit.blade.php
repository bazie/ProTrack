{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('location')->text('Location') !!}
			{!! html()->select('location',[])->placeholder('Choose Location here')->class('form-control select2')->id('location') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('activity_description')->text('Activity Description') !!}
			{!! html()->text('activity_description',$data->activity_description)->placeholder('Type Activity Description here')->class('form-control')->id('activity_description') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('categorie_approvisionnement_id')->text('Categorie Approvisionnement') !!}
			{!! html()->select('categorie_approvisionnement_id',[])->placeholder('Choose Categorie Approvisionnement here')->class('form-control select2')->id('categorie_approvisionnement_id') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('sap_output_code')->text('Sap Output Code') !!}
			{!! html()->text('sap_output_code',$data->sap_output_code)->placeholder('Type Sap Output Code here')->class('form-control')->id('sap_output_code') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('cost_centre')->text('Cost Centre') !!}
			{!! html()->text('cost_centre',$data->cost_centre)->placeholder('Type Cost Centre here')->class('form-control')->id('cost_centre') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('gl_account')->text('Gl Account') !!}
			{!! html()->text('gl_account',$data->gl_account)->placeholder('Type Gl Account here')->class('form-control')->id('gl_account') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('grant')->text('Grant') !!}
			{!! html()->text('grant',$data->grant)->placeholder('Type Grant here')->class('form-control')->id('grant') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('fund')->text('Fund') !!}
			{!! html()->text('fund',$data->fund)->placeholder('Type Fund here')->class('form-control')->id('fund') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('number_of_unit')->text('Number Of Unit') !!}
			{!! html()->number('number_of_unit',$data->number_of_unit)->placeholder('Type Number Of Unit here')->class('form-control')->id('number_of_unit') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('unit_of_measure')->text('Unit Of Measure') !!}
			{!! html()->select('unit_of_measure',[])->placeholder('Choose Unit Of Measure here')->class('form-control select2')->id('unit_of_measure') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('unit_cost')->text('Unit Cost') !!}
			{!! html()->number('unit_cost',$data->unit_cost)->placeholder('Type Unit Cost here')->class('form-control')->id('unit_cost') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('quantity')->text('Quantity') !!}
			{!! html()->number('quantity',$data->quantity)->placeholder('Type Quantity here')->class('form-control')->id('quantity') !!}
		</div>
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{{--{!! html()->hidden('function','loadMenu,sidebarMenu')->id('function') !!}--}}
{{--{!! html()->hidden('redirect',url('/dashboard'))->id('redirect') !!}--}}
{!! html()->closeModelForm() !!}
<style>
    .select2-container {
        z-index: 9999 !important;
        width: 100% !important;
    }

    .modal-lg {
        max-width: 1000px !important;
    }
</style>
<script>
    $('.select2').select2();
    $('.modal-title').html('<i class="fa fa-edit"></i> Modifier {!! $page->title !!}');
    $('.submit-data').html('<i class="fa fa-save"></i> Enregistrer');
</script>