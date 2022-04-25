# TDD Kata

## Card Game War

Bosser en TDD, red green notamment.


Source : https://github.com/raydel95/wonderland-clojure-katas/tree/master/card-game-war

!! Penser à jouer les tests après chaque refactoring !!

- Il y a 2 joueurs
- Les cartes sont réparties également entre chaque joueurs
- Composition des cartes (52 cartes) -> Roi / Valet / Dame + cartes de 1 à 10 
   - Trèfle
   - Coeur
   - Carreau
   - Pique
- Les As sont les cartes les plus hautes
- A chaque round, le joueur 1 et le joueur 2 retournent une carte. La valeur la plus haute l'emporte, le joueur empoche les deux cartes
- Les cartes gagnantes sont ajoutées à la **fin** du deck
- Si deux cartes sont égales, on récupère 3 cartes de chaque deck du joueur puis 1 de plus pour jouer à nouveau.
Le gagnant récupère toutes les cartes. S'il y'a encore égalité, répéter le process.
- Le joueur qui termine sans carte perd

Scénario pouvant aider à la rédaction du TDD :

https://github.com/raydel95/wonderland-clojure-katas/blob/master/card-game-war/sample_scenario.md

## How to run project

### Build the docker

```bash
make build
```

### Run the docker

```bash
make up
```

### Go in the docker

```bash
make ex
```

#### Run tests

```
vendor/bin/phpunit
```

## Configure xdebug

1. CTRL + ALT + S => PHP => CLI Interpreters => Click 3 dots (...)
2. Click + => From Docker => Tick Docker =>
    1. Server : `Docker`
    2. Image name : `ulco:latest`
    3. Interpreter path : `php`
3. PHP => Docker container => Click folder => Volume bindings => Changer container path to /app
4. PHP => Debug => Debug port => 9001
5. PHP => Servers => + =>
    1. Name: `docker.host.ip`
    2. Host: `docker.host.ip`
    3. Use path mappings : Absolute path on server `/app`