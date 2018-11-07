	<table class="table table-responsive table-bordered table-striped jambo_table bulk_action">
	  <thead>
		<tr>
			<th>#</th>
			<th>Title</th>
			<th>Author</th>
			<th>Category</th>
			<th>Date</th>
			<th>Action</th>
		</tr>
	  </thead>
		<?php 
			$no=1; 
			$request = request();	
		?>
		@foreach($posts as $post)
	  <tbody>
		<tr>
			<td scope="row">{{ $no++ }}</td>
			<td>{{ substr($post->title,0, 50) }}{{ strlen($post->title) > 50 ? "..." : "" }}</td>
			<td>{{ $post->user->name }}</td>
			<td>{{ $post->category->name }}</td>
			<td>
				{{ tanggalIndo($post->published_at) }}
				{!! $post->publicationLabel() !!}
			</td>
			<td>
				{!! Form::open(['route' => ['blogs.destroy', $post->id], 'method' => 'DELETE']) !!}
					<a href="{{ route ('blogs.publish',$post->id) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Publish">
						<i class="fa fa-upload"></i>
					</a>
					@if(check_permission($request, "Post@edit", $post->id))
						<a href="{{ route ('blogs.edit',$post->id) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Edit">
							<i class="fa fa-pencil"></i>
						</a>
					@else
						<a href="#" class="btn btn-warning btn-xs disabled" data-toggle="tooltip" data-placement="top" title="Edit" >
							<i class="fa fa-pencil"></i>
						</a>
					@endif

					@if(check_permission($request, "Post@edit", $post->id))
						<button type="submit"  class="btn btn-danger btn-xs" onclick="return confirm('Apakah kamu yakin ingin Hapus Ke tong Sampah data ini')" data-toggle="tooltip" data-placement="top" title="Tong Sampah">
							<i class="fa fa-trash-o"></i>
						</button>
					@else
						<button type="button" class="btn btn-danger btn-xs disabled" onclick="return false;" data-toggle="tooltip" data-placement="top" title="Tong Sampah">
							<i class="fa fa-trash-o"></i>
						</button>
					@endif
          <!-- <a href="{{ route ('blogs.forceDestroy',$post->id) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus Permanent">
						<i class="fa fa-eraser"></i>
					</a> -->
				{!! Form::close() !!}
			</td>
		</tr>
	  </tbody>
	  @endforeach
	</table>
