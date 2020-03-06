<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Supplier;
use DB;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('supplier.index');
    }
    public function datasupplier(){
        $supplier = Supplier::select(['id','supplier_name','contact_name','phone','email']);
        return DataTables::of($supplier)->addColumn('action', function($supplier){
            return '
            <a href="'.route('supplier.show',$supplier->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
            <a href="'.route('supplier.edit',$supplier->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <div class="btn-group">    
             <form method="POST" action="'.route('supplier.destroy',$supplier->id).'">
             '.csrf_field().'
             <input type="hidden" name="_method" value="DELETE" />
             <button type="submit" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-trash"></i> Delete</button>
             </form> 
             </div>
             '
            ;
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
        return view('supplier.create');
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
            'supplier_name' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'contact_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required'
        ]);
        Supplier::create([
            'supplier_name' => $request->supplier_name,
            'address' => $request->address,
            'zip' => $request->zip,
            'contact_name' => $request->contact_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'created_by' => Auth::user()->name
        ]);
        return redirect()->route('supplier.index')->with('success','Data has been saved');
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
        $supplier = Supplier::find($id);
        return view('supplier.show',compact('supplier'));
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
        $supplier = Supplier::find($id);
        return view('supplier.edit',compact('supplier'));
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
            'supplier_name' => 'required',
            'address' => 'required',
            'zip' => 'required',
            'contact_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required'
        ]);
        $supplier = Supplier::find($id);
        $supplier->supplier_name =  $request->supplier_name;
        $supplier->address =  $request->address;
        $supplier->zip= $request->zip;
        $supplier->contact_name = $request->contact_name;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->city = $request->city;
        $supplier->state = $request->state;
        $supplier->country = $request->country;
        $supplier->created_by = Auth::user()->name;
        $supplier->save();
        return redirect()->route('supplier.index')->with('success','Data has been updated');
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
        $supplier = Supplier::find($id);
        $supplier->delete();
       //$asset = Assets::find($id);
      // Assets::destroy($id);
       return redirect()->route('supplier.index')->with(['success' => 'Supplier deleted successfully', 'class' => 'close']);
    }
}
