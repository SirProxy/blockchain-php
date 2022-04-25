<?php

class PoW {

    public static function hash($message) {
        return hash('sha256', $message);
    }

    public static function encontrarNonce($message) {
        $nonce = 0;
        while (!self::eValidoNonce($message, $nonce)) {
            ++$nonce;
        }
        return $nonce;
    }

    public static function eValidoNonce($message, $nonce) {
        return 0 === strpos(hash('sha256', $message.$nonce), '000000');
    }
 
}

$message = 'Olá PoW';

$nonce = PoW::encontrarNonce($message);
print $nonce . "\n";
print hash('sha256', $message.$nonce) . "\n";
