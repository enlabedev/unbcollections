#UNBCollections

Es un proyecto generado en Laravel 11 con Livewire

Para probarlo localmente debe generar los siguientes pasos:

```bash
git clone https://github.com/enlabedev/unbcollections.git
docker compose -f "docker-compose.yml" up -d --build 
cp .env.example .env
sail php artisan key:generate
sail php artisan migrate --seed
npm install
npm run build
```

Usuario para pruebas
test@example.com
password


Para ejecutar pruebas en la base de datos
sail php artisan test