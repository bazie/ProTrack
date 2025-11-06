{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('type_entite')->text('Type Entite') !!}
			{!! html()->select('type_entite',[])->placeholder('Choose Type Entite here')->class('form-select')->id('type_entite') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('projet_id')->text('Projet') !!}
			{!! html()->select('projet_id',[])->placeholder('Choose Projet here')->class('form-select')->id('projet_id') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('departement_id')->text('Departement') !!}
			{!! html()->select('departement_id',[])->placeholder('Choose Departement here')->class('form-select')->id('departement_id') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('processus_id')->text('Processus') !!}
			{!! html()->select('processus_id',[])->placeholder('Choose Processus here')->class('form-select')->id('processus_id') !!}
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
