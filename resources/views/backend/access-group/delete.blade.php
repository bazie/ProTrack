{!! html()->form('DELETE', route($page->code.'.destroy', $data->id))->id('form-create-'.$page->code)->class('form form-horizontal')->open() !!}
<div class="row">
    <div class="col-md-12">
        <label class="control-label h6">Êtes-vous sûr de vouloir supprimer l'enregistrement ?</label>
        <div class="info-data">
            <div class="panel">
                <div class="panel-body panel-dark bg-dark">
                    @foreach(collect(json_decode($data,TRUE))->except(['id','created_at','updated_at','deleted_at']) as $key => $value)
                        <p>
                            <code>{{ $key }}</code>
                            <span class="text-danger">:</span>
                            <span class="text-info">{{ $value }}</span>
                        </p>
                    @endforeach
                    <p class="text-info">Nombre total d'utilisateurs : {{ $data->users->count() }} </p>
                    <p class="mt-2 text-info">
                        <span class="text-danger">Attention!</span>
                        <span class="text-info">Les données supprimées ne peuvent pas être récupérées.</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <span class="message"></span>
        </div>
    </div>
</div>
{!! html()->hidden('table-id','datatable')->id('table-id') !!}
{!! html()->form()->close() !!}
<script>
    $('.modal-title').html('<i class="mdi mdi-delete-forever"></i> Supprimer {{ $page->title }}');
    $('.submit-data').html('<i class="fa fa-trash"></i> Supprimer');
</script>
