<table class="table table-responsive table-bordered table-striped jambo_table bulk_action">
    <thead>
        <tr>
        <th>#</th>
        <th>Content</th>
        <th>Image</th>
        <th>Link</th>
        <th>Action</th>
        </tr>
    </thead>
    <?php $no=1; ?>
    @foreach($sliders as $slider)
    <tbody>
        <tr>
        <td scope="row">{{ $no++ }}</td>
        <td>{{ $slider->content }}</td>
        <td><img src="{{ $slider->ImageThumb }}" class="img-fluid" alt="{{ $slider->content }}" width="150"></td>
        <td><span class="label label-success">{{ $slider->link }}</span></td>
        <td>
                {!! Form::open(['route' => ['sliders.destroy', $slider->id], 'method' => 'DELETE']) !!}
                <a href="{{ route ('sliders.edit',$slider->id) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Edit">
					<i class="fa fa-pencil"></i>
				</a>
				<button type="submit"  class="btn btn-danger btn-xs" onclick="return confirm('Apakah kamu yakin ingin Hapus Ke tong Sampah data ini')" data-toggle="tooltip" data-placement="top" title="Tong Sampah">
					<i class="fa fa-trash-o"></i>
                </button>
				{!! Form::close() !!}
        </td>
        </tr>
    </tbody>
    @endforeach
</table>
