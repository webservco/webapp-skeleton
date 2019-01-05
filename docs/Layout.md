# Layout

Work with source files, and generate optimized files for actual usage.

---

## CSS

### Local styles
Edit the `scss` files from `resources/scss`

### Compilation
Edit the `build:css` block from `resources/layout/index.html`

---

## JavaScript

### Local scripts
Edit the `js` files from `resources/javascript`

### Compilation
Edit the `build:js` block from `resources/layout/index.html`

---

## Browser test
Test the modifications before generating the optimized files.

Serve the `resources/layout` folder with hot reload:
```
npm run devel
```

---

## Generate optimized files

Optimized CSS and JavaScript files are generated in the `public/assets` directory:
```
npm run build
```

This will generate `css/styles.min.css` and `js/scripts.min.js`. Do not edit these files directly.

---
