<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ServiceRequest;
use DB;
use App\Department;
use Carbon\Carbon;

class ServiceRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('servicerequest.index');
    }
    public function listDraft()
    {
        $serviceRequest = DB::select('
        SELECT sr.id,doc_number, USER.name, department.department, doc_status,subject,sr.created_at 
        FROM service_request sr
        LEFT JOIN users USER 
        ON sr.id_requestor = USER.id
        LEFT JOIN department department
        ON USER.id_department = department.id
        WHERE sr.deleted_at is null');

        return view('servicerequest.draft',compact('serviceRequest'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $departments = Department::pluck('department','id');
        $department = DB::table('department')
        ->join('users','department.id','=','users.id_department')
        ->select('department.department')
        ->where('department.id',Auth::user()->id_department)->first();
        return view('servicerequest.create',compact('department','departments'));
        
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
           'subject' => 'required',
           'description' => 'required'
        ]);

        $input = $request->all();
        $input['created_by'] = Auth::user()->name;

        
    }
    public function draft(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'description' => 'required'
        ]);

        try {
            //code...
           
            if ($request->id) {
                # code...
                DB::table('service_request')->where('id',$request->id)
                ->update([
                'id_requestor' => Auth::user()->id,
                'subject' => $request->subject,
                'description' => $request->description,
                'doc_status' => 'Draft',
                'id_author' => Auth::user()->id,
                'created_by' => Auth::user()->name,
                'created_at' => Carbon::now()    
                ]);
            }else{
                DB::table('service_request')->insert([
                    'id_requestor' => Auth::user()->id,
                    'subject' => $request->subject,
                    'description' => $request->description,
                    'doc_status' => 'Draft',
                    'id_author' => Auth::user()->id,
                    'created_by' => Auth::user()->name,
                    'created_at' => Carbon::now()
                ]);
            }
            return response()->json(['success' => 'Data has been saved']);
        } catch (\Throwable $th) {
            //throw $th;
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departments = Department::pluck('department','id');
        $department = DB::table('department')
        ->join('users','department.id','=','users.id_department')
        ->select('department.department')
        ->where('department.id',Auth::user()->id_department)->first();
        $serviceRequest = ServiceRequest::find($id);
        $author = collect(DB::select('SELECT NAME as name FROM users usr 
        LEFT JOIN service_request ser 
        ON usr.id = ser.id_requestor
        WHERE ser.id ='.$id.''))->first();
        $reader = DB::table('users')->join('service_request','users.id','=','service_request.id_requestor')
        ->select('users.name')->where('service_request.id',$id)->first();
        return view('servicerequest.show',compact('serviceRequest','department','departments','author'));
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
        $departments = Department::pluck('department','id');
        $department = DB::table('department')
        ->join('users','department.id','=','users.id_department')
        ->select('department.department')
        ->where('department.id',Auth::user()->id_department)->first();
        $serviceRequest = ServiceRequest::find($id);
        $author = collect(DB::select('SELECT NAME as name FROM users usr 
        LEFT JOIN service_request ser 
        ON usr.id = ser.id_requestor
        WHERE ser.id ='.$id.''))->first();
        $reader = DB::table('users')->join('service_request','users.id','=','service_request.id_requestor')
        ->select('users.name')->where('service_request.id',$id)->first();
        return view('servicerequest.edit',compact('serviceRequest','department','departments','author'));
        // return dd($author);
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
         $serviceRequest = ServiceRequest::find($id);
         $serviceRequest->delete();
         return redirect()->route('serviceRequest.listDraft')->with('success','Data has been deleted');
         
    }
    // public function delete(Request $request){
    //     DB::table('service_request')->where('id',$request->id)
    //     ->update([
    //         'deleted_at' => Carbon::now()
    //     ]);

    // }
}
