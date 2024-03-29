<?php

namespace App\Http\Controllers\admin;

use App\Hotel;
use App\HotelBooking;
use App\Http\Controllers\Controller;
use App\Packege;
use App\UserPackege;
use App\bookingKit;

use App\UserItinary;
use App\User;

use App\Wishlist;
use App\Notifications\PackegeConfirm;
use App\Notifications\HotelConfirm;
use Illuminate\Http\Request;

class BookingController extends Controller {
	public function index() {
		$userpackege = UserPackege::all();
		return view('admin.booking.packege.index', compact('userpackege'));
	}

	public function packege_details($booking, $packege) {
		$userpackege = UserPackege::find($booking);
		$packegeinfo = Packege::find($packege);
		return view('admin.booking.packege.details', compact('userpackege', 'packegeinfo'));
	}
	/*::::wishlist:::::*/
	public function pack_wishlist() {
		$wishlist = Wishlist::all();
		return view('admin.wishlist.packege.index', compact('wishlist'));
	}

	public function hotel() {
		$hotel_bookings = HotelBooking::all();
		return view('admin.booking.hotel.index', compact('hotel_bookings'));
	}



    public function send_packege_mail(Request $request)
    {
     $user_id =$request->user_id;
     $packege =$request->user_packege;
     $userpackege =UserPackege::find($packege);
     $userpackege->total =$request->edit_amt;
     $userpackege->save();
     $user =User::find($user_id);
     $messege =$request->messege;
     if ($user->email) {
        $user->notify(new PackegeConfirm($userpackege,$user,$messege));
     }
        return response()->json(['success' => true, 'status' => 'success', 'message' => 'packege checkout link send via Email.', 'goto' => route('admin.packege.getbooking')]);


    }

	public function hotel_details($hotel_booking) {
		$booking = HotelBooking::findOrFail($hotel_booking);
		return view('admin.booking.hotel.details', compact('booking'));
	}

	public function send_hotel_mail(Request $request)
	{
	 $user_id =$request->user_id;
     $booking_id =$request->booking_id;
     $booking =HotelBooking::find($booking_id);
     $booking->price =$request->price;
     $booking->save();
     $user =User::find($user_id);
     $messege =$request->messege;
     if ($user->email) {
        $user->notify(new HotelConfirm($booking,$user,$messege));
     }
       return response()->json(['success' => true, 'status' => 'success', 'message' => 'Hotel checkout link send via Email.', 'goto' => route('admin.hotel.booking')]);
	}

	public function reject_tour(Request $request,$id)
	{
     $tour =UserPackege::find($id);
     $tour->delete();
     $itinary =UserItinary::where('user_packege_id',$id);
     $itinary->delete();
     $kit =bookingKit::where('user_packege_id',$id);
     if ($kit) {
     	$kit->delete();
     }
     return response()->json(['success' => true, 'status' => 'success', 'message' => 'Tour Cancel.', 'goto' => route('admin.packege.getbooking')]);


	}

}
