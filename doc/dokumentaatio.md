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
