<?php

namespace App\Http\Controllers\b;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use File;
use Session;
use DB;

class PostController extends BackendController
{
    protected $uploadPath;

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = config('cms.image.directory');
    }

    public function index(Request $request)
    {
        if(is_Null($request->filter)){
            $posts = Post::with('user')->latest()->paginate(10);
            $postCount = Post::count();
        }else{
            $posts = $this->filterPost($request);
            $postCount = Post::count();
        }
        return view('b.blogs.index', compact('posts', 'postCount'));
    }


    public function create(Post $post)
    {
        return view('b.blogs.create', compact('post'));
    }


    public function store(PostRequest $request)
    {

        $data = $this->handleRequest($request);
        $newPost = Post::create($data);
        return redirect(route('blogs.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $post= Post::find($id);
        return view('b.blogs.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
      $post = Post::find($id);
	  $oldImage = $post->image;
      $data = $this->handleRequest($request);

      $post->update($data);
	  if ($oldImage !== $post->image) {
			$this->deleteImage($oldImage);
	  }

      Session::flash('flash_notification', [
          'level'=>'info',
          'message'=>'<h4><i class="icon fa fa-check"></i> Berhasil !</h4> Post '.$post->title.' telah di Update.'
      ]);

      return redirect(route ('blogs.index'));
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if(!empty($post->image)){
        $data['image'] = $this->deleteImage($post->image);
        }
        $post->delete();

         Session::flash('flash_notification', [
            'level'=>'danger',
            'message'=>'<h4><i class="icon fa fa-trash-o"></i>  !</h4> Post '.$post->title.' telah di hapus.'
        ]);
        return redirect('route'('blogs.index'));
    }

    public function tongSampah(){
        $posts = Post::onlyTrashed()->paginate(10);
        $postCount = count($posts);
        return view('b.blogs.tongsampah', compact('posts', 'postCount'));
    }

    public function restore($id)
	{
        $post = Post::onlyTrashed()->findOrFail($id);
		$post->restore();
		return redirect('route'('blogs.index'));
    }

    public function forceDestroy($id)
	{
		$post = Post::withTrashed()->findOrFail($id);
		$post->forceDelete();
        return redirect('route'('blogs.index'));
	}

    public function publish($id)
    {
        $publish = Post::find($id);
        $data = date('Y-m-d H:i:s');
        $publish->update([
            'published_at' => $data,
        ]);
        return redirect('route'('blogs.index'));

    }

    public function deleteImage($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'b/images/blogs'
            . DIRECTORY_SEPARATOR . $filename;
        $thumbnail = base_path() . '/public/b/images/blogs/thumb_'.$filename;

        return File::delete($path, $thumbnail);
    }

    public function handleRequest($request)
    {
      	$data = $request->all();

		if ($request->hasFile('image')) {

			$width     = config('cms.image.thumbnail.width');
			$height    = config('cms.image.thumbnail.height');
			$image     = $request->file('image');
			$extension = $image->guessClientExtension();
			$fileName  = 'blogs_' . str_random(40) . '.' . $extension;
			$destination = $this->uploadPath;

			$successUpload = Image::make($image->getRealPath())
				->resize(1920, 920)->save($destination . "/" . $fileName);

			if ($successUpload)
			{
				$thumbnail = "thumb_". $fileName;
				Image::make($image->getRealPath())
					->resize($width,$height)
					->save($destination . "/" . $thumbnail);
			}

			$data['image'] = $fileName;
		}

        return $data;
    }

    public function filterPost($request)
    {
        if ($request->filter == 'publish') {
            $posts  = Post::with('user')->published()->paginate(10);
        } elseif($request->filter == 'schedule') {
            $posts  = Post::with('user')->schedule()->paginate(10);
        }else{
            $posts  = Post::with('user')->draft()->paginate(10);
        }

        return $posts;
    }
}
