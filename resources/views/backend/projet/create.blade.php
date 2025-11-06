{{ html()->form('POST', route($page->url . '.store'))->id('form-create-' . $page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="form-group row">
            <div class='col-md-6'>
                {!! html()->label()->class('control-label')->for('code')->text('Funding Bundle Number') !!}
                <span class="text-danger">*</span>
                {!! html()->text('code', null)->placeholder('Funding Bundle Number')->class('form-control')->id('code')->required() !!}
            </div>
            <div class='col-md-6'>
                {!! html()->label()->class('control-label')->for('short_name')->text('Short Name (Abrégé)') !!}
				<span class="text-danger">*</span>
                {!! html()->text('short_name', null)->placeholder('SIGLE')->class('form-control')->id('short_name')->required() !!}
            </div>
        </div>
        <div class='form-group'>
            {!! html()->label()->class('control-label')->for('full_name')->text('Funding Bundle Name:') !!}
			<span class="text-danger">*</span>
            {!! html()->textarea('full_name', null)->class('form-control')->id('full_name')->required() !!}
        </div>
        <div class="form-group row">
            <div class='col-md-6'>
                {!! html()->label()->class('control-label')->for('donor')->text('Donor') !!}
				<span class="text-danger">*</span>
                {!! html()->select('donor_id', $donors->prepend('Sélectionner...', ''))->placeholder('Bailleur')->class('form-control select2')->id('donor_id')->required() !!}
            </div>
            <div class='col-md-6'>
                {!! html()->label()->class('control-label')->for('national_organisation')->text('National Organisation') !!}
				<span class="text-danger">*</span>
                {!! html()->select('national_organisation_id', $NOs->prepend('Sélectionner...',''))->placeholder('NO')->class('form-control select2')->id('national_organisation_id')->required() !!}
            </div>
        </div>

       
        <div class='form-group row'>
            <div class='col-md-6'>
                {!! html()->label()->class('control-label')->for('start_date')->text('Date de début') !!}
				<span class="text-danger">*</span>
                {!! html()->date('start_date', null)->class('form-control')->id('start_date')->required() !!}
            </div>
            <div class='col-md-6'>
                {!! html()->label()->class('control-label')->for('grant_end_date')->text('Date de Fin') !!}
				<span class="text-danger">*</span>
                {!! html()->date('grant_end_date', null)->class('form-control')->id('grant_end_date')->required() !!}
            </div>
        </div>

        <div class='form-group row'>
            <div class='col-md-3'>
                {!! html()->label()->class('control-label')->for('gik')->text('GIK') !!}
				<span class="text-danger">*</span>
                {!! html()->select('gik', [''=>'','Yes'=>'yes','No'=>'no'])->placeholder('GIK')->class('form-select')->id('gik')->required() !!}
            </div>
            <div class='col-md-3'>
                {!! html()->label()->class('control-label')->for('tracking_fad')->text('Tracking Fad') !!}
				<span class="text-danger">*</span>
                {!! html()->select('tracking_fad', [''=>'','Yes'=>'yes','No'=>'no'])->placeholder('Choisir Tracking Fad')->class('form-select')->id('tracking_fad')->required() !!}
            </div>
            <div class='col-md-6'>
                {!! html()->label()->class('control-label')->for('name_framework')->text('Name Framework') !!}
				<span class="text-danger">*</span>
                {!! html()->text('name_framework', null)->placeholder('Saisir Name Framework ')->class('form-control')->id('name_framework')->required() !!}
            </div>
        </div>
        <div class='form-group'>
            {!! html()->label()->class('control-label')->for('approved_country_cost_ratio')->text('Approved Country Cost Ratio (%)') !!}
			<span class="text-danger">*</span>
            {!! html()->number('approved_country_cost_ratio', null)->placeholder('Saisir Approved Country Cost Ratio ')->class('form-control')->id('approved_country_cost_ratio')->required() !!}
        </div>
        <div class='form-group'>
            {!! html()->label()->class('control-label')->for('direct')->text('Direct Cost (euro €)') !!}
			<span class="text-danger">*</span>
            {!! html()->number('direct_cost', null)->placeholder('Saisir Direct here')->class('form-control')->id('direct')->required() !!}
        </div>
        <div class='form-group'>
            {!! html()->label()->class('control-label')->for('apportioned_cost')->text('Apportioned Cost (euro €)') !!}
			<span class="text-danger">*</span>
            {!! html()->number('apportioned_cost', null)->placeholder('Type Apportioned Cost here')->class('form-control')->id('apportioned_cost')->required() !!}
        </div>
        <div class='form-group'>
            {!! html()->label()->class('control-label')->for('no_cost_in_co_buget')->text('No Cost In Co Buget (euro €)') !!}
			<span class="text-danger">*</span>
            {!! html()->number('no_cost_in_co_buget', null)->placeholder('Type No Cost In Co Buget here')->class('form-control')->id('no_cost_in_co_buget')->required() !!}
        </div>
        <div class='form-group'>
            {!! html()->label()->class('control-label')->for('id_manager')->text('Manager Name') !!}
			<span class="text-danger">*</span>
            {!! html()->select('id_manager',$users->prepend('Sélectionner...',''))->placeholder('Manager')->class('form-control select2')->id('id_manager')->required() !!}
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
