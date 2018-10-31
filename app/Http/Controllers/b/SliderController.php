<?php

namespace App\Http\Controllers\b;

use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use App\Http\Controllers\Controller;
use App\Slider;

use Intervention\Image\Facades\Image;
use File;
use Session;

class SliderController extends Controller
{
    protected $uploadPath;

    public function __construct()
    {
        $this->uploadPath = config('cms.image.dir');
    }


    public function index(Request $request)
    {
        if(is_Null($request->filter)){
            $sliders = Slider::latest()->paginate(10);
            $slidersCount = count($sliders);
        }else{
            $sliders = $this->filterSlider($request);
            $slidersCount = count($sliders);
        }
        return view('b.sliders.index', compact('sliders', 'slidersCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Slider $slider)
    {
        return view('b.sliders.create', compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $data = $this->handleRequest($request);
        $slider = Slider::create($data);
        Session::flash('flash_notification', [
            'level'=>'info',
            'message'=>'<h4><i class="icon fa fa-check"></i> Berhasil !</h4> Slider '.$slider->content.' telah di Buat.'
        ]);
        return redirect(route('sliders.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('b.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $oldImage = $slider->image;
        $data = $this->handleRequest($request);

        $slider->update($data);
        if ($oldImage !== $slider->image) {
              $this->deleteImage($oldImage);
        }

        Session::flash('flash_notification', [
            'level'=>'info',
            'message'=>'<h4><i class="icon fa fa-check"></i> Berhasil !</h4> slider '.$slider->title.' telah di Update.'
        ]);

        return redirect(route ('sliders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);

        if(!empty($slider->image)){
        $data['image'] = $this->deleteImage($slider->image);
        }
        $slider->delete();

         Session::flash('flash_notification', [
            'level'=>'danger',
            'message'=>'<h4><i class="icon fa fa-trash-o"></i>  !</h4> slider '.$slider->title.' telah di masuk Tong Sampah.'
        ]);
        return redirect('route'('sliders.index'));
    }

    public function deleteImage($filename)
    {
        $path = public_path() . DIRECTORY_SEPARATOR . 'f/images/slider'
            . DIRECTORY_SEPARATOR . $filename;
        $thumbnail = base_path() . '/public/f/images/slider/thumb_'.$filename;

        return File::delete($path, $thumbnail);
    }

    public function handleRequest($request)
    {
      	$data = $request->all();

		if ($request->hasFile('image')) {

			$width     = config('cms.image.sliders.width');
			$height    = config('cms.image.sliders.height');
			$image     = $request->file('image');
			$extension = $image->guessClientExtension();
			$fileName  = 'sliders_' . str_random(40) . '.' . $extension;
			$destination = $this->uploadPath;

			$successUpload = Image::make($image->getRealPath())
				->resize(1000, 400)->save($destination . "/" . $fileName);

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

    public function filterSlider($request)
    {
        if ($request->filter == 'publish') {
            $sliders  = Slider::startAt()->finishAt()->paginate(10);
        } elseif($request->filter == 'schedule') {
            $sliders  = Slider::schedule()->paginate(10);
        }elseif($request->filter == 'expired'){
            $sliders  = Slider::expired()->paginate(10);
        }else{
            $sliders  = Slider::draft()->paginate(10);
        }

        return $sliders;
    }
}
