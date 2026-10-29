<?php
// API Indonesia with PHP cURL. Run: API_INDONESIA_KEY=YOUR_API_KEY php example.php

$base = 'https://use.apiindonesia.id/api/v1';
$key = getenv('API_INDONESIA_KEY') ?: exit("Set API_INDONESIA_KEY\n");

function api_get(string $path, array $params = []): array
{
    global $base, $key;
    $url = $base . $path . ($params ? '?' . http_build_query($params) : '');
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => ['x-api-key: ' . $key, 'Accept: application/json'],
        CURLOPT_TIMEOUT => 30,
    ]);
    $body = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if ($status !== 200) {
        throw new RuntimeException("HTTP $status: $body");
    }
    return json_decode($body, true);
}

$provinsi = api_get('/wilayah/provinsi', ['per_page' => 50]);
echo 'Provinces: ' . count($provinsi['data'] ?? []) . PHP_EOL;

foreach (api_get('/wilayah/provinsi/32/kabupaten')['data'] ?? [] as $kab) {
    echo $kab['id'] . ' ' . $kab['name'] . PHP_EOL;
}

print_r(api_get('/libur', ['tahun' => 2026]));
