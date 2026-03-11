# Guía de Contribución — RRM 2026 Theme

## Branches

| Branch | Propósito | Acceso |
|--------|-----------|--------|
| `main` | Producción | ❌ Solo via PR desde `develop` |
| `develop` | Integración | ❌ Solo via PR desde ramas de trabajo |
| `feature/*` | Nuevas funcionalidades | ✅ Push libre |
| `fix/*` | Corrección de bugs | ✅ Push libre |
| `security/*` | Correcciones de seguridad | ✅ Push libre |
| `perf/*` | Optimizaciones | ✅ Push libre |
| `refactor/*` | Refactorizaciones | ✅ Push libre |

## Flujo de trabajo

```
1. Crear rama desde develop
   git checkout develop
   git pull origin develop
   git checkout -b feature/nombre-descriptivo

2. Hacer cambios y commitear
   git add archivo.php
   git commit -m "feature: descripción del cambio"

3. Pushear la rama
   git push -u origin feature/nombre-descriptivo

4. Abrir PR en GitHub: feature/* → develop

5. Cuando develop está estable, PR: develop → main
```

## Convención de commits

Usamos [Conventional Commits](https://www.conventionalcommits.org/):

```
<tipo>(<scope opcional>): <descripción en español>

Tipos:
  feat      Nueva funcionalidad
  fix       Corrección de bug
  security  Corrección de seguridad
  perf      Mejora de rendimiento
  refactor  Refactorización
  style     Cambios de estilos CSS/SCSS
  build     Cambios en webpack/assets
  docs      Solo documentación
  chore     Mantenimiento general
```

**Ejemplos:**
```
feat(profile): agregar campo de redes sociales en perfil de usuario
fix(gallery): corregir paginación en galería de desafíos
security: aplicar wpdb->prepare() en queries de wheelers
perf(header): agregar transients para query de generales
```

## Estándares de código

### PHP
- Seguir [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/)
- Toda salida: `esc_html()`, `esc_url()`, `esc_attr()`, `wp_kses_post()`
- Todo input `$_GET`/`$_POST`: `sanitize_text_field()`, `absint()`, `sanitize_email()`, etc.
- Queries a BD: siempre `$wpdb->prepare()`
- AJAX handlers: siempre `check_ajax_referer()`
- Prefijo de funciones: `rrm_`

### JavaScript
- Pasar nonce en cada llamada AJAX: `nonce: cc_ajax_object.nonces.accion`
- No hardcodear URLs, usar `cc_ajax_object.ajax_url`

### Seguridad
- ❌ Nunca commitear API keys, passwords o tokens
- ❌ Nunca pushear a `main` o `develop` directamente
- ❌ Nunca commitear `error_log` o archivos `.env`

## PR checklist

Antes de abrir un PR verifica que el PR template esté completo.
Todo PR debe tener al menos 1 aprobación antes de mergear.
