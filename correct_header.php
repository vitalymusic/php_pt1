<?php

// ================================
// CORS HEADERS
// ================================
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Access-Control-Max-Age: 86400"); // 24h

// ================================
// RESPONSE TYPE
// ================================
header("Content-Type: application/json; charset=UTF-8");

// ================================
// PRE-FLIGHT (OPTIONS)
// ================================
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
