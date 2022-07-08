<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
//Models
use App\Models\business_info;
use Illuminate\Http\Request;

//Plugins
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;
use PDF;
class BusinessInfoController extends Controller
{

    public function index(Request $request)
    {
        if (!session()->has("user")) {
            return redirect("login");
        }
        
        $area_setting = area_setting::all();

        $business = business_info::latest()->get();
        if ($request->ajax()) {
            $data = business_info::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('checkbox', function($row){
                        $chk = '
                             <input type="checkbox" class="flat icheckbox_flat-green text-center checkBoxClass" id="checked"  name="ids" data-id="'.$row->business_id.'" name="table_records">';
                        return $chk;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->business_id.'" data-original-title="Edit" class="edit btn btn-info  btn-xs pr-4 pl-4 editBusiness"><i class="fa fa-pencil fa-lg"></i> </a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"   data-id="'.$row->business_id.'" data-original-title="Delete" class="btn btn-danger btn-xs pr-4 pl-4 deletebusiness"><i class="fa fa-trash fa-lg"></i> </a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->business_id.'" data-original-title="View" class="btn btn-primary btn-xs pr-4 pl-4 viewbusiness"><i class="fa fa-folder fa-lg"></i> </a>';
                         return $btn;
                 })
                   ->rawColumns(['checkbox','action'])
                    ->make(true);





        }

        return view('pages.AdminPanel.business',[compact('business')]);
    }
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'telephone'  => 'required',
            'mobile'  => 'required',
            'businessname' => 'required',
            'businessaddress' => 'required',
            'businesstype' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>0,'error'=>$validator->errors()]);
        }else{


        business_info::updateOrCreate(['business_id' => $request->business_id],
        ['lastname' => $request->lastname,
        'firstname' => $request->firstname,
        'middlename'=> $request->middlename,
        'telephone_no'=>$request->telephone,
        'mobile_no'=>$request->mobile,
        'businessname'=>$request->businessname,
        'businessaddress'=>$request->businessaddress,
        'businesstype'=>$request->businesstype]);

        if(count($data))
         foreach ($data as $data) {

             $test = DB::table('business_infos')
             ->where('area','=',$data->area)->count();




         }




        return response()->json(['status'=>1,'success'=>'business saved successfully.']);
        }

    }

    public function edit($id)
    {
        $business_info = business_info::find($id);
        return response()->json($business_info);
    }
    public function destroy($id)
    {
        business_info::find($id)->delete();


       if(count($data))
        foreach ($data as $data) {

            $test = DB::table('business_infos')
            ->where('area','=',$data->area)->count();

            area_setting::where('area', '=', $data->area)
           ->update(['population' => $test]);

        }
        return response()->json(['success'=>'Business deleted successfully.']);
    }

}
