<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderFormValidation;
use function PHPUnit\Framework\fileExists;

class SliderController extends Controller
{

    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }


    public function create()
    {
        return view('admin.slider.create');
    }

    private function save(Slider $slider, Request $request)
    {
        $slider->heading = $request->input('heading');
        $slider->description = $request->input('description');
        $slider->link = $request->input('link');
        $slider->link_name = $request->input('link_name');
        $slider->status = $request->input('status') == TRUE? '1': '0';
        if($request->hasFile('image'))
        {
            $destination = 'assets/uploads/slider/'.$slider->image;
            if(fileExists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension =$file->getClientOriginalExtension();
            $filename = time(). '.'.$extension;
            $file->move('assets/uploads/slider/',$filename);
            $slider->image = $filename;
        }
        $slider->save();
    }

    public function store(SliderFormValidation $request)
    {
        $slider = new Slider;
        $this->save($slider, $request);
        return redirect('/sliders')->with('status', 'Slider added successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderFormValidation $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $this->save($slider, $request);
        return redirect('/sliders')->with('status', 'Slider updated successfully.');
    }


    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $destination = 'assets/uploads/slider/'.$slider->image;
        if(fileExists($destination))
        {
            File::delete($destination);
        }
        $slider->delete();
        return redirect('/sliders')->with('status', 'Slider deleted successfully');
    
    }
}
