# 🚀 Laravel First Decision

## 📋 Descrição do Projeto  
Aplicação Laravel para gerenciamento de produtos, com autenticação via token e interface web responsiva.

---

## ⚙️ Pré-requisitos  
- 🐳 Docker  
- 🐳 Docker Compose  
- 🔧 Make (opcional, para facilitar execução de comandos)  
- 💡 Composer instalado no container Laravel  

---

## 🛠️ Instalação

1. 📥 Clone o repositório:
```bash
git clone https://github.com/ismaelgomesesilva/laravel-first-decision.git
cd laravel-first-decision
```

2. 🐳 Suba os containers:
```bash
docker-compose up -d --build
```

3. 🧱 Instale as dependências PHP (dentro do container):
```bash
docker exec -it laravel_app composer install
```

4. 🛠️ Copie o arquivo de exemplo `.env` e gere a chave da aplicação:
```bash
docker exec -it laravel_app cp .env.example .env
docker exec -it laravel_app php artisan key:generate
```

5. 🗃️ Execute as migrações do banco de dados:
```bash
docker exec -it laravel_app php artisan migrate
```

6. 🔧 Corrija permissões (se necessário):
```bash
make fix-perms
```

7. 📦 Instale as dependências do frontend:
```bash
make node-install
```

8. 🚀 Faça o build com o Vite:
```bash
make node-build
```

9. 🌐 Acesse a aplicação no navegador:
```
http://localhost
```

---

## 🔐 API RESTful Protegida por Token

Esta aplicação expõe endpoints da API para operações CRUD sobre produtos, protegidos por autenticação via token.

### 🔑 Autenticação via Token

1. Acesse o container do Laravel:
```bash
docker exec -it laravel_app bash
```

2. Gere um token de autenticação pessoal:
```bash
php artisan tinker
>>> $user = App\Models\User::find(1);
>>> $token = $user->createToken('first-decision')->plainTextToken;
```

3. Use esse token nas requisições da API com o cabeçalho:
```
Authorization: Bearer SEU_TOKEN_AQUI
```

---

## 📬 Como Testar a API com o Postman

1. 🔓 Abra o Postman.

2. ⬇️ Importe a collection `ProdutosAPI.postman_collection.json` (presente na raiz do projeto):
   - Clique em **Import** no canto superior esquerdo.
   - Selecione o arquivo.
   - Clique em **Import** para adicioná-la ao Postman.

3. 🧪 Use o endpoint **Gerar Token** da collection para gerar seu token.

4. 📁 Selecione a collection **API Produtos** na barra lateral.

5. 🔐 Clique na aba **Authorization** da collection.

6. ⚙️ Em **Type**, selecione **Bearer Token**.

7. 📋 Cole o token gerado no campo **Token**.

8. ✅ Agora você pode usar todos os endpoints da collection autenticado.