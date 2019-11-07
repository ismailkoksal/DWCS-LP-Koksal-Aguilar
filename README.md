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
