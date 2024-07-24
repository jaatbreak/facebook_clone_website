<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['otp'])) {
    $otp = $_POST['otp'];

    function verifyOtp($otpSessionId, $otpInput) {
        $apiKey = '1ed43165-3f69-11ef-8b60-0200cd936042';
        $url = "https://2factor.in/API/V1/{$apiKey}/SMS/VERIFY/{$otpSessionId}/{$otpInput}";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        $curlError = curl_error($curl);
        curl_close($curl);

        if ($curlError) {
            return ['Status' => 'Failed', 'Details' => $curlError];
        }

        return json_decode($response, true);
    }

    if (isset($_SESSION['otp_session_id'])) {
        $otpSessionId = $_SESSION['otp_session_id'];
        $verificationResponse = verifyOtp($otpSessionId, $otp);

        if ($verificationResponse['Status'] == 'Success') {
            echo "OTP verified successfully.";
            // Proceed with the next steps after successful OTP verification
        } else {
            echo "Failed to verify OTP: " . htmlspecialchars($verificationResponse['Details']);
        }
    } else {
        echo "OTP session not found.";
    }
} else {
    echo "Invalid request.";
}
?>
