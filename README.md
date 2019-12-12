# Set-up

On commence par cloner le projet

```
git clone git@forge.iut-larochelle.fr:ikoksal/dwcs-lp-koksal-aguilar.git
```

Ensuite, on lance le container, pour disposer d'un environnement exécutant NGINX (le parametre `-d` permet de détacher le processus pour continuer à utiliser le terminal)

```
docker-compose up --build -d
```

Aller sur http://localhost:9996/ pour voir le projet

Pour détruire l'environnement, exécuter la commande

```
docker-compose down
```

Pour arrêter tous les containers en cours d'execution :

```
docker stop $(docker ps -q)
```

Pour voir quels containers sont en cours d'execution :

```
docker ps
```

Pour exécuter une application incluse dans un container, nous utilisons `docker exe`. Par exemple pour obtenir la version php dans le container `dfs-sandbox`

```
docker exec dfs-sandbox php -v
```

Nous demandons à Docker (`docker`) de faire exécuter (`exec`) au container concerné (`dfs-sandbox`) la commande qui nous intéresse (`php -v`)

Disposer d'une ligne de commande dans un container

```
docker exec -i -t dfs-sandbox /bin/bash
```

Nous demandons à Docker (`docker`) de faire exécuter (`exec`) au container concerné (`dfs-sandbox`) en mode interactif (`-i`) et en fournissant un terminal (`-t`) le shell bash (`/bin/bash`)

Une fois dans ce terminal, nous pouvons lancer n'importe quelle commande directement. Par exemple `php -v`, qui nous donne le même résultat que précédemment

Pour terminer la session, nous sortons du terminal classiquement, avec `exit`

En PHP, le gestionnaire de dépendances est "composer".

```
composer
```

PHPUnit est le framework de test de référence en PHP.

Utilisons `composer` pour télécharger PHPUnit :

```
composer require PHPUnit/PHPUnit --dev
```

`require` indique à composer que notre projet a comme dépendance PHPUnit fournie par le vendor PHPUnit
l’option `--dev` indique à composer que cette dépendance n'est utilisée qu'en mode développement (on ne lance pas les tests en prod…)

On constate que nous avons deux nouveaux fichier dans le répertoire : `composer.json` et `composer.lock``

Le fichier `composer.json` décrit les dépendances de notre projet

Le fichier `composer.lock` est généré à partir du composer.json, il décrit l'intégralité des dépendances à installer (les nôtres, mais aussi les dépendances de nos dépendances, que nous n’avons pas spécifiées dans le composer.json - nous ne les connaissons pas) et leurs versions exactes

Testons que PHPUnit est bien disponible en lançant l'exécutable :

```
vendor/bin/phpunit
```

Pour lancer les tests présents dans un répertoire, on spécifie à PHPUnit le répertoire en question comme argument.

```
vendor/bin/phpunit tests
```

## Fixtures

Les fixtures nous aident à persister l'information des Cinemas et d'autres objets dans la base de données puisque à chaque fois qu'on detruit le container de notre appli les données aussi.

D'abbord, il faut installer la librairie des Fixtures avec la commande suivante:

```
composer require --dev orm-fixtures
```

L'installation a créé un nouveau répertoire /src/DataFixtures, qui contient un exemple de fichier où poser nos fixtures. C'est une bonne occasion de comprendre le fonctionnement de l'ORM.

Pour charger nos fixtures on doit le dire a la console de Symfony, qu'elle doit persister nos données avec la suivante commande:

```
php bin/console doctrine:fixtures:load
```

Pourtant, cette commande va effaser notre base de données, pour cela, la console de Symfony nous affiche une confirmation.

