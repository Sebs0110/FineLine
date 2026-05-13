# Documentação da Implementação do Sistema de Autenticação no Projeto FineLine

Este documento detalha as modificações realizadas no projeto FineLine para integrar um sistema de autenticação completo utilizando os recursos nativos do Laravel, com suporte a Bootstrap e jQuery.

## 1. Visão Geral

O objetivo principal foi adicionar funcionalidades de login, registro e proteção de rotas, garantindo que apenas usuários autenticados possam acessar determinadas partes da aplicação. As alterações foram focadas em adaptar o scaffold de autenticação do Laravel UI à estrutura de banco de dados e convenções de nomenclatura existentes no projeto FineLine.

## 2. Pré-requisitos

Para o correto funcionamento do sistema de autenticação, as seguintes dependências foram instaladas e configuradas:

*   **PHP 8.4**: A versão do PHP foi atualizada para atender aos requisitos do projeto.
*   **Composer**: Gerenciador de dependências do PHP.
*   **Laravel UI**: Pacote que fornece o scaffolding de autenticação para Laravel, incluindo views e controladores básicos para Bootstrap.

## 3. Alterações Realizadas

As principais modificações foram aplicadas nos seguintes arquivos e componentes:

### 3.1. Instalação e Configuração do Laravel UI

O pacote `laravel/ui` foi utilizado para gerar o esqueleto inicial do sistema de autenticação. Os comandos executados foram:

```bash
composer require laravel/ui
php artisan ui bootstrap --auth
npm install && npm run dev
```

### 3.2. Modelo `User` (`app/Models/User.php`)

O modelo `User` foi ajustado para mapear corretamente a tabela `usuarios` e suas colunas, que são diferentes das convenções padrão do Laravel (`users`, `email`, `password`). Foram adicionados métodos para especificar a chave primária (`usu_id`) e o campo de senha (`usu_senha`).

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'usu_id';

    protected $fillable = [
        'usu_nome',
        'usu_email',
        'usu_senha',
        'usu_tipousuario_id',
    ];

    protected $hidden = [
        'usu_senha',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'usu_email_verificacao' => 'datetime',
            'usu_senha' => 'hashed',
        ];
    }

    public function getAuthPassword()
    {
        return $this->usu_senha;
    }

    public function getAuthIdentifierName()
    {
        return 'usu_id';
    }

    // ... (relacionamentos existentes)
}
```

### 3.3. `LoginController` (`app/Http/Controllers/Auth/LoginController.php`)

O `LoginController` foi modificado para utilizar o campo `usu_email` como credencial de login, em vez do padrão `email`.

```php
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function username()
    {
        return 'usu_email';
    }
}
```

### 3.4. `RegisterController` (`app/Http/Controllers/Auth/RegisterController.php`)

O `RegisterController` foi adaptado para validar e criar usuários utilizando os campos `usu_nome`, `usu_email` e `usu_senha`. Um valor padrão (`1`) foi atribuído a `usu_tipousuario_id` durante o registro, que pode ser ajustado conforme a lógica de negócio.

```php
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'usu_nome' => ['required', 'string', 'max:300'],
            'usu_email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'usu_senha' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'usu_nome' => $data['usu_nome'],
            'usu_email' => $data['usu_email'],
            'usu_senha' => Hash::make($data['usu_senha']),
            'usu_tipousuario_id' => 1, // Default para usuário comum, ajuste conforme necessário
        ]);
    }
}
```

### 3.5. Views de Autenticação (`resources/views/auth/*.blade.php`)

As views `login.blade.php` e `register.blade.php` foram atualizadas para refletir os nomes dos campos (`usu_email`, `usu_nome`, `usu_senha`) utilizados nos controladores e no modelo `User`.

### 3.6. Rotas (`routes/web.php`)

As rotas de recursos existentes (`onibus`, `avisos`, `usuarios`, `motoristas`) foram agrupadas sob um middleware `auth`, garantindo que apenas usuários autenticados possam acessá-las.

```php
// ...

Route::middleware(['auth'])->group(function () {
    Route::resource('onibus', OnibusController::class)->parameters([
        'onibus' => 'onibus'
    ]);

    Route::resource('avisos', AvisoController::class);

    Route::resource('usuarios', UserController::class);

    Route::resource('motoristas', MotoristaController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
```

### 3.7. Layout Principal (`resources/views/estrutura.blade.php`)

O layout principal foi modificado para exibir links de login/registro quando o usuário não está autenticado e um link de logout quando autenticado. Além disso, o menu de 
