#Command Silahkan dipakai
- composer dump-autoload
- php spark serve (aktifkan server)
- php spark migrate (memasukan table ke database, sebelumnya dibuat dulu untuk database "ekost" di phpmyadmin)
- php spark migrate:rollback (menghapus semua table dalam database)
- php spark migrate:refresh (menghapus lalu memasukan lagi table database semuanya lagi ke database)
- php spark db:seed (nama seeder, Kalau mau semua seeder langsung ambil DbSeeder) 