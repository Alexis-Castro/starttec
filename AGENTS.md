# DevWebCamp — AGENTS.md

## Architecture

- **PHP 8 MVC** with custom `Router` (`Router.php`) using regex-based pattern matching.
- **Entrypoint**: `public/index.php` — defines all GET/POST routes, then calls `$router->comprobarRutas()`.
- **Router now uses `REQUEST_URI`** (was `PATH_INFO` — fixed). Strips query string via `strtok()`. Requires Apache mod_rewrite.
- **Two layouts**: `views/layout.php` (public) and `views/admin-layout.php` (admin). `Router::render()` auto-selects based on URL containing `/admin`.
- **Session NOT started centrally**. `is_auth()` / `is_admin()` in `includes/funciones.php` call `session_start()` conditionally — known "headers already sent" risk. Prefer starting session once in `includes/app.php`.

## Database & Models

- **PDO connection**: `includes/database.php` → `includes/app.php:16` calls `ActiveRecord::setDB($pdo)`.
- **Config**: `includes/.env` (gitignored). Copy from `.env.example`.
- **Custom ActiveRecord ORM** (`models/ActiveRecord.php`) — all models extend it.
  - Each model declares `protected static $tabla` and `protected static $columnasDB`.
  - **Critical**: every model MUST declare a public `$id` property (not just in `$columnasDB`).
  - Image-edit models use extra `*_actual` properties (e.g. `$imagen_actual`, `$imagen_previa_actual`) for keeping the old value when no new file is uploaded.
- **11 tables**: `usuarios`, `categorias`, `cargos`, `proyectos`, `imagenes_proyecto`, `personal`, `servicios`, `empresa`, `contactos`, `cotizaciones`, `newsletter`. Schema in `schema.sql`.

## Routes

- Defined in `public/index.php` — controllers passed as `[ControllerClass::class, 'method']`.
- Public routes: `GET /`, `/nosotros`, `/servicios`, `/contacto`, `/portafolio`, `/cotizacion`, `/servicio/*`, `/proyecto/{name}`, `/404`.
- Auth routes: `/auth/login`, `/auth/registro`, `/auth/olvide`, `/auth/reestablecer`, `/auth/mensaje`, `/auth/confirmar-cuenta`.
- Admin routes: all under `/admin/` — dashboard, empresa, servicios, personal, cargos, proyectos, categorias, usuarios, contactos, cotizaciones.
- API routes: `GET /api/proyectos`, `/api/proyecto`, `/api/proyectos/categoria`, `/api/galeria/proyecto`, `/api/categoria`, `/api/cargo`.
- **Unregistered routes that views link to** (will 404): `/admin/usuarios/editar`, `/admin/usuarios/eliminar`, `/auth/finalizar-registro`.

## Admin CRUD pattern

Every admin controller follows the same pattern:
1. Call `is_admin()` guard.
2. Read `$_GET['page']` for pagination.
3. Create `Paginacion` instance and call `Model::paginar()`.
4. For POST: `sincronizar($_POST)` → `validar()` → handle images → `guardar()` → return JSON.
5. For GET: `$router->render('admin/...', [...])`.

## Image handling

- **Intervention Image** is used on upload to create **PNG + WebP** copies.
- Upload paths: `../public/img/{entity}/` (relative to `controllers/`).
- **Bug**: in `EmpresaController`, the video extension check concatenates `$carpeta_videos` with filename — should use `$_FILES['video_inicio']['name']` alone.
- **Bug**: `ProyectosController::editar()` has old-image deletion commented out (lines ~208-210) — images accumulate on re-upload.
- Gallery images use Dropzone (frontend) + Intervention (backend) with `ProyectoGaleria` model (`imagenes_proyecto` table).

## Frontend build

| Command | What it does |
|---------|-------------|
| `npm run dev` | Runs `gulp dev` — watches JS, images, builds WebP/AVIF |
| `npm run tailwind` | Watch mode: `postcss src/main.css -o public/build/css/main.css --watch` |
| `npm run tailwind:build` | Production CSS build via PostCSS |
| `gulp images` | imagemin + WebP + AVIF of `src/img/` → `public/build/img/` |
| `gulp js` | Webpack: `src/js/admin/app.js` → `admin.min.js`, `src/js/index/appindex.js` → `app.min.js` |

- **JS build**: Webpack via `webpack-stream` in gulp. Two entry points. Output to `public/build/js/`.
- **CSS**: Tailwind v3 via PostCSS. Input: `src/main.css`. Output: `public/build/css/main.css`.
- **Fonts**: Self-hosted Signika Negative (`.sans` default) + Open Sans (`.open` utility). Declared via `@font-face` in `src/main.css`.
- **Custom CSS utility classes**: `.error`, `.exito` for alert styling.
- **Tailwind custom values**: colors (`azul`, `azul-claro`, `celeste`, `negro`), component classes (`.btn`, `.btn-primary`, `.btn-danger`), animations (`scrolldown`, `sombras`, `typing`), background images (`.homepage-hero-before`, `.homepage-hero-after`, etc).
- **JS dependencies** (loaded via npm): SweetAlert2, Swiper, Dropzone, PhotoSwipe, Typed.js, Leaflet, Lite YouTube.

## Known bugs and gotchas

- Admin views reference `$_ENV['HOST']` for image URLs — may break if app isn't at domain root.
- `PersonalController` has orphaned methods `cargos()` and `mensaje()` referencing non-existent views with no registered routes.
- `.env` currently contains real Mailtrap credentials — DO NOT commit.

## Composer dependencies

```
phpmailer/phpmailer ^6.5    — transactional emails
vlucas/phpdotenv ^5.4       — env loading
intervention/image ^2.7     — image processing (PNG + WebP on upload)
cocur/slugify ^4.5          — URL slug generation
```

## Quick reference

- **Add a new page**: define route in `public/index.php` → controller method → view file → done.
- **Add a new admin CRUD**: model → controller with `index/crear/editar/eliminar` → views → routes.
- **AJAX response format**: always `echo json_encode([...])`.
- **Alerts**: `Model::setAlerta('error'|'exito', 'message')`, retrieve with `Model::getAlertas()`.
- **Pagination**: instantiate `new Paginacion($pagina_actual, $por_pagina, $total)`.
