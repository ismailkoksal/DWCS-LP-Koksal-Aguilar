# Set-up

On commence par cloner le projet

```
git clone git@forge.iut-larochelle.fr:ikoksal/dwcs-lp-koksal-aguilar.git
```

Ensuite, on lance le container, pour disposer d'un environnement exécutant NGINX (le paramêtre -d permet de détacher le processus pour continuer à utiliser le terminal)

```
docker-compose up -d
```

Aller sur http://localhost:9996/ pour voir le projet

Pour détruire l'environnement, exécuter la commande

```
docker-compose down
```

