# Layout

## CSS

### Local styles
Edit the `scss` files from `resources/scss`

### Compilation
Edit the `build:css` block from `resources/layout/index.html`

## JavaScript

### Local scripts
Edit the `js` files from `resources/javascript`

### Compilation
Edit the `build:js` block from `resources/layout/index.html`

## Generate optimized files

Optimized CSS and JavaScript files are generated in the `public/assets` directory:
```
npm run build
```

This will generate `css/styles.min.css` and `js/scripts.min.js`. Do not edit these files directly.

---

## Browser test
```
npm run devel
```
