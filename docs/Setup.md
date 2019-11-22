# Setup

## Install

```sh
PROJECT='my-project'; git clone https://github.com/webservco/webapp-skeleton.git $PROJECT && cd $PROJECT
```

## Set up your own repository

```sh
git remote rename origin old-origin
git remote add origin {REPOSITORY}
git push -u origin --all
git push -u origin --tags
```

## Customize project
Edit:
- `composer.json`
- `package.json`
- `README.md`

## Install dependencies

```sh
composer update
npm install
```

## Create environment file

```sh
cp .env.dist .env
```
Edit `.env` file.

## Create configuration options files

```sh
for file in config/dev/*.dist; do cp -pi "$file" "${file%.*}"; done
```

Edit configuration files.

## Generate optimized CSS and JavaScript files

```sh
npm run build
```

> Please see the [Layout documentation](/docs/Layout.md) for details
