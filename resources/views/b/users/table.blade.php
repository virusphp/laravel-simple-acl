<table class="table table-responsive table-bordered table-striped jambo_table bulk_action">
    <thead>
        <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
        </tr>
    </thead>
    <?php $no=1; ?>
    @foreach($users as $user)
    <tbody>
        <tr>
        <td scope="row">{{ $no++ }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td><span class="label label-success">{{ $user->roles->first()->name }}</span></td>
        <td>
            {!! Form::open(['route' => ['users.destroy',$user->id], 'method' => 'DELETE']) !!}
                <a href="{{ route ('users.edit',$user->id) }}" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="Edit User">
                    <i class="fa fa-pencil"></i>
                </a>
                <a href="{{ route ('users.password',$user->id) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Ganti Password">
                    <i class="fa fa-key"></i>
                </a>
                @if($user->id == config('cms.default_user_id'))
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
    </tbody>
    @endforeach
</table>