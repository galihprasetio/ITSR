<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Manufacture;

class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('manufactures.index');
    }
    public function datamanufacture(){
        $manufacture = Manufacture::select(['id','manufacture','phone','email','created_by','created_at','updated_at']);
        return DataTables::of($manufacture)->addColumn('action', function($manufacture){
            return '
            <a href="'.route('manufacture.show',$manufacture->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
            <a href="'.route('manufacture.edit',$manufacture->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <div class="btn-group">    
             <form method="POST" action="'.route('manufacture.destroy',$manufacture->id).'">
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
        return view('manufactures.create');
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
            'manufacture' => 'required'
            ]);
        Manufacture::create([
            'manufacture' => $request->manufacture,
            'url' => $request->url,
            'phone' => $request->phone,
            'email' => $request->email,
            'created_by' => Auth::user()->name
        ]);
        return redirect()->route('manufacture.index')->with('success','Data has been saved');
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
        $manufacture = Manufacture::find($id);
        return view('manufactures.show',compact('manufacture'));
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
        $manufacture = Manufacture::find($id);
        return view('manufactures.edit',compact('manufacture'));
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
            'manufacture' => 'required'
        ]);
        $manufacture = Manufacture::find($id);
        $manufacture->manufacture = $request->manufacture;
        $manufacture->url = $request->url;
        $manufacture->phone = $request->phone;
        $manufacture->email = $request->email;
        $manufacture->created_by = Auth::user()->name;
        $manufacture->save();

        return redirect()->route('manufacture.index')->with('success','Data has been updated');
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
        $manufacture = Manufacture::find($id);
        $manufacture->delete();
       //$asset = Assets::find($id);
      // Assets::destroy($id);
       return redirect()->route('manufacture.index')->with(['success' => 'Manufacture deleted successfully', 'class' => 'close']);
    }
}
