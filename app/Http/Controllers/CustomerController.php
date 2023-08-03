<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
   function CustomerPages():View{
    return view('pages.customer-page');
   }


   function CreateCustomer(Request $request){
    try{
        $name = $request->input('name');
    $email = $request->input('email');
    $mobile = $request->input('mobile');
    $address = $request->input('address');

    Customer::create([
      'name' => $name,
      'email' => $email,
      'mobile' => $mobile,
      'address' => $address
     ]);
   
     return response()->json([
        'status' => 'success',
        'message' => 'Customer created successfully'
     ],200);
        
     }catch(Exception $e){
        return response()->json([
            'status' => 'failure',
            'message' => 'Customer created Failed'
        ],200);
        
    }
    

   }

   function CustomerList(){
    return Customer::get();
   }

   function UpdateCustomer(Request $request){
    try{
        $id = $request->input('id');

         Customer::where('id', $id)->update([
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'address' => $request->input('address')
         ]);
         return response()->json([
            'status' => 'success',
            'message' => 'Customer Update Successfully'
             ],200);
    

    }catch(Exception $e){
        return response()->json([
            'status' => 'failure',
            'message' => 'Something went wrong'
             ],200);
        
    }
   
   }

  function CustomereDelete(Request $request){
   
     
      $id = $request->input('id');

     return  Customer::where('id',$id)->delete();
 }

 function CustomerListById(Request $request){
   $id = $request->input('id');
   return Customer::where('id',$id)->first();
 }
}
