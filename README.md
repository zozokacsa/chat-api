# Chat API Laravel 12

Ez egy Laravel 12 alapú REST API projekt, ami üzenetküldést, felhasználókezelést és barátságokat kezel.

---

## 🛠 Telepítés

1. **Repository klónozása**

```bash
git clone git@github.com:zozokacsa/chat-api.git
cd chat-api
```

2. **Dependenciák telepítése**

```bash
composer install
```

3. **.env fájl létrehozása**

```bash
cp .env.example .env
```

4. **App key generálása**

```bash
php artisan key:generate
```

Állítsd be a `.env` fájlban az adatbázis és egyéb környezeti változókat. Példa Sail-re:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=chat_api
DB_USERNAME=sail
DB_PASSWORD=password
```

---

## 🐳 Laravel Sail futtatása

1. **Sail build és up**

```bash
./vendor/bin/sail up -d
```

2. **Migrációk futtatása**

```bash
./vendor/bin/sail artisan migrate
```

---

## 🌐 API elérés

* Alap prefix: `/api/...`
* Példák:

| Művelet           | HTTP | Endpoint                    |
|-------------------|------|-----------------------------|
| Regisztráció      | POST | `/api/auth/register`        |
| Bejelentkezés     | POST | `/api/auth/login`           |
| Saját adatok      | GET  | `/api/auth/me`              |
| Barátok listája   | GET  | `/api/friends`              |
| Barát kérések     | POST | `/api/friends/requests`     |
| Üzenet küldés     | POST | `/api/messages`             |
| Üzenet lekérdezés | GET  | `/api/messages/{friend_id}` |

### 🔑 Tokenes autentikáció

* Minden route, ami `auth:sanctum` és `verified` middleware-t használ, **Bearer token-t igényel**.
* Példa Header:

```
Authorization: Bearer <token>
```

* Token létrehozása login után:

```json
{
    "token": "xxxxxx"
}
```

---

## 📖 Swagger UI

* A projekt tartalmaz egy Swagger felületet, ahol kipróbálhatóak a végpontok.
* Elérés: [http://localhost/swagger](http://localhost/swagger)

---

## 📨 MailPit használata

* A projektben elérhető a MailPit például az email cím verifikációs levekhez.
* `.env` beállítás Laravel-hez:

```env
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="noreply@example.com"
MAIL_FROM_NAME="Chat API"
```

* Web UI elérés: [http://localhost:8025](http://localhost:8025)

---

## 🧪 Tesztek futtatása

1. **Testing environment**

* `.env.testing` vagy `phpunit.xml` beállítása

2. **Feature / Unit tesztek futtatása**

```bash
./vendor/bin/sail test
```

* Csak egy teszt futtatása (pl. MessageTest):

```bash
./vendor/bin/sail test --filter MessageTest
```
