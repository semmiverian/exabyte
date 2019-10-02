
## Mengupdate list dari package yang tersedia dari linux

```bash
apt-get -y update
```

## Instalasi Nginx pada komputer server kita 

```bash
apt -y install nginx
```

## Instalasi PHP versi 7.2 pada komputer server kita 

```bash
apt -y install php 7.2
```

## Instalasi beberapa utilities php 

```bash
apt install -y php7.2-fpm php7.2-mysql php7.2-mbstring php7.2-dom php7.2-soap composer php7.2-curl php7.2-gd php7.2-bcmath unzip
```

## Setting

```bash
ufw allow 'Nginx HTTP'
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

## Setting compoer

```bash
echo '#> set HOME or COMPOSER_HOME'
HOME=/root
COMPOSER_HOME=/root
echo $HOME
echo $COMPOSER_HOME
export COMPOSER_HOME=/root
```

## Instalasi dependensi laravel

```bash
  sudo composer install
  chmod 777 -R storage/
  chmod 777 -R bootstrap/
  php artisan key:generate
  sudo cp provisioning/sites-available/exabyte /etc/nginx/sites-available/
  sudo rm /etc/nginx/nginx.conf
  sudo cp provisioning/nginx.conf /etc/nginx/
  ln -s /etc/nginx/sites-available/exabyte /etc/nginx/sites-enabled/
  rm /etc/nginx/sites-enabled/default
  systemctl restart nginx


```

