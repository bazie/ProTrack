{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class='form-group'>
            {!! html()->label('Nom du profil','name')->class('control-label') !!}
            {!! html()->text('name')->placeholder('Saisir le nom du profile')->class('form-control')->id('name')->required() !!}
        </div>
        <div class='form-group'>
            {!! html()->label('Code du profil','code')->class('control-label') !!}
            {!! html()->text('code')->placeholder('Saisir le code')->class('form-control')->id('code')->required() !!}
        </div>
        <div class='form-group'>
            {!! html()->label('Quels sont les droits d\'accès de ce profil ?','access')->class('control-label') !!}
            <div class="row mt-2">
                @foreach(collect(config('master.app.level')) as $key => $level)
                    <div class="col-auto">
                        {!! html()->checkbox('access[]',false)->id('md_checkbox_'.$key)->class('filled-in chk-col-primary') !!}
                        {!! html()->label($level, 'md_checkbox_'.$key)->class('text-uppercase') !!}
                    </div>
                @endforeach
                <span class="text-danger"><i class="fa fa-exclamation-triangle"></i> Cela limitera toutes les actions qui peuvent être effectuées par les utilisateurs avec ce profil</span>
            </div>
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
