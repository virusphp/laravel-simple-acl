@if (session('message'))
<div class="alert alert-info">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	{!! session('message') !!}
</div>
@endif

@if (session('trash-message'))
	<?php list($message, $postId) = session('trash-message') ?>
	{!! Form::open(['method' => 'PUT', 'route' => ['blog.restore', $postId]]) !!}
		<div class="alert alert-info">
			{{ $message }}
				<button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i> Undo</button>
		</div>
	{!! Form::close() !!}
@endif

@push ('scripts')
<script>
	window.setTimeout(function() {
    	$(".alert").fadeTo(500, 0).slideUp(500, function(){
        	$(this).remove(); 
    	});
	}, 4000);
</script>
@endpush
