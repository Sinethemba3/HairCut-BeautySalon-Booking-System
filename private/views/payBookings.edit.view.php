<?php
    $passPhrase          = PAYFAST_PASSPHRASE; // PayFast passphrase
    
    // PayFast Configuration
    $merchantId          = PAYFAST_MERCHANT_ID; // Your PayFast Merchant ID
    $splitMerchantId     = SPLIT_PAYMENT_MERCHANT_ID; // Your PayFast Merchant ID
    $returnUrl           = BOOKINGS_RETURN_URL; // Redirect after successful payment
    $cancelUrl           = BOOKINGS_CANCEL_URL; // Redirect after canceled payment
    $notifyUrl           = PAYFAST_NOTIFY_URL; // PayFast's IPN URL 

    extract($_POST);

    function generateSignature($data, $passPhrase = null) {
        ksort($data); // Sort keys alphabetically

        $pfOutput = '';
        foreach ($data as $key => $val) {
            if ($val !== '') {
                $pfOutput .= $key . '=' . urlencode(trim((string)$val)) . '&';
            }
        }

        $getString = rtrim($pfOutput, '&');

        if ($passPhrase !== null) {
            $getString .= '&passphrase=' . urlencode(trim((string)$passPhrase));
        }

        return md5($getString);
    }

    // Generate unique order ID
    $userUrl = $_SESSION['user_url'] = time() . uniqid();

    if (!empty($row)) {
        // Retrieve and sanitize the amount as a comma-separated string
        $amountsData = $row[0]->amount; // This should be a string like "1.00,2.00,3.00"
    
        // Explode the amounts into an array
        $amountsArray = explode(',', $amountsData);
        $total = 0;
    
        // Sum the amounts, ensuring they are valid
        foreach ($amountsArray as $amount) {
            $trimmedAmount = trim($amount); // Trim whitespace
            if (is_numeric($trimmedAmount)) {
                // Add to total as a float
                $total += floatval($trimmedAmount);
            } else {
                echo "Invalid amount value detected: " . esc($trimmedAmount);
                exit; // Handle invalid amount appropriately
            }
        }
    
        // Calculate cart total with VAT (14%)
        $vatPercentage = 1.14; // 14% VAT
        // Calculate the total with VAT and divide by 2
        $cartTotal = number_format(($total * $vatPercentage) / 2, 2, '.', '');
    
        // Prepare PayFast data
        $data = [
            // Merchant details
            'merchant_id'       => $merchantId, 
            'return_url'        => $returnUrl,
            'cancel_url'        => $cancelUrl,
            'notify_url'        => $notifyUrl,
    
            // Transaction details
            'm_payment_id'      => $userUrl, // Unique payment ID
            'amount'            => $cartTotal,
            'email_address'     => $row[0]->email,
            'item_name'         => $row[0]->services_,
            'item_description'  => $row[0]->services_
        ];
    }

    // Generate signature and append to data
    $signature = generateSignature($data, $passPhrase);
    $data['signature'] = $signature;

    // Determine PayFast host (sandbox or live)
    $pfHost = PAYFAST_SANDBOX_MODE ? 'sandbox.payfast.co.za' : 'www.payfast.co.za';

    $htmlForm = '<form action="https://' . $pfHost . '/eng/process" method="post" id="frmPayment">';

    // Add payment data fields
    foreach ($data as $name => $value) {
        $htmlForm .= '<input name="' . esc($name) . '" type="hidden" value="' . esc($value) . '" />';
    }

    // Add required fields (only once)
    $htmlForm .= '<input type="hidden" name="cmd" value="_paynow">';
    $htmlForm .= '<input type="hidden" name="receiver" value="' . esc($merchantId) . '">';

    // Add setup field for split payments (only once)
    $setup = [
        "split_payment" => [
            "merchant_id" => $splitMerchantId,
            "percentage" => 10,
        ]
    ];
    
    $htmlForm .= '<input type="hidden" name="setup" value=\'' . esc(json_encode($setup)) . '\' />';

    // Add submit button
    $htmlForm .= '<input type="submit" value="Pay Now" style="display:none;" /></form>';

    // Output the form
    echo $htmlForm;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= APP_NAME ?> | <?= APP_DESC ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?=ROOT?>/assets/css/Asset10.png" rel="icon">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/nunito.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/nunito2.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
        }
        .spinner-grow {
            width: 3rem;
            height: 3rem;
        }
    </style>
</head>
    <body>
        <div class="container text-center mt-5">
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Redirecting to PayFast...</h4>
                <p>Please wait while we securely redirect you to complete your payment.</p>
                <div class="spinner-grow text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <script>
            window.onload = function () {
                document.getElementById("frmPayment").submit();
            };
        </script>
    </body>
</html>