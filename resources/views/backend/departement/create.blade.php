{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('dep_name')->text('Nom du departement') !!}
			{!! html()->text('dep_name',NULL)->placeholder('Type Dep Name here')->class('form-control')->id('dep_name')->required() !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('id_manager')->text('Manager') !!}
			{!! html()->select('id_manager',$users->prepend('Selectionnez...'))->placeholder('Choose Manager Name here')->class('form-control select2')->id('manager_name')->required() !!}
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
