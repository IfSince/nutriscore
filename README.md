# Prerequisites
Um das Backend lokal klonen zu können ist git auf dem Rechner zu installieren. Ebenfalls notwendig ist der Paketmanager [Composer](https://getcomposer.org/) zum installieren von Dependencies.

# Setup
Das Backend muss zunächst über git geklont werden. Danach muss die .env.example kopiert und in eine .env Datei überführt werden. Die enstprechenden Passwörter und Werte sind einzutragen. Anschließend müssen die Dependencies installiert werden:

```
composer install
```



## Datenbank
Die Datenbank wird über Laravel Migrations erstellt und verwaltet. Zum initialen erstellen und füllen der Enum-Tabellen muss folgendes ausgeführt werden:

```
php artisan migrate:fresh --seed
```

Danach kann das Projekt über 

```
php artisan serve
```

gestartet werden.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
