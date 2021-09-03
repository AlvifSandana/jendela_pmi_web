## Jendela PMI (admin web)
powered by [Laravel](https://laravel.com/) and [Sufee](https://colorlib.com/polygon/sufee/index.html)

### To Do
Fitur yang sedang dikerjakan:

#### Authentication
- [x] Admin login
- [x] (api) Pendonor login & register
- [x] (api) middleware -> manual check api_token

#### Pages
- [x] Login
- [x] Dashboard
- [x] Stok Darah
- [x] Jadwal DD
- [x] Data Pendonor
- [x] Kegiatan

#### Process
- [x] (api) CRUD Pendonor
- [x] (api) CRUD User
- [x] Get resource from url sources
- [x] CRUD Admin

## How to use
Berikut langkah-langkah menggunakan app ini:

1. Siapkan database dengan nama db_jendela_pmi
2. Clone repositori ini, lalu buka folder dengan text editor kesayangan
3. rename ```.env.example``` menjadi ```.env``` lalu sesuaikan ```DB_HOST``` , ```DB_PORT``` , ```DB_USERNAME``` , dan ```DB_PASSWORD``` sesuai pengaturan database kamu.
4. Buka terminal dan arahkan ke folder project ini, lalu ketik perintah ```composer install```
5. Lalu ketik perintah ```php artisan migrate```
6. Lalu ketik perintah ```php artisan db:seed```
7. Terakhir run app ```php artisan serve```
8. Untuk menghubungkan app ini dengan versi [androidnya](https://github.com/AlvifSandana/jendela_pmi_android), run dengan perintah ```php artisan serve --host=192.168.0.101 --port=8000``` (NB: sesuaikan nilai ```--host``` dan ```--port``` dengan kebutuhanmu)
