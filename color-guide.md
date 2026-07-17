# Red brand web color guideline

A color system for web interfaces where the brand logo is red. This guide defines how to use red correctly alongside neutral and surface colors to build clean, professional UIs.

---

## Color palette

| Token name    | Hex       | Role                              |
|---------------|-----------|-----------------------------------|
| `red`         | `#D42B2B` | Primary brand red — CTAs, accents |
| `red-dark`    | `#B82424` | Red hover state                   |
| `red-tint`    | `#FDF2F2` | Red tinted surface — backgrounds  |
| `red-text`    | `#8C1A1A` | Dark red for text on tinted bg    |
| `near-black`  | `#1A1A1A` | Headings, dark sections, footers  |
| `dark-gray`   | `#2D2D2D` | Secondary headings                |
| `mid-gray`    | `#6B6B6B` | Body text, supporting copy        |
| `surface`     | `#F5F5F4` | Alternate section background      |
| `border`      | `#E8E8E6` | Hairline borders                  |
| `white`       | `#FFFFFF` | Primary surface                   |

---

## Color roles

### Red — use it sparingly and with intent

Red is the most powerful color in this system. Overuse kills its impact.

**Use red for:**
- Primary CTA buttons (one per section maximum)
- Logo mark and brand icon
- Inline accent text within headlines (one or two words only, never full sentences)
- Icon backgrounds using `red-tint` with `red` icon stroke
- Stat callouts and highlight numbers
- Tag/badge backgrounds using `red-tint` + `red-text`

**Never use red for:**
- Body text or paragraph copy
- Large background fills or full-width sections
- Decorative dividers or borders
- Secondary or tertiary CTAs
- Error states (conflicts with brand red — use a distinct error red)

### Surfaces

Use a three-level surface system to create hierarchy without color:

| Surface       | Color     | Usage                                  |
|---------------|-----------|----------------------------------------|
| Primary       | `#FFFFFF` | Main content areas, cards, nav         |
| Secondary     | `#F5F5F4` | Alternate sections, feature backgrounds|
| Dark          | `#1A1A1A` | High-contrast CTA strips, dark footers |

### Typography on surfaces

| Surface       | Heading color | Body color   |
|---------------|---------------|--------------|
| White/light   | `#1A1A1A`     | `#6B6B6B`    |
| Dark (`#1A1A1A`) | `#FFFFFF`  | `rgba(255,255,255,0.65)` |
| Red tint      | `#8C1A1A`     | `#8C1A1A`    |

---

## Component patterns

### Primary button

```css
background: #D42B2B;
color: #FFFFFF;
border-radius: 8px;
padding: 12px 24px;
font-size: 15px;
font-weight: 500;
border: none;

/* hover */
background: #B82424;
```

### Ghost / secondary button

```css
background: transparent;
color: #1A1A1A;
border: 0.5px solid #E8E8E6;
border-radius: 8px;
padding: 12px 24px;
font-size: 15px;
font-weight: 500;

/* hover */
background: #F5F5F4;
```

### Outline button on dark background

```css
background: transparent;
color: #FFFFFF;
border: 1.5px solid #D42B2B;
border-radius: 8px;
padding: 12px 24px;
font-size: 15px;
font-weight: 500;
```

### Red tag / badge

```css
background: #FDF2F2;
color: #8C1A1A;
border-radius: 20px;
padding: 4px 12px;
font-size: 12px;
font-weight: 500;
```

### Feature icon container

```css
background: #FDF2F2;
border-radius: 8px;
width: 36px;
height: 36px;
display: flex;
align-items: center;
justify-content: center;
/* icon color: #D42B2B */
```

### Card

```css
background: #FFFFFF;
border-radius: 12px;
border: 0.5px solid #E8E8E6;
padding: 24px;
```

### Nav bar

```css
background: #FFFFFF;
border-bottom: 0.5px solid #E8E8E6;
height: 60px;
padding: 0 32px;
/* nav link color: #6B6B6B */
/* primary nav CTA: use primary button style */
```

---

## Section patterns

### Standard content section (white)

- Background: `#FFFFFF`
- Heading: `#1A1A1A`
- Body: `#6B6B6B`
- Accents: `#D42B2B`

### Alternate section (light gray)

- Background: `#F5F5F4`
- Heading: `#1A1A1A`
- Body: `#6B6B6B`
- Cards inside: `#FFFFFF` with `#E8E8E6` border

### Dark CTA strip

- Background: `#1A1A1A`
- Heading: `#FFFFFF` with `#D42B2B` accent word
- CTA: outline button (transparent + `#D42B2B` border + `#FFFFFF` text)

Use the dark strip when you need to feature red again after multiple white sections — the contrast resets the eye and makes red feel intentional again.

---

## Rules

1. **One red CTA per section.** If a section has two actions, make the secondary one a ghost button.
2. **Red in headlines = one or two words only.** Wrap a single key phrase in red, never a full sentence.
3. **Never use red as a section background.** It reads as alarming rather than branded.
4. **Alternate surface colors between sections.** White → Light gray → Dark → White. This creates rhythm without relying on color.
5. **Stat numbers can use red** for the unit or the value, not both.
6. **Borders are always hairline.** Use `0.5px` or `1px` solid `#E8E8E6`. Never use a colored border except for focused inputs or featured card accents.
7. **Error states need a separate red.** Reserve `#D42B2B` for brand. Use `#C0392B` or a clearly distinct tone for form validation errors.
8. **No gradients.** Flat fills only. Red gradients look cheap and cheapen the brand.
9. **Icon backgrounds use `red-tint`, never solid red.** Solid red icons at small sizes read as warnings.
10. **Dark mode:** Darken surfaces to `#111111` / `#1E1E1E`, keep red at `#D42B2B`, lighten red tint to `#2A1010`.

---

## Typography scale (recommended)

| Role            | Size  | Weight | Color       |
|-----------------|-------|--------|-------------|
| Display / H1    | 40px  | 500    | `#1A1A1A`   |
| H2              | 28px  | 500    | `#1A1A1A`   |
| H3              | 20px  | 500    | `#1A1A1A`   |
| Body            | 16px  | 400    | `#6B6B6B`   |
| Small / caption | 13px  | 400    | `#6B6B6B`   |
| Label           | 11px  | 500    | `#6B6B6B`   |
| Red accent text | any   | 500    | `#D42B2B`   |
| White heading   | any   | 500    | `#FFFFFF`   |

Line height: `1.15` for headings, `1.7` for body copy.
Letter spacing: `-0.02em` for display sizes (32px+).

---

## Quick reference — when to use what

| Element                     | Color to use                     |
|-----------------------------|----------------------------------|
| Primary CTA                 | `#D42B2B` bg, `#FFFFFF` text     |
| Secondary CTA               | Transparent, `#E8E8E6` border    |
| CTA on dark bg              | Transparent, `#D42B2B` border    |
| Page background             | `#FFFFFF`                        |
| Alt section background      | `#F5F5F4`                        |
| Dark section                | `#1A1A1A`                        |
| Card background             | `#FFFFFF`                        |
| Card border                 | `#E8E8E6`                        |
| Heading text                | `#1A1A1A`                        |
| Body text                   | `#6B6B6B`                        |
| Red accent word in headline | `#D42B2B`                        |
| Badge / tag                 | `#FDF2F2` bg, `#8C1A1A` text     |
| Icon container              | `#FDF2F2` bg, `#D42B2B` icon     |
| Stat highlight              | `#D42B2B`                        |
| Nav links                   | `#6B6B6B`                        |
| Logo mark                   | `#D42B2B`                        |