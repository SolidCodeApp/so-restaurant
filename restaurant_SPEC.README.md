# 1. Introduction

Bienvenue dans ce projet guidé SoRavel.

L’objectif de ce projet est de construire une mini application de gestion de restaurant en utilisant l’architecture et la philosophie de développement proposées par SoRavel.

Ce projet est volontairement simple d’un point de vue métier afin de permettre au développeur de se concentrer principalement sur le framework et ses mécanismes.

Le but n’est pas de tester des connaissances avancées en SQL, en architecture complexe ou dans les internals Laravel.

L’objectif principal est d’apprendre à utiliser correctement :

* les repositories,
* les descriptors,
* les conditions,
* les streams,
* les pipelines de transformation,
* et les conventions SoRavel.

---

# Objectif du projet

L’application devra permettre de gérer :

* des clients (`Customer`)
* des plats (`Dish`)
* des commandes (`DishOrder`)
* des factures (`OrderBill`)
* des relations entre commandes et plats (`OrderDishLink`)

Le domaine métier reste volontairement léger afin de concentrer l’apprentissage sur la structuration des accès aux données et des traitements.

---

# Objectifs pédagogiques

À travers ce projet, le développeur devra apprendre à :

* Utiliser les hooks d'actions Soravel,
* construire correctement des modèles `SoRecord`,
* déclarer explicitement les relations entre modèles,
* créer des repositories compatibles SoRavel,
* construire des requêtes dynamiques via `Descriptor`,
* utiliser `Cond` pour créer des filtres,
* utiliser `Order` pour le tri,
* utiliser `Join` lorsque des jointures SQL sont nécessaires,
* utiliser les `Stream` pour construire des pipelines de transformation,
* séparer la définition d’une requête de son exécution,
* produire des traitements observables et maintenables.

---

# Philosophie SoRavel

SoRavel ne remplace pas Laravel.

Laravel reste responsable de :

* l’exécution SQL,
* les modèles Eloquent,
* les relations,
* l’hydratation,
* les interactions base de données.

SoRavel apporte une couche d’orchestration supplémentaire permettant de standardiser :

* les repositories,
* les requêtes déclaratives,
* les pipelines de transformation,
* l’observabilité,
* et l’architecture backend.

---

# Philosophie des requêtes

L’une des idées centrales de SoRavel est de séparer :

* la définition d’une requête,
* l’exécution SQL,
* les transformations métier.

Les requêtes doivent être décrites à travers des objets comme :

* `Descriptor`
* `Cond`
* `Order`
* `Join`

plutôt que via du SQL brut ou de la logique Eloquent dispersée dans l’application.

---

# Relations et Joins

SoRavel fait une distinction importante entre :

| Élément     | Responsabilité  |
| ----------- | --------------- |
| `setRels()` | eager loading   |
| `Join`      | composition SQL |

Les relations servent au chargement des modèles liés.

Les joins servent à construire des requêtes SQL lorsque cela est nécessaire pour :

* filtrer,
* trier,
* agréger,
* optimiser une requête.

Cette séparation permet de garder les repositories prévisibles et déterministes.

---

# Streams

Les Streams sont au cœur du pipeline de traitement SoRavel.

Ils permettent :

* d’enchaîner des transformations,
* de retarder l’exécution,
* d’éviter des matérialisations intermédiaires inutiles,
* d’observer les étapes du pipeline,
* de construire des traitements maintenables.

Les opérations sont appliquées progressivement jusqu’à l’exécution d’une opération terminale.

---

# Règles du projet

Pendant tout le projet :

* aucune requête SQL brute ne doit être écrite manuellement,
* les repositories doivent rester la couche d’exécution des requêtes,
* les relations Eloquent (SoRecord) doivent être déclarées explicitement,
* les filtres complexes doivent utiliser `Descriptor`,
* les transformations doivent utiliser `Stream`,
* la logique métier ne doit pas être placée dans les controllers. Sa place sera dans la couche service du projet.
* la logique métier doit respecter le principe d'action en 3 phases grâce aux Hooks d'actions de Soravel.

---

# Résultat attendu

À la fin du projet, le développeur devra être capable de :

* comprendre l’architecture SoRavel,
* construire des repositories structurés,
* manipuler les descriptors et conditions,
* créer des pipelines observables,
* produire des traitements backend propres,
* travailler de manière autonome sur une application SoRavel.

---

# Aperçu de la base de données

Le projet repose sur les tables suivantes :

| Table              | Description                                                     |
| ------------------ | --------------------------------------------------------------- |
| `customers`        | Représente les clients du restaurant                            |
| `dishes`           | Représente les plats disponibles à la commande                  |
| `dish_orders`      | Représente les commandes effectuées par les clients             |
| `order_bills`      | Représente les factures associées aux commandes                 |
| `order_dish_links` | Représente les lignes de commande liant les plats aux commandes |

Le script SQL d’initialisation sera fourni dans l’étape suivante.

**Note** : Il est recommandé de lire la [documentation officielle de Soravel](https://github.com/SolidCodeApp/so-ravel-docs) avant de passer à la deuxième étape.

# 2. Initialisation de la base de données

L’objectif de cette étape est de préparer la structure SQL minimale du projet.

Le développeur devra créer la base de données du projet restaurant ainsi que les tables nécessaires au fonctionnement de l’application.

À ce stade, aucune logique SoRavel n’est encore attendue.

Le but est uniquement de disposer d’une structure relationnelle propre et simple qui servira de fondation pour les prochaines étapes.

---

# Objectif technique

Le développeur devra :

* créer la base de données,
* exécuter le script SQL fourni,
* vérifier que toutes les tables sont correctement créées,
* vérifier les relations principales entre les entités.

---

# Tables attendues

Les tables suivantes doivent être créées :

| Table              | Description                                 |
| ------------------ | ------------------------------------------- |
| `customers`        | Clients du restaurant                       |
| `dishes`           | Plats disponibles                           |
| `dish_orders`      | Commandes clients                           |
| `order_bills`      | Factures associées aux commandes            |
| `order_dish_links` | Lignes de commande entre plats et commandes |

---

# Contraintes importantes

Pour simplifier le projet :

* toutes les tables possèdent une clé primaire `id`,
* toutes les clés primaires sont de type `INT AUTO_INCREMENT`,
* les tables de liaison utilisent également un identifiant technique `id`,
* aucune clé primaire composite ne doit être utilisée,
* le but est de rester aligné avec la philosophie SoRavel et de limiter la complexité technique.

---

# Script SQL

[Cliquer pour récupérer le script SQL du projet](./SQL/restaurant_DB.sql)

---

# Vérifications attendues

Avant de passer à l’étape suivante, le développeur devra vérifier que :

* toutes les tables existent,
* les clés étrangères sont correctement créées,
* les colonnes principales sont présentes,
* la structure est cohérente avec le domaine métier attendu.

Les prochaines étapes utiliseront directement cette structure SQL.


# 3. Création du projet Laravel

L’objectif de cette étape est de préparer l’environnement de développement qui accueillera SoRavel.

Le développeur devra créer un projet Laravel propre qui servira de base au reste du projet.

---

# Version attendue

Le projet doit être créé avec :

| Technologie | Version attendue |
| ----------- | ---------------- |
| PHP         | 8.x              |
| Laravel     | 9.x ou 10.x      |

---

# Objectif technique

Le développeur devra :

* installer un nouveau projet Laravel,
* configurer correctement l’environnement,
* connecter le projet à la base de données créée précédemment,
* vérifier que l’application démarre correctement.

---

# Création du projet

Exemple avec Composer :

```bash
composer create-project laravel/laravel restaurant-project
```

---

# Configuration attendue

Le développeur devra configurer :

* le fichier `.env`,
* la connexion MySQL,
* les accès à la base de données,
* le nom de la base créée à l’étape précédente.

---

# Vérifications attendues

Avant de continuer, le développeur devra vérifier que :

* Laravel démarre correctement,
* la connexion base de données fonctionne,
* aucune erreur de configuration n’est présente,
* les tables précédemment créées sont accessibles.

---

# Documentation fortement recommandée

Avant de passer à l’installation de SoRavel, il est recommandé de lire la documentation d’introduction du framework.

Documentation à lire :

* [SoRavel README Documentation](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/01-README.md?utm_source=chatgpt.com)

Cette documentation présente :

* la philosophie générale du framework,
* l’architecture globale,
* les conventions principales,
* les notions fondamentales utilisées dans le reste du projet.
---

# 4. Création du projet Laravel

Cette étape consiste uniquement à initialiser un projet Laravel qui servira de base à l’installation de SoRavel.

---

## Commande de création du projet

Le projet doit être créé avec Laravel 9+ ou 10 :

```bash
composer create-project laravel/laravel:^9 restaurant-app
```

(ou version 10 si nécessaire selon l’environnement)

---

## Pré-requis

* PHP 8+
* Composer installé
---

# 5. Intégration de SoRavel

Cette étape consiste à intégrer SoRavel dans le projet Laravel nouvellement créé.

---

## Objectif

Le développeur doit être capable de :

* installer SoRavel dans un projet Laravel fonctionnel,
* comprendre sa structure de base,
* exécuter un premier flux simple via le framework.

---

## Installation

L’installation doit être effectuée en suivant la documentation officielle :

* [Quick Start](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/02-quick-start.README.md)

---

## Référence obligatoire

Avant et pendant l’installation, le développeur doit consulter :

* [Showcase](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/02-showcase.README.md)

Ce document contient des exemples concrets d’utilisation du framework.

---

## Résultat attendu

À la fin de cette étape :

* SoRavel est installé et fonctionnel dans le projet Laravel,
* un premier flux simple peut être exécuté (Descriptor → Repository → Stream),
* le développeur a une compréhension basique du fonctionnement global du framework.

---

# 6. Structure initiale du projet (Domaines & Records)

Cette étape consiste à mettre en place la structure de base du projet en suivant l’architecture SoRavel.

---

## Objectif

Le développeur doit créer :

* une structure par domaine métier,
* un modèle Eloquent unique par domaine,
* un dossier de configuration **dans chaque domaine**,
* des modèles compatibles avec le cycle de vie SoRavel (`SoRecord`).

---

## Domaines à créer

Chaque domaine correspond à une table et doit être isolé dans son propre dossier :

| Domaine       | Table associée     | Description                                |
| ------------- | ------------------ | ------------------------------------------ |
| Customer      | `customers`        | Clients du restaurant                      |
| Dish          | `dishes`           | Plats disponibles                          |
| DishOrder     | `dish_orders`      | Commandes clients                          |
| OrderBill     | `order_bills`      | Factures associées aux commandes           |
| OrderBillLink | `order_bill_links` | Lignes de liaison entre commandes et plats |

---

## Structure attendue

Chaque domaine doit contenir :

* un modèle Eloquent unique 
* ce modèle doit étendre `SoRecord` ([Voir la documentation SoRecord](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/10-so-record.README.md))

Exemple :

```text
App/Domains/Customer/
App/Domains/Dish/
App/Domains/DishOrder/
App/Domains/OrderBill/
App/Domains/OrderBillLink/
```

---

## Règle importante

Tous les modèles doivent :

* étendre `SoRecord`
* rester simples (aucune logique métier complexe ici)

---

## Dossier de configuration SoRavel

Le projet doit également contenir un dossier : [Lire la documentation des domains](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/04-domain.README.md)

```text
App/Config/
```

Ce dossier contiendra les fichiers suivants :

* `bindings.php`
* `soravel.php`
* `api.php`

---

## Objectif de cette étape

À la fin de cette étape :

* les 5 domaines sont créés,
* chaque domaine possède son modèle `SoRecord`,
* la structure SoRavel est en place,
* le projet est prêt pour la définition des relations et du cycle de requête.

---

# 7. Validation des domaines & exposition API

Cette étape consiste à valider la structure des domaines, comprendre `SoRecord`, et exposer les premiers endpoints via SoRavel.

---

## Objectif

Le développeur doit :

* vérifier que les relations Eloquent ont été correctement définies dans chaque domaine
* comprendre le rôle de `SoRecord`
* exposer les endpoints API pour chaque domaine
* valider que tous les domaines sont accessibles via l’API SoRavel

---

## Lecture obligatoire

Avant toute implémentation, le développeur doit lire :

* [Documentation officielle de SoRecord](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/10-so-record.README.md)

Ce document explique le rôle de `SoRecord` dans le cycle de vie SoRavel.

---

## Exposition des endpoints

Chaque domaine doit exposer ses routes via son fichier :

```text id="api7x9"
App/Domains/<Domain>/Config/api.php
```

Le développeur doit utiliser le système de routing SoRavel pour exposer le domaine.

---

## Documentation routing obligatoire

Avant d’exposer les endpoints, le développeur doit consulter :

* [La documentation officielle So-Routing](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/03-routing.README.md)

---

## Résultat attendu

À la fin de cette étape :

* chaque domaine possède ses endpoints API exposés
* les 5 domaines sont accessibles via l’API SoRavel
* les relations Eloquent sont validées (pas modifiées ici, seulement vérifiées)
* `SoRecord` est compris comme base du cycle de vie des entités

---

# 8. Endpoints disponibles par domaine

Chaque domaine exposé via SoRavel est accessible via une API standardisée.

---

## Base URL

Tous les domaines sont exposés sous le préfixe :

```
http://localhost:8000/so-api/<resource>
```

Exemple :

```
http://localhost:8000/so-api/customers
http://localhost:8000/so-api/dishes
http://localhost:8000/so-api/dish-orders
```

---

## Actions disponibles

Chaque endpoint expose automatiquement les actions SoRavel suivantes :

* `doIndex` → GET `/so-api/<resource>`
* `doShow` → GET `/so-api/<resource>/{id}`
* `doStore` → POST `/so-api/<resource>`
* `doUpdate` → PUT/PATCH `/so-api/<resource>/{id}`
* `doDestroy` → DELETE `/so-api/<resource>/{id}`
* `doRestore` → POST `/so-api/<resource>/{id}/restore`
* `doSearch` → POST `/so-api/<resource>/search`
* `doTouchSince` → POST `/so-api/<resource>/touch-since`

---

## Exemple concret

Pour le domaine `Customer` :

```
GET    /so-api/customers
GET    /so-api/customers/1
POST   /so-api/customers
PUT    /so-api/customers/1
DELETE /so-api/customers/1
POST   /so-api/customers/search
POST   /so-api/customers/1/restore
POST   /so-api/customers/touch-since
```

---

## Principe important

* les routes sont **automatiquement générées par SoRavel**
* aucun routing manuel n’est attendu côté développeur (sauf cas spécifiques)
* chaque domaine respecte strictement le même contrat API

---

## Objectif de cette étape

À ce stade :

* tous les domaines sont accessibles via une API uniforme
* le système de routing SoRavel est validé
* le développeur peut commencer à customiser les domains

---

# 9. Fonctionnalité à implémenter : création de client

Le cas métier concerne la création d’un client (`Customer`).

---

## Règle métier

Lors de la création d’un client :

* un email est requis
* une validation d’email doit être effectuée

---

## Contraintes techniques

* la logique de validation doit être implémentée via les **hooks SoRavel**
* aucune logique métier ne doit être placée dans le controller ou le modèle
* la validation doit être isolée dans la couche prévue à cet effet

---

## Documentation obligatoire

Avant implémentation :

* [Documentation officielle des Hooks Soravel](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/07-hooks.README.md)
* [Documentation officielle de la couche Service](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/06-service.README.md)

---

## Objectif de cette étape

À la fin de cette étape :

* un `Customer` peut être créé via l’API SoRavel
* un hook est déclenché lors du cycle de création
* la validation email est prise en charge via le mécanisme de hooks
* la logique métier est correctement isolée du domaine Eloquent

---

## Principe clé

* les hooks sont le point d’extension du cycle de vie SoRavel
* la logique métier ne doit pas être dispersée dans les couches basses
* le framework doit rester responsable de l’exécution du pipeline

---


Parfait, voici la version en français, dans le même esprit strict et orienté spec (sans sur-explication du framework) :

---

## 9. Fonctionnalités spécifiques aux domaines (logique métier custom)

À ce stade, tous les domaines exposent les endpoints standards SoRavel (CRUD + actions système).

Cependant, les besoins métier introduisent maintenant des comportements spécifiques qui ne peuvent pas être couverts par les endpoints génériques.

---

## Objectif de cette étape

Le développeur doit implémenter **au minimum une fonctionnalité métier spécifique par domaine**, en dehors des 8 endpoints standards SoRavel.

Cela implique :

* la création de contrôleurs spécifiques si nécessaire
* l’extension de `SoController`
* l’introduction de services métier dédiés
* l’utilisation des repositories pour les cas de logique d’accès aux données

---

## Comportement attendu

Pour chaque domaine, au moins un endpoint custom doit être créé.

Ces endpoints doivent :

* ne pas appartenir aux actions standards générées par SoRavel
* répondre à un besoin métier concret
* respecter l’architecture SoRavel

---

## Exemples de fonctionnalités attendues

Les exemples ci-dessous servent uniquement de direction fonctionnelle (le développeur doit concevoir l’implémentation finale) :

### Customer
* calcul d’un score d’engagement client

### Dish

* génération d’un classement de popularité des plats
* analyse de consommation des ingrédients

### DishOrder

* validation de cohérence d’une commande avant confirmation
* estimation de charge de préparation

### OrderBill

* génération d’un aperçu de facture avant validation
* calcul détaillé de la TVA

### OrderDishLink

* recalcul dynamique des totaux de commande
* validation des contraintes de quantité par plat

---

## Contraintes techniques

Chaque fonctionnalité custom doit :

* être implémentée dans un **contrôleur dédié étendant `SoController`**
* déléguer la logique métier à une **couche Service**
* utiliser un **Repository si un accès données structuré est nécessaire**
* respecter strictement le cycle de vie SoRavel

---

## Documentation obligatoire

Avant implémentation, le développeur doit lire :

* [Documentation officielle de la couche Controller](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/05-controller.README.md)
* [Documentation officielle de la couche Service](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/06-service.README.md)
* [Documentation officielle de la couche Repository](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/08-repository.README.md)
* [Documentation officielle du système Query de Soravel](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/09-query.README.md)
* [Documentation officielle du système Configuration Soravel](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/18-configuration.README.md)

---

## Résultat attendu

À la fin de cette étape :

* chaque domaine expose au moins une fonctionnalité métier spécifique
* au moins un contrôleur custom étendant `SoController` est créé
* la logique métier est correctement séparée (Controller / Service / Repository)
* les endpoints standards et custom coexistent proprement

---

## Principe clé

Le système n’est plus uniquement CRUD.

Il devient :

> une API standard SoRavel enrichie par des extensions métier propres à chaque domaine, respectant le même cycle de vie.

---

## 10. Export et génération de documents

À ce stade, les domaines disposent de leurs endpoints standards ainsi que de leurs extensions métier spécifiques.

Le système introduit maintenant des fonctionnalités de sortie de données via les modules SoRavel.

---

## Objectif de cette étape

Le développeur doit mettre en place :

* au moins un domaine exportable en **Excel**
* une génération de **document PDF pour le domaine `OrderBill`**

---

## 1. Export Excel (obligatoire)

Au minimum, un des domaines suivants doit être exportable en format Excel :

* `Customer`
* `Dish`
* `DishOrder`
* `OrderBill`
* `OrderDishLink`

---

### Contraintes

* l’export doit porter sur **l’ensemble des enregistrements du domaine**
* les champs exportés sont laissés au choix du développeur
* l’activation du module Export doit être effective dans le projet
* les endpoints d’export sont **automatiquement exposés par SoRavel**
* aucun endpoint d’export ne doit être implémenté manuellement

---

### Documentation obligatoire

* [Documentation officielle du module d'export Soravel](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/16-export.README.md)
* [Documentation officielle du Query API Soravel](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/16-export.README.md)

---

## 2. Génération PDF (OrderBill)

Le domaine `OrderBill` doit permettre la génération d’un document PDF représentant une facture.

---

### Contraintes

* la facture doit être générée via un endpoint dédié
* le contenu du PDF est libre mais doit représenter une facture cohérente
* la logique métier doit respecter l’architecture SoRavel

---

## Résultat attendu

À la fin de cette étape :

* au moins un domaine est exportable en Excel via le système SoRavel
* le domaine `OrderBill` permet la génération d’un PDF de facture
* les fonctionnalités de sortie (Excel / PDF) sont intégrées dans le cycle SoRavel sans implémentation de routing manuel

---

## Principe clé

Les modules de sortie sont des extensions du framework.

> Une fois activés, ils exposent leurs propres capacités automatiquement, sans configuration de routing manuel.

---

Parfait, on est sur une étape clé : **rendre les domaines uniformément filtrables via la configuration SoRavel**, sans introduire de logique ad hoc.

Voici la section propre en français :

---

## 11. Recherche et filtrage global des domaines

À ce stade, tous les domaines exposent déjà les endpoints standards ainsi que les fonctionnalités d’extension (exports, PDF, etc.).

Le système doit maintenant permettre une **recherche uniforme sur l’ensemble des domaines**.

---

## Objectif de cette étape

Le développeur doit rendre **tous les domaines du projet filtrables via des critères configurables**.

---

## Fonctionnalité attendue

Chaque domaine doit être :

* searchable via le endpoint de recherche SoRavel (`doSearch`)
* filtrable selon des champs explicitement définis par le développeur
* cohérent dans son comportement de filtrage entre les domaines

---

## Configuration attendue

Le développeur doit utiliser la section **`filterable`** dans la configuration SoRavel pour chaque domaine.

---

## Contraintes

* seuls les champs déclarés dans `filterable` peuvent être utilisés pour filtrer
* aucun filtre dynamique non déclaré ne doit être accepté
* la logique de filtrage doit rester centralisée dans le système Descriptor
* tous les domaines doivent respecter la même convention de recherche

---

## Documentation obligatoire

Avant implémentation :

* [Voir Section `FILTERABLE` de la documentation officielle du système de configuration de Soravel](https://github.com/SolidCodeApp/so-ravel-docs/blob/master/docs/18-configuration.README.md)

---

## Résultat attendu

À la fin de cette étape :

* tous les domaines sont filtrables via `doSearch`
* chaque domaine définit explicitement ses champs filtrables
* les requêtes de recherche respectent strictement la configuration
* le comportement de recherche est homogène sur toute l’API
---

## Principe clé

La recherche est le cœur du système SoRavel.

Elle repose exclusivement sur une approche déclarative basée sur la configuration du domaine.

---

## Règle fondamentale (Search)

Pour toutes les opérations de recherche (`doSearch`) :

* le développeur ne doit écrire aucune logique métier
* aucun Service n’est requis
* aucun Hook n’est obligatoire ni attendu
* aucun traitement via Stream ne doit intervenir dans le flux de recherche
* toute la logique de filtrage est déduite uniquement à partir de la configuration du domaine et du Descriptor

---

## Philosophie

La puissance de SoRavel réside dans le fait que :

> la recherche est entièrement définie par la configuration, et non par du code applicatif.

---

## Conséquence

* un domaine est automatiquement searchable dès lors qu’il est correctement configuré
* la complexité métier n’impacte jamais la couche de recherche
* les Hooks et Services restent optionnels et réservés aux cas métier spécifiques hors search

---

## Principe clé

La recherche est un système autonome dans SoRavel.

Elle est :

> 100% déclarative, 0% logique métier.

---