@extends('backend.main.index')
@push('title', $page->title ?? 'Processusengage')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <div class="content-header">

            </div>
            <section class="content">
                {{ html()->form('POST', route($page->url.'.store'))->id('form-create-'.$page->code)->acceptsFiles()->class('form form form-horizontal')->open() }}
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">Initier un processus</h4>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        {!! html()->label()->class('control-label h6')->for('processus_id')->text('Sélectionner le processus à initier') !!}
                                        {!! html()->select('processus_id', $listProcessus)->placeholder('-- Sélectionner un processus --')->class('form-control select2 selection')->id('processus_id') !!}
                                    </div>
                                    <div class="col-md-4">
                                        {!! html()->label()->class('control-label h6')->for('type_entite')->text('Type Entité') !!}
                                        {!! html()->select('type_entite', ['departement' => 'Département', 'projet' => 'Projet'])->placeholder('-- Département ou Projet--')->class('form-control select2 selection')->id('type_entite') !!}
                                    </div>
                                    <div class="col-md-4" id="divEntite">
                                        {!! html()->label()->class('control-label h6')->for('entite')->text('Entité') !!}
                                        {!! html()->select('entite', [])->placeholder('-- Entité--')->class('form-control select2 selection')->id('entite') !!}
                                    </div>
                                </div>
                                <div class="row mt-30" id="initProcessus">
                                    <div class="col-md-12">
                                        <div class="alert alert-info">
                                            <strong>Info :</strong> Sélectionnez le processus, le type d'entité et l'entité pour initier le processus.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
        $('.select2').select2();
        $(document).ready(function() {
            
            $('#type_entite').on('change', function() {
                var type = $(this).val();
                $('#entite').empty().append('<option value="">Chargement...</option>');
                var urlAjax = "{{ route($page->url . '.get-entites', '') }}" + '/' + type;
                if (type) {
                    $.ajax({
                        url: urlAjax,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#entite').empty().append(
                                '<option value="">-- Entité --</option>');
                            $.each(data, function(key, value) {
                                $('#entite').append('<option value="' + key + '">' +
                                    value + '</option>');
                            });
                        },
                        error: function() {
                            $('#entite').empty().append(
                                '<option value="">Erreur de chargement</option>');
                        }
                    });
                } else {
                    $('#entite').empty().append('<option value="">-- Entité --</option>');
                }
            });

            $('.selection').on('change', function() {
                var processusId = $('#processus_id').val();
                var typeEntite = $('#type_entite').val();
                var entiteId = $('#entite').val();
                if (processusId && typeEntite && entiteId) {
                    var urlSelection = "{{ route($page->url . '.selection-processus', '') }}" + '/' + processusId;
                    $('#initProcessus').html('<div class="col-md-12"><div class="text-center">Chargement des étapes...</div></div>');
                    $.ajax({
                        url: urlSelection,
                        type: 'GET',
                        dataType: 'html',
                        success: function(data) {
                            $('#initProcessus').html(data);
                        },
                        error: function() {
                            $('#initProcessus').html(`
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <strong>Erreur :</strong> Impossible de charger les étapes du processus.
                                    </div>
                                </div>
                            `);
                        }
                    });
                }else {
                    $('#initProcessus').html(`
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                <strong>Info :</strong> Sélectionnez le processus, le type d'entité et l'entité pour initier le processus.
                            </div>
                        </div>
                    `);
                }
            });

              
        });

        $(document).on('click', '.btn-initier-processus', function() {
            var processusId = $(this).data('processus-id');
            var typeEntite = $('#type_entite').val();
            var entiteId = $('#entite').val();
            if (processusId && typeEntite && entiteId) {
                var urlSetFirstEtape = "{{ route($page->url . '.set-first-etape', '') }}" + '/' + processusId;
                alert(urlSetFirstEtape);
                $('#initProcessus').html('<div class="col-md-12"><div class="text-center">Initialisation du processus...</div></div>');
                $.ajax({
                    url: urlSetFirstEtape,
                    type: 'GET',
                    dataType: 'html',
                    success: function(data) {
                        $('#initProcessus').html(data);
                    },
                    error: function() {
                        $('#initProcessus').html(`
                            <div class="col-md-12">
                                <div class="alert alert-danger">
                                    <strong>Erreur :</strong> Impossible d'initialiser le processus.
                                </div>
                            </div>
                        `);
                    }
                });
            } else {
                swal("Erreur", "Veuillez sélectionner le processus, le type d'entité et l'entité.", "error");
            }
        });
    </script>
@endpush
