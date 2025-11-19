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
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Processus </h4>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- Nav tabs -->
                                <div class="vtabs">
                                    <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                        <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home4"
                                                role="tab" aria-selected="false"><span class="hidden-sm-up"><i
                                                        class="ion-home"></i></span> <span
                                                    class="hidden-xs-down">Initiés</span> </a> </li>
                                        <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile4"
                                                role="tab" aria-selected="false"><span class="hidden-sm-up"><i
                                                        class="ion-person"></i></span> <span class="hidden-xs-down">Action
                                                    requis</span></a> </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home4" role="tabpanel">

                                        </div>
                                        <div class="tab-pane" id="profile4" role="tabpanel">
                                            <div class="p-15">
                                                <h4>Fusce porta eros a nisl varius, non molestie metus mollis. Pellentesque
                                                    tincidunt ante sit amet ornare lacinia.</h4>
                                                <p>Duis cursus eros lorem, pretium ornare purus tincidunt eleifend. Etiam
                                                    quis justo vitae erat faucibus pharetra. Morbi in ullamcorper diam.
                                                    Morbi lacinia, sem vitae dignissim cursus, massa nibh semper magna, nec
                                                    pellentesque lorem nisl quis ex.</p>
                                                <h3>Donec vitae laoreet neque, id convallis ante.</h3>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#initie"
                                            role="tab"><span><i class="ion-home me-15"></i>Processus initiés</span></a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile8"
                                            role="tab"><span><i class="ion-person me-15"></i>Action(s)
                                                requise(s)</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#messages8"
                                            role="tab"><span><i class="ion-email me-15"></i>Rechercher</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="initie" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Les processus que vous avez initiez durant la fiscalité</h4>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="processus-engage-traitement"
                                                        class="table table-bordered table-striped datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>N°</th>
                                                                <th>Processus</th>
                                                                <th>Description</th>
                                                                <th>Date assignation</th>
                                                                <th>Étape actuelle</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($processusInities as $process)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $process->processus->lib_processus }}</td>
                                                                    <td>{{ $process->description }}</td>
                                                                    <td>{{ $process->created_at->format('d/m/Y') }}</td>
                                                                    <td>
                                                                        @if ($process->etape)
                                                                            {{ $process->etape->nom_etape }}
                                                                        @else
                                                                            N/A
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <a href="{{ url(config('master.app.url.backend') . '/processus-engage/traitement/' . $process->id . '/details') }}"
                                                                            class="btn btn-info btn-sm"
                                                                            title="Voir les détails du processus">
                                                                            <i class="fa fa-eye"></i> Voir
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profile8" role="tabpanel">
                                        <div class="p-15">
                                            <h3>Donec vitae laoreet neque, id convallis ante.</h3>
                                            <p>Duis cursus eros lorem, pretium ornare purus tincidunt eleifend. Etiam quis
                                                justo vitae erat faucibus pharetra. Morbi in ullamcorper diam. Morbi
                                                lacinia, sem vitae dignissim cursus, massa nibh semper magna, nec
                                                pellentesque lorem nisl quis ex.</p>
                                            <h4>Fusce porta eros a nisl varius, non molestie metus mollis. Pellentesque
                                                tincidunt ante sit amet ornare lacinia.</h4>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="messages8" role="tabpanel">
                                        <div class="p-15">
                                            <p>Duis cursus eros lorem, pretium ornare purus tincidunt eleifend. Etiam quis
                                                justo vitae erat faucibus pharetra. Morbi in ullamcorper diam. Morbi
                                                lacinia, sem vitae dignissim cursus, massa nibh semper magna, nec
                                                pellentesque lorem nisl quis ex.</p>
                                            <h3>Donec vitae laoreet neque, id convallis ante.</h3>
                                            <h4>Fusce porta eros a nisl varius, non molestie metus mollis. Pellentesque
                                                tincidunt ante sit amet ornare lacinia.</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
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
@endpush
