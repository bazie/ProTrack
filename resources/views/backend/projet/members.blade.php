<div class="col-12">
    <a href="{!! $page->url ?? '' !!}" class="pull-right btn btn-primary btn-sm" style = "margin-bottom: 15px;float:left">
        <span class="fa fa-arrow-left"></span> Retour à la liste des projets
    </a>
    <div class="box">
        <div class="box-header">
            <h4 class="box-title">Les membres du projet {{ $projet->short_name }}</h4>
            @if ($user->create)
                <button type="button" id="add_member" class="pull-right btn btn-success btn-sm">
                    <span class="fa fa-plus-circle"></span> Ajouter un membre
                </button>
            @endif
        </div>
        <div class="box-body">
            <table id="datatable-members" class="table table-bordered table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="w-0">No</th>
                        <th>Utilisateur</th>
                        <th>Email</th>
                        <th>Droit</th>
                        <th class="text-center w-0">Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#datatable-members').DataTable({
            searchDelay: 2000,
            responsive: true,
            lengthChange: true,
            searching: true,
            processing: true,
            serverSide: true,
            lengthMenu: [
                [10, 25, 50, 100, 200, 500, -1],
                [10, 25, 50, 100, 200, 500, "All"]
            ],
            ajax: "{{ url(config('master.app.url.backend') . '/membres-projet/projet/' . $projet->id) }}",
            language: {
                {{-- Uncomment this line to use Indonesian language --}}
                {{-- url: "{{ asset(config('master.app.web.assets').'/assets/vendor_components/datatable/french.json') }}" --}}
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    orderable: false,
                    className: 'text-center'
                },
                {
                    data: 'user.name',
                    name: 'user_id',
                    'defaultContent': ''
                },
                {
                    data: 'user.email',
                    name: 'user_id',
                    'defaultContent': ''
                },
                {
                    data: 'Droit',
                    'defaultContent': ''
                },
                {
                    data: 'action',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                }
            ]
        });
    })

    $(window.document).on('click', '.btn-action-member', function(e) {
        e.preventDefault();
        const id = $(this).data('id') ?? '';
        const title = $(this).data('title') ?? '';
        const action = $(this).data('action') ?? '';
        const modalId = $(this).data('modalId') ?? 'modal-master';
        const modalSize = $(this).data('size') ?? 'modal-lg';
        const bgClass = $(this).data('bgClass') ?? 'bg-default';
        const arguments = $(this).data('options') ?? '';
        const _targetTable = $(this).data('table') ?? '';
        const _targetFunction = $(this).data('function') ?? '';
        const url = "{{ url(config('master.app.url.backend') . '/membres-projet/projet/' . $projet->id) }}"
        const actionUrls = {
            'create': `${id_projet}/create`,
            'edit': `${id}/edit`,
            'delete': `delete/${id}`,
            'show': `${id}`
        };
        const urlExtension = actionUrls[action] || '';
        const modalOptions = {
            url: urlExtension ? `${url}/${urlExtension}${arguments}` : url + `${arguments}`,
            id: modalId,
            dlgClass: 'fade',
            bgClass: bgClass,
            title: title,
            width: 'whatever',
            size: modalSize,
            modal: {
                keyboard: false,
                backdrop: 'static',
            },
            ajax: {
                dataType: 'html',
                method: 'GET',
                cache: false,
                beforeSend() {
                    $.showLoading();
                },
                success() {
                    $.hideLoading();
                    $(`#${modalId}`).modal('show');
                    if (_targetTable) {
                        _targetTable.split(',').forEach((tableId) => $(`#${tableId}`).DataTable().ajax
                            .reload());
                    }
                    if (_targetFunction) {
                        targetFunction(_targetFunction);
                    }
                },
                error: function(xhr) {
                    $.hideLoading();
                    $.showError(xhr.status + ' ' + xhr.statusText);
                }
            },
        };

        $.loadModal(modalOptions);
    });
</script>
