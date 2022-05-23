<?php 

    class PaystackPayment {
        
        private $secretKey;

        function __construct($secretKey){
            $this->secretKey = $secretKey;
        }

        function generateReference (int $length = 11) {
            $id = "trx-ref_";

            for ($i = 0; $i < $length; $i++) { 
                $id .= rand(0, 9);
            }

            return $id;
        }

        function convertToNaira ($amount) {
            $DOLLAR_RATE = 415.65;
            $amount_in_naira = $amount * $DOLLAR_RATE;

            return $amount_in_naira;
        }

        function initialize_payment ($email, $amount, $callback_url = "") {
            $url = "https://api.paystack.co/transaction/initialize";
            $ref = $this->generateReference();

            $fields = [
                'email' => filter_var($email, FILTER_SANITIZE_EMAIL),
                'amount' => round($this->convertToNaira($amount), 2) * 100,
                'callback_url' => $callback_url,
                'reference' => $ref
            ];
            $fields_string = http_build_query($fields);

            //open connection
            $ch = curl_init();

            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, true);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer {$this->secretKey}",
                "Cache-Control: no-cache",
            ));

            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

            
            //execute post
            $result = curl_exec($ch);
            $result = json_decode($result, true);

            $data = [
                "pay" => $result, 
                "ref" => $ref
            ];
            return $data;
        }

        function verify_transaction($ref)
        {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/transaction/verify/$ref",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer {$this->secretKey}",
                    "Cache-Control: no-cache",
                ),
            ));
            
            $response = json_decode(curl_exec($curl), true);
            $err = curl_error($curl);
            curl_close($curl);

            
            if ($err) {
                return [
                    'error' => $err
                ];
            } else {
                return $response;
            }
        }
    }