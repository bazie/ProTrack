<div class="col-md-12">
    <h4>{{ $processus->lib_processus }}: Inintialisation</h4>
</div>
<hr />
@if (count($firstEtape->Metadonnees) > 0)
    <div class="col-md-12">
        <h5>Entrez les information suivantes:</h5>
    </div>

    @foreach ($firstEtape->Metadonnees as $meta)
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
@if ($firstEtape->DocumentEtape->count() > 0)
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
                    @foreach ($firstEtape->DocumentEtape as $doc)
                        <tr>
                            <td>{{ $doc->TypeDocument->titre_type }}</td>
                            <td><a
                                    href="{{ $doc->TypeDocument->template }}">template_{{ strtolower($doc->TypeDocument->titre_type) }}</a>
                            </td>
                            <td>{!! html()->file('document_' . $doc->id)->class('form-control chargement de fichier')->required() !!}</td>
                            <td><span class="badge badge-pill badge-secondary">Aucune selection</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endif
<div class="col-md-12 text-center">
    <button type="submit" class="btn btn-success btn-lg">
        <i class="mdi mdi-check-bold"></i> Valider {{ $firstEtape->nom_etape }}
    </button>
</div>
