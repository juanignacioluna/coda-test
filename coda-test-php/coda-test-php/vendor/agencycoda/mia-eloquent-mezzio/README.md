# Instalación
1. Abrir public/index.php
```php
/** @var \Psr\Container\ContainerInterface $container */
$container = require 'config/container.php';

// Inicializar Database
Mia\Database\Eloquent::install($container);
```


1. composer coda-migrate
2. composer coda-make-migrate