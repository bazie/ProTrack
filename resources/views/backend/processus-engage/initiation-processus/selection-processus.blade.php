<div class="col-12 col-lg-4">
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">{{ $processus->lib_processus }} </h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <p><i>{{ $processus->description }}</i></p>
        </div>
    </div>
</div>
<div class="col-12 col-lg-8">
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Les étapes </h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Etape</th>
                            <th scope="col">Profil</th>
                            <th scope="col">Delai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etapes as $etape)
                            <tr>
                                <th scope="row">{{ $etape->ordre }}</th>
                                <td>{{ $etape->nom_etape }}</td>
                                <td>{{ $etape->level->name }}</td>
                                <td>{{ $etape->delai }} jours</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <h4 class="box-title">Durée estimatif du processus : {{ $dureeProcessus }} jours</h4>
        </div>
    </div>
    <!-- /.box -->
</div>
<div class="col-md-12 text-center">
    <button type="button" class="btn btn-primary btn-lg btn-initier-processus" id="btn-initier-processus"
        data-processus-id="{{ $processus->id }}">
        <i class="mdi mdi-play-circle"></i> Initier le processus
    </button>
</div>

