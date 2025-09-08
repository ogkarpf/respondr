# Respondr

**Respondr** is a small Laravel package to standardize API responses. It ensures that all API responses are returned in a consistent format and provides helpful tools for error and success handling.

---

## 🚀 Installation

```bash
composer require ogkarpf/respondr
```

---

## 📦 Features

- Consistent JSON response structure for all API endpoints
- Facade for easy success and error responses
- Configurable response keys (`status`, `data`, `message`, `errors`)
- Optional middleware to automatically append an API version to every response

---

## ⚙️ Configuration

After installation, publish the config file:

```bash
php artisan vendor:publish --provider="ogkarpf\respondr\RespondrServiceProvider" --tag="respondr-config"
```

This will create `config/respondr.php` in your project.  
You can customize the response keys, default status, and API version middleware:

```php
return [
    'format' => [
        'status_key'  => 'status',
        'data_key'    => 'data',
        'message_key' => 'message',
        'errors_key'  => 'errors',
    ],
    'default_status' => 'success',
    'version_middleware' => [
        'enabled' => true,
        'version' => '1.0.0',
        'key' => 'api_version',
    ],
];
```

---

## 🧩 Usage

### Success Response

```php
use ogkarpf\respondr\Facades\Respondr;

return Respondr::success(['foo' => 'bar'], 'All good', 200);
```

### Error Response

You can pass an array of error messages, or any kind of Exception/Throwable objects.  
All exceptions will automatically be converted to their message string.

```php
// Pass error strings
return Respondr::error(['invalid_field'], 'Something went wrong', 422);

// Pass exceptions or throwables
return Respondr::error([new Exception('Custom error'), new RuntimeException('Runtime issue')], 'Failed', 400);
```

> **Note:**  
> The `error` method accepts arrays containing strings, exceptions, or throwables.  
> All throwable objects will be converted to their message text in the response.

---

## 🛡️ API Version Middleware

If enabled in the config, the middleware will automatically append the API version to every JSON response under the configured key (default: `api_version`).  
The middleware is automatically applied to all routes in the `api` middleware group.

---

## 🧪 Testing

You can run the included tests with:

```bash
composer test
```
