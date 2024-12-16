<?php

namespace App\Services;

use Twilio\Rest\Client;
use Exception;

class OTPService
{
    /**
     * Send OTP via Twilio WhatsApp API.
     *
     * @param string $phoneNumber
     * @param string $otp
     * @throws Exception
     */
    public function sendOtp($phoneNumber, $otp)
    {
        // Retrieve Twilio credentials from environment variables
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $from = env('TWILIO_WHATSAPP_FROM');

        // Ensure Twilio credentials are set
        if (!$sid || !$token || !$from) {
            throw new Exception('Twilio credentials are not configured properly.');
        }

        // Validate input
        if (!$this->validatePhoneNumber($phoneNumber)) {
            throw new Exception('Invalid phone number format.');
        }

        if (!$this->validateOtp($otp)) {
            throw new Exception('Invalid OTP format.');
        }

        // Instantiate Twilio client
        $client = new Client($sid, $token);

        // Prepare the message
        $message = "Your OTP code is: {$otp}";

        try {
            // Send the message via WhatsApp
            $client->messages->create(
                "whatsapp:{$phoneNumber}", // To phone number with "whatsapp:" prefix
                [
                    'from' => $from,
                    'body' => $message,
                ]
            );
        } catch (Exception $e) {
            // Handle Twilio API errors
            throw new Exception("Failed to send OTP: " . $e->getMessage());
        }
    }

    /**
     * Validate the phone number format.
     *
     * @param string $phoneNumber
     * @return bool
     */
    private function validatePhoneNumber($phoneNumber)
    {
        // Example validation: Check if the phone number is numeric and 10-15 digits long
        return preg_match('/^\d{10,15}$/', $phoneNumber);
    }

    /**
     * Validate the OTP format.
     *
     * @param string $otp
     * @return bool
     */
    private function validateOtp($otp)
    {
        // Example validation: Check if the OTP is numeric and 4-6 digits long
        return preg_match('/^\d{4,6}$/', $otp);
    }
}
