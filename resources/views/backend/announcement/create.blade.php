{{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="form-group">
            <label for="menu_id">Sélectionner le menu</label>
            {!! html()->select('menu_id', $menu)
                ->class('form-control select2')
                ->id('menu_id')
                ->placeholder('Sélectionner le menu')
                ->required() !!}
        </div>
        <div class='form-group'>
            {!! html()->label('Titre de l\'annonce','title')->class('control-label') !!}
            <span class="text-danger">*</span>
            {!! html()->text('title')->placeholder('Tapez ici')->class('form-control')->id('title')->required() !!}
        </div>
        <div class="row">
            <div class='form-group col-md-6'>
                {!! html()->label('Date de début','start')->class('control-label') !!}
                <span class="text-danger">*</span>
                {!! html()->date('start')->class('form-control')->id('start')->required() !!}
            </div>
            <div class='form-group col-md-6'>
                {!! html()->label('Date de fin','end')->class('control-label') !!}
                <span class="text-danger">*</span>
                {!! html()->date('end')->class('form-control')->id('end')->required() !!}
            </div>
        </div>
        <div class='form-group'>
            {!! html()->label('Contenu de l\'annonce','content')->class('control-label') !!}
            <span class="text-danger">*</span>
            {!! html()->textarea('content')->class('form-control')->id('content')->placeholder('Tapez ici')->required() !!}
        </div>
        <div class='form-group'>
            {!! html()->label('Fichiers support','file')->class('control-label') !!}
            <span class="text-danger">*</span>
            <div class="file-loading">
                {!! html()->file('file[]')->id('file')->class('file-drag-drop')->multiple()->data('overwrite-initial',false)->data('min-file-count',1) !!}
            </div>
            <span class="text-danger">Allowed : jpg, jpeg, png, pdf, doc, docx, xls, xlsx</span>
        </div>
        <div class='form-group'>
            {!! html()->label('Niveau d\'intérêt','urgency')->class('control-label') !!}
            <span class="text-danger">*</span>
            {!! html()->select('urgency',config('master.content.announcement.status'))->class('form-select')->id('urgency')->placeholder('Pilih Urgensi')->required() !!}
        </div>
        <div class='form-group'>
            {!! html()->label('Concernant d\'autres annonces ?','parent_id')->class('control-label') !!}
            {!! html()->select('parent_id',$parent)->class('form-control select2')->id('parent_id')->placeholder('Sélectionnez une annonce') !!}
        </div>
        <div class='form-group'>
            {!! html()->checkbox('publish',false,1)->id('md_checkbox')->class('filled-in chk-col-primary') !!}
            {!! html()->label('Afficher les annonces','md_checkbox')->class('control-label') !!}
            <span class="text-danger">*</span>
        </div>
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{!! html()->form()->close() !!}
<link href="{{ url($template.'/fileupload/css/fileinput.css') }}" rel="stylesheet">
<link href="{{ url($template.'/fileupload/css/font_bootstrap-icons.min.css') }}" rel="stylesheet">
<style>
    .kv-file-upload, .fileinput-upload, .file-upload-indicator {
        display: none;
    }

    .select2-container {
        z-index: 999999 !important;
        width: 100% !important;
    }

    .modal-lg {
        max-width: 1000px !important;
    }
</style>
<script src="{{ url($template.'/fileupload/js/fileinput.js') }}"></script>
<script>
    $('#menu_id, #parent_id').select2().parent().css('z-index', 9999)
    $('.modal-title').html('<i class="fa fa-plus-circle"></i> Nouvel Enregistrement {{ $page->title }}');
    $('.submit-data').html('<i class="fa fa-save"></i> Enregistrer');
    $('#content').summernote({
        tabsize: 2,
        height: 250,
        toolbar: [
            "fontsize",
            "paragraph",
            "table",
            "insert",
            "codeview",
            "link",
        ],
        fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36'],
    });
    var noteModal = document.querySelector('.note-modal');
    noteModal.style.zIndex = 9999;
    noteModal.querySelector('.checkbox').style.display = 'none';
    noteModal.querySelector('.note-modal-content').style.padding = '3px';

    $(".file-drag-drop").fileinput({
        theme: 'fa',
        uploadUrl: "/#",
        showUpload: false,
        showRemove: false,
        showCancel: false,
        showClose: false,
        allowedFileExtensions: ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'xls', 'xlsx'],
        overwriteInitial: true,
        maxFileSize: 2048,
        maxFilesNum: 10,
        slugCallback: function (filename) {
            return filename.replace('(', '_').replace(']', '_');
        },
        initialPreviewAsData: true,
    });

    $('.select2').each(function () {
        let dropdownParent = $(this).closest('form');
        $(this).select2({
            placeholder: "Veuillez sélectionner",
            dropdownParent: dropdownParent
        });
    });
</script>

