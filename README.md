Запуск сервера
php -S localhost:4000 router.php 
можно указать любой порт

XDEBUG в Docker 
в xdebug.ini надо настроить
xdebug.client_host={host} , {host} можно узнать с помощью команды  ip addr show docker0 | awk '/inet / {print $2}' | cut -d'/' -f1

cli команда из под композера, пример
docker-compose exec app php console.php db/migrate --file=db.sql 

db/migrate - путь до файла, 
далее идут параметры