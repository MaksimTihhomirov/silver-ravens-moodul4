# The Silver Ravens

Multimeedia proovieksam – Moodul 4

Autor: Maksim Tihhomirov

## Projekti kirjeldus

The Silver Ravens on e-spordimeeskonna veebileht
ja e-pood, mis võimaldab külastajatel tutvuda
meeskonnaga, vaadata tooteid ning kasutada ostukorvi.

Administraator saab hallata tooteid ja vaadata
kontaktivormi kaudu saadetud sõnumeid.

## Kasutatud tehnoloogiad

- HTML5
- CSS3
- JavaScript
- PHP 8.4
- Laravel 13
- MySQL 8.0
- Composer
- Git ja GitHub

## Vajalik tarkvara

- PHP 8.4 või uuem
- Composer
- MySQL
- Veebibrauser
- MAMP või muu MySQL-i serverikeskkond

## Projekti paigaldamine

### 1. Sõltuvuste paigaldamine

Ava projekti kaust terminalis ja käivita:

```bash
composer install
```

### 2. Keskkonna seadistamine

```bash
cp .env.example .env
php artisan key:generate
```

### 3. Andmebaasi loomine

Loo MySQL-is andmebaas nimega `silver_ravens`.

Seadista `.env` fail:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=silver_ravens
DB_USERNAME=root
DB_PASSWORD=root
```

Muuda vajadusel porti, kasutajanime ja parooli
vastavalt oma MySQL-i seadistusele.

### 4. Andmebaasi tabelite loomine

```bash
php artisan migrate
php artisan db:seed --class=ProductSeeder
```

### 5. Projekti käivitamine

```bash
php artisan serve --port=8003
```

Veebilehe aadress:

http://127.0.0.1:8003

## Administraatoripaneel

Administraatori sisselogimise aadress:

http://127.0.0.1:8003/admin/login

Administraator saab:

- Vaadata toodete nimekirja.
- Lisada uusi tooteid.
- Muuta olemasolevaid tooteid.
- Kustutada tooteid.
- Hallata toodete pilte, värve ja suurusi.
- Vaadata kontaktivormi sõnumeid.

Administraatori konto tuleb luua pärast
andmebaasi paigaldamist.

### Administraatori konto loomine

Käivita terminalis:

```bash
php artisan tinker
```

Seejärel sisesta järgmised käsud ükshaaval:

```php
$password = \Illuminate\Support\Str::random(20);
$user = new \App\Models\User;
$user->name = 'Administrator';
$user->email = 'admin@silverravens.example';
$user->password = \Illuminate\Support\Facades\Hash::make($password);
$user->is_admin = true;
$user->save();
```

Salvesta genereeritud parool turvalises kohas.

Tinkerist väljumiseks sisesta:

```php
exit
```

Logi administraatoripaneeli sisse loodud e-posti
aadressi ja parooliga.

## Piltide üleslaadimine

Vajadusel muuda PHP konfiguratsioonifailis
järgmisi väärtusi:

```ini
upload_max_filesize=8M
post_max_size=80M
```

Pärast seadistuste muutmist taaskäivita PHP server.

## GitHub

https://github.com/MaksimTihhomirov/silver-ravens-moodul4 