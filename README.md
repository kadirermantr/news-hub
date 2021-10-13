# Bitirme Projesi - Kadir Erman
## Docker ortamını çalıştırma:

```bash
cp .env.example .env
docker-compose up
```

## Php için gerekenler:
src klasöründeyken aşağıdaki komut çalıştırımalıdır.

```bash
composer install
```

Bu komut ile beraber autoload, helper fonksiyonu ve gereklilikler composer dosyasına eklenir. Ekstra olarak composer'da tanımlanan script ile `.env` isminde bir dosya oluşturulur. .env dosyasında veritabanı bilgileri varsayılan olarak boş bırakılmıştır. Veritabanı bilgileri aşağıda mevcuttur.

- DB_HOST=`mariadb`
- DB_DATABASE=`news`
- DB_USERNAME=`root`
- DB_PASSWORD=`root`

## Veritabanını İçe Aktarma
1. Phpmyadmin'de `news` isminde bir veritabanı oluşuturulmalıdır.
2. Ana dizindeki `news.sql` dosyası phpmyadmin'den içe aktarılmalıdır.

## Örnek kullanıcılar:
- E-posta adresi: admin@ornek.com
- E-posta adresi: moderator@ornek.com
- E-posta adresi: editor@ornek.com
- E-posta adresi: kullanici@ornek.com
- Parola: 123456

---

## Bakım modu
Web sitesini bakım moduna almak için `.env` dosyasındaki `maintenance_mode` değişkeni true yapılmalıdır. Varsayılan olarak bu değişkenin değeri `false`'dir.
```
MAINTENANCE_MODE=true
```

## API
Örnek kullanımlar:
- http://localhost/api/getNews?id=1
- http://localhost/api/allNews
- http://localhost/api/allNews?category=2