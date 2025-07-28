# 📘 API RESTful - Gerenciamento de Usuários

Este projeto consiste em uma API RESTful desenvolvida com Laravel para gerenciar usuários, endereços e permissões. O sistema segue boas práticas de desenvolvimento como SOLID, DRY, e inclui autenticação com JWT.

---

## ✅ Funcionalidades

- 🔐 Autenticação com JWT (Laravel Sanctum)
- 👤 CRUD de usuários
- 🏷️ Atribuição de permissões (usuário/admin)
- 🏠 Gerenciamento de endereços relacionados ao usuário
- ✔️ Validação de dados (CPF, e-mail, etc.)
- 🧪 Testes automatizados (unitários e de API)

---

## 🚀 Tecnologias

- PHP 8.x
- Laravel 12
- Sanctum (JWT)
- MySQL / SQLite (para testes)
- PHPUnit

---

## 🛠️ Instalação

```bash
git clone https://github.com/kavim/targetit-test.git
cd targetit-test
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
