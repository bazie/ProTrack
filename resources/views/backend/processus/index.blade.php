@extends('backend.main.index')
@push('title', $page->title ?? 'Processus')
@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <div class="me-auto">
                        <h3 class="page-title"><i class="{!! $page->icon !!}"></i> {!! $page->title ?? 'Page Name' !!} </h3>
                        <div class="d-inline-block align-items-center">
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"> {!! $page->subtitle ?? 'Gestion de ' . $page->title !!}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content" id="section-processus">
                @include($backend . '.processus.listProcessus')
            </section>
        </div>
    </div>
@endsection
@push('js')

    <script src="{{ url($template . '/assets/vendor_components/select2/dist/js/select2.js') }}"></script>
    <script src="{{ url($template . '/assets/vendor_components/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ url($template . '/assets/vendor_components/jquery-validation-1.17.0/lib/jquery.form.js') }}"></script>
    <script src="{{ url($template . '/assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ url($template . '/assets/vendor_components/nestable/jquery.nestable.js') }}"></script>
    <script src="{{ url('/js/' . $backend . '/' . $page->code . '/datatable.js') }}"></script>
    
    <script src="{{ url('js/jquery-crud.js') }}"></script>
    <script>
      $(document).on('click', '.manage_etape', function(e) {
            e.preventDefault();
            loadUrl = $(this).attr('href');
            loadList();
            
        });

        $(document).on('click', '#back_processus', function(e) {
            e.preventDefault();
            $('.submit-data').data('list','');
            let url = $(this).data('url');
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html',
                success: function(data) {
                    $('#section-processus').html(data);
                    $('#datatable').initDatatable();
                },
                error: function(xhr, status, error) {
                    alert('Une erreur est survenue lors du chargement des processus.');
                }
            });
        });
    </script>
@endpush
