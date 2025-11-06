{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('user_id')->text('User') !!}
			{!! html()->select('user_id',[])->placeholder('Choose User here')->class('form-control select2')->id('user_id') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('processus_engage_id')->text('Processus Engage') !!}
			{!! html()->select('processus_engage_id',[])->placeholder('Choose Processus Engage here')->class('form-control select2')->id('processus_engage_id') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('etape_id')->text('Etape') !!}
			{!! html()->select('etape_id',[])->placeholder('Choose Etape here')->class('form-control select2')->id('etape_id') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('date_assignation')->text('Date Assignation') !!}
			{!! html()->date('date_assignation',$data->date_assignation)->class('form-control')->id('date_assignation') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('approbation')->text('Approbation') !!}
			{!! html()->select('approbation',[])->placeholder('Choose Approbation here')->class('form-select')->id('approbation') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('date_approbation')->text('Date Approbation') !!}
			{!! html()->date('date_approbation',$data->date_approbation)->class('form-control')->id('date_approbation') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('commentaire')->text('Commentaire') !!}
			{!! html()->textarea('commentaire',$data->commentaire)->class('form-control')->id('commentaire') !!}
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