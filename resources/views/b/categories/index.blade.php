@extends('layouts.b.master')
@section('content')
     <!-- page content -->
<div class="right_col" role="main">
  <div class="">

		<div class="page-title">

			<div class="title_left">
				<ul class="breadcrumb">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li class="active">Category</li>
				</ul>
			</div>

			@include('b.categories.partials.search')	

		</div>

    <div class="clearfix"></div>
    
	<div class="col-md-12 col-sm-12 col-xs-12">
		<p><a href="{{ route('categories.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> </a></p>

		<div class="x_panel">

		<div class="x_content">

    		@include('b.categories.table')
		<!-- paginate -->
			<div class="row">
				<div class="col-sm-5 pull-left">
				
				</div>
				<div class="clearfix"></div>

				<div class="col-sm-7 pull-right">

				</div>
			</div>
		  </div>
		
		</div>
	</div>

  </div>	
</div>
@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('datatables/js/jquery.dataTables.min.js') }}" ></script>
<script type="text/javascript" src="{{ asset('datatables/js/dataTables.bootstrap4.min.js') }}" ></script>
<script>
  @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
			case 'info':
				toastr.info("{{ Session::get('message') }}");
				break;
			case 'warning':
				toastr.warning("{{ Session::get('message') }}");
				break;
			case 'success':
				toastr.success("{{ Session::get('message') }}");
				break;
			case 'error':
				toastr.error("{{ Session::get('message') }}");
				break;
    }
	@endif
	
	$(document).ready(function () {
        $('.table').removeAttr('style');
        ajaxLoad();
	});

	function ajaxLoad(){
            var term = $("#search").val();
            // $.fn.dataTable.ext.errMode = 'throw';
            $('#mytable').dataTable({
                "Processing": true,
                "ServerSide": true,
                "sDom" : "<t<p i>>",
                "iDisplayLength": 25,
                "bDestroy": true,
                "oLanguage": {
                    "sLengthMenu": "_MENU_ ",
                    "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries",
                    "sSearch": "Search Data :  ",
                    "sZeroRecords": "Tidak ada data",
                    "sEmptyTable": "Data tidak tersedia",
                    "sLoadingRecords": '<img src="{{asset('ajax-loader.gif')}}"> Loading...'
                },           
                "ajax": {
                    "url": "{{ route('category.search')}}",
                    "type": "GET",
                    "data": {                   
                        'term': term
                    }
                },
                "columns": [
                    {"mData": "no"},
                    {"mData": "name"},
                    {"mData": "created_at"}
                ]
            });
            oTable = $('#mytable').DataTable();  
            $('#searchInput').keyup(function(){
                oTable.search($(this).val()).draw() ;
                $('.table').removeAttr('style');
            }); 
        }   

</script>
@endpush