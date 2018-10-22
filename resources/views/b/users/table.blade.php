<div class="table-responsive">
	<table class="table table-bordered table-striped jambo_table bulk_action">
		<thead>
			<tr>
				<th># No </th>
				<th>Nama Akun</th>
				<th>Email</th>
				<th>Role</th>
				<th>Di Buat</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		@foreach($users as $u)	
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $u->name }}</td>
				<td>{{ $u->email }}</td>
				<td>-</td>
				<td>{{ tanggalIndo($u->created_at) }}</td>
				<td>
					{!! Form::open(['route' => ['users.destroy',$u->id], 'method' => 'DELETE']) !!}
						<a href="{{ route ('users.edit',$u->id) }}" class="btn btn-xs btn-warning">
							<i class="fa fa-pencil"></i> 
						</a>
						@if($u->id == config('cms.default_user_id'))
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
