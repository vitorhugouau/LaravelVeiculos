# 🚗 AutoVendas - Sistema de Gestão de Veículos

Sistema completo de gestão e exibição de veículos desenvolvido em Laravel 12, com painel administrativo moderno e interface pública responsiva.

## 📋 Índice

- [Sobre o Projeto](#sobre-o-projeto)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Requisitos](#requisitos)
- [Instalação](#instalação)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Banco de Dados](#banco-de-dados)
- [Arquivos e Funcionalidades](#arquivos-e-funcionalidades)
- [Rotas](#rotas)
- [Como Usar](#como-usar)
- [Autenticação](#autenticação)
- [Painel Administrativo](#painel-administrativo)
- [Interface Pública](#interface-pública)

---

## 🎯 Sobre o Projeto

AutoVendas é um sistema web completo para gestão de veículos, permitindo:

- **Área Pública**: Visualização de veículos com filtros avançados (marca, ano, preço)
- **Painel Administrativo**: CRUD completo para veículos, marcas, modelos e cores
- **Autenticação**: Sistema de login e registro com controle de acesso
- **Design Moderno**: Interface responsiva com tema escuro e vermelho/branco

---

## 🛠 Tecnologias Utilizadas

### Backend
- **Laravel 12** - Framework PHP
- **PHP 8.2+** - Linguagem de programação
- **MySQL/MariaDB** - Banco de dados

### Frontend
- **Blade Templates** - Sistema de templates do Laravel
- **CSS3** - Estilização customizada
- **JavaScript (Vanilla)** - Interatividade
- **Font Awesome 6.4** - Ícones
- **Google Fonts (Inter)** - Tipografia

### Ferramentas
- **Composer** - Gerenciador de dependências PHP
- **NPM** - Gerenciador de pacotes Node.js
- **Vite** - Build tool para assets
- **Bootstrap 5** - Framework CSS (parcialmente utilizado)

---

## 📦 Requisitos

- PHP >= 8.2
- Composer
- Node.js >= 18.x e NPM
- MySQL >= 5.7 ou MariaDB >= 10.3
- Servidor web (Apache/Nginx) ou PHP Built-in Server

---

## 🚀 Instalação

### 1. Clone o repositório

```bash
git clone https://github.com/seu-usuario/LaravelVeiculos.git
cd LaravelVeiculos
```

### 2. Instale as dependências PHP

```bash
composer install
```

### 3. Configure o ambiente

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure o banco de dados

Edite o arquivo `.env` e configure as credenciais do banco:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=autovendas
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 5. Execute as migrações

```bash
php artisan migrate
```

### 6. (Opcional) Execute os seeders para dados de exemplo

```bash
php artisan db:seed
```

### 7. Instale as dependências NPM

```bash
npm install
```

### 8. Compile os assets

```bash
npm run build
```

### 9. Inicie o servidor

```bash
php artisan serve
```

O sistema estará disponível em: `http://localhost:8000`

---

## 📁 Estrutura do Projeto

```
LaravelVeiculos/
├── app/                          # Código da aplicação
│   ├── Http/
│   │   ├── Controllers/          # Controladores
│   │   │   ├── Admin/            # Controllers do painel admin
│   │   │   ├── Auth/             # Controllers de autenticação
│   │   │   └── Public/           # Controllers da área pública
│   │   └── Middleware/           # Middlewares
│   ├── Models/                   # Modelos Eloquent
│   └── Providers/                # Service Providers
├── bootstrap/                    # Arquivos de inicialização
├── config/                       # Arquivos de configuração
├── database/
│   ├── migrations/               # Migrações do banco
│   └── seeders/                  # Seeders para dados iniciais
├── public/                       # Arquivos públicos (index.php)
├── resources/
│   ├── views/                    # Templates Blade
│   │   ├── admin/                # Views do painel admin
│   │   ├── auth/                 # Views de autenticação
│   │   ├── layouts/              # Layouts principais
│   │   ├── partials/             # Componentes reutilizáveis
│   │   └── public/               # Views da área pública
│   ├── css/                      # Arquivos CSS
│   ├── js/                       # Arquivos JavaScript
│   └── sass/                     # Arquivos SASS
├── routes/
│   └── web.php                   # Rotas da aplicação
├── storage/                      # Arquivos de armazenamento
├── tests/                        # Testes automatizados
└── vendor/                       # Dependências do Composer
```

---

## 🗄 Banco de Dados

### Estrutura das Tabelas

#### **users**
Armazena os usuários do sistema.

| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | bigint | Chave primária |
| name | string | Nome do usuário |
| email | string | Email (único) |
| password | string | Senha criptografada |
| is_admin | boolean | Se é administrador |
| timestamps | timestamps | created_at, updated_at |

#### **login**

# Usúario Comum

usuário = test@example.com 
senha = password

# Admin 

usuário = admin@example.com
senha = password

#### **brands**
Armazena as marcas de veículos.

| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | bigint | Chave primária |
| name | string | Nome da marca |
| timestamps | timestamps | created_at, updated_at |

#### **models**
Armazena os modelos de veículos.

| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | bigint | Chave primária |
| name | string | Nome do modelo |
| brand_id | bigint | FK para brands |
| timestamps | timestamps | created_at, updated_at |

#### **colors**
Armazena as cores disponíveis.

| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | bigint | Chave primária |
| colors | string | Nome da cor |
| timestamps | timestamps | created_at, updated_at |

#### **vehicles**
Armazena os veículos cadastrados.

| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | bigint | Chave primária |
| photo | string | URL da foto |
| brand_id | bigint | FK para brands |
| model_id | bigint | FK para models |
| color_id | bigint | FK para colors |
| year | integer | Ano do veículo |
| mileage | integer | Quilometragem |
| price | decimal(10,2) | Preço |
| description | text | Descrição |
| timestamps | timestamps | created_at, updated_at |

### Relacionamentos

- `Vehicle` → `Brand` (belongsTo)
- `Vehicle` → `CarModel` (belongsTo)
- `Vehicle` → `Color` (belongsTo)
- `CarModel` → `Brand` (belongsTo)

---

## 📄 Arquivos e Funcionalidades

### Models

#### `app/Models/Vehicle.php`
Model principal que representa um veículo.

**Campos fillable:**
- photo, brand_id, model_id, color_id, year, mileage, price, description

**Relacionamentos:**
- `brand()` - Pertence a uma marca
- `model()` - Pertence a um modelo
- `color()` - Pertence a uma cor

#### `app/Models/Brand.php`
Model para marcas de veículos.

**Relacionamentos:**
- `vehicles()` - Tem muitos veículos
- `models()` - Tem muitos modelos

#### `app/Models/CarModel.php`
Model para modelos de veículos.

**Relacionamentos:**
- `brand()` - Pertence a uma marca
- `vehicles()` - Tem muitos veículos

#### `app/Models/Color.php`
Model para cores.

**Relacionamentos:**
- `vehicles()` - Tem muitos veículos

#### `app/Models/User.php`
Model para usuários do sistema.

**Campos especiais:**
- `is_admin` - Define se o usuário é administrador

---

### Controllers

#### `app/Http/Controllers/Public/VehicleController.php`
Controlador para a área pública.

**Métodos:**
- `index(Request $request)` - Lista veículos com filtros
  - Filtros: brand_id, year, min_price, max_price
  - Retorna: veículos, marcas, anos disponíveis, preços min/max
- `show($id)` - Exibe detalhes de um veículo específico

#### `app/Http/Controllers/Admin/VehicleController.php`
Controlador CRUD para veículos no painel admin.

**Métodos:**
- `index()` - Lista todos os veículos (paginação)
- `create()` - Formulário de criação
- `store(Request $request)` - Salva novo veículo
- `edit($id)` - Formulário de edição
- `update(Request $request, $id)` - Atualiza veículo
- `destroy($id)` - Remove veículo

**Validações:**
- photo: URL obrigatória (max 500 chars)
- brand_id, model_id, color_id: IDs válidos
- year: 1900 até ano atual + 1
- mileage: inteiro >= 0
- price: numérico >= 0
- description: string (max 1000 chars)

#### `app/Http/Controllers/Admin/BrandController.php`
CRUD completo para marcas.

#### `app/Http/Controllers/Admin/ModelController.php`
CRUD completo para modelos.

#### `app/Http/Controllers/Admin/ColorController.php`
CRUD completo para cores.

#### `app/Http/Controllers/Admin/DashboardController.php`
Controlador do dashboard administrativo.

**Métodos:**
- `index()` - Exibe estatísticas e veículos recentes
  - Conta: veículos, marcas, modelos, cores
  - Lista: 5 veículos mais recentes

#### `app/Http/Controllers/Auth/LoginController.php`
Controlador de autenticação (herda de `AuthenticatesUsers`).

**Redirecionamento:** `/` após login

#### `app/Http/Controllers/Auth/RegisterController.php`
Controlador de registro (herda de `RegistersUsers`).

**Validações:**
- name: obrigatório, string, max 255
- email: obrigatório, email, único
- password: obrigatório, min 8 caracteres, confirmado

**Redirecionamento:** `/` após registro

---

### Middleware

#### `app/Http/Middleware/AdminOnly.php` ou `IsAdmin.php`
Middleware que verifica se o usuário é administrador.

**Uso:** Aplicado nas rotas do painel admin via `middleware('admin')`

---

### Views

#### Layouts

##### `resources/views/layouts/vehicles.blade.php`
Layout principal da área pública.

**Seções:**
- `@section('title')` - Título da página
- `@section('hero')` - Hero section
- `@section('filters')` - Filtros de busca
- `@section('content')` - Conteúdo principal
- `@section('scripts')` - Scripts JavaScript
- `@section('styles')` - Estilos customizados

**Características:**
- Tema escuro moderno
- Navbar com gradiente
- Hero section com animações
- Sistema de filtros avançado

##### `resources/views/layouts/admin.blade.php`
Layout do painel administrativo.

**Seções:**
- `@section('title')` - Título da página
- `@section('hero')` - Hero section
- `@section('content')` - Conteúdo principal
- `@section('styles')` - Estilos customizados
- `@section('scripts')` - Scripts JavaScript

**Características:**
- Navbar administrativa
- Sistema de alertas (success/error)
- Design consistente com área pública

##### `resources/views/layouts/app.blade.php`
Layout padrão do Laravel (usado em algumas views).

#### Área Pública

##### `resources/views/public/vehicles/index.blade.php`
Página inicial com listagem de veículos.

**Funcionalidades:**
- Hero section
- Filtros: marca, ano, faixa de preço
- Grid de cards de veículos
- Estado vazio quando não há resultados
- Scripts para filtro de preço com slider

##### `resources/views/public/vehicles/show.blade.php`
Página de detalhes do veículo.

**Funcionalidades:**
- Hero section com informações do veículo
- Galeria de imagens
- Especificações técnicas
- Botões de contato (WhatsApp, Email)
- Descrição completa
- Informações adicionais

#### Painel Administrativo

##### `resources/views/admin/dashboard.blade.php`
Dashboard principal.

**Componentes:**
- Cards de estatísticas (veículos, marcas, modelos, cores)
- Tabela de veículos recentes
- Links rápidos para ações

##### `resources/views/admin/vehicles/index.blade.php`
Listagem de veículos no admin.

**Funcionalidades:**
- Tabela com paginação
- Ações: editar, excluir
- Botão para criar novo veículo
- Estado vazio

##### `resources/views/admin/vehicles/create.blade.php`
Formulário de criação de veículo.

**Campos:**
- URL da foto
- Marca (select)
- Modelo (select - filtrado por marca via JS)
- Cor (select)
- Ano
- Quilometragem
- Preço
- Descrição

**JavaScript:**
- Filtro dinâmico de modelos baseado na marca selecionada

##### `resources/views/admin/vehicles/edit.blade.php`
Formulário de edição (similar ao create, com valores pré-preenchidos).

##### `resources/views/admin/brands/index.blade.php`
Listagem de marcas.

##### `resources/views/admin/brands/create.blade.php`
Formulário de criação de marca.

##### `resources/views/admin/brands/edit.blade.php`
Formulário de edição de marca.

**Nota:** Mesma estrutura para `models` e `colors`.

#### Autenticação

##### `resources/views/auth/login.blade.php`
Página de login.

**Características:**
- Design vermelho e branco
- Campos: email, senha
- Checkbox "Lembrar-me"
- Link para recuperação de senha
- Link para registro

##### `resources/views/auth/register.blade.php`
Página de registro.

**Características:**
- Design vermelho e branco
- Campos: nome, email, senha, confirmar senha
- Validação visual
- Link para login

#### Partials

##### `resources/views/partials/navbar.blade.php`
Componente de navbar reutilizável.

---

### Migrations

#### `database/migrations/2025_11_07_040615_create_brands_table.php`
Cria tabela `brands`.

#### `database/migrations/2025_11_07_040627_create_models_table.php`
Cria tabela `models` com FK para `brands`.

#### `database/migrations/2025_11_07_040636_create_colors_table.php`
Cria tabela `colors`.

#### `database/migrations/2025_11_07_040645_create_vehicles_table.php`
Cria tabela `vehicles` com FKs para brands, models e colors.

#### `database/migrations/2025_11_07_040658_create_users_table.php`
Cria tabela `users` padrão do Laravel.

#### `database/migrations/2025_11_10_220958_add_is_admin_to_users_table.php`
Adiciona coluna `is_admin` à tabela `users`.

---

### Seeders

#### `database/seeders/BrandSeeder.php`
Popula a tabela `brands` com marcas de exemplo.

#### `database/seeders/CarModelSeeder.php`
Popula a tabela `models` com modelos de exemplo.

#### `database/seeders/ColorSeeder.php`
Popula a tabela `colors` com cores de exemplo.

#### `database/seeders/VehicleSeeder.php`
Popula a tabela `vehicles` com veículos de exemplo.

#### `database/seeders/DatabaseSeeder.php`
Orquestra a execução de todos os seeders.

---

### Rotas

#### `routes/web.php`
Arquivo principal de rotas.

**Rotas Públicas:**
```php
GET  /                    → vehicles.index (listagem)
GET  /vehicle/{id}        → vehicle.show (detalhes)
```

**Rotas de Autenticação:**
```php
GET  /login               → login
POST /login               → login (processar)
GET  /register            → register
POST /register            → register (processar)
POST /logout              → logout
```

**Rotas Protegidas (Auth):**
```php
GET  /home                 → home (dashboard do usuário)
```

**Rotas Admin (Auth + Admin):**
```php
GET  /admin                → admin.dashboard
GET  /admin/vehicles       → admin.vehicles.index
GET  /admin/vehicles/create → admin.vehicles.create
POST /admin/vehicles       → admin.vehicles.store
GET  /admin/vehicles/{id}/edit → admin.vehicles.edit
PUT  /admin/vehicles/{id}  → admin.vehicles.update
DELETE /admin/vehicles/{id} → admin.vehicles.destroy

GET  /admin/brands         → admin.brands.index
GET  /admin/brands/create  → admin.brands.create
POST /admin/brands         → admin.brands.store
GET  /admin/brands/{id}/edit → admin.brands.edit
PUT  /admin/brands/{id}    → admin.brands.update
DELETE /admin/brands/{id}  → admin.brands.destroy

GET  /admin/models         → admin.models.index
GET  /admin/models/create  → admin.models.create
POST /admin/models         → admin.models.store
GET  /admin/models/{id}/edit → admin.models.edit
PUT  /admin/models/{id}     → admin.models.update
DELETE /admin/models/{id}  → admin.models.destroy

GET  /admin/colors         → admin.colors.index
GET  /admin/colors/create  → admin.colors.create
POST /admin/colors         → admin.colors.store
GET  /admin/colors/{id}/edit → admin.colors.edit
PUT  /admin/colors/{id}    → admin.colors.update
DELETE /admin/colors/{id}   → admin.colors.destroy
```

---

## 🎮 Como Usar

### Criando um Usuário Administrador

Após executar as migrações, crie um usuário admin via Tinker:

```bash
php artisan tinker
```

```php
$user = new App\Models\User();
$user->name = 'Admin';
$user->email = 'admin@example.com';
$user->password = Hash::make('senha123');
$user->is_admin = true;
$user->save();
```

### Acessando o Sistema

1. **Área Pública:** `http://localhost:8000`
   - Visualize veículos
   - Use filtros de busca
   - Veja detalhes dos veículos

2. **Login:** `http://localhost:8000/login`
   - Faça login com suas credenciais

3. **Registro:** `http://localhost:8000/register`
   - Crie uma nova conta

4. **Painel Admin:** `http://localhost:8000/admin`
   - Acesse após fazer login como admin
   - Gerencie veículos, marcas, modelos e cores

---

## 🔐 Autenticação

### Sistema de Autenticação

O sistema utiliza o pacote `laravel/ui` para autenticação.

**Funcionalidades:**
- Login com email e senha
- Registro de novos usuários
- Recuperação de senha
- Middleware de autenticação
- Middleware de verificação de admin

### Controle de Acesso

- **Usuários comuns:** Podem fazer login e acessar `/home`
- **Administradores (`is_admin = true`):** Podem acessar o painel `/admin`

---

## 🎨 Painel Administrativo

### Dashboard

O dashboard exibe:
- **Estatísticas:** Contagem de veículos, marcas, modelos e cores
- **Veículos Recentes:** Lista dos 5 veículos mais recentes
- **Links Rápidos:** Acesso rápido às principais funcionalidades

### Gestão de Veículos

1. **Listar:** Visualize todos os veículos com paginação
2. **Criar:** Adicione novos veículos com formulário completo
3. **Editar:** Modifique informações dos veículos
4. **Excluir:** Remova veículos do sistema

### Gestão de Marcas, Modelos e Cores

CRUD completo para cada entidade:
- Criar
- Listar
- Editar
- Excluir

**Nota:** Ao excluir uma marca/modelo/cor, os veículos relacionados também são removidos (cascade).

---

## 🌐 Interface Pública

### Página Inicial

A página inicial (`/`) oferece:

1. **Hero Section:** Apresentação visual atrativa
2. **Filtros:**
   - **Marca:** Dropdown com todas as marcas
   - **Ano:** Dropdown com anos disponíveis
   - **Preço:** Slider com range de preços
3. **Grid de Veículos:** Cards responsivos com:
   - Foto do veículo
   - Marca e modelo
   - Ano, quilometragem e cor
   - Preço
   - Botão "Ver Detalhes"

### Página de Detalhes

A página de detalhes (`/vehicle/{id}`) exibe:

1. **Hero Section:** Com informações principais
2. **Galeria:** Foto principal e miniaturas
3. **Especificações:** Ano, quilometragem, cor, marca
4. **Preço:** Valor destacado com opção de parcelamento
5. **Descrição:** Texto completo sobre o veículo
6. **Botões de Ação:**
   - WhatsApp (link direto)
   - Email
   - Voltar para listagem

---

## 🎨 Design e Estilo

### Tema

- **Área Pública:** Tema escuro moderno (preto/cinza com acentos roxos/azuis)
- **Painel Admin:** Tema escuro consistente com área pública
- **Autenticação:** Tema vermelho e branco

### Responsividade

Todas as páginas são totalmente responsivas:
- Desktop: Layout completo
- Tablet: Adaptação de grid
- Mobile: Layout em coluna única

### Componentes Visuais

- **Cards:** Bordas arredondadas, sombras, efeitos hover
- **Botões:** Gradientes, animações, estados hover
- **Inputs:** Bordas destacadas no foco, validação visual
- **Tabelas:** Hover effects, bordas sutis
- **Alertas:** Sistema de notificações estilizado

---

## 📝 Comandos Úteis

### Desenvolvimento

```bash
# Iniciar servidor
php artisan serve

# Compilar assets em desenvolvimento
npm run dev

# Compilar assets para produção
npm run build

# Limpar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Banco de Dados

```bash
# Executar migrações
php artisan migrate

# Reverter última migração
php artisan migrate:rollback

# Executar seeders
php artisan db:seed

# Resetar banco (cuidado!)
php artisan migrate:fresh --seed
```

### Tinker (Console Interativo)

```bash
php artisan tinker

# Exemplos:
Vehicle::count()
Brand::all()
$vehicle = Vehicle::find(1)
$vehicle->brand->name
```

---

## 🐛 Troubleshooting

### Problemas Comuns

1. **Erro de permissões:**
   ```bash
   chmod -R 775 storage bootstrap/cache
   ```

2. **Erro de autoload:**
   ```bash
   composer dump-autoload
   ```

3. **Assets não carregam:**
   ```bash
   npm install
   npm run build
   ```

4. **Erro de migração:**
   ```bash
   php artisan migrate:fresh
   ```



