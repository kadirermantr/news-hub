# News Hub

- **Tech Stack:** [Tech Stack File](https://github.com/kadirermantr/news-hub/blob/main/techstack.md)

## Installation

```bash
composer install
cp .env.example .env
docker-compose up -d
```

This command adds autoload, a helper function, and requirements to the composer file. It also creates a database and imports demo records.

- DB_PASSWORD=`root`

## User Accounts
- Emails: 
  - admin@test.com
  - moderator@test.com
  - editor@test.com
  - user@test.com
- Password: 123456

---

## Maintenance Mode
To put the website into maintenance mode, the `MAINTENANCE_MODE` variable in the `.env` file should be set to `true`. By default, the value of this variable is `false`.

## API
- http://localhost/api/getNews?id=1
- http://localhost/api/allNews
- http://localhost/api/allNews?category=2

---

**Note:** You can access the first version of this project from [here](https://github.com/teknasyon-bootcamp/bitirme-projesi-kadir).
