# GIS-Wisata-Lampung

website sistem informasi geografis pariwisata di provinsi lampung

## Tutorial menjalankan proyek

download composer kalo belum ada: 🔗https://getcomposer.org/download/ 

jangan lupa untuk set environment variable

```
install composer
```

```
composer update
```
atau
```
composer update --ignore-platform-reqs (jika error)
```

env
```
mv env .env
```

buka mysql, lalu buat database baru dengan nama `ci4`
<hr />

lakukan migrate

```
php spark migrate
```

```
php spark db:seed AdminSeeder
```

jalankan localhost webnya
```
php spark serve
```

<center><i>jangan lupa star nya hehe, terimakasih 🙏</i></center>
