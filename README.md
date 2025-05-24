# 🚀 Laravel First Decision

## 📋 Descrição do Projeto
Aplicação Laravel para gerenciamento de produtos.

## ⚙️ Pré-requisitos
- 🐳 Docker  
- 🐳 Docker Compose  
- 🔧 Make (opcional, para facilitar execução de comandos)

## ⚙️ Instalação

### 🔁 Instalação Rápida (recomendado)

Se você tiver o `make` instalado, pode executar tudo com um único comando:

```bash
make install
```
---

### 🧩 Instalação passo a passo (opcional)

Caso prefira fazer manualmente, siga os passos abaixo:

1. 📥 Clone o repositório:
```bash
git clone https://github.com/ismaelgomesesilva/laravel-first-decision.git
cd laravel-first-decision
```

2. 🐳 Suba os containers:
```bash
docker-compose up -d --build
```

3. 🔧 Corrija permissões, se necessário:
```bash
sudo chown -R $(USER):www-data laravel-app
sudo find laravel-app -type f -exec chmod 644 {} \;
sudo find laravel-app -type d -exec chmod 755 {} \;
sudo chmod -R 775 laravel-app/storage laravel-app/bootstrap/cache
```

4. 📦 Instale as dependências do frontend:
```bash
docker exec -it node_app npm install
```

5. 🚀 Faça o build com o Vite:
```bash
docker exec -it node_app npm run build
```

6. 🌱 Rode as migrations e seeders:
```bash
docker exec -it laravel_app php artisan migrate --seed
```

### 🌐 Acesse a aplicação no navegador:
http://localhost

---

## 🔐 API RESTful Protegida por Token - Instruções

Esta aplicação expõe endpoints da API para operações CRUD sobre produtos, protegidos por autenticação via token.

### 🔑 Autenticação via Token

1. Gere um token de autenticação pessoal:
```bash
docker exec -it laravel_app bash
php artisan tinker
>>> $user = App\Models\User::find(1);
>>> $token = $user->createToken('first-decision')->plainTextToken;
```

2. Utilize esse token nas requisições da API adicionando o cabeçalho:
Authorization: Bearer SEU_TOKEN_AQUI

---

## 📬 Como testar a API pelo Postman

1. 🔓 Abra o Postman.

2. ⬇️ Importe a collection `ProdutosAPI.postman_collection.json` que está na raiz do projeto:
   - Clique em **Import** no canto superior esquerdo.
   - Selecione o arquivo `ProdutosAPI.postman_collection.json`.
   - Clique em **Import** para adicioná-la ao Postman.

3. 🔑 Na collection importada, abra o endpoint **Gerar Token** e faça a requisição para gerar seu token de autenticação.

4. 📁 Selecione a collection **API Produtos** na barra lateral.

5. 🔐 Clique na aba **Authorization** da collection.

6. ⚙️ No tipo de autorização, escolha **Bearer Token**.

7. 📋 Cole o token gerado no passo 3 no campo **Token**.

8. ✅ Agora você pode usar todos os endpoints da collection com a autenticação configurada.


---

## 🧪 Executando os Testes

Para rodar os testes automatizados (unitários e de feature), utilize o comando abaixo:

```bash
make test
```

Ou, diretamente via Docker:

```bash
docker exec -it laravel_app php artisan test
```