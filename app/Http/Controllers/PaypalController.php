<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaypalController extends Controller
{   

    private $apiContext;

    public function __construct(){
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
                new OAuthTokenCredential(
                    $payPalConfig['client_id'],     // ClientID
                    $payPalConfig['secret'] // ClientSecret
                )
        );
    }

    public function paymentPaypal(){
        // After Step 2
        // metodo de pgao es paypal
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        // total es de precio del producto, ponemos una cantidad fija
        $amount = new \PayPal\Api\Amount();
        $amount->setTotal('1.00');
        $amount->setCurrency('MXN');

        // creamos transaccion y asignamos cantidad
        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);
        // $transaction->setDescription('Disfruta tu pedido');

        // cuando paga o no tiene dinero y cuando cancela y personalizamos ruta.
        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl("https://example.com/your_redirect_url.html")
            ->setCancelUrl("https://example.com/your_cancel_url.html");

        // ponemos toda la info
        $payment = new \PayPal\Api\Payment();
        // se trta de una venta
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            echo $payment;
            // payment contiene info 
            // si todo bien nos da acceso al approval link
            return redirect()->away($payment->getApprovalLink());
            // echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
        }
        // si hay error nos manda al catch
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }

        return "Paypal";
    }
}
