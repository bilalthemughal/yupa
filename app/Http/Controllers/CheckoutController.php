<?php

namespace App\Http\Controllers;

use App\bookingKit;
use App\HotelBooking;
use App\TravelKit;
use App\User;
use App\UserPackege;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Session;

class CheckoutController extends Controller {
	public function index(Request $request) {
		$secret = $request->secret;
		$check = UserPackege::where('secret', $secret)->firstOrFail();
		return view('fontend.packege_checkout', compact('check'));
	}

	public function post_pack_checkout(Request $request) {
		$user = User::find($request->user_id);
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->enb_email = $request->enb_email;
		$user->phn_number = $request->phn_number;
		$user->save();
		$apiContext = new ApiContext(
			new OAuthTokenCredential(
				env('PAYPAL_CLIENT_ID', config('settings.paypale_client_id')),
				env('PAYPAL_SECRET', config('settings.paypale_client_secret'))
			)
		);
		$check = UserPackege::where('secret', $request->secret)->first();
		if ($check->pack_quantity != $request->guest || $check->total != $request->total) {
			Session::put('msg', 'You are Type Worng Input');
			return redirect()->route('packege-chackeout', ['secret' => $request->secret]);
		} else {
			$total = $request->total / config('settings.c_rate', config('system.defualt_curency_rate'));
			dd($total);
			$invoice_no = rand();
			$payer = new Payer();
			$payer->setPaymentMethod("paypal");
			$details = new Details();
			$details->setSubtotal($total);

			$amount = new Amount();
			$amount->setCurrency("USD")
				->setTotal($total)
				->setDetails($details);

			$transaction = new Transaction();
			$transaction->setAmount($amount)
				->setDescription("Payment description")
				->setInvoiceNumber($invoice_no);

			$redirectUrls = new RedirectUrls();
			$redirectUrls->setReturnUrl(route('booking-result', ['secret' => $request->secret]))
				->setCancelUrl(route('booking-result', ['secret' => $request->secret]));

			$payment = new Payment();
			$payment->setIntent("sale")
				->setPayer($payer)
				->setRedirectUrls($redirectUrls)
				->setTransactions(array($transaction));

			$request = clone $payment;
			$payment->create($apiContext);
			$approvalUrl = $payment->getApprovalLink();
			return redirect($approvalUrl);
		}
	}

	public function hotel(Request $request) {
		$check = HotelBooking::where('secret', $request->secret)->firstOrFail();
		return view('fontend.hotel_checkout', compact('check'));
	}

	public function post_hotel_checkout(Request $request) {
		$user = User::find($request->user_id);
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->enb_email = $request->enb_email;
		$user->phn_number = $request->phn_number;
		$user->save();
		$apiContext = new ApiContext(
			new OAuthTokenCredential(
				env('PAYPAL_CLIENT_ID', config('settings.paypale_client_id')),
				env('PAYPAL_SECRET', config('settings.paypale_client_secret'))
			)
		);
		$check = HotelBooking::where('secret', $request->secret)->first();
		if ($check->guest != $request->guest || $check->total_price != $request->price) {
			Session::put('msg', 'You are Type Worng Input');
			return redirect()->route('hotel-chackeout', ['secret' => $request->secret]);
		} else {
			$invoice_no = rand();
			$payer = new Payer();
			$payer->setPaymentMethod("paypal");

			$item = array();
			$subtotal = round($check->price / config('settings.c_rate', config('system.defualt_curency_rate')), 2);
			$total = $subtotal * $check->night;
			$var = new Item();
			$var->setName($check->hotel->name)
				->setCurrency('USD')
				->setQuantity($check->night)
				->setPrice($subtotal);
			$item[] = $var;

			$details = new Details();
			$details->setSubtotal($total);

			$amount = new Amount();
			$amount->setCurrency("USD")
				->setTotal($total)
				->setDetails($details);

			$itemList = new ItemList();
			$itemList->setItems($item);

			$transaction = new Transaction();
			$transaction->setAmount($amount)
				->setItemList($itemList)
				->setDescription("Payment description")
				->setInvoiceNumber($invoice_no);

			$redirectUrls = new RedirectUrls();
			$redirectUrls->setReturnUrl(route('hotel.booking_list', ['secret' => $request->secret]))
				->setCancelUrl(route('hotel.booking_list', ['secret' => $request->secret]));

			$payment = new Payment();
			$payment->setIntent("sale")
				->setPayer($payer)
				->setRedirectUrls($redirectUrls)
				->setTransactions(array($transaction));

			$request = clone $payment;
			$payment->create($apiContext);
			$approvalUrl = $payment->getApprovalLink();
			return redirect($approvalUrl);
		}
	}

	public function client_checkout(Request $request) {
		$userPackege = UserPackege::find($request->userpackege_id);
		$kit = $request->pha;
		$kit_price = 0;
		if ($kit && count($kit) > 0) {
			for ($i = 0; $i < count($kit); $i++) {
				$bookingKit = new bookingKit;
				$bookingKit->user_packege_id = $request->userpackege_id;
				$bookingKit->travel_kit_id = $kit[$i];
				$bookingKit->price = $request->price[$i];
				$kit_price += $request->price[$i] * $request->quantity[$i];
				$bookingKit->quantity = $request->quantity[$i];
				$bookingKit->save();
			}
		}
		$userPackege->kit_price = $kit_price;
		$userPackege->save();
		return redirect()->route('checkout_form', ['secret' => $userPackege->secret]);
	}

	public function booking_payment(Request $request) {
		$secret = $request->secret;
		$token = $request->token;
		$paymentId = $request->paymentId;
		$PayerID = $request->PayerID;

		if (isset($paymentId) && isset($token) && isset($PayerID) && $secret) {
			$userPackege = UserPackege::where('secret', $secret)->first();

			$userPackege->status = true;
			$userPackege->transaction_id = $paymentId;
			$userPackege->invoice_id = $token;
			$userPackege->save();
			$message = 'Your Order Payment Done Successfull';
			return redirect()->route('experience-booking-details', $userPackege->id)->with('message', $message);

		}
		$user_id = Auth::user()->id;
		$userPackege = UserPackege::where('user_id', $user_id)->paginate(6);
		return view('fontend.profile.booking', compact('userpackege'));
	}

	public function checkout_form(Request $request) {
		$secret = $request->secret;
		$check = UserPackege::where('secret', $secret)->firstOrFail();
		return view('fontend.packege_kit_checkout', compact('secret', 'check'));
	}
	public function checkout_final(Request $request) {
		$user = User::find($request->user_id);
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->enb_email = $request->enb_email;
		$user->phn_number = $request->phn_number;
		$user->save();
		$secret = $request->secret;
		$userPackege = UserPackege::where('secret', $secret)->firstOrFail();
		$apiContext = new ApiContext(
			new OAuthTokenCredential(
				env('PAYPAL_CLIENT_ID', config('settings.paypale_client_id')),
				env('PAYPAL_SECRET', config('settings.paypale_client_secret'))
			)
		);

		$payer = new Payer();
		$payer->setPaymentMethod("paypal");
		$pack_price = round($userPackege->price / config('settings.c_rate', config('system.defualt_curency_rate')), 2);
		$item = [];
		$total = $pack_price * $userPackege->pack_quantity;

		$var = new Item();
		$var->setName($userPackege->packege->name)
			->setCurrency('USD')
			->setQuantity($userPackege->pack_quantity)
			->setPrice($pack_price);
		$item[] = $var;

		$kit_price = 0;

		if ($userPackege->bookkit->count() > 0) {
			foreach ($userPackege->bookkit as $kit) {
				$subtotal = round($kit->price / config('settings.c_rate', config('system.defualt_curency_rate')), 2);
				$total += $subtotal * $kit->quantity;
				$kit_item = TravelKit::where('id', $kit->travel_kit_id)->first();

				$var = new Item();
				$var->setName($kit_item->name)
					->setCurrency('USD')
					->setQuantity($kit->quantity)
					->setPrice($subtotal);
				$item[] = $var;
			}
		}

		//invoice number
		$invoice_no = $userPackege->invoice_id;
		$token = $userPackege->secret;

		$itemList = new ItemList();
		$itemList->setItems($item);

		$details = new Details();
		$details->setSubtotal(round($total, 2));

		$amount = new Amount();
		$amount->setCurrency("USD")
			->setTotal(round($total, 2))
			->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($itemList)
			->setDescription("Payment description")
			->setInvoiceNumber($invoice_no);

		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl(route('pack_paymentconfirm', ['secret' => $token]))
			->setCancelUrl(route('pack_paymentconfirm', ['secret' => $token]));

		$payment = new Payment();
		$payment->setIntent("sale")
			->setPayer($payer)
			->setRedirectUrls($redirectUrls)
			->setTransactions(array($transaction));

		$request = clone $payment;
		$payment->create($apiContext);
		$approvalUrl = $payment->getApprovalLink();
		return redirect($approvalUrl);

	}
}
