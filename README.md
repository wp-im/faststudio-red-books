# FastStudio Red Books

An independently implemented classic theme for a micro-publisher. The default red (`#d92525`) and warm paper (`#fff6ee`) are fully editable in **Appearance > Customize > FastStudio Red Books: Colors**.

## Editable content and catalog

- Homepage copy and section labels: Customizer.
- About, after-catalog, sidebar, and footer content: native WordPress Widgets.
- Navigation: native Primary and Footer menu locations.
- Publisher pages and journal: native WordPress pages/posts and `the_content()`.
- Books: existing `bp_book` posts, `bp_author`/`bp_series`/`bp_subject` taxonomies, and `_bpc_*` metadata from the separate BookPress Catalog plugin. This theme does not register or migrate that data model.
- Book archive: bounded by the plugin's paginated main query; homepage query is capped at 12.
- Book covers remain uncropped in a 5:8 ratio; detail metadata and full editorial description are separated for mobile reading.

This theme is standalone: it has no `Template:` parent declaration and does not require FastStudio Red. If the catalog plugin is inactive, other pages remain usable and a clear fallback appears. No third-party theme code, reference-theme imagery, remote fonts, tracking, external requests, or bundled JavaScript are included.

WordPress 6.4+, PHP 8.0+. Licensed under GPL-2.0-or-later. Text domain: `faststudio-red-books`.
