<div class="panel shadow-sm">
    <div class="panel-body">
        <div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! html()->span()->text("Lib Processus")->class("control-label") !!}
					{!! html()->p($data->lib_processus)->class("form-control") !!}
				</div>
                <div class="form-group">
                    {!! html()->span()->text("Description")->class("control-label") !!}
                    {!! html()->p($data->description)->class("form-control") !!}    
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
    $('.modal-title').html('<i class="fa fa-search"></i> Detail Data {!! $page->title !!}');
</script>
