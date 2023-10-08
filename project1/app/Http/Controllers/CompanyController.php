<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        $companydata=Company::get();
        return view('company.index',compact('companydata'));
    }
   
    public function create()
    {
        return view('company.create');
    }
    
    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $filename= time().".".$request->company_logo->extension();      //three dots . are in there 2 for concatenate and "." this is string given for filrname e.g. time.jpg  //this time and extension is having dot bw them 
            $request->company_logo->move(public_path('companylogo'),$filename);     //images stored in companylogo folder becoz public_path('companylogo') auto creates folder 
    
            Company::create([
                // 'company_name'=>$request['company_name'],    //for array 
                'company_name'=>$request->company_name,         //for json
                'company_logo'=>$filename,
            ]);
        
            DB::commit();
        
            return back()->with('success','Company registerd');
        }
        catch(Exception $exp)
        {
            DB::rollBack();
            return back()->with('error',$exp->getMessage());
        }
    }

    public function show($id)
    {
        //No Need 
    }

    
    public function edit($id)
    {
        $companydata = Company::findorfail($id);
        return view('company.edit',compact('companydata'));
    }

    
    public function update(Request $request, $id)
    {
        $companydata = Company::findorfail($id);
        if($request->hasFile('company_logo'))       //if new image choosen
        {
            //old image path
            $path = public_path()."/companylogo/".$companydata->company_logo; //may we should work without slash before companylogo
            //unlink old image
            if(file_exists($path))
            {
                unlink($path);
                //            unlink("companylogo/".$companydata->company_logo); 
            }
            $filename = time().".".$request->company_logo->extension();
            $request->company_logo->move(public_path('companylogo'),$filename);

            $companydata->company_name = $request->company_name;
            $companydata->company_logo = $filename;
            $companydata->save();

        }
        else
        {
            $companydata->company_name = $request->company_name;
            $companydata->save();
        }
        return redirect()->route('companyroute.index')->with('success','Company Updated');
    }

    public function destroy($id)
    {
        $companydata = Company::findorfail($id);
        //old image path
        $path = public_path()."/companylogo/".$companydata->company_logo; 
        //unlink old image
        if(file_exists($path))
        {
            unlink($path);
        }
        $companydata->delete();
        return back()->with('success','Deleted Successfull');
    }
}
