{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('module_id')->text('Module') !!}
			{!! html()->select('module_id',$modules,$data->module_id)->placeholder('Choose Module here')->class('form-select')->id('module_id') !!}
		</div>
		<div class='form-group'>
			{!! html()->label()->class('control-label')->for('lib_role')->text('Lib Role') !!}
			{!! html()->text('lib_role',$data->lib_role)->placeholder('Type Lib Role here')->class('form-control')->id('lib_role') !!}
		</div>
        <div class='form-group'>
			{!! html()->label()->class('control-label')->for('code_role')->text('Code') !!}
			{!! html()->text('code_role',$data->code_role)->placeholder('Entrer un code du role')->class('form-control')->id('code_role') !!}
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