{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('etape_id')->text('Etape') !!}
			{!! html()->select('etape_id',[])->placeholder('Choose Etape here')->class('form-control select2')->id('etape_id') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('libelle')->text('Libelle') !!}
			{!! html()->text('libelle',NULL)->placeholder('Type Libelle here')->class('form-control')->id('libelle') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('field_name')->text('Field Name') !!}
			{!! html()->text('field_name',NULL)->placeholder('Type Field Name here')->class('form-control')->id('field_name') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('type_donnee')->text('Type Donnee') !!}
			{!! html()->text('type_donnee',NULL)->placeholder('Type Type Donnee here')->class('form-control')->id('type_donnee') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('obligatoire')->text('Obligatoire') !!}
			{!! html()->text('obligatoire',NULL)->placeholder('Type Obligatoire here')->class('form-control')->id('obligatoire') !!}
		</div>
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{{--{!! html()->hidden('function','loadMenu,sidebarMenu')->id('function') !!}--}}
{{--{!! html()->hidden('redirect',url('/dashboard'))->id('redirect') !!}--}}
{!! html()->form()->close() !!}
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
    $('.modal-title').html('<i class="fa fa-plus-circle"></i> Nouvel Enregistrement {!! $page->title !!}');
    $('.submit-data').html('<i class="fa fa-save"></i> Sauvegarder');
</script>
