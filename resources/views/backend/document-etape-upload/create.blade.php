{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('document_etape_id')->text('Document Etape') !!}
			{!! html()->select('document_etape_id',[])->placeholder('Choose Document Etape here')->class('form-control select2')->id('document_etape_id') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('processus_engage_id')->text('Processus Engage') !!}
			{!! html()->select('processus_engage_id',[])->placeholder('Choose Processus Engage here')->class('form-control select2')->id('processus_engage_id') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('titre')->text('Titre') !!}
			{!! html()->text('titre',NULL)->placeholder('Type Titre here')->class('form-control')->id('titre') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('url')->text('Url') !!}
			{!! html()->text('url',NULL)->placeholder('Type Url here')->class('form-control')->id('url') !!}
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
