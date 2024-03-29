<?php

namespace App\Http\Controllers\admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use App\UserPackege;
use App\Destination;
use App\Packege;
use App\HotelBooking;
use App\Hotel;
use App\Host;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth:admin');
	}


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $pack =Packege::all();
       $hotel =Hotel::all();
       $bookpack =UserPackege::all();
       $hotbook=HotelBooking::all();
       $user =User::all();
       $destination =Destination::all();
        return view('admin.welcome',compact(
            'pack',
            'hotel',
            'bookpack',
            'hotbook',
            'user',
            'destination'
            ));
	}


	//admin profile
	public function profile() {
		$user_id = Auth::user()->id;
		$admin = Admin::find($user_id);
		return view('admin.profile.profile', compact('admin'));
	}

  public function profile_up(Request $request)
  {
      $validator = Validator::make($request->all(), [
        'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],

      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
      }
      $admin_id =Auth::user()->id;
      $admin =Admin::find($admin_id);
      $admin->name =$request->name;
      $admin->email =$request->email;
      $admin->save();
      return response()->json(['success' => true, 'status' => 'success', 'message' => 'Profile Updated.', 'goto' => route('admin.profile')]);
  }

  public function pass_change(Request $request)
  {
      $validator = Validator::make($request->all(), [
       'password' => ['required', 'string', 'min:6', 'confirmed'],

      ]);

      if ($validator->fails()) {
        return response()->json(['success' => false, 'status' => 'danger', 'message' => $validator->errors()]);
      }

      $admin_id =Auth::user()->id;
      $admin =Admin::find($admin_id);
      $admin->password = Hash::make($request->password);
      $admin->save();
      return response()->json(['success' => true, 'status' => 'success', 'message' => 'Password Updated.', 'goto' => route('admin.profile')]);
  }

	public function travelar() {
		$travelars = User::all();
		return view('admin.travelar', compact('travelars'));
	}

	public function changeStatus($id){
        $user = User::findOrFail($id);
        if($user->status == 0){
            $user->status = 1;
            $user->save();
        }
        else{
            $user->status = 0;
            $user->save();
        }
        return redirect()->back();
    }

    public function addNote(Request $request){
        $input = $request;
        $user = User::findOrFail($input['id']);
        $user->adminNote = $input['note'];
        $user->save();
        return redirect()->back();
    }

    public function editNote(Request $request){
        $input = $request;
        $user = User::findOrFail($input['id']);
        $user->adminNote = $input['note'];
        $user->save();
        return redirect()->back();
    }

  //host apply list
  public function host()
  {
    $host =Host::all();
    return view('admin.setting.host',compact('host'));
  }

  public function host_apply(Request $request,$id)
  {
    $host =Host::find($id);
    $host->status ='approve';
    $host->save();
    return response()->json(['success' => true, 'status' => 'success', 'message' => 'Apply Approved', 'goto' => route('admin.host')]);

  }

  public function host_reject($id)
  {
      $host = Host::find($id);
      unlink('storage/host/file/'.$host->file);
      $host->delete();
      if ($host) {
         return response()->json(['success' => true, 'status' => 'success', 'message' => 'Applicant Rejected']);
      }
  }
}
