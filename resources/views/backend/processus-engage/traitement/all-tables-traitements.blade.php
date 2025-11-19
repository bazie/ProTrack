<div class="row">
    <div class="col-12">
        <div class="box">

            <div class="box-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs customtab2" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#initie"
                            role="tab"><span class="hidden-sm-up"><i class="ion-home"></i></span> <span
                                class="hidden-xs-down">Processus initiés</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#action" role="tab"><span
                                class="hidden-sm-up"><i class="ion-person"></i></span>
                            <span class="hidden-xs-down">Action(s) requise(s)</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#recherche"
                            role="tab"><span class="hidden-sm-up"><i class="ion-email"></i></span> <span
                                class="hidden-xs-down">Rechercher</span></a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="initie" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12" style="margin-top: 15px; margin-bottom: 15px;">
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
                                                        <button data-processus_engage="{{ $process->id }}"
                                                            class="btn btn-info btn-sm detail-processus"
                                                            title="Voir les détails du processus">
                                                            <i class="fa fa-eye"></i> Voir
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="action" role="tabpanel">
                        <div class="row">
                            <div class="col-md-12" style="margin-top: 15px; margin-bottom: 15px;">
                                <h4>Les actions que vous devez effectuer sur des processus encours</h4>
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
                                                <th>Entité</th>
                                                <td>Etape (action)</td>
                                                <th>Assigné par</th>
                                                <th>Date assigantion</th>
                                                <th>Delai de traitemment</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($processusAssignes as $process)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $process->processusEngage->processus->lib_processus }}</td>
                                                    <td>{{ $process->processusEngage->description }}</td>
                                                    <td>{{ $process->processusEngage->entite }}</td>
                                                    <td>{{ $process->etape->nom_etape }}</td>
                                                    <td>{{ $process->assignedByUser->first_name . ' ' . $process->assignedByUser->last_name }}
                                                    </td>
                                                    <td>{{ $process->created_at->format('d/m/Y') }}</td>
                                                    <td>{{ $process->etape->delai }} jour(s)</td>
                                                    <td class="text-center">
                                                        <button data-processus_engage="{{ $process->processusEngage->id }}"
                                                            class="btn btn-info btn-sm detail-processus"
                                                            title="Voir les détails du processus">
                                                            <i class="fa fa-eye"></i> Voir
                                                        </button>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="recherche" role="tabpanel">
                        <div class="p-15">
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
