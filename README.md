# API RESTful - Teste Técnico

## Instalação

```bash
git clone https://github.com/seuusuario/api-users.git
cd api-users
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
