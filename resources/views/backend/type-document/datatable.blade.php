$(document).ready(function () {
	$('#datatable').DataTable({
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
            { data: 'titre_type' , 'defaultContent':''},
			{data: 'template', defaultContent: '', render: function(data, type, row) {
                                                if (data) {
                                                    // "template_titre_type" comme texte, data comme URL
                                                    return `<a href="${data}" target="_blank">Template_${row.titre_type}</a>`;
                                                }
                                                return '';
                                            }
            },
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
})
