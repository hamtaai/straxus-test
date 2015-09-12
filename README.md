## Straxus teszt feladat    

### Előfeltételek
* A telepítő script linux rendszerhez lett írva.
* Az alkalmazás futásához szükséges telepített és futó MySQL és Apache2 szerver.
* Az alkalmazás ezek mellett került tesztelésre, firefox (40.0 verzió) böngészőn.


### Telepítési információk    
## Linux rendszeren: install.sh script segítségével
* A script mysql belépési adatait szükséges lehet megváltoztatni (jelenleg: root/root)
* A futás során klónozva lesz a repo, az adatbázis és a táblái beállításra kerülnek, továbbá települnek a cURL és Composer alkalmazások
* Az utolsó előtti lépés során kell megadni az adatbázis adatokat.
  * A legfontosabb mezők: 
    * database_name (= az adatbázis neve, azaz TesztDB), 
    * database_user (= a mysql felhasználónév), 
    * database_password (= a mysql jelszó)
* Végül elindul a php szerver.

## Windows rendszeren: ismeretlen/nem tesztelt

## Használat
### Elérés
 
 Az alkalmazást a 127.0.0.1:8000 címmel érhető el a böngészőből.
 
### Login információk

| User   | Password   |
|--------|------------|
| Admin  | Admin      |
| User 1 | EditorUser |
| User 2 | Editor     |
| User 3 | User       |

### Működés

* Helytelen jelszó esetén a 4. próbálkozástól kezdve captcha kitöltése is szükséges.
* Helytelen felhasználónév esetén a 2. próbálkozástól kezdve captcha kitöltése is szükséges.
* A felhasználók belépés után 
 * Csak a saját szerepüknek megfelelő almenüket látják és érik el.
 * A főoldalon láthatják a nevüket, szerepeiket és utolsó belépésük időpontját.


