# 📘 API RESTful - Gerenciamento de Usuários

Este projeto consiste em uma API RESTful desenvolvida com Laravel para gerenciar usuários, endereços e permissões. O sistema segue boas práticas de desenvolvimento como SOLID, DRY, e inclui autenticação com JWT.

---

## 🎥 Demonstração

[![Assista à demonstração no YouTube](https://img.youtube.com/vi/8PPVzs_n2j8/maxresdefault.jpg)](https://www.youtube.com/watch?v=8PPVzs_n2j8)

Assista no YouTube: [Clique aqui](https://www.youtube.com/watch?v=8PPVzs_n2j8)


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
