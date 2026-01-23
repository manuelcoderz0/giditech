<?php



function verify_captcha(): bool {

    $token  = request()->input('captcha');
    $secret = config('services.turnstile.secret_key');

    if (!$token || !$secret) {
        return false;
    }

    try {
        $response = Http::asForm()->post(
            'https://challenges.cloudflare.com/turnstile/v0/siteverify',
            [
                'secret'   => $secret,
                'response' => $token,
                'remoteip' => request()->ip(),
            ]
        );

        $data = $response->json();

        return $data['success'] ?? false;
    } catch (\Exception $e) {
        return false;
    }
}