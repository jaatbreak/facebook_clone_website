<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['phone'])) {
    $phone = $_POST['phone'];

    function sendOtp($phoneNumber) {
        $apiKey = 'e4cda86d-4a37-11ef-8b60-0200cd936042';
        $url = "https://2factor.in/API/V1/{$apiKey}/SMS/+91{$phoneNumber}/AUTOGEN/OTP1";

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

    $otpResponse = sendOtp($phone);

    if ($otpResponse['Status'] == 'Success') {
        $_SESSION['otp_session_id'] = $otpResponse['Details'];
        echo "OTP sent successfully.";
    } else {
        echo "Failed to send OTP: " . htmlspecialchars($otpResponse['Details']);
    }
} else {
    echo "Invalid request.";
}
?>
