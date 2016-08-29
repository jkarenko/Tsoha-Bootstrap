### Kimppakyyti

#### 1. Johdanto

Kimppakyyti-sovelluksen tarkoituksena on tarjota alusta, jossa käyttäjät sopivat kimppakyytejä keskenään.  
Käyttäjä voi luoda järjestelmään uuden kyydin joko tarjoajana tai tarvitsijana, tai ilmoittautua mukaan matkustajaksi jo olemassa olevaan kyytiin.

Järjestelmä toteutetaan PHP-ohjelmointikielellä, PostgreSQL tietokannalla ja sen alustana toimii users.cs.helsinki.fi palvelin.

#### 2. Yleiskuva järjestelmästä

##### Käyttötapauskaavio
![käyttötapauskaavio](https://raw.githubusercontent.com/jkarenko/Tsoha-Bootstrap/master/doc/user.png)

##### Käyttäjäryhmät
```
user
  Rekisteröitynyt sovelluksen käyttäjä.

admin
  Järjestelmän valvoja.
```

##### Käyttötapauskuvaukset
```
user

  kyydin luominen
    Käyttäjä valitsee ajankohdan, lähtöpaikan, määränpään
    ja kirjoittaa vapaan viestin.

  kyytien selaaminen
    Käyttäjä näkee kaikki järjestelmään luodut kyydit jotka eivät
    ole menneisyydessä.

  kyytiin ilmoittautuminen
    Käyttäjä voi ilmoittautua kyytiin jossa on tilaa, käyttäjä
    lisätään kyydin matkustajaluetteloon.

  kyydin muokkaaminen ja poistaminen
    Käyttäjä voi muokata itse luomansa kyydin tietoja tai poistaa
    kyydin kokonaan järjestelmästä.
```
```
admin

  kyytien selaaminen
    Admin näkee kaikki järjestelmän kyydit, myös menneet.

  kyydin poistaminen
    Admin voi poistaa kyydin järjestelmästä.

  käyttäjän disablointi
    Admin voi poistaa käyttäjän tilin käytöstä.
```

#### 3. Järjestelmän tietosisältö

![Käsitekaavio](https://raw.githubusercontent.com/jkarenko/Tsoha-Bootstrap/master/doc/class1.png)


#### 4. Relaatiotietokantakaavio

![Tietokantakaavio](https://raw.githubusercontent.com/jkarenko/Tsoha-Bootstrap/master/doc/db1.png)

#### 5. Käynnistys ja asentaminen

Järjestelmä toimii osoitteessa http://jkarenko.users.cs.helsinki.fi/tsoha/.  
Testikäyttötunnus on `Archer` ja salasana `phrasing`.  

Sovellus vaatii ympäristöltään PHP-tuen, MySQL tai PostgreSQL tietokannan, sekä http-palvelimen.  
Aseta tietokantasi tiedot tiedostoon ./config/database.php.

#### 6. Järjestelmän yleisrakenne

Järjestelmä noudattaa MVC-mallia ja komponentit on pääsääntöisesti jaettu models, controllers ja views hakemistoihin app -hakemiston sisällä.  

Sen lisäksi löytyy:  

- assets: järjestelmän omat JavaScript kirjastot ja CSS-tiedostot  
- vendor: kolmannen osapuolen kirjastot ja tyylitiedostot
- doc: dokumentaatio
- config: ympäristömuuttujat, reititys, tietokannan tiedot
- sql: tietokannan luomiseen tarvittavat komennot


#### 7. Käyttöliittymä ja järjestelmän komponentit

![Komponentit](https://raw.githubusercontent.com/jkarenko/Tsoha-Bootstrap/master/doc/sivut.png)
