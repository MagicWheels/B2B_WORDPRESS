# MAGIC WHEELS Web Design System

## 1. Visual Theme & Atmosphere

MAGIC WHEELS should feel bright, buyer-ready, and trustworthy: a kids mobility brand with real factory depth, not a toy-store retail page. The design direction is "clean B2B procurement with colorful product energy".

Keywords: compliance-ready, friendly, structured, export-capable, factory-backed, colorful but controlled.

## 2. Color Palette & Roles

```css
:root {
  --mw-ink: #071626;
  --mw-navy: #001f3f;
  --mw-blue: #004aa9;
  --mw-blue-soft: #eaf3ff;
  --mw-orange: #ff3f13;
  --mw-gold: #ffc20f;
  --mw-green: #13a37b;
  --mw-paper: #f5f8fb;
  --mw-surface: #ffffff;
  --mw-line: #d9e2ec;
  --mw-muted: #5c6b7d;
}
```

Use blue for navigation, trust, and buyer actions. Use orange only for high-priority RFQ actions. Use gold for brand warmth and product energy. Keep backgrounds light and clean.

## 3. Typography Rules

Primary font stack: Aptos, Segoe UI, Helvetica Neue, sans-serif.

Rules:

- Hero headings: bold, compact, large, no negative letter spacing.
- Inner-page headings: dense and scannable; avoid marketing-style oversized type outside hero blocks.
- Body copy: 16-18px, line-height around 1.55-1.65.
- Labels, pills, and process steps: uppercase or high-weight only when used as navigation anchors.

## 4. Component Stylings

- Buttons: rectangular with 8px radius, strong weight, clear variant roles.
- Cards: 8px radius, white surface, subtle border, minimal shadow.
- Category/product cards: product imagery must be visible and inspectable.
- Trust marks: text-based logo wall is acceptable until verified public logos are confirmed.
- RFQ form: dense two-column desktop layout, single-column mobile layout.

## 5. Layout Principles

- Desktop container: max 1180px.
- Use full-width bands for major sections.
- Use cards only for repeated items, forms, and framed tools.
- Avoid nested cards.
- Keep procurement information close to CTAs.

## 6. Depth & Elevation

Default shadow:

```css
--mw-shadow: 0 18px 45px rgba(7, 22, 38, 0.12);
```

Use deeper shadow only for forms, hero product imagery, and major CTA bands. Most content should rely on border, spacing, and hierarchy.

## 7. Animation & Interaction

Interaction level: L1/L2 light.

- Hover lift on buttons and important cards.
- Sticky header.
- Mobile bottom action bar.
- No heavy scroll-jacking, pinning, or complex animation while Railway preview and local WordPress speed remain priorities.

## 8. Do's and Don'ts

Do:

- Prioritize RFQ, model evaluation, compliance, packaging, and factory trust.
- Use real product/factory images whenever possible.
- Keep claims conservative when certificates or customers are not fully confirmed.
- Make mobile pages readable without overlapping text.
- Keep internal links visible between Products, Solutions, OEM/ODM, Quality, Factory, Resources, and RFQ.
- Treat Resources as procurement education, not generic blogging.
- Treat Case Studies as masked examples.
- Keep Contact/RFQ as one strong conversion path.

Don't:

- Add ecommerce price cards, cart, wishlist, member center, or retail purchase language.
- Overuse toy-like illustration.
- Overuse dark blue technology styling.
- Publicly expose sensitive certificate or customer details.
- Promise exact response times or unverified delivery guarantees.
- Hide product models behind decorative visuals.
- Use oversized hero typography inside dense subpage cards.
- Add decorative blobs/orbs.

## 9. Responsive Behavior

- Breakpoint around 1040px: large grids collapse from multi-column to one/two columns.
- Breakpoint around 780px: navigation becomes toggle menu; product grids and RFQ form become one column.
- Touch targets should remain at least 44px high.
- Mobile bottom action bar provides Request a Quote and WhatsApp access.
- Text must wrap naturally and never overlap imagery or buttons.
