{!! html()->form('POST', route($page->url.'.sorted-etapes'))->id('form-'.time())->acceptsFiles()->class('form form-horizontal')->open() !!}
<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header">
                <button type="button" id ="back_processus"class="btn btn-default btn-sm mb-10" id="btn-back-processus"
                    data-url="{!! $page->url . '/list' ?? '' !!}">
                    <i class="fa fa-arrow-left"></i>
                </button>

                <h4 class="box-title">{{ $processus->lib_processus }}</h4>
                @if ($user->create)
                    <button type="button"class="btn-action pull-right btn btn-success btn-sm" data-title="Ajouter"
                        data-action="create-etape" data-url="{!! $page->url ?? '' !!}" data-id="{{ $processus->id }}">
                        <span class="fa fa-plus-circle"></span> Ajouter une étape
                    </button>
                @endif
            </div>

            <div class="box-body">
                @if ($etapes->isEmpty())
                    <div class="alert alert-warning mb-0" role="alert">
                        <div class="d-flex align-items-center">
                            <div class="alert-icon width-3">
                                <span class="icon-stack icon-stack-sm">
                                    <i class="ni ni-alert-circle color-warning-800 icon-stack-2x font-weight-bold"></i>
                                </span>
                            </div>
                            <div class="flex-1">
                                <span class="h5 m-0 fw-700"> Aucune étape
                                    pour le moment !
                                </span>
                                Veuillez ajouter des étapes pour ce processus.
                            </div>
                        </div>
                    </div>
                @else
                    <div class="alert alert-success mb-0" role="alert">
                        <div class="d-flex align-items-center">
                            <div class="alert-icon width-3">
                                <span class="icon-stack icon-stack-sm">
                                    <i class="ni ni-list color-success-800 icon-stack-2x font-weight-bold"></i>
                                </span>
                            </div>
                            <div class="flex-1">
                                <span class="h5 m-0 fw-700"><i class="{{ $page->icon }}"></i> Liste des Etapes de
                                    {{ $processus->lib_processus }} !
                                </span>
                                Organisez correctement les étapes.
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="dd p-10 fit-width" id="nestable" style="min-width: 100%;">
                            <div class="list">
                                <ol class="dd-list">
                                    @foreach ($etapes as $etape)
                                        <li class="dd-item dd3-item" data-id="{{ $etape->id }}">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content" title="{{ $etape->nom_etape ?? '' }}">
                                                {{ $etape->nom_etape }} delai: {{ $etape->delai }} jours
                                                <div class="pull-right btn-group">
                                                    <button type="button" class="btn-action btn btn-xs btn-outline"
                                                        title="Modifier les données de l'étape" data-title="Edit"
                                                        data-action="edit-etape" data-url="{{ $page->url }}"
                                                        data-id="{{ $etape->id }}">
                                                        <i class="fa fa-edit text-warning"> </i>
                                                    </button>
                                                    <button type="button" class="btn-action btn btn-xs btn-outline"
                                                        title="Supprimer l'étape" data-title="Delete"
                                                        data-action="delete-etape" data-url="{{ $page->url }}"
                                                        data-id="{{ $etape->id }}">
                                                        <i class="fa fa-trash text-danger"> </i>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                            <div>
                                {!! html()->textarea('sort')->id('nestable-output')->style('display:none')->class('form-control')->placeholder('Nestable Output') !!}
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-success">
                        <a href="#" class="btn btn-sm btn-info-light submit-data">
                            <i class="fa fa-save"></i> Enregistrer
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
