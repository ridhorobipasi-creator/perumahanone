# Design System Document

## 1. Overview & Creative North Star: The Architectural Curator

This design system is built to transform the traditional real estate browsing experience into a high-end editorial journey. Moving away from the cluttered, "salesy" grids of standard property portals, our **Creative North Star is "The Architectural Curator."** 

The aesthetic leverages a sophisticated tension between massive, high-contrast typography and vast expanses of whitespace. We move beyond "Modern" into a space of "Reliable Luxury" by utilizing intentional asymmetry, overlapping elements that break the container, and a tonal-depth strategy that favors physical layering over artificial lines. This is a system where the property is the art, and the UI is the gallery.

---

## 2. Colors & Surface Philosophy

The palette is anchored in a deep, authoritative teal (`primary: #006a64`) and a warm, paper-like neutral (`surface: #fff8f8`). This foundation creates a "Trustworthy" atmosphere without the coldness of pure black and white.

### The "No-Line" Rule
To achieve a premium editorial feel, **1px solid borders for sectioning are strictly prohibited.** Structural boundaries must be defined solely through background color shifts. For example, a property features section should sit on `surface_container_low`, immediately adjacent to a `surface` hero section. The shift in tone provides the boundary; the absence of a line provides the elegance.

### Surface Hierarchy & Nesting
Treat the UI as a series of physical layers—like stacked sheets of fine architectural vellum.
*   **Base:** `surface` (#fff8f8)
*   **Secondary Sections:** `surface_container_low` (#fbf1f2)
*   **Tertiary/Utility Regions:** `surface_container` (#f5eced)
*   **Elevated Components (Cards):** `surface_container_lowest` (#ffffff) sitting on top of `surface_container_low` to create natural pop.

### The "Glass & Gradient" Rule
Standard flat colors feel static. Use `Glassmorphism` for floating navigation and filter bars:
*   **Surface:** `surface_variant` at 70% opacity.
*   **Effect:** `backdrop-blur: 24px`.
*   **Signature Texture:** Main CTAs should use a subtle linear gradient from `primary` (#006a64) to `primary_container` (#00b1a7) at a 135-degree angle. This gives buttons a "lit" quality that feels bespoke.

---

## 3. Typography: Editorial Authority

We use **Inter** exclusively, but we treat it with the precision of a magazine layout.

*   **Display Scale (`display-lg` to `display-sm`):** Reserved for hero titles and high-impact property names. Use tight letter-spacing (-0.02em) to create a "locked-in" professional look.
*   **Headline Scale (`headline-lg` to `headline-sm`):** Used for section headers. In this system, headlines often overlap image containers to break the rigid grid.
*   **Body & Labels:** `body-lg` is the standard for property descriptions to ensure maximum readability for a "Reliable" brand. `label-md` is reserved for technical specs (SQM, beds, baths) and should always be in uppercase with +0.05em letter-spacing for a technical, architectural feel.

---

## 4. Elevation & Depth: Tonal Layering

Traditional drop shadows are often too "heavy" for a modern real estate aesthetic. We prioritize **Tonal Layering** to convey hierarchy.

*   **The Layering Principle:** Place a `surface_container_lowest` (#ffffff) card on a `surface_container_high` (#efe6e7) background. This creates a soft, natural lift that mimics physical paper.
*   **Ambient Shadows:** When a property card requires "float" (e.g., on hover), use a shadow tinted with the `on_surface` color: `box-shadow: 0 20px 40px rgba(30, 27, 28, 0.06)`. This mimics natural light reflecting off the surface rather than a dark grey blur.
*   **The "Ghost Border" Fallback:** If a border is required for accessibility (e.g., input fields), use the `outline_variant` (#bbc9c7) at **15% opacity**. It should feel felt, not seen.

---

## 5. Components

### Property Listing Cards
*   **Visual Structure:** Cards must have a `0.75rem` (xl) corner radius. Forbid the use of divider lines between the image and content.
*   **Image Placement:** Use high-aspect-ratio images (16:9 or 3:2). Images should occupy 60% of the card height.
*   **Typography:** The property name uses `title-lg`, while pricing uses `headline-sm` in `primary` (#006a64) to draw the eye immediately.

### Buttons (CTAs)
*   **Primary:** Solid gradient (`primary` to `primary_container`). `0.375rem` (md) radius. No border.
*   **Secondary:** `surface_container_highest` background with `on_surface` text. This provides a "soft" alternative to the high-contrast primary.
*   **Tertiary:** Text only with an animated `primary` underline that grows from the center on hover.

### Filter Chips
*   **Unselected:** `surface_container_low` background with `on_surface_variant` text.
*   **Selected:** `primary` background with `on_primary` text. No borders; use color-weight to denote state.

### Input Fields
*   **State:** Use `surface_container_lowest` as the background.
*   **Focus State:** Instead of a thick border, use a `2px` solid `primary` bottom-border and a subtle `surface_tint` glow.

### Property Feature Icons
*   **Style:** Minimalist line icons. Place them inside a `surface_container` circle for a "stamped" architectural look. Do not use multi-color icons; stick to `secondary` (#635d5e).

---

## 6. Do's and Don'ts

### Do
*   **Do** use asymmetrical layouts. Let a property image bleed off the side of the screen while the text remains centered in the grid.
*   **Do** prioritize "Breathing Room." Use the `24` (6rem) spacing token between major content sections.
*   **Do** use the `primary_container` (#00b1a7) for accent elements like "New Listing" tags to keep the teal brand identity present but vibrant.

### Don't
*   **Don't** use 100% black (#000000). Always use `on_background` (#1e1b1c) for text to maintain the sophisticated tonal warmth.
*   **Don't** use standard box shadows. If the surface isn't clearly floating, it shouldn't have a shadow. Rely on background color shifts first.
*   **Don't** use dividers or lines to separate list items. Use the `spacing-4` (1rem) gap and subtle background alternating if necessary.