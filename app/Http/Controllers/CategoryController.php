<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('category.index');
    }
    public function datacategory(){
        $category = Category::select(['id','category','created_by','created_at','updated_at']);
        return DataTables::of($category)->addColumn('action', function($category){
            return '
            <a href="'.route('category.show',$category->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-eye-open"></i> Detail</a>
            <a href="'.route('category.edit',$category->id).'" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            <div class="btn-group">    
             <form method="POST" action="'.route('category.destroy',$category->id).'">
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
        return view('category.create');
        
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
            'category' => 'required'
        ]);

        Category::create([
            'category' => $request->category,
            'created_by' => Auth::user()->name
        ]);

        return redirect()->route('category.index')->with('success','Data has been created');
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
        $category = Category::find($id);
        return view('category.show',compact('category'));
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
        $category = Category::find($id);

        return view('category.edit',compact('category'));
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
            'category' => 'required'
        ]);
        $category = Category::find($id);
        $category->category = $request->category;
        $category->created_by = Auth::user()->name;
        $category->save();

        return redirect()->route('category.index')->with('success','Data has been updated');

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
        $category = Category::find($id);
        $category->delete();
       //$asset = Assets::find($id);
      // Assets::destroy($id);
       return redirect()->route('category.index')->with(['success' => 'Category deleted successfully', 'class' => 'close']);
    }
}
