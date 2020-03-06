<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\License;
use App\Manufacture;
use App\Category;
use App\Supplier;

class LicenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('license.index');
    }
    public function datalicense(){
        $license = License::select(['id','software_name','product_key','license_name','license_email','created_by','created_at','updated_at']);
        return DataTables::of($license)->addColumn('action', function($license){
            return '
            <a href="'.route('license.show',$license->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
            <a href="'.route('license.edit',$license->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <div class="btn-group">    
             <form method="POST" action="'.route('license.destroy',$license->id).'">
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
        $manufacture = Manufacture::pluck('manufacture','id');
        $category = Category::pluck('category','id');
        $supplier = Supplier::pluck('supplier_name','id');
        return view('license.create',compact('manufacture','category','supplier'));
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
        'software_name' => 'required',
        'id_category' => 'required',
        'product_key' => 'required',
        'id_manufacture' => 'required',
        'license_name' => 'required',
        'purchase_order' => 'required',
        'purchase_cost' => 'required',
        'purchase_date' => 'required',
        ]);
        License::create([
            'software_name' => $request->software_name,
            'id_category' => $request->id_category,
            'product_key' => $request->product_key,
            'id_manufacture' => $request->id_manufacture,
            'license_name' => $request->license_name,
            'purchase_order' => $request->purchase_order,
            'purchase_cost' => $request->purchase_cost,
            'purchase_date' => $request->purchase_date,
            'created_by' => Auth::user()->name
        ]);
        return redirect()->route('license.index')->with('success','Data license has been saved');
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
        $license = License::find($id);
        $manufacture = Manufacture::pluck('manufacture','id');
        $category = Category::pluck('category','id');
        $supplier = Supplier::pluck('supplier_name','id');
        return view('license.show',compact('license','category','manufacture','supplier'));
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
        $license = License::find($id);
        $manufacture = Manufacture::pluck('manufacture','id');
        $category = Category::pluck('category','id');
        $supplier = Supplier::pluck('supplier_name','id');
        return view('license.edit',compact('license','category','manufacture','supplier'));
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
        'software_name' => 'required',
        'id_category' => 'required',
        'product_key' => 'required',
        'id_manufacture' => 'required',
        'license_name' => 'required',
        'purchase_order' => 'required',
        'purchase_cost' => 'required',
        'purchase_date' => 'required',
        ]);
        $license = License::find($id);
        $license->created_by = Auth::user()->name;
        $input = $request->all();
        $license->update($input);

        return redirect()->route('license.index')->with('success','Data license has been updated');


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
        $license = License::find($id);
        $license->delete();

        return redirect()->route('license.index')->with('success','License deleted successfully');
    }
}
