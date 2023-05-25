# Graduation Project

## Install

```bash
cp .env.example .env
docker-compose up -d
cd ./src && composer install
```

This command adds autoload, a helper function, and requirements to the composer file. When executed for the second time, it creates a file named `.env` using the script defined in the composer. The `.env` file has the database information, which is initially left blank. The database information is provided below.

- DB_HOST=`mariadb`
- DB_DATABASE=`news`
- DB_USERNAME=`root`
- DB_PASSWORD=`root`

## Importing the Database
1. A database named `news` should be created in PhpMyAdmin.
2. The `news.sql` file in the root directory should be imported.

## Sample User Accounts
- Emails: 
  - admin@ornek.com
  - moderator@ornek.com
  - editor@ornek.com
  - kullanici@ornek.com
- Password: 123456

---

## Maintenance Mode
To put the website into maintenance mode, the `MAINTENANCE_MODE` variable in the `.env` file should be set to `true`. By default, the value of this variable is `false`.

## API
- http://localhost/api/getNews?id=1
- http://localhost/api/allNews
- http://localhost/api/allNews?category=2
