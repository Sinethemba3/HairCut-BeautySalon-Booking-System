<?php

class Notify extends Controller
{
    public function index()
    {
        header('HTTP/1.0 200 OK');
        flush();

        $service = new Service();

        $pfHost       = PAYFAST_SANDBOX_MODE ? 'sandbox.payfast.co.za' : 'www.payfast.co.za';
        $pfPassphrase = PAYFAST_PASSPHRASE;
        $pfData       = $_POST;

        if (!isset($pfData['signature'])) {
            echo "Missing signature";
            return;
        }

        // Remove slashes from data
        foreach ($pfData as $key => $val) {
            $pfData[$key] = stripslashes($val);
        }

        // Build parameter string (excluding signature)
        $pfParamString = '';
        foreach ($pfData as $key => $val) {
            if ($key !== 'signature') {
                $pfParamString .= $key . '=' . urlencode($val) . '&';
            } else {
                break;
            }
        }
        $pfParamString = rtrim($pfParamString, '&');

        // Perform validations
        $validSignature = $this->pfValidSignature($pfData, $pfParamString, $pfPassphrase);
        $validIP        = $this->pfValidIP();
        $validServer    = $this->pfValidServerConfirmation($pfParamString, $pfHost);

        $paymentStatus  = $pfData['payment_status'] ?? '';
        $userUrl        = $pfData['m_payment_id'] ?? '';
        $amountGross    = $pfData['amount_gross'] ?? 0;

        $foundService = $service->first('user_url', $userUrl);

        // Calculate the cart total only if service is found
        $cartTotal = 0;
        if ($foundService) {
            $amounts = explode(',', $foundService->amount);
            foreach ($amounts as $amt) {
                if (is_numeric(trim($amt))) {
                    $cartTotal += floatval(trim($amt));
                }
            }

            // For services: apply 14% VAT and divide by 2
            $cartTotal = number_format(($cartTotal * 1.14) / 2, 2, '.', '');
        }

        $amountIsValid = $this->pfValidPaymentAmount($cartTotal, $amountGross);

        // === Final check ===
        if ($validSignature && $validIP && $validServer && $amountIsValid && $paymentStatus === 'COMPLETE') {
            if ($foundService) {
                $service->update($foundService->id, ['paid' => 1]);
            }

            echo "Payment confirmed and updated.";
        } else {
            // Log invalid attempts
            $logDir = realpath(__DIR__ . '/../../') . '/logs';
            if (!file_exists($logDir)) {
                mkdir($logDir, 0755, true); // Auto-create logs folder
            }

            $logFile = $logDir . '/payfast_notify.log';
            $logContent = "[" . date('Y-m-d H:i:s') . "] Invalid or failed service IPN:\n" . print_r($pfData, true) . "\n\n";
            file_put_contents($logFile, $logContent, FILE_APPEND);

            echo "Invalid payment data logged.";
        }

        $this->view('./notify'); // Optional view
    }

    // === Helpers ===

    private function pfValidSignature($pfData, $pfParamString, $pfPassphrase = null)
    {
        $string = $pfParamString;
        if ($pfPassphrase !== null) {
            $string .= '&passphrase=' . urlencode($pfPassphrase);
        }
        return (md5($string) === $pfData['signature']);
    }

    private function pfValidIP()
    {
        $validHosts = [
            'www.payfast.co.za',
            'sandbox.payfast.co.za',
            'w1w.payfast.co.za',
            'w2w.payfast.co.za',
        ];

        $validIps = [];
        foreach ($validHosts as $host) {
            $ips = gethostbynamel($host);
            if ($ips !== false) {
                $validIps = array_merge($validIps, $ips);
            }
        }

        $validIps = array_unique($validIps);
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        return in_array($ip, $validIps);
    }

    private function pfValidServerConfirmation($pfParamString, $pfHost)
    {
        $url = 'https://' . $pfHost . '/eng/query/validate';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $pfParamString);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return ($response === 'VALID');
    }

    private function pfValidPaymentAmount($expected, $received)
    {
        return abs((float)$expected - (float)$received) <= 0.01;
    }
}
