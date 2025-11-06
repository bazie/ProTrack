{!! html()->form('DELETE', route($page->code.'.destroy', $data->id))->id('form-create-'.$page->code)->class('form form-horizontal')->open() !!}
<div class="row">
    <div class="col-md-12">
        <label class="control-label h6">Êtes-vous sûr de vouloir supprimer ce menu</label>
        <div class="info-data">
            <div class="panel">
                <div class="panel-body panel-dark bg-dark">
                    @foreach(collect(json_decode($data,TRUE))->except(['id','created_at','updated_at']) as $key => $value)
                        <p>
                            <code>{{ $key }}</code>
                            <span class="text-danger">:</span>
                            <span class="text-info">{{ $value }}</span>
                        </p>
                    @endforeach
                    <div class="mt-3">
                        @if($data->access_menu->count() > 0)
                            <p>
                                <span class="text-info">Menu digunakan oleh :</span>
                                @foreach($data->access_menu as $access)
                                    <span class="badge badge-info">{{ $access->access_group->name }}</span>
                                @endforeach
                            </p>
                            <p>
                                <span class="text-danger">Si vous supprimez ceci, les donnnées d'accès au menu associées seront également supprimées.</span>
                            </p>
                        @endif
                        <p>
                            <span class="text-danger">Attention!</span>
                            <span class="text-info">Les données supprimées ne peuvent pas être récupérées.</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <span class="message"></span>
    </div>
</div>
{!! html()->hidden('function')->value('loadMenu,sidebarMenu')->id('function') !!}
{!! html()->form()->close() !!}
<script>
    $('.modal-title').html('<i class="mdi mdi-delete-forever"></i> Supprimer {{ $page->title }}');
</script>
