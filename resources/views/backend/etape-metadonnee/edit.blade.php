{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('etape_id')->text('Etape') !!}
			{!! html()->select('etape_id',[])->placeholder('Choose Etape here')->class('form-control select2')->id('etape_id') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('libelle')->text('Libelle') !!}
			{!! html()->text('libelle',$data->libelle)->placeholder('Type Libelle here')->class('form-control')->id('libelle') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('field_name')->text('Field Name') !!}
			{!! html()->text('field_name',$data->field_name)->placeholder('Type Field Name here')->class('form-control')->id('field_name') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('type_donnee')->text('Type Donnee') !!}
			{!! html()->text('type_donnee',$data->type_donnee)->placeholder('Type Type Donnee here')->class('form-control')->id('type_donnee') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('obligatoire')->text('Obligatoire') !!}
			{!! html()->text('obligatoire',$data->obligatoire)->placeholder('Type Obligatoire here')->class('form-control')->id('obligatoire') !!}
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