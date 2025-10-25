<?php
// Carrega as variáveis de ambiente do .env
require_once __DIR__ . '/../vendor/autoload.php'; // Caminho para autoload do Composer
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../'); // Aponta para a pasta raiz do projeto
$dotenv->load();

class OpenAIClient {
    private string $apiKey;
    private string $baseUrl = "https://api.openai.com/v1/chat/completions"; // Endpoint para GPT-3.5/4

    public function __construct() {
        // Pega a chave da variável de ambiente
        $this->apiKey = $_ENV['OPENAI_API_KEY'] ?? ''; 
        if (empty($this->apiKey) || $this->apiKey === 'sua_chave_secreta_aqui') {
            throw new Exception("Chave de API da OpenAI não configurada no arquivo .env.");
        }
    }

    /**
     * Faz uma requisição para a API de chat da OpenAI.
     * @param string $prompt O texto da solicitação para a IA.
     * @param string $model O modelo da OpenAI a ser usado (ex: gpt-3.5-turbo).
     * @param float $temperature Criatividade (0.0 a 2.0).
     * @param int $maxTokens Limite de tokens na resposta.
     * @return array Resposta decodificada da API.
     */
    public function getCompletion(
        string $prompt, 
        string $model = 'gpt-3.5-turbo', // Modelo mais comum e econômico
        float $temperature = 0.7, 
        int $maxTokens = 300
    ): array {
        
        $headers = [
            "Content-Type: application/json",
            "Authorization: Bearer " . $this->apiKey
        ];

        $data = [
            "model" => $model,
            "messages" => [
                ["role" => "user", "content" => $prompt]
            ],
            "temperature" => $temperature,
            "max_tokens" => $maxTokens
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->baseUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60); // Timeout de 60 segundos
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        
        curl_close($ch);
        
        if ($response === false) {
            throw new Exception("Erro de rede cURL: " . $error);
        }

        $responseData = json_decode($response, true);
        
        if ($httpCode !== 200) {
            $apiError = $responseData['error']['message'] ?? 'Erro desconhecido da API.';
            throw new Exception("Erro da API OpenAI (HTTP {$httpCode}): " . $apiError);
        }
        
        return $responseData;
    }
}
