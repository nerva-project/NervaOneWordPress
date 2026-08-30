# NervaOneWordPress

The WordPress theme and page content behind [nerva.one](https://nerva.one), the
website of the NERVA (XNV) cryptocurrency project.

NERVA is a privacy cryptocurrency with CPU-only mining and no pool support. It is
community managed and maintained on a voluntary basis.

## Theme v4.1 — 2026 redesign

The theme was rebuilt around a modern design system while keeping the same
WordPress structure, templates and functionality:

- **Design tokens** (`style.css`): refined brand palette (teal `#1290a7` → violet
  `#5f5bc7`), light & dark themes via CSS custom properties, consistent radii,
  shadows and motion easing.
- **Typography**: Space Grotesk (headings), Inter (body), JetBrains Mono (stats,
  addresses, versions) — self-hosted in `inc/assets/fonts` (latin subsets,
  `display=swap`) so the theme makes no third-party font request.
- **Hero**: clear value proposition, primary CTAs, live XNV price chip and a
  protocol specs grid with the live circulating supply counter (one-time
  count-up animation). Price data comes from the site's own REST endpoint
  (`nerva/v1/milestones/latest`), which the server already refreshes hourly
  from CoinGecko — visitors never contact a third party.
- **Hero visual**: a custom canvas animation depicts the network itself — solo CPU
  miners orbiting the glowing NERVA core on elliptical traces while data packets
  (blocks and transactions) travel to and from it. DPR-aware, pauses off-screen
  via `IntersectionObserver`, degrades to a single static frame under
  `prefers-reduced-motion`.
- **Specs HUD**: the protocol grid sits on a frosted-glass panel (backdrop blur,
  etched micro-grid, hairline light catch) so the data reads like a HUD overlay.
- **Components**: feature/exchange/download cards with soft tinted icon tiles and
  springy hover lift, editorial ghosted numerals (01/02/03) behind the mission
  headings, modern roadmap timeline with status badges, restyled FAQ accordion,
  rich four-column footer, frosted-glass sticky header with an active-section
  indicator and a scroll-progress hairline.
- **Motion**: scroll-reveal via `IntersectionObserver`, animated aurora gradient
  headline, gel-shine primary buttons, film-grain hero texture, micro-interactions
  — all disabled under `prefers-reduced-motion`. Reveal animations are opt-in:
  content is visible by default and only hidden while `html.nv-anim` is set
  (an inline head script sets it, a timeout removes it again if
  `theme-script.js` never runs), so the page can never render blank if a
  script fails to load.
- **Extras**: OS detection highlights the recommended download ("Your OS"),
  back-to-top button, copy-to-clipboard buttons with an `execCommand` fallback
  (paper wallet keys, addresses), theme-aware node map iframe.
- **Housekeeping**: Owl Carousel and the IE9 html5shiv are no longer loaded
  globally; `style.css` and `theme-script.js` are versioned by file mtime for
  cache busting. Anchor navigation uses the native `scroll-behavior` /
  `scroll-padding-top` pair, and all scroll handlers are rAF-throttled.

## What is in this repository

| Path | Contents |
| --- | --- |
| `xnv-app/themes/wp/` | The site theme, forked from WP Bootstrap Starter |
| `xnv-app/pages/` | Standalone page markup (mining calculator, donate page) |
| `xnv-app/settings/` | Cache Enabler configuration mirror |
| `content/` | Shared images |
| `.htaccess`, `favicon.ico` | Site root files |

## What is not

WordPress core, plugins, the stock themes and the media library are deliberately
untracked. WordPress updates those itself, and tracking them in git produces
constant drift between the repository and the running site with no benefit. See
[`.gitignore`](.gitignore).

`wp-config.php` is untracked as well. Configuration and credentials do not belong
in a repository.

## Theme notes

The theme lives at `xnv-app/themes/wp/`. Nerva-specific additions sit under
`inc/`, most notably `nerva-milestones.php`, which powers the milestones page:
it pulls market data from CoinGecko, stores periodic snapshots, and exposes a
small read-only REST API under the `nerva/v1` namespace.

`WP_CONTENT_DIR` is set to `xnv-app` rather than the default `wp-content`.

## Contributing

Issues and pull requests are welcome. A few things worth knowing:

- Changes to the theme are deployed by pulling this repository on the web
  server, so anything merged to `main` reaches the live site.
- `main` requires signed commits. Please sign yours.
- Keep WordPress core, plugins and uploads out of commits. The `.gitignore`
  should handle this, but check `git status` before committing.

### A note on addresses

This repository contains the project's public donation address in
`xnv-app/pages/treasury-holdings.html`. Any pull request that modifies a
cryptocurrency address will be scrutinised closely, and address changes bundled
into otherwise unrelated commits will be rejected. This is a known attack
against public cryptocurrency repositories and we would rather say so plainly
than rely on catching it by eye.

## License

GPL-2.0-or-later. See [LICENSE](LICENSE).

The theme is a derivative of WP Bootstrap Starter, which is licensed under the
GNU General Public License v2 or later, so this work carries the same license.

## Credits

- [WP Bootstrap Starter](https://afterimagedesigns.com/wp-bootstrap-starter/) by
  Afterimage Designs, GPL-2.0-or-later, the theme this one is forked from
- [Underscores](http://underscores.me/) by Automattic, GPL-2.0-or-later
- [Bootstrap](https://getbootstrap.com), MIT
- [normalize.css](http://necolas.github.io/normalize.css/) by Nicolas Gallagher
  and Jonathan Neal, MIT
- [WP Bootstrap Navwalker](https://github.com/wp-bootstrap/wp-bootstrap-navwalker),
  GPL-3.0
- [Font Awesome](https://fontawesome.com) by Dave Gandy, SIL OFL 1.1

## Links

- Website: [nerva.one](https://nerva.one)
- Documentation: [docs.nerva.one](https://docs.nerva.one)
- Block explorer: [explorer.nerva.one](https://explorer.nerva.one)
- Node map: [map.nerva.one](https://map.nerva.one)
- [Discord](https://discord.gg/ufysfvcFwe) &middot; [Telegram](https://t.me/NervaCrypto) &middot; [X](https://twitter.com/NervaCurrency)
