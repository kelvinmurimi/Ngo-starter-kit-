#### Intial project  starter from https://laraveladmintw.com/v5/docs/installation
### **Features**
- **Two-Factor Authentication (2FA)**
- **Audit Trails**
- **System Settings**
- **Multiple Users Support**
- **Roles and Permissions Management**
- **Comprehensive Test Suite (Pest PHP)**
- **Light & Dark Mode Support** (based on user OS settings)
- **Tests**


## **Installation**



### **Manual Installation**

1. Clone the repository

```bash
git clone https://github.com/kelvinmurimi/Ngo-starter-kit-.git
```

Open the project folder

```bash
cd my-project
```

Copy the `.env.example` file to `.env`:

```bash
cp .env.example .env
```

Set database and emails settings inside `.env`

Install PHP Dependencies

```bash
composer install
```

Install JavaScript Dependencies & Build Assets
```bash
npm install && npm run build
```

Generate Application Key
```bash
php artisan key:generate
```

Create Storage Symlink
```bash
php artisan storage:link
```

Run Database Migrations & Seed Data
```bash
php artisan migrate --seed
```

Start the Development Server
```bash
php artisan serve
```

Laravel AdminTW supports both light and dark mode based on the users OS.

Provided are blade and Laravel Livewire components for common layout / UI elements and a complete test suite (Pest PHP).

## Documentation





## Contributing

Contributions are welcome and will be fully credited.

## Pull Requests

- **Document any change in behaviour** - Make sure the `readme.md` and any other relevant documentation are kept up-to-date.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

## Security

If you discover any security related issues, please email murimicodes@gmail.com email instead of using the issue tracker.

## License

Lara-Ngo under the [MIT license](https://opensource.org/licenses/MIT).
