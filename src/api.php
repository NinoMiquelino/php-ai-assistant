<?php
require_once 'OpenAIClient.php'; 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // CORS para desenvolvimento
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$response = ['success' => false, 'data' => null, 'error' => ''];

if ($method === 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($method !== 'POST') {
    http_response_code(405);
    $response['error'] = 'Método não permitido.';
    echo json_encode($response);
    exit;
}

// 1. Lê o corpo da requisição JSON (do frontend)
$input = file_get_contents('php://input');
$requestData = json_decode($input, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400); // Bad Request
    $response['error'] = 'JSON inválido no corpo da requisição.';
    echo json_encode($response);
    exit;
}

$userPrompt = $requestData['prompt'] ?? '';
$model = $requestData['model'] ?? 'gpt-3.5-turbo';
$temperature = (float)($requestData['temperature'] ?? 0.7);
$maxTokens = (int)($requestData['max_tokens'] ?? 300);

if (empty($userPrompt)) {
    http_response_code(400);
    $response['error'] = 'O prompt é obrigatório.';
    echo json_encode($response);
    exit;
}

try {
    $client = new OpenAIClient();
    $iaResponse = $client->getCompletion($userPrompt, $model, $temperature, $maxTokens);
    
    // Extrai o conteúdo da resposta da IA
    $aiText = $iaResponse['choices'][0]['message']['content'] ?? 'Nenhuma resposta válida da IA.';
    
    $response['success'] = true;
    $response['data'] = [
        'generated_text' => $aiText,
        'full_response' => $iaResponse // Pode ser útil para depuração
    ];

} catch (Exception $e) {
    // Para erros da API, tente usar o código HTTP se for uma exceção conhecida
    $errorCode = $e->getCode();
    if ($errorCode >= 400 && $errorCode < 600) {
        http_response_code($errorCode);
    } else {
        http_response_code(500); // Erro interno do servidor
    }
    $response['error'] = "ERRO: " . $e->getMessage();
}

echo json_encode($response);
