<?php

namespace App\Http\Controllers;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::all();
        return view('index' ,compact('activities'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // dd($request)
        // dd(request('name'));
        // dd($request->name);
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => ['required','max:50'],
            
        ]);

        $inserted = Activity::create([
            'name'=>$request->name
        ]);

        if($inserted){
            return redirect()->route('dashboard')->with([
                'success'=>'Data have been record.'
            ]);
        }else{
            return redirect()->route('create')->with([
                'error'=>'Data failed to record.'
            ]);
        }
        
    }
    public function edit (Activity $activity)
    {
        // dd($activity);
        return view('edit', ['activity' => $activity]);
    }

    public function update(Request $request, Activity $activity)
    {
        $validatedData = $request->validate([
            'name' => ['required','max:50'],
            
        ]);

        // $updated = Activity::where('id',$activity->id)
        // ->update([
        //     'name'=>$request->name
        // ]);

        // $updated = Activity::where('id',$activity->id)
        // ->update([
        //     'name'=>$request->name
        // ]);

        // $updated = Activity::find($activity->id);
        // $updated ->name = $request->name;
        // $updated ->save();

         $updated = $activity->update([
            'name'=>$request->name
         ]);
       
        if($updated){
            return redirect()->route('dashboard')->with([
                'success'=>'Data have been update.'
            ]);
        }else{
            return redirect()->route('edit')->with([
                'error'=>'Data failed to update.'
            ]);
        }
    }

    public function destroy (Activity $activity)
    {
        $deleted = $activity->delete();
       
        if($deleted){
            return redirect()->route('dashboard')->with([
                'success'=>'Data have been remove.'
            ]);
        }else{
            return redirect()->route('edit')->with([
                'error'=>'Data failed to remove.'
            ]);
        }
    }
}
    
