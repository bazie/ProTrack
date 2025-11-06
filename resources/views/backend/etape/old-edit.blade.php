{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('processus_id')->text('Processus') !!}
			{!! html()->select('processus_id',[])->placeholder('Choose Processus here')->class('form-select')->id('processus_id') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('nom_etape')->text('Nom Etape') !!}
			{!! html()->text('nom_etape',$data->nom_etape)->placeholder('Type Nom Etape here')->class('form-control')->id('nom_etape') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('delai')->text('Delai') !!}
			{!! html()->number('delai',$data->delai)->placeholder('Type Delai here')->class('form-control')->id('delai') !!}
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