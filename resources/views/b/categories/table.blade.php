<div class="table-responsive">
	<table class="table table-bordered table-striped jambo_table bulk_action">
		<thead>
			<tr>
				<th># No </th>
				<th>Nama Kategori</th>
				<th>Jumlah Post</th>
				<th>Di Buat</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		@foreach($categories as $c)	
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $c->name }}</td>
				<td>{{ $c->posts->count() }}</td>
				<td>{{ tanggalIndo($c->created_at) }}</td>
				<td>
					{!! Form::open(['route' => ['categories.destroy',$c->id], 'method' => 'DELETE']) !!}
						<a href="{{ route ('categories.edit',$c->id) }}" class="btn btn-xs btn-warning">
							<i class="fa fa-pencil"></i> 
						</a>
						@if($c->id == config('cms.default_category_id'))
							<button type="submit" class="btn btn-xs btn-danger" onclick="return false" disabled>
								<i class="fa fa-trash-o"></i> 
							</button>
						@else
							<button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Apakah kamu yakin ingin Menghapus data ini')" >
								<i class="fa fa-trash-o"></i> 
							</button>
						@endif
						
					{!! Form::close() !!}
				</td>
			</tr>
		@endforeach	
		</tbody>
	</table>
</div>