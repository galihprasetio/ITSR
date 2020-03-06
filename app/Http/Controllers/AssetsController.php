<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use DB;
use App\Assets;
use App\Manufacture;
use App\Category;
use App\Location;
use Illuminate\Support\Facades\Storage;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('assets.index');
    }
    public function dataassets(){
        //$assets = Assets::select(['id','asset_name','asset_tag','qty','location']);
        
        $assets = DB::table('assets')
        ->join('location','assets.id_location','=','location.id')
        ->select('assets.id as id','assets.asset_name','assets.asset_tag','assets.qty','location.location as location','assets.created_at','assets.updated_at as updated_at')
        ->where('assets.deleted_at',null);
        return DataTables::of($assets)->addColumn('action', function($assets){
            return '
             
             <a href="'.route('assets.show',$assets->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
             <a href="'.route('assets.edit',$assets->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i> Edit</a>  
             <div class="btn-group">    
             <form method="POST" action="'.route('assets.destroy',$assets->id).'">
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
        $category = Category::pluck('category','id');
        $location = Location::pluck('location','id');
       // $manufacture = DB::table('manufacture')->get();
        return view('assets.create',compact('manufacture','category','location'));
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
        $this->validate($request,[
        'id_manufacture' => 'required',
        'id_manufacture' => 'required',
        'asset_tag' => 'required',
        'id_category' => 'required',
        'order_number' => 'required',
        'qty' => 'required',
        'min_qty' => 'required',
        'id_location' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['image'])){
            $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/assets/'), $input['image']);
        }else {
            $input = array_except($input, array('image'));
        }
        $input['created_by'] = Auth::user()->name;
        Assets::create($input);
        return redirect()->route('assets.index')->with(['success' => 'Asset created successfully', 'class' => 'close']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asset = Assets::find($id);
        $manufacture = Manufacture::pluck('manufacture','id');
        $category = Category::pluck('category','id');
        $location = Location::pluck('location','id');
       // $manufacture = DB::table('manufacture')->get();
        return view('assets.show',compact('asset','manufacture','category','location'));
    
    }
    public function searchAsset(Request $request){
        $data = DB::table('assets')->where('asset_tag',$request->id)->first();
        //$data = DB::table('assets')->where('asset_tag',3)->first();
        //$asset = DB::select('select * from assets where id =3');
        return response()->json($data);
        
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
        $asset = Assets::find($id);
        $manufacture = Manufacture::pluck('manufacture','id');
        $category = Category::pluck('category','id');
        $location = Location::pluck('location','id');
       // $manufacture = DB::table('manufacture')->get();
        return view('assets.edit',compact('asset','manufacture','category','location'));
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
        $this->validate($request,[
            'id_manufacture' => 'required',
            'asset_tag' => 'required',
            'id_category' => 'required',
            'order_number' => 'required',
            'qty' => 'required',
            'min_qty' => 'required',
            'id_location' => 'required'
            ]);
        $input = $request->all();
        $asset = Assets::find($id);
        if(!empty($input['image'])){
            Storage::delete(public_path('storage'),$asset->image);
            $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/assets/'), $input['image']);
        }else {
            $input = array_except($input, array('image'));
        }
        $input['created_by'] = Auth::user()->name;
        $asset->update($input);
        return redirect()->route('assets.index')->with(['success' => 'Asset updated successfully', 'class' => 'close']);
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
         $asset = Assets::find($id);
         $asset->delete();
        //$asset = Assets::find($id);
       // Assets::destroy($id);
        return redirect()->route('assets.index')->with(['success' => 'Asset deleted successfully', 'class' => 'close']);
       // return $asset;
    }
}
