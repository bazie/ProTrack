@extends('backend.main.index')
@push('title', 'Traitements Processus Engage')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h3 class="page-title"><i class="fa fa-retweet"></i> Les processus engagés</h3>
                    </div>
                </div>
            </div>
            <section class="content" id="main-content">
                @include('backend.processus-engage.traitement.all-tables-traitements')
            </section>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ url($template . '/assets/vendor_components/select2/dist/js/select2.js') }}"></script>
    <script src="{{ url($template . '/assets/vendor_components/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ url($template . '/assets/vendor_components/jquery-validation-1.17.0/lib/jquery.form.js') }}"></script>
    <script src="{{ url($template . '/assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ url('/js/' . $backend . '/' . $page->code . '/datatable.js') }}"></script>
    <script src="{{ url('js/jquery-crud.js') }}"></script>
    <script>
        $(document).on('click', '.detail-processus', function() {
            var btn = $(this);
            var processusEngageId = btn.data('processus_engage');
            var url =
                "{{ route($page->url . '.details-processus-engage', ['processusEngageId' => ':processusEngageId']) }}";
            url = url.replace(':processusEngageId', processusEngageId);
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                success: function(data) {
                    $('#main-content').html(data);
                },
                error: function() {
                    alert("Une erreur est survenue")
                }
            });
        });

        $(document).on('click', '#back_details', function() {
            $('#actions-processus-engage').addClass('d-none').hide();
            $('#details-processus-engage').show();
            $('#btn-action-processus').show();
        });


        $(document).on('click', '#back_processus_engage', function() {
            var url = "{{ route($page->url . '.list-traitement-processus') }}";
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                success: function(data) {
                    $('#main-content').html(data);
                    initDatatable();
                },
                error: function() {
                    alert("Une erreur est survenue")
                }
            });
        });

        $(document).on('click', '#btn-action-processus', function() {
            var btn = $(this);
            if ($('#valider-etape').length !== 0) {
                $('#details-processus-engage').hide();
                $('#actions-processus-engage').removeClass('d-none').show();
                btn.hide();
            } else {
                var processusId = btn.data('processus-id');
                var ordre_etape = btn.data('etape-ordre');
                var urlVue =
                    "{{ route($page->url . '.set-etape', ['processus_id' => ':processusId', 'ordre_etape' => ':ordre_etape']) }}";
                urlVue = urlVue
                    .replace(':processusId', processusId)
                    .replace(':ordre_etape', ordre_etape);
              
                $.ajax({
                    url: urlVue,
                    type: 'GET',
                    dataType: 'html',
                    success: function(data) {
                        $('#details-processus-engage').hide();
                        $('#actions-processus-engage').removeClass('d-none').show();
                        btn.hide();
                        $('#form-etape-processus-container').html(data);
                        $('#users').select2();
                    },
                    error: function() {
                        swal("Erreur", "Une erreur est survenue", "error");
                    }
                });
            }
        });

        $(document).on('change', '.doc', function() {
            var fileName = $(this).val().split('\\').pop();
            if (fileName) {
                $(this).closest('tr').find('td:last').html(
                    '<span class="badge badge-pill badge-warning">Fichier sélectionné</span> <button type="button" class="btn-cancel-file btn btn-sm btn-outline"  title="Annuler le fichier" ><i class="fa fa-close text-danger" aria-hidden="true"></i> </button>'
                );
            } else {
                $(this).closest('tr').find('td:last').html(
                    '<span class="badge badge-pill badge-secondary">Aucune selection</span>');
            }
        });

        $(document).on('click', '.btn-cancel-file', function() {
            var inputFile = $(this).closest('tr').find('input[type="file"]');
            inputFile.val('');
            $(this).closest('td').html('<span class="badge badge-pill badge-secondary">Aucune selection</span>');
        });

        $(document).on('click', '#btn-more-users', function() {
            var $btn = $(this);
            var urlAjax = "{{ route($page->url . '.get-users', ['option' => ':option', 'level' => ':level']) }}"
            $('#users').empty().append('<option value="">Chargement...</option>');
            var option = $btn.data('option');
            var level = $btn.data('level');
            urlAjax = urlAjax
                .replace(':option', option)
                .replace(':level', level)
            $.ajax({
                url: urlAjax,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#users').empty().append(
                        '<option value="" default>-- Selectionner des destinataires --</option>');
                    $.each(data, function(key, value) {
                        $('#users').append('<option value="' + key + '">' + (typeof value === 'string' ? value : value.name) + '</option>');
                    });
                    if (option === 'more') {
                        $btn.data('option', 'less');
                        $btn.html('<i class="fa fa-user text-primary"></i>')
                    } else {
                        $btn.data('option', 'more');
                        $btn.html('<i class="fa fa-users text-primary"></i>')
                    }

                },
                error: function() {
                    $('#users').empty().append(
                        '<option value="">Erreur de chargement</option>');
                }
            });
        });
        $(document).on('click', '#retourner-etape-precedente', function() {
            
            var btn = $(this);
            var processusEngageId = btn.data('processus_engage');
            var url =
                "{{ route($page->url . '.retourner-etape-precedente', ['processusEngageId' => ':processusEngageId']) }}";
            url = url.replace(':processusEngageId', processusEngageId);
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                success: function(data) {
                    $('#main-content').html(data);
                    initDatatable();
                    alert('Le processus a été retourné à l\'étape précédente avec succès.');
                },
                error: function() {
                    alert("Une erreur est survenue")
                }
            });
        });

        $(document).on('submit', '#form-etape-' + '{{ $page->code }}', function(e) {
            e.preventDefault();
            var $form = $(this);
            var formData = new FormData($form[0]);
            $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    swal("Succès", "L'étape a été traitée avec succès.", "success")
                        .then(() => {
                            var url =
                                "{{ route($page->url . '.details-processus-engage', ['processusEngageId' => ':processusEngageId']) }}";
                            url = url.replace(':processusEngageId', data.processus_engage_id);
                            $.ajax({
                                url: url,
                                type: 'GET',
                                dataType: 'html',
                                success: function(data) {
                                    $('#main-content').html(data);
                                },
                                error: function() {
                                    alert("Une erreur est survenue")
                                }
                            });
                        });
                },
                error: function() {
                    swal("Erreur", "Une erreur est survenue lors du traitement de l'étape.", "error");
                }
            });
        });
    </script>
@endpush
