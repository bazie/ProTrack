{{ html()->form('POST', route($page->url . '.store'))->id('form-create-' . $page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
            {!! html()->label()->class('control-label')->for('annee_fiscale_id')->text('Année Fiscale') !!}
            {!! html()->select('annee_fiscale_id',$anneesFiscale)->class('form-control select2')->id('annee_fiscale_id')->required() !!}
        </div>
        <div class="form-group">
            <input type="radio" id="typeEntite_departement" name="type_entite" value="Departement" class="with-gap radio-col-primary" checked/>
            <label for="typeEntite_departement">Budget pour un département</label>
            <input type="radio" id="typeEntite_projet" name="type_entite" value="Projet" class="with-gap radio-col-success" />
            <label for="typeEntite_projet">Budget pour un projet</label>
        </div>
        <div class='form-group' id="departementDiv" >
            {!! html()->label()->class('control-label')->for('departement_id')->text('Département') !!}
            {!! html()->select('departement_id',$departements )->placeholder('Selectionner le departement')->class('form-control select2')->id('departement_id')->required() !!}
        </div>
        
        <div class='form-group' id="projetDiv" style="display: none;">
            {!! html()->label()->class('control-label')->for('projet_id')->text('Projet') !!}
            {!! html()->select('projet_id',$projets)->placeholder('Selectionner le projet')->class('form-control select2')->id('projet_id')!!}
        </div>
    </div>
</div>
{!! html()->hidden('table-id', 'datatable')->id('table-id') !!}
{{-- {!! html()->hidden('function','loadMenu,sidebarMenu')->id('function') !!} --}}
{{-- {!! html()->hidden('redirect',url('/dashboard'))->id('redirect') !!} --}}
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
<script>
    $('input[name="type_entite"]').on('change', function() {
        if ($(this).val() === 'departement') {
            $('#departementDiv').show();
            $('#departement_id').prop('required', true);
            $('#projetDiv').hide();
            $('#projet_id').val('').prop('required', false);
        } 
        if ($(this).val() === 'projet') {
            $('#departementDiv').hide();
            $('#departement_id').val('').prop('required', false);
            $('#projetDiv').show();
            $('#projet_id').prop('required', true);
        }
    });
</script>
