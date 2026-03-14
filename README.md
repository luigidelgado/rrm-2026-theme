# RRM 2026 Theme — Rodando Rutas Mágicas

Tema WordPress personalizado basado en Storefront (WooCommerce) para el sitio Rodando Rutas Mágicas.

> **Nota arquitectónica:** Este tema modifica directamente archivos del core de Storefront (no es un child theme formal). La conversión a child theme está pendiente como tarea futura (ver [Pendientes](#pendientes)).

---

## Changelog

### [Unreleased] — PRs pendientes de merge a `develop`

#### PR #3 — `perf/transients-caching`
- **Transient caching en 9 funciones con queries SQL/WP_Query costosos**
  - `rrm_desafios_usuario()` → `rrm_desafios_{uid}` (12h)
  - `rrm_galerias_usuario()` → `rrm_galerias_{uid}_{reto}` (12h)
  - `rrm_user_level()` → `rrm_level_{uid}` (12h)
  - `rrm_tipo_rodador()` (3× `get_posts` medallas) → `rrm_medallas_{tipo}` (24h global)
  - `getMagicTownRoaded()` → `rrm_magic_towns_{uid}` (12h)
  - `userGalleryGroupedByChallengue()` → `rrm_gallery_grouped_{uid}` (12h)
  - `get_challengues()` → `rrm_challengues_{uid}_{gen}` (12h)
  - `get_all_challengues()` → `rrm_all_challengues` (24h global)
- **Invalidación automática:** hooks en `save_post_galerias`, `save_post_medalla`, `save_post_desafios`, `wp_trash_post`, `before_delete_post`
- **Generation key** en `wp_options` para invalidar cachés por usuario de desafíos sin iterar todos los usuarios

#### PR #4 — `fix/dependabot-npm-vulnerabilities`
- **25 alertas Dependabot High/Moderate resueltas → 0 vulnerabilidades**
- `node-sass` (deprecated, libsass) → `sass` (Dart Sass 1.83)
- `uglifyjs-webpack-plugin` (RCE en serialize-js 1.9.1) → eliminado, webpack 5 usa TerserPlugin nativo
- `optimize-css-assets-webpack-plugin` (svgo 2.8 vuln) → eliminado, ya existía `css-minimizer-webpack-plugin`
- `webpack@5.88` → `5.97` (corrige DOM Clobbering XSS)
- `overrides` en `package.json` para: `serialize-javascript`, `ip`, `cross-spawn`, `minimatch`, `@adobe/css-tools`, `svgo`, `ajv`, `tar`, `js-yaml`
- **`assets/webpack.config.js` creado** (faltaba en el repo) — Dart Sass es más estricto que libsass
- Correcciones SCSS necesarias para Dart Sass: `@media screen and(…)` → `and (…)` (22 instancias), `rem(50px)` → `3.125rem`

#### PR #5 — `fix/cdn-assets-enqueue`
- **CDNs rotos/deprecated reemplazados por jsDelivr con versiones fijas**
  - Bootstrap CSS (cdnjs 4.1.2) + JS (stackpath 4.3.1) → jsDelivr 4.6.2 unificado
  - LightGallery (beta.3) → jsDelivr 2.7.2 estable, con cadena de dependencias correcta
  - Slick CSS (cdnjs) → jsDelivr 1.9.0
  - Swiper@10 → jsDelivr Swiper@11
  - Bootstrap Datepicker (cdnjs 1.5.0) → jsDelivr 1.10.0
  - SlickNav (cdnjs) → jsDelivr 1.0.10
  - reCAPTCHA `google.com` → `www.google.com`
- **jQuery eliminado de re-registro** (rompía WP admin)
- Parámetro `$in_footer` corregido de `false` → `true` donde correspondía
- Versión `null` → `'1.0'` en scripts de ProfileGrid

---

### [2026-03-13] — Mergeado en `develop`

#### PR #2 — `refactor/php84-best-practices`
- **PHP 8.1+ fix:** `printf()` con `null` como `%s` en paginación → string correcto + bug de HTML corregido
- **WordPress Coding Standards (WPCS 3.3):** `phpcbf` aplicado a `functions.php` e `inc/rrm-template-functions.php`
  - Indentación con tabs, espaciado correcto, comillas simples
  - Yoda conditions, comparaciones estrictas (`===`)
  - Short open tags `<?` → `<?php`

---

### [2026-03-12] — Commits directos a `develop` (pre-PR workflow)

#### `security(v1.1)` — SQL Injection
- Todas las queries `$wpdb->get_results()` directas reemplazadas por `$wpdb->prepare()`
- `functions.php`: `rrm_desafios_usuario()`, `rrm_galerias_usuario()`, `rrm_user_level()`

#### `security(v1.2)` — CSRF en handlers AJAX
- Nonces agregados a todos los handlers `wp_ajax_*`
- `wp_verify_nonce()` en: `save_garage_item`, `refresh_garage`, `get_contact_form`, `delete_garage_item`, `update_profile`, `edit_garage_item`, `edit_challengue`, `save_challengue`, `ajaxNextGalleryPosts`, `ajaxNextPostsAproval`, `delete_post_gallery`, `filtered_options_upload_photo`
- `wp_localize_script()` pasa todos los nonces al JS vía `cc_ajax_object.nonces`

#### `security(v1.3)` — XSS: escaping de salida HTML
- `esc_html()` en nombres/títulos de usuario
- `wp_kses_post()` en contenido HTML permitido (`$message`, `$adicional`)
- `esc_attr()` en atributos de clase CSS
- `esc_url()` en links de redes sociales y medallas
- `getMedal()`: URL de medalla escapada

#### `security(v1.4-v1.5)` — Sanitización de inputs y API keys
- `wp_unslash()` + `sanitize_text_field()` / `sanitize_textarea_field()` / `absint()` en todos los `$_POST` / `$_GET`
- `array_map('absint', ...)` para arrays de IDs (`challengue_posts`)
- `parse_str()` → `parse_str( wp_unslash( $_POST['form_data'] ), ... )`
- Google Maps API key movida a constante en `wp-config.php` (no en código fuente)

#### `security(v1.6)` — XSS completo en templates
- Script Python aplicado a todos los `template-*.php` y `partials/*.php`
- Patrón: `src="<?php echo $args['url-*']; ?>"` → `esc_url()`
- 17 archivos corregidos, 0 atributos URL sin escapar

#### `chore` — Herramientas de desarrollo
- `composer.json` con PHP_CodeSniffer + WordPress Coding Standards 3.3
- `phpunit.xml.dist` configurado
- `.github/` con templates de PR e issue, CONTRIBUTING.md

---

## Pendientes

| Tarea | Estado |
|---|---|
| Mergear PR #3 (transients) → develop | ⏳ |
| Mergear PR #4 (dependabot fixes) → develop | ⏳ |
| Mergear PR #5 (CDN assets) → develop | ⏳ |
| Carga condicional de assets por template | ⏳ |
| Mover hooks RRM fuera de `storefront-template-hooks.php` → `functions.php` | ⏳ |
| Configurar branch protection en GitHub (`main` y `develop`) | ⏳ |
| Agregar `define('RRM_GOOGLE_MAPS_KEY', '...')` en `wp-config.php` | ⏳ |
| Convertir a child theme (bloqueado hasta mover hooks RRM) | 🔒 |
| PHPUnit tests | 🔚 diferido |

---

## Arquitectura

```
storefront/
├── assets/
│   ├── src/              # Fuentes SCSS y JS
│   │   ├── theme-style.scss      → dist/theme.css
│   │   ├── theme-style-c.scss    → dist/theme-c.css
│   │   ├── theme-script.js       → dist/theme.js
│   │   └── theme-script-c.js     → dist/theme-c.js
│   ├── dist/             # Compilados (webpack)
│   ├── webpack.config.js # Build config (Dart Sass + MiniCssExtractPlugin)
│   └── package.json      # Node deps (0 vulnerabilidades)
├── inc/
│   ├── rrm-template-functions.php   # Funciones custom RRM (4300+ líneas)
│   ├── storefront-template-hooks.php  # ⚠️ Contiene 3 hooks RRM mezclados
│   └── storefront-template-functions.php  # ⚠️ Contiene HTML RRM hardcodeado
├── functions.php         # Funciones principales del tema
├── composer.json         # PHP_CodeSniffer + WPCS
└── phpunit.xml.dist      # Configuración PHPUnit
```

### Git Flow
- `main` — producción (nunca push directo)
- `develop` — integración (merge via PR)
- `feature/*`, `fix/*`, `perf/*`, `refactor/*` — ramas de trabajo

### CDNs utilizados
Todos los assets externos usan **jsDelivr** (`cdn.jsdelivr.net`), excepto Google Fonts y reCAPTCHA.

| Librería | Versión | Handle WP |
|---|---|---|
| Bootstrap | 4.6.2 | `bootstrap-css`, `bootstrap-js` |
| LightGallery | 2.7.2 | `lightgallery`, `lightgallery-*` |
| Slick Carousel | 1.9.0 | `slick-css`, `slick-js-defer` |
| Swiper | 11 | `styles-swiper`, `swiper` |
| Bootstrap Datepicker | 1.10.0 | `styles-date-picker`, `datepicker` |
| SlickNav | 1.0.10 | `slicknav` |
| just-validate | 4.3.0 | `form-validate` |
| jquery-validation | 1.19.5 | `jquery-validate` |

### Transient keys (caché)
| Key | Función | TTL |
|---|---|---|
| `rrm_desafios_{uid}` | `rrm_desafios_usuario()` | 12h |
| `rrm_galerias_{uid}_{reto}` | `rrm_galerias_usuario()` | 12h |
| `rrm_level_{uid}` | `rrm_user_level()` | 12h |
| `rrm_medallas_galeria/destino/pueblo` | `rrm_tipo_rodador()` | 24h |
| `rrm_magic_towns_{uid}` | `getMagicTownRoaded()` | 12h |
| `rrm_gallery_grouped_{uid}` | `userGalleryGroupedByChallengue()` | 12h |
| `rrm_challengues_{uid}_{gen}` | `get_challengues()` | 12h |
| `rrm_all_challengues` | `get_all_challengues()` | 24h |
