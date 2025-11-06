{!! html()->modelForm($data,'PUT', route($page->url.'.update', $data->id))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() !!}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
            {!! html()->label()->class('control-label')->for('annee_fiscale_id')->text('Année Fiscale') !!}
            {!! html()->select('annee_fiscale_id')->class('form-control select2')->id('annee_fiscale_id') !!}
        </div>
        <div class='form-group'>
            {!! html()->label()->class('control-label')->for('departement_id')->text('Département') !!}
            {!! html()->select('departement_id' )->placeholder('Selectionner le departement')->class('form-control select2')->id('departement_id') !!}
        </div>
        <div class="form-group">
            <input type="checkbox" id="showProjet" name="showProjet" class="filled-in" />
            <label for="showProjet">Budget pour un projet</label>
        </div>
        <div class='form-group' id="projetDiv" style="display: none;">
            {!! html()->label()->class('control-label')->for('projet_id')->text('Projet') !!}
            {!! html()->select('projet_id')->placeholder('Selectionner le projet')->class('form-control select2')->id('departement_id') !!}
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
<script>
    $('#showProjet').on('change', function() {
        $('#projetDiv').toggle(this.checked);
    });
</script>