$.fn.initDatatable = function() {
    return this.DataTable({
        searchDelay: 2000,
		responsive: true,
		lengthChange: true,
        searching: true,
		processing: true,
		serverSide: true,
        lengthMenu: [[10, 25, 50, 100 ,200 , 500, -1], [10, 25, 50, 100 ,200 , 500, "All"]],
		ajax: "{{ url(config('master.app.url.backend').'/'.$url.'/data') }}",
		language: {
            {{-- Uncomment this line to use Indonesian language --}}
            {{--url: "{{ asset(config('master.app.web.assets').'/assets/vendor_components/datatable/french.json') }}"--}}
        },
		columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false, orderable: false, className: 'text-center' },
            { data: 'lib_processus' , 'defaultContent':''},
            { data: 'etapes'},
			{ data: 'action', orderable: false, searchable: false , className: 'text-center'}
		],
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'csv',
                text: 'CSV',
                className: 'btn btn-success btn-xs ms-10',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                text: 'Excel',
                className: 'btn btn-info btn-xs',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                className: 'btn btn-warning btn-xs',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                text: 'Imprimer',
                className: 'btn btn-danger btn-xs me-10',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ]
	});
}
   
$(document).ready(function () {
	$('#datatable').initDatatable();
})

let loadUrl;

function loadList(){
    $('.loading').show();
    $.ajax({
        url: loadUrl,
        type: 'GET',
        dataType: 'html',
        success: function(data) {
            $('#section-processus').html(data);
            $('.loading').hide();
            var updateOutput = function(e) {
                var list = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };
            let nestable = $('#nestable');

            nestable.nestable({
                group: 1,
                maxDepth: 1,
            }).on('change', updateOutput);

            updateOutput(nestable.data('output', $('#nestable-output')));
        },
        error: function(xhr, status, error) {
            alert('Une erreur est survenue lors du chargement des étapes.');
        }
    });
}


        
