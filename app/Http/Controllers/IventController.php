<?php

namespace App\Http\Controllers;

use App\Http\Requests\IventRequest;
use App\Models\Ivent;
use Illuminate\Support\Facades\Auth;

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
        return view('ivents.show')->with(['ivent' => $ivent]);
    }

    public function ivents_store(IventRequest $request, Ivent $ivent)
    {
        $input = $request['ivent'];
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
}
