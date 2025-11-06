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
            { data: 'code' , 'defaultContent':''},
			{ data: 'short_name' , 'defaultContent':''},
			{ data: 'donor.name', name: 'donor_id', defaultContent: '' },
			{ data: 'national_organisation.short_name', name: 'national_organisation_id', defaultContent: '' },
			{ data: 'grant_end_date' , 'defaultContent':''},
			{ data: 'manager_name' , 'defaultContent':''},
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
