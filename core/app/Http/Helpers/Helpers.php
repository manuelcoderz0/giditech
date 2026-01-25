<?php

use App\Lib\FileManager;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

function file_manager()
{
    return new FileManager();
}

function file_uploader($file, $location, $size = null, $old = null, $thumb = null, $filename = null)
{
    $fileManager = new FileManager($file);
    $fileManager->path = $location;
    $fileManager->size = $size;
    $fileManager->old = $old;
    $fileManager->thumb = $thumb;
    $fileManager->filename = $filename;
    $fileManager->upload();
    return $fileManager->filename;
}

function get_file_path($key)
{
    return file_manager()->$key()->path;
}

function get_file_size($key)
{
    return file_manager()->$key()->size;
}

function get_image($image, $size = null)
{
    $clean = '';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    }
    if ($size) {
        return route('placeholder.image', $size);
    }
    return asset('assets/images/default.png');
}

function key_to_title($text)
{
    return ucfirst(preg_replace("/[^A-Za-z0-9 ]/", ' ', $text));
}

function slug($string)
{
    return Str::slug($string);
}

function verify_captcha(): bool {

    $token  = request()->input('captcha');
    $secret = config('services.turnstile.secret_key');
    
    if (!$token || !$secret) {
        return false;
    }

    try {
        $response = Http::withoutVerifying()->asForm()->post(
        //$response = Http::asForm()->post(
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