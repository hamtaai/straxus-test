#!/bin/bash

function startInstallation(){
	count=1
	echo "$count: Repo klónozása."
	git clone -b master git@github.com:hamtaai/straxus-test.git Teszt
	echo "Klónozás befejezve."

	count=$((count+1))
	echo "$count: Mappába navigálás."
	cd Teszt

	count=$((count+1))
	echo "$count: Adatbázis előkészítése."
	mysql -u root -proot < CreateDB.sql
	echo "Adatbázis kész."

	count=$((count+1))
	echo "$count: cURL telepítése."
	sudo apt-get install curl
	echo "Telepítés kész."

	count=$((count+1))
	echo "$count: Composer telepítése."
	curl -sS https://getcomposer.org/installer | php
	echo "Telepítés kész."

	count=$((count+1))
	echo "$count: Szükséges függőségek letöltése, telepítése."
	php composer.phar install
	echo "Telepítés kész."

	count=$((count+1))
	echo "$count: PHP szerver indítása."
	php app/console server:run
}

echo "Biztosan telepíti az alkalmazást?"

select yn in "Igen" "Nem"; do
    case $yn in
        Igen ) startInstallation; break;;
        Nem ) exit;;
    esac
done