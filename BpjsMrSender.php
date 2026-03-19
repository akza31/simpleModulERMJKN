<?php

class BpjsMrSender
{
    private $consid;
    private $secretkey;
    private $koders;
    private $userkey;
    private $baseUrl;

    public function __construct(array $config)
    {
        $this->consid    = $config['consid'];
        $this->secretkey = $config['secretkey'];
        $this->koders    = $config['koders'];
        $this->userkey   = $config['userkey'];
        $this->baseUrl   = rtrim($config['base_url'], '/') . '/';
    }

    /* ================= TIMESTAMP UTC ================= */
    private function timestamp()
{
    return (string) time();
}

private function signature($timestamp)
{
    $data = $this->consid . "&" . $timestamp;
    return base64_encode(hash_hmac('sha256', $data, $this->secretkey, true));
}

private function encryptMR($plain)
{
//   $json = json_encode($plain);
    $gzip = gzencode($plain);
    $base = base64_encode($gzip);
    $consid = $this->consid;
    $secret = $this->secretkey; 
    $koders = $this->koders;

    // KEY AES 256
    $key = hex2bin(hash('sha256', $consid . $secret . $koders));
    $iv  = substr($key, 0, 16);

    $encrypted = openssl_encrypt(
        $base,
        'AES-256-CBC',
        $key,
        OPENSSL_RAW_DATA,
        $iv
    );

    return base64_encode($encrypted);
}


public function decryptMR($payload)
{
    $key = hash('sha256', $this->consid.$this->secretkey.$this->koders, true);
    $iv  = substr($key, 0, 16);

    $decrypted = openssl_decrypt(base64_decode($payload), 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);

    return gzuncompress($decrypted); // FIXED
}

    /* ================= SEND MR ================= */
    public function sendMR($noSep, $jnsPelayanan, $bulan, $tahun, $fhirJson)
    {
        $timestamp   = $this->timestamp();
        $signature   = $this->signature($timestamp);
        $encryptedMR = $this->encryptMR($fhirJson, $this->consid, $this->secretkey, $this->koders);
        // var_dump()
        // if ( $encryptedMR == '' ){
        //     echo "data MR bukan data Enkripsi";
        // }

        $body = [
            "request" => [
                "noSep"        => $noSep,
                "jnsPelayanan" => $jnsPelayanan,
                "bulan"        => $bulan,
                "tahun"        => $tahun,
                "dataMR"       => $encryptedMR
            ]
        ];
        // var_dump($encryptedMR);die();
       $headers = [
    "Content-Type:: application/json",
    "Accept: application/json",
    "X-cons-id: {$this->consid}",
    "X-timestamp: {$timestamp}",
    "X-signature: {$signature}",
    "user_key: {$this->userkey}"
];
        $ch = curl_init($this->baseUrl . "eclaim/rekammedis/insert");
        curl_setopt_array($ch, [
            CURLOPT_POST           => true,
            CURLOPT_POSTFIELDS     => json_encode($body),
            CURLOPT_HTTPHEADER     => $headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 120,
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
        ]);

        $response = curl_exec($ch);
        $error    = curl_error($ch);
        $info     = curl_getinfo($ch);
        curl_close($ch);
        // curl_setopt($ch, CURLOPT_VERBOSE, true);


        return [
            "timestamp" => $timestamp,
            "signature" => $signature,
            "request"   => $body,
            "response"  => $response,
            "error"     => $error,
            "info"      => $info
        ];
    }
}



