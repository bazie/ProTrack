<div class="row">
    <div class="box">
        <div class="box-header">
            <button type="button" id ="back_processus_engage"class="btn btn-default btn-sm mb-10">
                <i class="fa fa-arrow-left"></i>
            </button>
            <h4 class="box-title">Détails du processus engagé : {{ $processusEngage->processus->lib_processus }}</h4>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-6">
                    <div class="input-group" style="display: flex;">
                        <div class="input-group-addon" style="flex: 0 0 125px;">
                            <h6>Processus</h6>
                        </div>
                        <input type="text" value="{{ $processusEngage->processus->lib_processus }}"
                            class="form-control" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group" style="display: flex;">
                        <div class="input-group-addon" style="flex: 0 0 125px;">
                            <h6>Description</h6>
                        </div>
                        <textarea rows="3" class="form-control"readonly>{{ $processusEngage->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="margin-top: 15px;">
                    <div class="input-group" style="display: flex;">
                        <div class="input-group-addon" style="flex: 0 0 125px;">
                            <h6>Entité</h6>
                        </div>
                        <input type="text" value="{{ $processusEngage->entite }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-6" style="margin-top: 15px;">
                    <div class="input-group" style="display: flex;">
                        <div class="input-group-addon" style="flex: 0 0 125px;">
                            <h6>Statut</h6>
                        </div>
                        <input type="text" value="{{ $processusEngage->etat }}" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6" style="margin-top: 15px;">
                    <div class="input-group" style="display: flex;">
                        <div class="input-group-addon" style="flex: 0 0 125px;">
                            <h6>Initié par</h6>
                        </div>
                        <input type="text"
                            value="{{ $processusEngage->initiate_by_user->first_name . ' ' . $processusEngage->initiate_by_user->last_name }}"
                            class="form-control" readonly>
                    </div>
                </div>
                <div class="col-6" style="margin-top: 15px;">
                    <div class="input-group" style="display: flex;">
                        <div class="input-group-addon" style="flex: 0 0 125px;">
                            <h6>Date d'initiation</h6>
                        </div>
                        <input type="text" value="{{ $processusEngage->created_at->format('d/m/Y') }}"
                            class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" id="details-processus-engage">
    <div class="col-xl-4 col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Les <strong>métadonnées</strong></h4>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Données</th>
                        <th>Valeur</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($metas as $meta)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $meta['libelle'] }}</td>
                            <td>{{ $meta['data'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xl-4 col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Les <strong>documents</strong></h4>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Type de document</th>
                        <th>Documents</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $doc)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $doc->document_etape->TypeDocument->titre_type }}</td>
                            <td><a href="{{ $doc->url }}" target="_blank">{{ $doc->titre }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-xl-4 col-12">
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Les <strong>etapes</strong></h4>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Etape</th>
                        <th>Traité par</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($etapesTraitees as $etape_traitee)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $etape_traitee->etape->nom_etape }}</td>
                            <td>{{ $etape_traitee->assignedUser->first_name . ' ' . $etape_traitee->assignedUser->last_name }}
                            </td>
                            <td>
                                @if ($etape_traitee->approbation == 'OUI')
                                    <span class="badge badge-pill badge-success">Apprové</span>
                                @elseif ($etape_traitee->approbation == 'NON')
                                    <span class="badge badge-pill badge-danger">Rejette</span>
                                @else
                                    <span class="badge badge-pill badge-secondary">Action en attente</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row d-none" id="actions-processus-engage" >
    <div class="col-12">
        <div class="box">
            <div class="box-header">
                <h4 class="box-title">Etape {{ $processusEngage->etape->ordre }}: <strong> {{ $processusEngage->etape->nom_etape}}</strong></h4>
            </div>
            <div class="box-body">
                <div class="row" id="form-etape-processus-container"></div>
            </div>
        </div>
    </div>
</div>
@if ($allowAction)
    <div class="col-md-12 text-center">
        <button type="button" class="btn btn-primary btn-lg" id="btn-action-processus" data-processus-id="{{ $processusEngage->processus->id }}" data-etape-ordre="{{ $processusEngage->etape->ordre }}">
            <i class="mdi mdi-play-circle"></i> Effectuer une action
        </button>
    </div>
@endif
