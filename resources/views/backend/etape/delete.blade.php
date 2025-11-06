{!! html()->form('POST', route($page->code.'.destroy-etape'))->id('form-create-'.$page->code)->class('form form-horizontal')->open() !!}
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
                            <span class="text-info">{!! is_array($value) ? json_encode($value,true) : $value !!}</span>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <span class="message"></span>
        </div>
    </div>
    <input type="hidden" name="idEtape" value="{{ $data->id }}"/>
</div>
{!! html()->hidden('function')->value('loadList')->id('function') !!}
{!! html()->form()->close() !!}
<script>
    $('.modal-title').html('<i class="mdi mdi-delete-forever"></i> Supprimer Etape : {{ $data->nom_etape }}');
    $('.submit-data').html('<i class="fa fa-trash"></i> Supprimer');
</script>
