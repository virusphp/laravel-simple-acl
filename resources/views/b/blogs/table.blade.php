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
		<?php $no=1; ?>
		@foreach($posts as $post)
	  <tbody>
		<tr>
			<td scope="row">{{ $no++ }}</td>
			<td>{{ substr($post->title,0, 50) }}{{ strlen($post->title) > 50 ? "..." : "" }}</td>
			<td>{{ $post->user->name }}</td>
			<td>{{ $post->category->name }}</td>
			<td>
				<abbr title="{{ $post->dateFormatted(true) }}">{{ $post->dateFormatted() }}</abbr>
				{!! $post->publicationLabel() !!}
			</td>
			<td>
				{!! Form::open(['route' => ['blogs.destroy', $post->id], 'method' => 'DELETE']) !!}
				<a href="{{ route ('blogs.edit',$post->id) }}" class="btn btn-warning btn-xs">
					<i class="fa fa-pencil"></i>
				</a>
				<button type="submit"  class="btn btn-danger btn-xs" onclick="return confirm('Apakah kamu yakin ingin Menghapus data ini')" >
					<i class="fa fa-trash-o"></i>
				</button>
				{!! Form::close() !!}
			</td>
		</tr>
	  </tbody>
	  @endforeach
	</table>

	<div class="ln_solid clearfix"></div>
	<div>
		<div class="pull-left">
			{!! $posts->links() !!}
		</div>
		<div class="pull-right">
			{{ $postCount }} {{ str_plural('Item', $postCount) }}
		</div>
	</div>
