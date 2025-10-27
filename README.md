## 👨‍💻 Autor

<div align="center">
  <img src="https://avatars.githubusercontent.com/ninomiquelino" width="100" height="100" style="border-radius: 50%">
  <br>
  <strong>Onivaldo Miquelino</strong>
  <br>
  <a href="https://github.com/ninomiquelino">@ninomiquelino</a>
</div>

---

# 🤖 Assistente de Conteúdo com IA (PHP & OpenAI API)

![Made with PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white)
![Frontend JavaScript](https://img.shields.io/badge/Frontend-JavaScript-F7DF1E?logo=javascript&logoColor=black)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-38B2AC?logo=tailwindcss&logoColor=white)
![OpenAI API](https://img.shields.io/badge/OpenAI-GPT--3.5-412991?logo=openai)
![License MIT](https://img.shields.io/badge/License-MIT-green)
![Status Stable](https://img.shields.io/badge/Status-Stable-success)
![Version 1.0.0](https://img.shields.io/badge/Version-1.0.0-blue)
![GitHub stars](https://img.shields.io/github/stars/NinoMiquelino/php-ai-assistant?style=social)
![GitHub forks](https://img.shields.io/github/forks/NinoMiquelino/php-ai-assistant?style=social)
![GitHub issues](https://img.shields.io/github/issues/NinoMiquelino/php-ai-assistant)

Este projeto demonstra a integração de um backend PHP com uma API de Inteligência Artificial externa, especificamente a API de chat da OpenAI (GPT-3.5 Turbo). Ele permite que você use o PHP como um "middleware" seguro para enviar prompts e receber conteúdo gerado por IA, com um frontend JavaScript interativo.

---

## 🧠 Destaques da IA e Integração

* **Integração OpenAI API:** O backend PHP utiliza `cURL` para fazer requisições HTTP POST para o endpoint de chat da OpenAI, enviando prompts e parâmetros como modelo e criatividade (`temperature`).
* **Segurança da Chave de API:** A chave de API da OpenAI é armazenada de forma segura em um arquivo `.env` (variável de ambiente), utilizando a biblioteca `phpdotenv` para carregamento, prevenindo que a chave seja exposta no código-fonte.
* **PHP POO (OpenAIClient):** A lógica de comunicação com a API da OpenAI é encapsulada em uma classe `OpenAIClient`, garantindo reusabilidade e organização.
* **JavaScript Assíncrono e UX:** O frontend gerencia o estado da UI durante a requisição de IA (que pode levar alguns segundos), exibindo um spinner de carregamento e tratando mensagens de sucesso/erro de forma amigável.
* **Prompt Engineering Básico:** O projeto inclui campos para ajustar o prompt e a "temperatura" (criatividade) do modelo, introduzindo conceitos básicos de como interagir com modelos de IA.

---

## 🛠️ Tecnologias Utilizadas

* **Backend:** PHP 7.4+ (POO, cURL, `phpdotenv` para `.env`).
* **IA:** API da OpenAI (modelo `gpt-3.5-turbo`).
* **Gerenciador de Dependências:** Composer.
* **Frontend:** HTML5, JavaScript Vanilla (`fetch` API) e Tailwind CSS.

---

## 🧩 Estrutura do Projeto

```
php-ai-assistant/
├── index.html
├── README.md
├── .gitignore
├── .env
└── 📁 src/
         ├── OpenAIClient.php
         └── api.php
```
---

## ⚙️ Configuração e Instalação

### Pré-requisitos Críticos

1.  **PHP** com `curl` e `json` habilitados.
2.  **Composer** instalado globalmente.
3.  **Chave de API da OpenAI:** Você precisará criar uma conta na [OpenAI Platform](https://platform.openai.com/) e gerar uma "API Key" secreta.

### 1\. Instalar Dependências PHP

No terminal, na pasta raiz do projeto (`/php-ai-assistant`), execute:

```bash
composer install
```

### 2\. Configurar a Chave de API da OpenAI

Crie um arquivo chamado `.env` na **raiz do projeto** (`/php-ai-assistant/.env`) e adicione sua chave de API:

```
OPENAI_API_KEY=sua_chave_secreta_aqui
```

**ATENÇÃO:** Substitua `sua_chave_secreta_aqui` pela chave que você obteve da OpenAI. **NUNCA** envie este arquivo `.env` para repositórios públicos (GitHub, etc.).

### 3\. Executar o Servidor

Utilize o servidor embutido do PHP (a partir da raiz do projeto):

```bash
php -S localhost:8001
```

* **Acesse:** `http://localhost:8001/public/index.html`.

---

## 📝 Instruções de Uso

1.  Acesse o `index.html` no seu navegador.
2.  Digite um prompt ou instrução no campo de texto (ex: "Escreva um poema curto sobre a beleza da natureza.").
3.  Ajuste o "Modelo de IA" ou a "Criatividade" (temperatura) se desejar experimentar.
4.  Clique em **"Gerar Conteúdo com IA"**.
5.  Observe o spinner de carregamento enquanto o PHP faz a requisição à OpenAI.
6.  A resposta da IA aparecerá na área de "Resposta da IA".

### Dicas de Prompts:

* "Gere 5 ideias para nomes de um blog sobre culinária vegana."
* "Resuma o livro 'Dom Quixote' em três frases."
* "Qual é a capital da França e por que ela é famosa?"
* "Escreva uma piada sobre programação."

---

## 🤝 Contribuições
Contribuições são sempre bem-vindas!  
Sinta-se à vontade para abrir uma [*issue*](https://github.com/NinoMiquelino/php-ai-assistant/issues) com sugestões ou enviar um [*pull request*](https://github.com/NinoMiquelino/php-ai-assistant/pulls) com melhorias.

---

## 💬 Contato
📧 [Entre em contato pelo LinkedIn](https://www.linkedin.com/in/onivaldomiquelino/)  
💻 Desenvolvido por **Onivaldo Miquelino**

---
