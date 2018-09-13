<div class="table-responsive">
	<table class="table table-bordered table-striped jambo_table bulk_action">
	<thead>
		<tr>
			<th># No </th>
			<th>Nama</th>
			<th>Created at</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		
		<tr>
			<td>1</td>
			<td>Wisata</td>
			<td>Senin Selasa</td>
			<td>
				{!! Form::open(['route' => ['categories.destroy',1], 'method' => 'DELETE']) !!}
					<a href="{{ route ('categories.edit',1) }}" class="btn btn-xs btn-warning">
						<i class="fa fa-pencil"></i> 
					</a>
					<button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Apakah kamu yakin ingin Menghapus data ini')" >
						<i class="fa fa-trash-o"></i> 
					</button>
				{!! Form::close() !!}
			</td>

		</tr>
		
	</tbody>
	</table>
</div>
