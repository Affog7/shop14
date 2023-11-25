<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class CLientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = DB::table('users as u')
        ->leftJoin('orders as o', 'u.id', '=', 'o.user_id')
        ->select('u.name','u.id', 'u.email','u.unique_key_client', 'u.profile_photo_path', 'u.status', DB::raw('count(o.id) as nombre_commandes'))
        ->groupBy('u.id','unique_key_client', 'u.name', 'u.email', 'u.profile_photo_path', 'u.status')
        ->get();

        
           return view('admin.Clients.index', compact('clients'));    
    }

    public function changeClientStatus(Request $request)
    {
        //$email = Crypt::decryptString($request->_id);
        $client = User::select('id')->where("unique_key_client",$request->_id)->first();
        //Log::info($client);
        $client->status = $request->status;
        $client->save();

         $notification = [
            'message' => 'Client Status Updated Successfully!!!',
            'alert-type' => 'success'
        ];
        return response()->json($notification, 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email = Crypt::decryptString($id);

    }


    public  function showOrderByClient($id)
    {
       // $email = Crypt::decryptString($id);
       // $client = User::select('id')->where("email",$email)->first();

       $client = DB::table('users as u')
       ->leftJoin('orders as o', 'u.id', '=', 'o.user_id')
       ->select('u.id', 'u.name', 'u.email', 'u.profile_photo_path', 'u.status', 'o.currency', 
                DB::raw('count(o.id) as nombre_commandes'), DB::raw('sum(o.amount) as total'))
       ->where('u.unique_key_client', $id)
       ->groupBy('u.id', 'u.name', 'u.email', 'u.profile_photo_path', 'u.status', 'o.currency')
       ->first();


        $orders = app(\App\Http\Controllers\User\OrderHistoryController::class)->orderHistoryDefault($client->id);
                
       return view('admin.Clients.show_orders', compact('client','orders'));    

       
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //$_id = Crypt::decryptString($id);
         $editData = DB::table('users')
         ->select('users.id',
         'users.name',
         'users.email', 
         'users.profile_photo_path', 
         'users.status', 
         'users.type'
         )
         ->where('users.unique_key_client',$id)
         ->first();

         return view('admin.Clients.edit', compact('editData'));    

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
       // $email = Crypt::decryptString($id);

        $data = User::where('unique_key_client',$id)->first();
        $data->name = $request->name;
        $data->email = $request->email;
if($request -> type == "10_n_452") $data->type = 1;
if($request -> type == "10_p8_452") $data->type = 2;
        if(isset($request->password)) {
            if(isset($request->confirm_password) && ($request->password == $request->confirm_password)){

                $data->password =Hash::make($request->password);

            }else {
                $notification = [
                    'message' => 'Repetez correctement le mot de passe',
                    'alert-type' => 'warning'
                ];
        
                return redirect()->back()->with($notification);
            }
        }
        if($request->file('image')){
          
            $image_file = $request->file('image');
            if($data->profile_photo_path){
                @unlink(public_path('storage/profile-photos/'.$data->profile_photo_path));
            }
            
              $upload_location = 'storage/profile-photos/';
                $file = $request->file('image');
                $name_gen =  date('YmdHi').'.'.$image_file->getClientOriginalExtension();

                Image::make($file)->resize(600,600)->save($upload_location.$name_gen);
             
            $data['profile_photo_path']= $name_gen;
        }

        $data->save();

        $notification = [
            'message' => 'Profile Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('clients.index')->with($notification);
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
    }
}
