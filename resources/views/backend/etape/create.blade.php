{{ html()->form('POST', route($page->url . '.store-etape'))->id('form-create-' . $page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row form-group">

            <div class='col-md-6'>
                {!! html()->label()->class('control-label')->for('processus_id')->text('Processus') !!}
                {!! html()->select('processus_id', [$processus->id => $processus->lib_processus], $processus->id)->class('form-select')->id('processus_id')->required() !!}
            </div>
            <div class='col-md-6'>
                {!! html()->label()->class('control-label')->for('nom_etape')->text('Nom Etape') !!}
                {!! html()->text('nom_etape', null)->placeholder('Type Nom Etape here')->class('form-control')->id('nom_etape') !!}
            </div>
        </div>
        <div class="row form-group">
            <div class='col-md-6'>
                {!! html()->label()->class('control-label')->for('level_id')->text('Profil') !!}
                {!! html()->select('level_id', $levels->prepend('Sélectionner...', ''))->class('form-select')->id('level_id') !!}
            </div>
            <div class='col-md-6'>
                {!! html()->label()->class('control-label')->for('delai')->text('Delai') !!}
                {!! html()->number('delai', null)->placeholder('Type Delai here')->class('form-control')->id('delai') !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <hr />
                {!! html()->label('Les documents à charger à cette étape', 'type_document_id')->class('control-label') !!}
                <div class="row p-5" id="documents-list">
                    <div class="row mt-2">
                        @foreach ($documents as $document)
                            <div class="col-md-3 document-{{ $document->id }}">
                                <input type="checkbox" name="documents_etape[]" value="{{ $document->id }}"
                                    id="document_{{ $document->id }}" class="filled-in chk-col-info" />
                                <label for="document_{{ $document->id }}">{{ $document->titre_type }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="ordre" value="{{ $ordre }}" />


        <hr />
        <div class="row">
            <table class="table table-bordered" id="metadata-table">
                <thead>
                    <tr>
                        <th>Métadonné</th>
                        <th>Type de donnée</th>
                        <th>Obligatoire</th>
                        <th class="text-center w-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        {!! html()->label('Métadonnées', 'metadata')->class('control-label') !!}
        <div class="row form-group">
            <div class='col-md-4'>
                {!! html()->text('metadata', null)->class('form-control')->id('metadata')->placeholder('Nouveau métadonné') !!}
            </div>
            <div class='col-md-4'>
                {!! html()->select('metadata_type', ['Texte' => 'Texte', 'Number' => 'Nombre', 'Date' => 'Date'])->placeholder('Type de donnee')->class('form-control')->id('metadata_type') !!}
            </div>
            <div class='col-md-2'>
                {!! html()->select('is_required', ['1' => 'Oui', '0' => 'Non'])->placeholder('Obligatoire ?')->class('form-control')->id('is_required') !!}
            </div>
            <div class='col-md-2 d-flex align-items-end'>
                <button type="button" class="pull-right btn btn-success btn-sm" id="add-metadata">
                    <span class="fa fa-plus-circle"></span> Ajouter la métadonnée
                </button>
            </div>
        </div>

    </div>
    {!! html()->hidden('function')->value('loadList')->id('function') !!}

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
        $('.modal-title').html(
            '<i class="fa fa-plus-circle"></i> Processus  {!! $processus->lib_processus !!} : Enregistrement nouvelle etape ');
        $('.submit-data').html('<i class="fa fa-save"></i> Sauvegarder');
        $('.submit-data').addClass('nestable-list');
        $('#add-metadata').on('click', function() {
            var metadata = $('#metadata').val();
            var metadata_type = $('#metadata_type').val();
            var is_required = $('#is_required').val();
            if (metadata == '' || metadata_type == '' || is_required == '') {
                alert('Veuillez remplir tous les champs de métadonnée.');
                return;
            }
            var newRow = '<tr>' +
                '<td><input type="hidden" name="metadatas[]" value="' + metadata + '">' + metadata + '</td>' +
                '<td><input type="hidden" name="metadata_types[]" value="' + metadata_type + '">' + metadata_type +
                '</td>' +
                '<td><input type="hidden" name="is_requireds[]" value="' + is_required + '">' + (is_required ==
                    '1' ? 'Oui' : 'Non') + '</td>' +
                '<td class="text-center w-0"><button type="button" class="btn btn-danger btn-sm remove-metadata"><span class="fa fa-trash"></span></button></td>' +
                '</tr>';
            $('#metadata-table tbody').append(newRow);
            // Clear input fields
            $('#metadata').val('');
            $('#metadata_type').val('');
            $('#is_required').val('');
        });

        $(document).on('click', '.remove-metadata', function() {
            $(this).closest('tr').remove();
        });

        //$(document).on('change', '#documents-list input[type="checkbox"]', function() {
        //    var selectedDocuments = [];
        //    $('#documents-list input[type="checkbox"]:checked').each(function() {
        //        selectedDocuments.push($(this).val());
        //    });
        //    $('input[name="documents_etape[]"]').val(selectedDocuments);
        //});
    </script>
