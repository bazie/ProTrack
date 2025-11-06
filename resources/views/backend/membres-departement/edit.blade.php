{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
            {!! html()->label()->class('control-label')->for('departement_id')->text('Departement') !!}
            {!! html()->select('departement_id', $departements->prepend('Selectionnez...'),$data->projet_id)->placeholder('Selectionner le departement')->class('form-control select2')->id('departement_id') !!}
        </div>
        <div class='form-group'>
            {!! html()->label()->class('control-label')->for('user_id')->text('Utilisateur') !!}
            {!! html()->select('user_id', $users->prepend('Selectionnez...'),$data->user_id)->placeholder('Selecetionner l\'utilisateur')->class('form-control select2')->id('manager_name')->required() !!} 
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