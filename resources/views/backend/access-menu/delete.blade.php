{!! html()->form('DELETE', route($page->code.'.destroy', $data->id))->id('form-create-'.$page->code)->class('form form-horizontal')->open() !!}
<div class="row">
    <div class="col-md-12">
        <label class="control-label h6">
            Êtes-vous sûr de vouloir supprimer l'accès au menu de <b>{!! $data->name !!}</b> ?
        </label>
        <div class="info-data">
            <div class="panel">
                @if(collect($data->access_menu)->count() > 0)
                    <div class="panel-body panel-dark bg-dark">
                        <div class="row">
                            @foreach(collect($data->access_menu)->except(['id','created_at','updated_at','deleted_at']) as $key => $value)
                                <div class="col-auto m-2">
                                    <code>{{ $key+1 }}</code>
                                    <span class="text-danger">:</span>
                                    <span class="text-info">{!! $value->menu->title !!}</span>
                                </div>
                            @endforeach
                            <div class="m-2">
                                Accès total aux menus : <b>{!! collect($data->access_menu)->count() !!}</b><br>
                                Nombre total d'utilisateurs : <b>{!! $data->users->count() !!}</b> 
                            </div>
                        </div>
                        <div class="m-2">
                            <span class="text-danger">Attention!</span>
                            <span class="text-info">Les données supprimées ne peuvent pas être récupérées.</span>
                        </div>
                    </div>
                @else
                    <div class="panel-body panel-dark bg-dark">
                        <p class="text-info">
                            Il n'y a aucune donnée d'accès au menu qui peut être supprimée.
                        </p>
                        <p class="mt-2 text-info">
                            Veuillez supprimer l'accès au groupe <b class="text-uppercase">{!! $data->name !!}</b>
                            <a class="link-danger" href="{!! url(config('master.app.url.backend').'/access-group') !!}">ici </a> s'il n'est pas utilisé.
                        </p>
                    </div>
                    <script>
                        $('.submit-data').hide();
                    </script>
                @endif
            </div>
            <div class="col-md-12">
                <span class="message"></span>
            </div>
        </div>
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{!! html()->form()->close() !!}
<script>
    $('.modal-title').html('<i class="mdi mdi-delete-forever"></i> Supprimer {{ $page->title }}');
    $('.submit-data').html('<i class="fa fa-trash"></i> Oui, Supprimer');
</script>
