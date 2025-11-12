<div class="col-md-12">
    <h4>{{ $processus->lib_processus }}: Initialisation</h4>
</div>
<hr />
@if (count($curentEtape->Metadonnees) > 0)
    <div class="col-md-12">
        <h5>Entrez les information suivantes:</h5>
    </div>

    @foreach ($curentEtape->Metadonnees as $meta)
        <div class="col-md-4">
            <div class="form-group">
                {!! html()->label($meta->libelle)->class('control-label') !!}
                @if ($meta->type_donnee == 'Texte')
                    {!! html()->text($meta->field_name)->class('form-control')->required($meta->obligatoire == 1 ? true : false) !!}
                @elseif ($meta->type_donnee == 'Number')
                    {!! html()->number($meta->field_name)->class('form-control')->required($meta->obligatoire == 1 ? true : false) !!}
                @elseif ($meta->type_donnee == 'Date')
                    {!! html()->date($meta->field_name)->class('form-control')->required($meta->obligatoire == 1 ? true : false) !!}
                @elseif ($meta->type_donnee == 'Textarea')
                    {!! html()->textarea($meta->field_name)->class('form-control')->required($meta->obligatoire == 1 ? true : false) !!}
                @endif
            </div>
        </div>
        <hr />
    @endforeach
@endif
@if ($curentEtape->DocumentEtape->count() > 0)
    <div class="col-md-12">
        <h5>Documents à charger</h5>
    </div>

    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Document</th>
                        <th>Template</th>
                        <th>document à charger</th>
                        <th>Status</th>
                    </tr>
                    @foreach ($curentEtape->DocumentEtape as $doc)
                        <tr>
                            <td>{{ $doc->TypeDocument->titre_type }}</td>
                            <td><a
                                    href="{{ $doc->TypeDocument->template }}">template_{{ strtolower($doc->TypeDocument->titre_type) }}</a>
                            </td>
                            <td>{!! html()->file('document_' . $doc->id)->class('form-control doc')->required() !!}</td>
                            <td><span class="badge badge-pill badge-secondary">Aucune selection</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endif
<input type="hidden" name="etape_id" value="{{ $curentEtape->id }}">
<div class="col-md-12">
    <hr/>
</div>

<div class="col-md-6">
    <h5>Destinataire(s) de l'étape suivante :<b> {{ $nextEtape->nom_etape }} </b></h5>
</div>
<div class="col-md-5">
    {!! html()->select('users', $nextEtapeUsers)->placeholder('-- Destinataire(s)--')->class('form-control select2 selection')->id('users')->multiple() !!}
</div>
<div class="col-md-1">
    <button type="button" id="btn-more-users" data-option="more" data-level="{{ $nextEtape->level_id }}"  class="btn-members btn btn-sm btn-outline" title="Plus de destinataires"> <i class="fa fa-users text-primary"></i> </button>
</div>

<div class="col-md-12">
    <hr/>
</div>

<div class="col-md-12 text-center">
    <button type="submit" class="btn btn-success btn-lg">
        <i class="mdi mdi-check-bold"></i> Valider {{ $curentEtape->nom_etape }}
    </button>
</div>
