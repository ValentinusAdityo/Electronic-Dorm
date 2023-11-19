# Command Silahkan dipakai
Saat pertama kali download langsung pakai
```
composer dump-autoload
```
Untuk aktifkan server Code igniter
```
php spark serve
```
Memasukan table ke database, sebelumnya perlu dibuat terlebih dahulu untuk database "ekost" di phpmyadmin
```
php spark migrate
```
Menghapus semua table dalam database
```
php spark migrate:rollback
```
Menghapus lalu memasukan lagi table database semuanya lagi ke dalam database
```
php spark migrate:refresh
```
Untuk memasukan random data record ke dalam <nama table>, kalau ingin semua table terisi gunakan seeder bernama "DbSeeder"
```
php spark db:seed <nama seeder>
```