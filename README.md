# CRUD de Usuários com Perfil - Laravel (PHP)

Esta é uma API RESTful desenvolvida em PHP com o framework Laravel. Ela permite a criação, listagem, atualização e exclusão de usuários, incluindo um relacionamento de chave estrangeira com a tabela de perfis.

> 📄 **Atenção:** Para informações detalhadas sobre as rotas, regras de negócio e o formato exato dos dados esperados (JSON) em cada endpoint da API, consulte a **documentação em PDF** fornecida junto com o link deste repositório.

---

## ⚙️ Pré-requisitos

Antes de iniciar, você precisa ter instalado no seu ambiente:
* **PHP** (v8.2 ou superior)
* **Composer** (Gerenciador de pacotes do ecossistema PHP)
* **MySQL** (Servidor rodando na porta 3306)
* **Postman** ou Insomnia (Para realizar os testes das requisições)
* **Git**

## 🚀 Como rodar o projeto localmente

Siga o passo a passo abaixo para configurar o banco de dados e iniciar o servidor da API:

### 1. Clone o repositório
```bash
git clone https://github.com/CarlosCF0503/Sistema-CRUD-de-Usuario-com-Perfil---laravel.git
cd Sistema-CRUD-de-Usuario-com-Perfil---laravel
```

### 2. Instale as dependências do Laravel
No terminal da raiz do projeto, baixe as bibliotecas necessárias executando:
```bash
composer install
```

### 3. Configure o Banco de Dados (.env)
O projeto já conta com as configurações apontando para o banco local. Certifique-se de que o seu banco MySQL possui um *schema* criado com o nome `db_aula_api_2026`.
As credenciais padrão configuradas são:
* **Database:** `db_aula_api_2026`
* **Username:** `root`
* **Password:** `123456`

*(Caso a sua senha do MySQL seja diferente, altere o valor de `DB_PASSWORD` no arquivo `.env`).*

### 4. Sincronize o Banco de Dados (Migrations)
O Laravel criará as tabelas `profiles` e `users` (e outras tabelas base do sistema) automaticamente. Rode o comando:
```bash
php artisan migrate
```
*(Nota: Como a tabela `users` exige um `id_profile`, você precisará inserir manualmente pelo menos um perfil na tabela `profiles` diretamente no seu banco de dados antes de testar a criação de usuários).*

### 5. Inicie o Servidor
Com o banco configurado, suba o servidor de desenvolvimento:
```bash
php artisan serve
```
O terminal exibirá a mensagem de que a aplicação está acessível em: `http://localhost:8000`

---

## 🧪 Como testar a API no Postman

Com o servidor rodando em segundo plano (`php artisan serve`), abra o **Postman** e siga as instruções abaixo para cada rota:

### Configuração Geral para todas as requisições:
Vá na aba **Headers** do Postman e adicione a seguinte chave para o Laravel retornar as respostas em JSON corretamente:
* **Key:** `Accept`
* **Value:** `application/json`

### 1. Criar Usuário
* **Método:** `POST`
* **URL:** `http://127.0.0.1:8000/api/user/cadastro`
* **Body (raw > JSON):**
  ```json
  {
    "name": "Carlos Cruz",
    "email": "carlos@email.com",
    "password": "senha_segura",
    "id_profile": 1
  }
  ```

### 2. Listar todos os Usuários
* **Método:** `GET`
* **URL:** `http://127.0.0.1:8000/api/user`
*(Não é necessário enviar Body).*

### 3. Atualizar um Usuário Específico
* **Método:** `PUT`
* **URL:** `http://127.0.0.1:8000/api/user/1` *(Substitua o `1` pelo ID do usuário)*
* **Body (raw > JSON):**
  ```json
  {
    "name": "Carlos Cruz Atualizado"
  }
  ```

### 4. Deletar um Usuário
* **Método:** `DELETE`
* **URL:** `http://127.0.0.1:8000/api/user/1` *(Substitua o `1` pelo ID do usuário a ser excluído)*
*(Não é necessário enviar Body).*
