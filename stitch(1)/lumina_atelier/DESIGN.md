# Design System: The Digital Atelier

## 1. Overview & Creative North Star
This design system is anchored by the Creative North Star: **"The Digital Atelier."** Much like a physical workshop of a master craftsman, the interface should feel curated, architectural, and intentionally sparse. We move beyond "standard" UI by treating the screen as a canvas of high-end editorial paper.

The system rejects the "boxed-in" look of traditional SaaS. Instead of rigid grids and heavy borders, we utilize **Intentional Asymmetry** and **Tonal Depth**. By leveraging generous whitespace (the "breathing room" of the atelier) and a high-contrast typographic scale, we guide the user’s eye through composition rather than containment. Every element must feel like it was placed by hand, with purpose and precision.

---

## 2. Colors
Our palette is a study in restraint. We use a "High-Value Monochromatic" foundation with a single, strategic pulse of Amber to denote action and intelligence.

### The Palette
*   **Surface:** `#faf8ff` (The canvas)
*   **Primary (Text):** `#000000` (The ink)
*   **Secondary (Accent):** `#855300` / Amber `#F59E0B` (The master’s mark)
*   **On-Surface/Neutral:** Slate-900 equivalents (`#131b2e`) for deep hierarchy.

### The "No-Line" Rule
**Explicit Instruction:** Designers are prohibited from using 1px solid borders to define sections. Traditional dividers are considered "visual noise." Boundaries must be created through:
1.  **Background Color Shifts:** A `surface-container-low` section sitting against a `surface` background.
2.  **Tonal Transitions:** Using the hierarchy of `surface-container-lowest` to `highest` to imply edge and depth.

### Signature Textures & Glass
To prevent the UI from feeling "flat" or "cheap," use **Glassmorphism** for floating elements (e.g., navigation bars or modal overlays). 
*   **The Glass Rule:** Use semi-transparent surface colors (80% opacity) with a `backdrop-blur` of 12px-20px.
*   **Gradients:** Use subtle, linear gradients (e.g., `primary` to `primary_container`) for main CTAs to give them a "machined" metallic finish rather than a flat plastic feel.

---

## 3. Typography
The tension between the architectural **Manrope** and the utilitarian **Inter** creates the "Atelier" aesthetic.

*   **Display & Headlines (Manrope):** Must be bold with tight tracking (`-0.02em` to `-0.04em`). This creates a "block" of text that feels like a structural beam in the layout.
*   **Body & Titles (Inter):** Must be airy with generous line-height (`1.6` for body). This provides the functional clarity required for a ledger.
*   **Hierarchy as Brand:** Use `display-lg` (3.5rem) sparingly to create editorial "moments." Labels should always be in `label-md` uppercase with slight letter spacing (`0.05em`) to feel like professional blueprints.

---

## 4. Elevation & Depth: Tonal Layering
We do not use shadows to create "pop"; we use them to simulate **Ambient Light.**

*   **The Layering Principle:** Depth is achieved by stacking. Place a `surface-container-lowest` card on top of a `surface-container-low` background. The subtle shift in hex code creates a "soft lift" that feels architectural.
*   **Ambient Shadows:** If a floating effect is required (e.g., a dropdown), the shadow must be:
    *   **Blur:** 24px–40px.
    *   **Opacity:** 4%–6%.
    *   **Color:** Tinted with `on-surface` (`#131b2e`) to mimic natural environmental occlusion.
*   **The Ghost Border:** If a boundary is strictly required for accessibility, use the `outline-variant` token at **15% opacity**. A 100% opaque border is a failure of composition.

---

## 5. Components

### Buttons
*   **Primary:** Solid `primary` (Black) or `secondary` (Amber). No rounded corners; use `DEFAULT` (0.25rem) for an architectural, "cut stone" look.
*   **Tertiary:** Text-only with a heavy underline that appears on hover.
*   **Microcopy:** Use "Command" verbs (e.g., "Commit Entry" vs "Submit").

### Cards & Lists
*   **The Divider Ban:** Never use a horizontal line to separate list items. Use the **Spacing Scale** (e.g., `spacing-4` or `spacing-6`) to create separation through "void."
*   **Structure:** Use `surface-container-lowest` for the card body. On hover, transition the background to `surface-container-highest` or apply a "Ghost Border."

### Input Fields
*   **Style:** Minimalist. Only a bottom-aligned `outline-variant` (20% opacity). Labels use `label-sm` and sit 0.5rem above the field.
*   **Focus State:** The bottom border shifts to `secondary` (Amber) with a 2px thickness. No "glow" effects.

### Additional Components: The "Atelier" Status Bar
A custom component for this system. A slim, persistent data-strip at the very bottom or top of a container using `surface-container-high`, displaying meta-information (timestamps, totals, status) in `label-sm`. It acts as the "footer" of a blueprint.

---

## 6. Do’s and Don’ts

### Do
*   **Align to the 8px Grid:** Every element must snap to the `spacing-2`, `spacing-4`, or `spacing-8` increments. Precision is the soul of this system.
*   **Use Intentional Asymmetry:** If a page is heavy on the left, use a large `display-md` headline on the right to balance the "visual weight" without filling the space with boxes.
*   **Embrace the "White Space":** If a screen feels "empty," it is likely finished. Do not add decorative elements.

### Don’t
*   **No High-Contrast Borders:** Never use a solid grey border to separate content.
*   **No Default Shadows:** Avoid the standard "drop shadow" look. If it looks like a "Material Design" button, it is wrong for this system.
*   **No Center-Alignment for Long Form:** Keep text left-aligned to maintain the "ledger" feel. Center-alignment is only for high-level editorial headers.

### Accessibility Note
While we use subtle tonal shifts, ensure that the contrast between `surface` and `on-surface` text always meets WCAG AA standards. If a background shift is too subtle for low-vision users, use the **Ghost Border** fallback.