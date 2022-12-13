<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Cart;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class CheckoutComponent extends Component
{
    public $shipToDifferent;

    public $first_name;
    public $last_name;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zip_code;

    public $ship_first_name;
    public $ship_last_name;
    public $ship_email;
    public $ship_mobile;
    public $ship_line1;
    public $ship_line2;
    public $ship_city;
    public $ship_province;
    public $ship_country;
    public $ship_zip_code;

    public $payment_mode;
    public $thank_you;

    public $card_no;
    public $cvc;
    public $exp_month;
    public $exp_year;

    protected $listeners = [
        'validationForAll',
        'transactionEmit' => 'paidOnlineOrder'
    ];

    public function paidOnlineOrder($value) {
        $this->makeTransaction($)
    }

    public function validationForAll() {
        $this->validate();
    }

    public function update($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'payment_mode' => 'required'
        ]);

        if ($this->shipToDifferent) {
            $this->validateOnly($fields, [
                'ship_first_name' => 'required',
                'ship_last_name' => 'required',
                'ship_email' => 'required|email',
                'ship_mobile' => 'required|numeric',
                'ship_line1' => 'required',
                'ship_city' => 'required',
                'ship_province' => 'required',
                'ship_country' => 'required',
                'ship_zip_code' => 'required',
            ]);
        }

        if ($this->payment_mode == "card") {
            $this->validateOnly($fields, [
                'card_no' => 'required|numeric',
                'cvc' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
            ]);
        }
    }

    public function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
        $transaction->order_id = $order_id;
        $transaction->user_id = Auth::user()->id;
        $transaction->mode = $this->payment_mode;
        $transaction->status = $status;
        $transaction->save();
    }

    public function placeOrder()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'line1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'payment_mode' => 'required'
        ]);

        if ($this->payment_mode == "card") {
            $this->validate([
                'card_no' => 'required|numeric',
                'cvc' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
            ]);
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'] ??
            100000000000000000000000000000;
        $order->discount = session()->get('checkout')['discount'] ??
            100000000000000000000000000000;
        $order->tax = session()->get('checkout')['tax'] ??
            100000000000000000000000000000;
        $order->total = session()->get('checkout')['total'] ??
            100000000000000000000000000000;
        $order->status = 'ordered';
        $order->first_name = $this->first_name;
        $order->last_name = $this->last_name;
        $order->email = $this->email;
        $order->mobile = $this->mobile;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->zip_code = $this->zip_code;
        $order->is_shipping_different = $this->shipToDifferent ? 1 : 0;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;

            if ($orderItem->options) {
                $orderItem->options = serialize($item->options);
            }

            $orderItem->save();
        }

        if ($this->shipToDifferent) {
            $this->validate([
                'ship_first_name' => 'required',
                'ship_last_name' => 'required',
                'ship_email' => 'required|email',
                'ship_mobile' => 'required|numeric',
                'ship_line1' => 'required',
                'ship_city' => 'required',
                'ship_province' => 'required',
                'ship_country' => 'required',
                'ship_zip_code' => 'required',
            ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->first_name = $this->ship_first_name;
            $shipping->last_name = $this->ship_last_name;
            $shipping->email = $this->ship_email;
            $shipping->mobile = $this->ship_mobile;
            $shipping->line1 = $this->ship_line1;
            $shipping->line2 = $this->ship_line2;
            $shipping->city = $this->ship_city;
            $shipping->province = $this->ship_province;
            $shipping->country = $this->ship_country;
            $shipping->zip_code = $this->ship_zip_code;
            $shipping->save();
        }

        if ($this->payment_mode == 'cod') {
            $this->makeTransaction($order->id, 'pending');
            $this->resetCart();
        } 
        else if ($this->payment_mode == "card") {
            $stripe = Stripe::make(env('STRIPE_KEY'));

            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $this->card_no,
                        'exp_month' => $this->exp_month,
                        'exp_year' => $this->exp_year,
                        'cvc' => $this->cvc
                    ]
                ]);

                if (!isset($token['id'])) {
                    session()->flash('stripe_error', 'Lỗi!');
                    $this->thank_you = 0;
                }

                $customer = $stripe->customers()->create([
                    'name' => $this->first_name . ' ' . $this->last_name,
                    'email' => $this->email,
                    'phone' => $this->mobile,
                    'address' => [
                        'line1' => $this->line1,
                        'postal_code' => $this->zip_code,
                        'city' => $this->city,
                        'state' => $this->province,
                        'country' => $this->country
                    ],

                    'shipping' => [
                        'name' => $this->first_name . ' ' . $this->last_name,
                        'address' => [
                            'line1' => $this->line1,
                            'postal_code' => $this->zip_code,
                            'city' => $this->city,
                            'state' => $this->province,
                            'country' => $this->country
                        ],
                    ],
                    'source' => $token['id']
                ]);

                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'USD',
                    'amount' => session()->get('checkout')['total'],
                    'description' => 'Payment for order No.' . $order->id
                ]);

                if ($charge['status'] == 'succeeded') {
                    $this->makeTransaction($order->id, 'approved');
                    $this->resetCart();
                } else {
                    session()->flash('stripe_error', 'Giao Dịch thất bại!');
                    $this->thank_you = 0;
                }
            } catch (Exception $e) {
                session()->flash('stripe_error', $e->getMessage());
                $this->thank_you = 0;
            }
        }
        $this->sendOrderConfirmationEmail($order);
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else if ($this->thank_you) {
            return redirect()->route('thankyou');
        } else if (!session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }

    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
        redirect()->route('thankyou');
    }

    public function sendOrderConfirmationEmail($order)
    {
        Mail::to($order->email)->send(new OrderMail($order));
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $total = Session::get('total_paypal');

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $total
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('checkout')
                ->with('error', 'Thanh toán không thành công! Vui lòng thử lại.');
        } 
        else {
            return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Thanh toán không thành công! Vui lòng thử lại.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            Session::put('success_paypal', true);
            return redirect()
                ->route('checkout')
                ->with('success', 'Thanh toán Paypal thành công!');
        } 
        else {
            return redirect()
                ->route('checkout')
                ->with('error', $response['message'] ?? 'Thanh toán không thành công! Vui lòng thử lại');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('checkout')
            ->with('error', $response['message'] ?? 'Bạn đã đóng giao dịch Paypal hiện tại.');
    }

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout("layouts.base");
    }
}
