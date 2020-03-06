<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use DB;
use App\Assets;
use App\Accessories;
use App\Manufacture;
use App\Category;
use App\Location;
use Illuminate\Support\Facades\Storage;

class AccessoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('accessories.index');
    }
    public function dataaccessories(){
        //$assets = Assets::select(['id','asset_name','asset_tag','qty','location']);
        
        $accessories = DB::table('accessories')
        ->join('location','accessories.id_location','=','location.id')
        ->select('accessories.id as id','accessories.accessories_name','accessories.order_number','accessories.qty','location.location as location','accessories.created_at','accessories.updated_at as updated_at')
        ->where('accessories.deleted_at',null);
        return DataTables::of($accessories)->addColumn('action', function($accessories){
            return '
             
             <a href="'.route('accessories.show',$accessories->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
             <a href="'.route('accessories.edit',$accessories->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i> Edit</a>  
             <div class="btn-group">    
             <form method="POST" action="'.route('accessories.destroy',$accessories->id).'">
             '.csrf_field().'
             <input type="hidden" name="_method" value="DELETE" />
             <button type="submit" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-trash"></i> Delete</button>
             </form> 
             </div>
             
             ';
        })
        // ->editColumn('assets.updated_at', function ($user) {
        //     return $user->updated_at->diffForHumans();
        //     })->filterColumn('assets.updated_at', function ($query, $keyword) {
        //              $query->whereRaw("DATE_FORMAT(assets.updated_at,'%Y/% m/%d') like ?", ["%$keyword%"]);
        //             })
        ->filterColumn('location', function($query, $keyword){
            $query->whereRaw("location.location like ?",["%$keyword%"]);
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
        $manufacture = Manufacture::pluck('manufacture','id');
        $location = Location::pluck('location','id');
        return view('accessories.create',compact('manufacture','location'));
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
        'id_manufacture' => 'required',   
        'accessories_name' => 'required',
        'order_number' => 'required',
        'qty' => 'required',
        'min_qty' => 'required',
        'id_location' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['image'])){
            $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/accessories/'), $input['image']);
        }else {
            $input = array_except($input, array('image'));
        }
        
        $input['created_by'] = Auth::user()->name;
        Accessories::create($input);
        return redirect()->route('accessories.index')->with('success','Data accessories has been inserted');
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
        $manufacture = Manufacture::pluck('manufacture','id');
        $location = Location::pluck('location','id');
        $accessories = Accessories::find($id);
        return view('accessories.show',compact('accessories','manufacture','location'));
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
        $manufacture = Manufacture::pluck('manufacture','id');
        $location = Location::pluck('location','id');
        $accessories = Accessories::find($id);
        return view('accessories.edit',compact('accessories','manufacture','location'));
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
            'id_manufacture' => 'required',   
            'accessories_name' => 'required',
            'order_number' => 'required',
            'qty' => 'required',
            'min_qty' => 'required',
            'id_location' => 'required'
            ]);
            $input = $request->all();
            $accessories = Accessories::find($id);
            if(!empty($input['image'])){
                Storage::delete(public_path('storage/accessories/'),$accessories->image);
                $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('storage/accessories/'), $input['image']);
            }else {
                $input = array_except($input, array('image'));
            }
            
            $input['created_by'] = Auth::user()->name;
            
            $accessories->update($input);
            return redirect()->route('accessories.index')->with('success','Data accessories has been updated');
            
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
        $accessories = Accessories::find($id);
        $accessories->delete();

        return redirect()->route('accessories.index')->with('success','Accessories deleted successfully');
    }
}
