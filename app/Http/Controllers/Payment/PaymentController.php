<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment\Payment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class PaymentController extends Controller
{
    public function pay()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);

        // Get the current year
        $currentYear = Carbon::now()->year;

        // Check if the user has made a payment for the current year
        $hasPaid = Payment::where('user_id', $id)
            ->whereYear('created_at', $currentYear)
            ->exists();

        // Pass both profileData and hasPaid to the view
        return view('pay.index', compact('profileData', 'hasPaid'));
    }

    public function make_payment()
    {
        $formData = [
            'email' => request('email'),
            'amount' => 5000000,
            'callback_url' => route('pay.callback')
        ];
        
        $pay = json_decode($this->initiate_payment($formData));
        
        if ($pay) {
            if ($pay->status) {
                return redirect($pay->data->authorization_url);
            } else {
                return back()->withError($pay->message);
            }
        } else {
            return back()->withError("Something went wrong");
        }

        // $formData = [
        //     'email' => request('email'),
        //     'amount' => 5000000,
        //     'callback_url' => route('pay.callback')
        // ];

        // $pay = json_decode($this->initiate_payment($formData));

        // // Debug the $pay variable to check its structure and content
        // dd($pay);

        // // Check if the payment status is being set correctly
        // if ($pay) {
        //     dd($pay->status, $pay->data->authorization_url); // Debug status and authorization_url

        //     if ($pay->status) {
        //         return redirect($pay->data->authorization_url);
        //     } else {
        //         return back()->withError($pay->message);
        //     }
        // } else {
        //     return back()->withError("Something went wrong");
        // }


    }

    public function payment_callback()
    {
        $response = json_decode($this->verify_payment(request('reference')));
        if ($response) {
            if ($response->status) {
                $data = $response->data;

                // Save the payment data to the model here
                Payment::create([
                    'user_id' => Auth::user()->id, // Assuming the user is authenticated
                    'purpose' => 'Membership Yearly Dues', // Define the purpose of the payment
                    'amount' => $data->amount / 100, // Amount in Naira (Paystack returns in kobo)
                    'reference' => $data->reference,
                    'email' => $data->customer->email, // Email from the Paystack response
                ]);

                // return view('pay.callback_page')->with(compact(['data']));
                return view('pay.callback_page')->with(['paymentSuccess' => true]);

            } else {
                return back()->withError($response->message);
            }
        } else {
            return back()->withError("Something went wrong");
        }
    }

    public function initiate_payment($formData)
    {
        $url = "https://api.paystack.co/transaction/initialize";

        $fields_string = http_build_query($formData);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer " . env('PAYSTACK_SECRET_KEY'),
            "Cache-Control: no-cache",
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public function verify_payment($reference)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . env('PAYSTACK_SECRET_KEY'),
                "Cache-Control: no-cache",
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}
