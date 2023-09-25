<?php

namespace App\Http\Controllers;

use App\Http\Requests\IventRequest;
use App\Models\Ivent;
use Illuminate\Support\Facades\Auth;
use Cloudinary;

class IventController extends Controller
{
    public function ivent(Ivent $ivent)
    {
        return view('ivents.ivent')->with(['ivents' => $ivent->getPaginateByLimit()]);
    }
    
    public function ivents_create()
    {
        return view('ivents.create');
    }
    
    public function ivents_show(Ivent $ivent)
    {
        return view('ivents.show')->with(['ivent' => $ivent, 'comments' => $ivent->comments()->get()]);
    }

    public function ivents_store(IventRequest $request, Ivent $ivent)
    {
        $input = $request['ivent'];
        if($request->file('photo')){
            $image_url = Cloudinary::upload($request->file('photo')->getRealPath())->getSecurePath();
            $input += ['photo' => $image_url];
        }
        $input += ['user_id' => Auth::id()];
        $ivent->fill($input)->save();
        return redirect('/ivents/' . $ivent->id);
    }
    
    public function ivents_update(IventRequest $request, Ivent $ivent)
    {
        $input_ivent = $request['ivent'];
        $ivent->fill($input_ivent)->save();
        return redirect('/ivents/'. $ivent->id);
    }
    
    public function ivents_edit(Ivent $ivent)
    {
        return view('ivents.edit')->with(['ivent' => $ivent]);
    }
    
    public function ivents_delete(Ivent $ivent)
    {
        $ivent->delete();
        return redirect('/ivents/'. $ivent->id);
    }
}
