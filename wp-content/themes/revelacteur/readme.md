# Revelacteur — Thème WordPress

Thème WordPress personnalisé pour l'association **Revelacteur**, axée sur la jeunesse, le patrimoine et la dynamisation du territoire.

- **Version** : 1.0.0
- **Site** : [revelacteur.fr](https://revelacteur.fr)
- **Licence** : GPL v2 ou ultérieure

## Prérequis

- WordPress ≥ 6.0
- PHP ≥ 8.0

## Structure du thème

```
revelacteur/
├── assets/
│   ├── css/          # Feuilles de style (style.css)
│   ├── js/           # Scripts (main.js, script.js)
│   ├── fonts/        # Polices embarquées
│   └── img/          # Images et SVG
├── parts/            # Template parts réutilisables
│   ├── banner.php
│   ├── content-event-card.php
│   ├── content-podcast-card.php
│   ├── content-project-card.php
│   ├── section-home-1.php
│   └── section-home-2.php
├── front-page.php    # Page d'accueil
├── header.php        # En-tête
├── footer.php        # Pied de page
├── functions.php     # Configuration et fonctions du thème
├── style.css         # Métadonnées du thème (obligatoire WordPress)
├── index.php         # Template par défaut
├── single.php        # Article individuel
├── 404.php           # Page d'erreur 404
└── [templates de page]
```

## Templates de page

| Fichier                | Template Name         |
| ---------------------- | --------------------- |
| `front-page.php`       | Page d'accueil        |
| `association.php`      | Page Association      |
| `nos-projets.php`      | Page Nos Projets      |
| `nos-evenements.php`   | Page Nos Événements   |
| `partenaires.php`      | Page Partenaires      |
| `nous-soutenir.php`    | Page Nous Soutenir    |
| `medias.php`           | Page Médias           |
| `contact.php`          | Page Contact          |
| `mentions-legales.php` | Page Mentions Légales |

### Singles (custom post types)

- `single-projet.php` — Fiche projet
- `single-evenement.php` — Fiche événement
- `single-podcast.php` — Fiche podcast

## Fonctionnalités

- **Menus** : `menu_principal` (navigation principale) et `menu-footer` (pied de page)
- **Personnalisateur** : couleurs du thème (couleur principale et secondaire) via variables CSS custom (`--color-primary`, `--color-secondary`)
- **Support thème** : images à la une, balise `<title>` automatique, HTML5, logo personnalisé
- **Widget** : zone de sidebar principale
- **Polices** : Google Fonts — Montserrat (400, 700)

## Installation

1. Copier le dossier `revelacteur/` dans `wp-content/themes/`
2. Activer le thème depuis **Apparence > Thèmes** dans l'administration WordPress
3. Configurer les couleurs depuis **Apparence > Personnaliser > Couleurs du Thème**
4. Créer les pages et leur attribuer les templates correspondants

## Développement

Le thème est servi localement via MAMP :

```bash
# Répertoire du projet
/Applications/MAMP/htdocs/revelacteur/
```

Les styles sont dans `assets/css/style.css` et les scripts dans `assets/js/main.js`.
