# Mikrotik: MikHMon - Mikrotik Hotspot Monitor
*Sumber: https://laksa19.github.io/*

******

MikroTik Hotspot Monitor adalah aplikasi berbasis web (MikroTik API PHP class) untuk membantu manajemen Hotspot MikroTik. Khususnya MikroTik yang tidak mendukung User Manager. Mikhmon bukan radius server, jadi tidak harus selalu aktif. Mikhmon dapat diaktifkan saat dibutuhkan atau sesuai kebutuhan.

#### Instalasi
```cmd 
sudo su
apt update
apt -y install curl git php
```
```cmd
sudo su
cd /usr/local/src
curl -o install-mikhmon https://laksa19.github.io/install-mikhmon.txt
```
```cmd
nano install-mikhmon
```
#### Pastikan
```cmd
#bin/bash
#pkg install git php -y
```
```cmd
chmod +x install-mikhmon
./install-mikhmon
```

#### Penggunaan
```
http://localhost:8080
http://ip-address:8080

username mikhmon
password 1234
```
******
##### Referensi

* `https://laksa19.github.io/?mikhmon/v3/tutorial`
* `https://lms.onnocenter.or.id/wiki/index.php/Mikrotik:_MikHMon_-_Mikrotik_Hotspot_Monitor?fbclid=IwAR27PPh22BEx8kHFXk-DiElNjgMwrpGrBOcwMIp9juqZWItpKrDd3NN2wAs`

