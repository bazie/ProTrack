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
            var processusEngageId = btn.data(
                'processus_engage');
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
            var processusId = btn.data('processus-id');
            var ordreEtape = btn.data('ordre-etape');
            var urlVue =
                "{{ route($page->url . '.set-etape', ['processus_id' => ':processusId', 'ordretape' => ':ordreEtape']) }}";
            urlVue = urlVue
                .replace(':processusId', processusId)
                .replace(':ordreEtape', 1);

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
                        $('#users').append('<option value="' + key + '">' +
                            value + '</option>');
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
    </script>
    </script>
@endpush
