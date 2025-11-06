{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
            {!! html()->label('Nom du groupe','name')->class('control-label') !!}
            {!! html()->text('name')->class('form-control')->id('name')->required()->placeholder('Tapez ici...') !!}
        </div>
        <div class='form-group'>
            {!! html()->label('Code','code')->class('control-label') !!}
            {!! html()->text('code')->class('form-control')->id('code')->required()->placeholder('Tapez ici...') !!}
        </div>
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{!! html()->form()->close() !!}
<style>
    .modal-lg {
        max-width: 1000px !important;
    }
</style>
<script>
    $('.modal-title').html('<i class="fa fa-plus-circle"></i> Nouvel Enregistrement {{ $page->title }}');
    $('.submit-data').html('<i class="fa fa-save"></i> Enregistrer');
</script>
