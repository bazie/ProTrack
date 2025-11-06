@extends('backend.main.index')
@push('title', $page->title ?? 'Projet')
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
            <section class="content">
                <div class="row" id="projet_contents">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">Enregistrement {!! $page->title ?? 'Page Name' !!}</h4>
                                @if ($user->create)
                                    <button type="button" class="btn-action pull-right btn btn-success btn-sm"
                                        data-title="Ajouter" data-action="create" data-url="{!! $page->url ?? '' !!}">
                                        <span class="fa fa-plus-circle"></span> Ajouter
                                    </button>
                                @endif
                            </div>
                            <div class="box-body">
                                <table id="datatable" class="table table-bordered table-striped" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="w-0">No</th>
                                            <th>Code</th>
                                            <th>Projet</th>
                                            <th>Donor</th>
                                            <th>NO</th>
                                            <th>Date Fin</th>
                                            <th>Manager</th>
                                            <th class="text-center w-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
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
        $(window.document).on('click', '.btn-members', function(e) {
            e.preventDefault();
            const project_id = $(this).data('id') ?? '';
            const url = $(this).data('url') ?? window.location.href;
            $.ajax({
                url: url + `/${project_id}/membres`,
                type: 'GET',
                success: function(response) {
                    $('#projet_contents').html(response); 
                },
                error: function(xhr, status, error) {}
            });
        })
    </script>
@endpush
