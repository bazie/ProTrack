<div class="row">
    <div class="col-12">
        <div class="box">
            <div class="box-header">
                <h4 class="box-title">Enregistrement {!! $page->title ?? 'Page Name' !!}</h4>
                @if ($user->create)
                    <button type="button" class="btn-action pull-right btn btn-success btn-sm" data-title="Ajouter"
                        data-action="create" data-url="{!! $page->url ?? '' !!}">
                        <span class="fa fa-plus-circle"></span> Ajouter
                    </button>
                @endif
            </div>
            <div class="box-body">
                <table id="datatable" class="table table-bordered table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th class="w-0">No</th>
                            <th>Processus</th>
                            <th>Etapes</th>
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
