# webapp-skeleton

A simple webservco/framework Web Application Skeleton to help start a new project fast.

---

## Features
- One starter route (Web and CLI): `App/home`.
- [HTML5 App](https://github.com/webservco/html5-app) implementation with dynamic page navigation.

---

## Setup

### Install
```
git clone https://github.com/webservco/webapp-skeleton.git my-project
cd my-project
```
Optionally set up your own repository:
```
git remote rename origin old-origin
git remote add origin {REPOSITORY}
git push -u origin --all
git push -u origin --tags
```
Customize `composer.json` and `package.json`.

Install dependencies:
```
composer install
npm install
```

### Create environment file
```
cp .env.dist .env
```
Edit `.env` file.

### Create configuration options files
```
for file in config/dev/*.dist; do cp -pi "$file" "${file%.*}"; done
```
Edit configuration files.

### Generate optimized CSS and JavaScript files
```
npm run build
```
> Please see the [Layout documentation](/docs/Layout.md) for details

---

## Run

### Web
Serve the directory `public`.

### CLI
`App/home`
```
bin/cli App/home
```
`App/home` (alias)
```
bin/cli dashboard
```

---

## Development

### Check code

### phpcs
```
composer check

```

### phpstan (level 7)
```
composer s:7
```

### Validate structure
```
php check:structure
```

### Run tests
```
php test
```
Testdox:
```
php test:d
```

### Run all checks
```
composer all
```

---

## Other documents
- [Layout documentation](/docs/Layout.md)
