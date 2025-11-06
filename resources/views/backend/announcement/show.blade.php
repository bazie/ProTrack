<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Titre :</label>
                    {{  $data->title }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Cible :</label>
                    {{  $data->menu->title }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Date de debut :</label>
                    {{  date('d-m-Y', strtotime($data->start)) }} s/d {{  date('d-m-Y', strtotime($data->end)) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Urgence:</label>
                    <span
                        class="badge badge-{{  config('master.content.announcement.color.'.$data->urgency) }}">{{  config('master.content.announcement.status.'.$data->urgency) }}</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Statut de publication:</label>
                    {!! $data->publish ? "<span class='badge badge-success'>Ditampilkan</span>" : "<span class='badge badge-danger'>Tidak Ditampilkan</span>" !!}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Contenu de l'annonce:</label>
                    <div class="p-10 shadow-sm">
                        {!! $data->content !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Fichiers support :</label>
                     @if(!$data->file->isEmpty())
                        <ul>
                            @foreach($data->file as $file)
                                <li>
                                    <a href="{{  $file->link_download }}" class="fa fa-download"></a> | <a href="{{  $file->link_stream }}" target="_blank" class="fa fa-search"></a> | {{  $file->file_name }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <span class="badge badge-danger">Aucun fichiers</span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Relasi :</label>
                    @if($data->parent)
                        <a href="#" type="button" class="btn-action" data-title="Detail" data-action="show" data-url="announcement" data-id="{{ $data->parent_id }}" title="Affichier"> {{ $data->parent->title }}</a>
                    @else
                        -
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .modal-lg {
        max-width: 1000px !important;
    }
</style>
<script>
    $('.submit-data').hide();
    $('.modal-title').html('<i class="fa fa-search"></i> Detail {{ $page->title }}');
    getNotification();
</script>
