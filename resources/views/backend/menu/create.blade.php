{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form-horizontal')->open() }}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! html()->label('Libellé du menu','title')->class('control-label') !!}
            <span class="text-danger">*</span>
            {!! html()->text('title')->placeholder('Saisir le libellé du menu')->class('form-control')->id('title') !!}
        </div>
        <div class="form-group">
            {!! html()->label('Sous titre du  menu','subtitle')->class('control-label') !!}
            {!! html()->span('exemple : Bienvenue sur la page Menu')->class('text-danger') !!}
            {!! html()->text('subtitle')->placeholder('Type subtitle here')->class('form-control')->id('subtitle') !!}
        </div>
        <div class="form-group">
            {!! html()->label('Modèle','model')->class('control-label') !!}
            {!! html()->select('model', $model)->placeholder('Sélectionnez le modèle (optional)')->class('form-control select2')->id('model') !!}
        </div>
        <div class="form-group">
            {!! html()->label('Code du Menu','code')->class('control-label') !!}
            <span class="text-danger">*</span>
            {!! html()->text('code')->placeholder('Saisir le code')->class('form-control')->id('code') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! html()->label('Icône','icon')->class('control-label') !!}
            <span class="text-danger">*</span>
            <div class="input-group mb-3">
                <span class="input-group-prepend">
                    <i class="input-group-text selected-icon"></i>
                </span>
                {!! html()->text('icon')->placeholder('Icône')->class('form-control iconpicker')->id('icon')->attributes(['autocomplete' => 'off']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! html()->label('Type de Menu','type')->class('control-label') !!}
            <span class="text-danger">*</span>
            {!! html()->select('type', ['' => 'Sélectionnez le type de Menu', 'backend' => 'Backend', 'frontend' => 'Frontend'],'backend')->class('form-select')->id('type') !!}
        </div>
        <div class="form-group">
            {!! html()->label('Lien','url')->class('control-label') !!}
            <span class="text-danger">*</span>
            {!! html()->text('url')->placeholder('Saisir l\'url du menu')->class('form-control')->id('url') !!}
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {!! html()->label('Statu','active')->class('control-label') !!}
                    <span class="text-danger">*</span>
                    {!! html()->select('active', [1 => 'Activé', 0 => 'Désactivé'], 1)->class('form-select')->id('active') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! html()->label('Afficher','show')->class('control-label') !!}
                    <span class="text-danger">*</span>
                    {!! html()->select('show', [1 => 'Oui', 0 => 'Non'], 1)->class('form-select')->id('show') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! html()->label('A venir','coming_soon')->class('control-label') !!}
                    <span class="text-danger">*</span>
                    {!! html()->select('coming_soon', [1 => 'Oui', 0 => 'Non'], 0)->class('form-select')->id('coming_soon') !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {!! html()->label('Maintenance','maintenance')->class('control-label') !!}
                    <span class="text-danger">*</span>
                    {!! html()->select('maintenance', [1 => 'Oui', 0 => 'Non'], 0)->class('form-select')->id('maintenance') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! html()->label('Qui peut accéder à ce menu ?','access_group_id')->class('control-label') !!}
            <span class="text-danger">*</span>
            <div class="row p-5" id="access_group_id">
                @foreach($access_group as $key => $value)
                    <div class="col-12">
                        <input type="checkbox" name="access_group_id[]"
                               onclick="checkAllLevel('access-menu-crud-{{$key}}',this)" value="{{ $key }}"
                               id="md_checkbox_{{$key}}" class="filled-in chk-col-primary access_group_id">
                        <label for="md_checkbox_{{$key}}">{{ $value }}</label>
                        <div class="form-control access-menu-crud-{{$key}} m-2" style="display: none;">
                            <label class="control-label">Déterminer les droits d'accès</label> <span class="text-danger">*</span>
                            <a href="javascript:void(0)" type="button"
                               onclick="checkAll('access-crud-{{$key}}',{{$key}})"
                               class="check-all-{{$key}} btn btn-xs btn-success"><i class="fa fa-check"></i>Tout selectionner</a>
                            <div class="row mt-2">
                                @foreach(config('master.app.level') as $i => $v)
                                    <div class="col-md-2 access-crud-{{$key}}">
                                        <input type="checkbox" onclick="checkAllLevel('crud_{{$i}}',this)"
                                               name="access_crud_{{$key}}[]" value="{{$v}}" id="crud_{{$i}}_{{$key}}"
                                               class="filled-in chk-col-info">
                                        <label for="crud_{{$i}}_{{$key}}">{{ucwords($v)}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <span class="message"></span>
        <div class="progress" style="display: none;">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div id="statustxt">0%</div>
            </div>
        </div>
    </div>
</div>
{!! html()->hidden('function')->value('loadMenu,sidebarMenu')->id('function') !!}
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
<script src="{{ url($template.'/assets/vendor_components/bootstrap-iconpicker/dist/iconpicker.js') }}"></script>
<script src="{{ url($template.'/assets/vendor_components/nestable/jquery.nestable.js') }}"></script>
<script>
    $('.modal-title').html('<i class="mdi mdi-bookmark-plus"></i> Nouvel Enregistrement {{ $page->title }}');
    $('.select2').select2();

    (async () => {
        const response = await fetch("{{ url($template.'/assets/vendor_components/bootstrap-iconpicker/dist/iconsets/fontawesome4.json') }}")
        const result = await response.json()
        const iconpicker = new Iconpicker(document.querySelector(".iconpicker"), {
            icons: result,
            showSelectedIn: document.querySelector(".selected-icon"),
            defaultValue: 'fa-arrow-right',
            valueFormat: val => `fa ${val.replace('fas-', 'fa-')}`,
        });
        iconpicker.set()
        iconpicker.set('fa-arrow-right')
    })()

    $('.access_group_id').on('click', function () {
        let count = $('.access_group_id:checked').length;
        if (count > 0) {
            $('.access-menu-crud-' + $(this).val()).show();
        } else {
            $('.access-crud' + $(this).val()).find('input[type="checkbox"]').prop('checked', false);
            $('.access-menu-level' + $(this).val()).hide();
        }
    })

    function checkAll(param, key) {
        let div = $('.' + param),
            checked = div.find('input[type="checkbox"]:checked').length,
            total = div.find('input[type="checkbox"]').length;
        div.find('input[type="checkbox"]').prop('checked', checked !== total)
        $('.check-all-' + key).html(checked !== total ? '<i class="fa fa-check"></i> Tout désélectionner' : '<i class="fa fa-check"></i> Tout sélectionner')
    }

    function checkAllLevel(param, obj) {
        $('.' + param).find('input[type="checkbox"]').prop('checked', $(obj).prop('checked'))
    }
</script>
