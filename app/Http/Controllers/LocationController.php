<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('locations.index');
    }
    public function datalocation(){
        $location = Location::select(['id','location','created_by','created_at','updated_at']);
        return DataTables::of($location)->addColumn('action', function($location){
            return '
            <a href="'.route('location.show',$location->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
            <a href="'.route('location.edit',$location->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <div class="btn-group">    
             <form method="POST" action="'.route('location.destroy',$location->id).'">
             '.csrf_field().'
             <input type="hidden" name="_method" value="DELETE" />
             <button type="submit" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-trash"></i> Delete</button>
             </form> 
             </div>
            '
            ;
        })
        ->editColumn('updated_at', function ($user) {
            return $user->updated_at->diffForHumans();
            })->filterColumn('updated_at', function ($query, $keyword) {
                     $query->whereRaw("DATE_FORMAT(updated_at,'%Y/% m/%d') like ?", ["%$keyword%"]);
                    })     
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'location' => 'required'
        ]);
        Location::create([
            'location' => $request->location,
            'created_by' => Auth::user()->name
        ]);
        return redirect()->route('location.index')->with('success','Data has been created');
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
        $location = Location::find($id);
        return view('locations.show',compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $location = Location::find($id);
        return view('locations.edit',compact('location'));
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
        //
        $request->validate([
            'location' => 'required'
        ]);
        $location = Location::find($id);
        $location->location = $request->location;
        $location->created_by = Auth::user()->name;
        $location->save();

        return redirect()->route('location.index')->with('success','Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $location = Location::find($id);
        $location->delete();
       //$asset = Assets::find($id);
      // Assets::destroy($id);
       return redirect()->route('location.index')->with(['success' => 'Location deleted successfully', 'class' => 'close']);
    }
}
