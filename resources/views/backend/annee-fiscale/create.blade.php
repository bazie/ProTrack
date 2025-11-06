{{ html()->form('POST', route($page->url . '.store'))->id('form-create-' . $page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
            {!! html()->label()->class('control-label')->for('libelle')->text('Libelle') !!}
			<span class="text-danger">*</span>
            {!! html()->text('libelle', $libelle)->placeholder('Type Libelle here')->class('form-control')->id('libelle') !!}
        </div>
        <div class='form-group'>
            {!! html()->label()->class('control-label')->for('description')->text('Description') !!}
			<span class="text-danger">*</span>
            {!! html()->text('description', null)->placeholder('Type Description here')->class('form-control')->id('description') !!}
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class='form-group'>
                    {!! html()->label()->class('control-label')->for('date_debut')->text('Date Debut') !!}
					<span class="text-danger">*</span>
                    {!! html()->date('date_debut', $date_debut)->class('form-control')->id('date_debut') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class='form-group'>
                    {!! html()->label()->class('control-label')->for('date_fin')->text('Date Fin') !!}
					<span class="text-danger">*</span>
                    {!! html()->date('date_fin', $date_fin)->class('form-control')->id('date_fin') !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class='form-group'>
                    {!! html()->label()->class('control-label')->for('statut')->text('Statut') !!}
					<span class="text-danger">*</span>
                    {!! html()->select('statut', ['Planification' => 'Planification'],'Planification')->class('form-select')->id('statut')->required() !!}
                </div>
            </div>
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
