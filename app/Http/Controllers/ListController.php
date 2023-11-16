<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;



class ListController extends Controller
{
	 public function editlist(Request $request){
	 	$employees=Employee::where('id',$request->id)->first();

        return view('Admin.Employee.update',[
              'employee'=>$employees
        ]);
    }
    public function listemployee(){
        $employees=Employee::orderby('created_at','desc')->paginate(10);

        
        return view('Admin.Employee.list',[
              'employees'=>$employees
        ]);
    }
     public function deletelist(Request $request){

        $Deletesave=Employee::where('id',$request->id)->first();
     
        if($Deletesave->delete()) { 
            return redirect()->back()->withErrors('Deleted!');
        }
    }
     public function updatelist(Request $request){
     	$Editsave=Employee::where('id',$request->id)->first();
        $Editsave->fullname = $request->fullname;
        // $Employeesave->password = Hash::make($request->password);
        $Editsave->position = $request->position;
        $Editsave->department = $request->department;
        

        if($Editsave->update()) { 
            return redirect()->back()->withErrors('Updated!');
        }
    }
}

