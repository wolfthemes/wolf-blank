# Wolf Blank — Claude Code Context

## What this is
FSE WordPress boilerplate theme for WolfThemes (Constantin Saguin, Power Elite ThemeForest author).
Used as the foundation for the wolfthemes.com redesign and future projects. It renders a
blank white canvas with zero WordPress default styling — every design token is an empty/placeholder
slot waiting to be filled per project.

## Design direction (when redesigning)
- Aesthetic target: Awwwards-level, editorial, bold
- Reference: dark backgrounds, large typography, purposeful whitespace, smooth scroll interactions
- NOT: generic, template-looking, corporate

## WordPress context
- WordPress FSE (Full Site Editing) — Gutenberg blocks only, zero Elementor
- PHP 8.x, WP 6.5+
- wolf-store plugin may be present: when added, document its REST endpoints and block
  integrations here, then wire the front-page `wp:query` block to its CPT (e.g. `product`).

## IMPORTANT: theme.json has NO comments
`theme.json` is parsed as strict JSON by WordPress (`wp_json_file_decode` → `json_decode`).
Comments (`//` or `/* */`) are NOT supported and will break the theme. All explanation about
theme.json lives in this file instead. Keep theme.json pure, valid JSON with no trailing commas.

## File map
- `style.css` — WP theme header only, no rules.
- `functions.php` — theme supports + enqueues global.css (front end + editor). Under 60 lines.
- `theme.json` — v3. All design tokens. The single source of truth for colors/type/spacing.
- `index.php` — required fallback, "silence is golden".
- `assets/css/global.css` — reset + utilities + design-slot custom props. No colors/fonts.
- `assets/js/` — empty (.gitkeep). No jQuery, no third-party JS.
- `templates/front-page.html` — hero + themes grid + stats + CTA band.
- `templates/index.html` — blog listing (query loop + pagination).
- `templates/single.html` — single post + comments.
- `templates/page.html` — static page.
- `templates/404.html` — centered not-found.
- `parts/header.html` — logo + nav + CTA button.
- `parts/footer.html` — 3-col (brand / nav / newsletter) + bottom bar.
- `screenshot.png` — NOT created. Add a 1200×900 PNG before shipping.

## Design token locations
- Colors: `theme.json` → `settings.color.palette` (8 slots: primary, primary-light, secondary,
  accent, base, base-2, contrast, contrast-2). Defaults are placeholders (black/white).
- Typography: `theme.json` → `settings.typography` (heading + body families are `inherit`;
  fill `fontFace` to load real fonts. Fluid scale xs→3xl).
- Spacing: `theme.json` → `settings.spacing.spacingSizes` (1–10, base-4 rem scale).
- Global CSS vars: `assets/css/global.css` section 6 (transition, radius, shadow, header height).

## How to redesign this theme
1. Update theme.json tokens (colors, fonts, spacing scale).
2. Fill global.css section 6 design slots.
3. Update parts/header.html and parts/footer.html.
4. Build templates/ one by one, front-page.html first.
5. Add block styles to theme.json → styles.blocks.
6. Add custom CSS to global.css only for things blocks can't do.

## Reuse as boilerplate
Copy this folder, rename it, update the `style.css` header (Theme Name etc.), and reset
theme.json tokens back to placeholders.

## Constraints (hard rules)
- No jQuery, no third-party JS.
- No PHP template files except index.php and functions.php.
- No hardcoded colors or font names anywhere except theme.json tokens.
- No Elementor, ACF, or page-builder assumptions.
- Must stay an activatable theme that passes Theme Check with zero errors.
