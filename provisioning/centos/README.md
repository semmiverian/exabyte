# Step by Step deployment laravel menuju server dengan os centos

## Pindah user menjadi root

```bash
sudo su
```

## Mengupdate list dari package yang tersedia dari linux

```bash
yum -y update
```

## Instalasi Nginx pada komputer server kita

```bash
yum -y install epel-release
yum -y install nginx
```

## Instalasi PHP versi 7.2 pada komputer server kita

```bash
yum -y install https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
yum-config-manager --enable remi-php72
yum -y install php
```

## Instalasi beberapa utilities php

```bash
apt install -y php-mcrypt php-cli php-gd php-curl php-mysql php-ldap php-zip php-fileinfo php-fpm php-mbstring php-dom php-soap composer php-curl php-gd php-bcmath unzip
```

## Instalasai Mysql

```bash
  wget https://dev.mysql.com/get/mysql57-community-release-el7-9.noarch.rpm
  sudo rpm -ivh mysql57-community-release-el7-9.noarch.rpm
  sudo yum -y install mysql-server
  sudo systemctl start mysqld
  grep 'temporary password' /var/log/mysqld.log
  mysql_secure_installation
  # Example password P!j/j\kVm)k&29Wj
```

[Cara membuat database baru](https://www.a2hosting.co.id/kb/developer-corner/mysql/managing-mysql-databases-and-users-from-the-command-line#Create-MySQLDatabasesand-Users)

## Instalasi Redis

```bash
  yum -y install redis
  systemctl enable redis
  systemctl start redis
```

## Setting NGINX

```bash
sed -i 's/;cgi.fix_pathinfo=1/cgi.fix_pathinfo=0/g' /etc/php/7.2/fpm/php.ini
systemctl restart php7.2-fpm
```

## Membuat sebuah folder untuk menyimpan aplikasi kita

```bash
mkdir -p /usr/local/exabyte
cd /usr/local/
```

## Git clone aplikasi kalian

```bash
git clone https://github.com/semmiverian/exabyte.git
```

## CD ke folder yang sudah kita buat

```bash
cd exabyte
```

## Instalasi dependensi laravel dan setting nginx

```bash
  sudo composer install
  chmod 777 -R storage/
  chmod 777 -R bootstrap/
  cp .env.example .env
  php artisan key:generate
  sudo chown nginx:nginx /run/php-fpm/php-fpm.sock
  mkdir /etc/nginx/snippets
  mkdir /etc/nginx/sites-available
  mkdir /etc/nginx/sites-enabled
  sudo cp provisioning/centos/snippets/fastcgi-php.conf /etc/nginx/snippets/fastcgi-php.conf
  sudo cp provisioning/centos/php-fpm/www.conf /etc/php-fpm.d/www-conf
  sudo cp provisioning/centos/sites-available/exabyte /etc/nginx/sites-available/
  sudo rm /etc/nginx/nginx.conf
  sudo cp provisioning/centos/nginx.conf /etc/nginx/
  ln -s /etc/nginx/sites-available/exabyte /etc/nginx/sites-enabled/
  systemctl restart php-fpm
  systemctl restart nginx
```
