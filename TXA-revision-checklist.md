# TXA Website Revision Checklist

Source: `TXA website mockup comments_AC_260818.docx`  
Reviewed against: current TXA WordPress theme files and local WordPress records  
Status key: `[x]` done, `[ ]` outstanding, `[-]` partial or awaiting confirmation

## 1. Homepage

### Hero images

- [x] Confirm the current homepage hero imagery as final.
- [x] Use the approved `hero-homepage.jpg` asset in the homepage hero.
- [x] Confirm the final hero heading, body copy, and calls to action.
- [x] Retain the approved single-hero implementation in place of the earlier two-image request.

Notes/decision:

> 

### Connected Tourism Ecosystem

- [x] Replace the old static section with a connected-network presentation.
- [x] Add animated/glowing connection paths.
- [x] Make hovering over TXA activate all paths.
- [x] Make Suppliers independently hoverable.
- [x] Make Booking Systems independently hoverable.
- [x] Make Distributors independently hoverable.
- [x] Make Destinations independently hoverable.
- [x] Fade all unrelated nodes and paths when an audience node is active.
- [x] Ensure the highlighted path accurately represents the selected audience.
- [x] Move Booking.com, Google Things to do, and Tripadvisor from booking systems to distribution platforms.
- [x] Replace fragile absolute-position arrows with stage-aligned responsive arrows.
- [ ] Confirm whether moving dashed lines are acceptable or whether true animated particles are required.
- [x] Verify equivalent focus interaction for keyboard and touch-oriented layouts.

Notes/decision:

> 

### How TXA Works video

- [x] Add an embedded video area to the homepage.
- [-] Current embed is explicitly marked as a placeholder.
- [ ] Obtain or approve the re-edited TXA Explainer video.
- [ ] Replace the placeholder URL with the approved video.
- [ ] Confirm that all outdated logos and flows have been replaced in the video.

Approved video URL/file:

> 

### How to Connect to TXA

- [x] Rename “Choose Your Pathway” to “How to Connect to TXA?”
- [x] Include Tourism Suppliers.
- [x] Include Destinations.
- [x] Include Distributors.
- [x] Include Booking Systems.
- [x] Link each card to its corresponding page.
- [ ] Confirm whether the Tourism Suppliers card should link to the Suppliers page or directly to Apply Now.
- [ ] Verify every destination page exists and does not return a 404.

Notes/decision:

> 

## 2. TXA Suppliers

- [x] Replace the original Supplier Distribution Flow with a new concept diagram.
- [x] Change the diagram to the approved TXA system-concept structure:
  - [x] Column 1: Tourism Suppliers / businesses that sell travel online.
  - [x] Column 2: TXA System with Booking Engine, CRM, and Database.
  - [x] Column 3: Web Platforms with Company Website, Local Government/DMO, Google, and Various OTAs.
  - [x] Column 4: Customer / travellers who purchase travel online.
- [x] Highlight Tourism Suppliers in the Supplier-page version.
- [x] Replace the current “Travellers purchasing tourism products online” wording with “Customer.”
- [x] Build this as a reusable system-diagram component shared with other pages.
- [x] Prepare a Distributor-page variant that can highlight Local Government / DMO.
- [x] Position the TXA logo above and completely outside the TXA System rectangle.

Notes/decision:

> 

## 3. TXA Destinations

### Six implementation steps

- [x] Include six implementation steps.
- [x] Use numbered steps.
- [x] Place the numbers on the left/top side of each card and style them with colour.
- [ ] Add or select an icon for every step.
- [ ] Position each icon on the right as requested.
- [ ] Confirm the final wording and order of all six steps.

Notes/decision:

> 

### Destination dashboard

- [x] Replace the simple bar-graph preview with a TXA dashboard screenshot.
- [x] Present the dashboard screenshot on a laptop.
- [ ] Confirm that the dashboard data is approved for public display.

### Destination role diagram

- [ ] Add a diagram explaining the role of a Destination in TXA.
- [ ] Base it on the approved shared TXA system diagram.
- [ ] Highlight the Local Government/DMO/Destination element.
- [ ] Confirm the exact labels and copy.

Notes/decision:

> 

## 4. TXA Destination Pricing

- [ ] Remove the entire “TXA Smart Destination Packages” presentation.
- [ ] Remove the Local, Regional, and State package cards.
- [ ] Remove or revise package-specific setup/training copy.
- [ ] Add a “Request Package Discussion” button.
- [ ] Confirm where the button should link:
  - [ ] Contact page.
  - [ ] Request Demo page.
  - [ ] Email address.
  - [ ] New dedicated form/page.
- [ ] Add the Destination role/system diagram if it belongs on this page rather than the main Destination page.
- [ ] Fix malformed Tailwind class `min-h-[39S0px]`.

Approved button destination:

> 

## 5. Points of Interest & Experiences

- [x] Add a map populated with POIs and experiences.
- [-] Confirm that the current map is specifically captured from the National Trade Portal.
- [ ] Confirm that the map data and branding are approved for public display.
- [ ] Confirm the final page name because the document also requests renaming this page to “DMO Website Activation Page.”

Notes/decision:

> 

## 6. DMO Website Activation

- [ ] Decide whether this is a new standalone page or a replacement for the POI & Experiences page.
- [ ] Create the standalone page if both pages must remain.
- [ ] Otherwise rename the POI & Experiences page and update its content.
- [ ] Update the page template name, WordPress page title, heading, slug, navigation, and internal links.
- [ ] Confirm whether the existing DMO website-activation section on the main Destination page should remain.

Decision:

> 

## 7. Microsites and Campaigns

- [x] Create a separate Microsite Campaigns page.
- [x] Add a sample microsite displayed on a laptop.
- [x] Add Microsite Campaigns to the Destination navigation.
- [ ] Confirm that the displayed microsite is the approved demonstration image.
- [ ] Confirm the final page name: “Microsites and Campaigns” or “Microsite Campaigns.”
- [ ] Confirm whether this page should replace one Trade Portal page or remain separate.

Notes/decision:

> 

## 8. Trade Portal

- [x] Add a diagram explaining how a trade portal works.
- [x] Use the supplied Destination Trade Portal diagram as the content reference.
- [x] Show access through URL or QR code.
- [x] Show destination branding, POIs, recommended experiences, local suppliers, and booking access.
- [x] Show connected supply, availability, booking, confirmation, and supplier support.
- [x] Show the buyer/traveller outcome.
- [x] Keep the existing laptop mockups alongside the diagram.

Notes/decision:

> 

## 9. Data & Insights

- [ ] Create/publish a WordPress Data & Insights page using the existing template.
- [ ] Replace the external stock hero image with an approved TXA dashboard screenshot.
- [ ] Replace or approve the fabricated dashboard/bar-chart block.
- [ ] Confirm which dashboard screenshot should be used.
- [ ] Add the page to the appropriate navigation location.
- [ ] Verify that `/data-insights/` works and does not return a 404.

Approved screenshot:

> 

## 10. Virtual Concierge

- [ ] Supply and add the new Virtual Concierge image.
- [ ] Fix the broken reference to deleted `images/Lavender Bay, Sydney.jpg`.
- [ ] Review all Virtual Concierge page content.
- [ ] Obtain approval for the final heading, description, feature cards, and calls to action.
- [ ] Confirm whether `map-2.jpg` and `dashboard.png` are approved assets.

Approved content/image notes:

> 

## 11. TXA Distributors

### Distributor gallery

- [ ] Obtain the approved TXA distributor logos/images.
- [ ] Add the distributor logos in a responsive gallery.
- [ ] Add meaningful alternative text for every logo.
- [ ] Confirm whether each logo should link to the distributor’s website.
- [ ] Confirm the preferred order and whether featured partners should be highlighted.

### Distributor role diagram

- [x] Add the shared four-column TXA system diagram.
- [x] Use these columns:
  - [ ] Column 1: Tourism Suppliers.
  - [ ] Column 2: Booking System, Data, Content.
  - [ ] Column 3: Company Website, Local Government/DMO, Google/AI, Various OTAs.
  - [ ] Column 4: Customer/Travellers.
- [ ] Highlight the correct Distributor/channel element in Column 3.
- [ ] Confirm whether the final label should be “Customer” or “Travellers.”

Notes/decision:

> 

## 12. TXA Pricing

- [ ] Review the complete Pricing page content with the stakeholder.
- [ ] Confirm supplier percentage pricing.
- [ ] Confirm Destination pricing language after package cards are removed.
- [ ] Confirm Distributor commercial wording.
- [ ] Confirm Booking System fee wording.
- [ ] Remove language that should not be publicly displayed before approval.
- [ ] Replace the broken reference to deleted `images/Baines, Northern Territory.jpg`.
- [ ] Verify that every pricing call to action has a valid destination page.

Approval notes:

> 

## 13. About TXA

- [x] Add “How TXA became Australia’s tourism exchange.”
- [x] Redesign the implementation/history timeline.
- [-] Current implementation is a vertical alternating timeline rather than the detailed TXA Journey example in the document.
- [ ] Confirm the final timeline design direction.
- [ ] Confirm the milestone names, dates, and descriptions with Amy and Stephen.
- [ ] Decide whether to include the value/benefit row shown in the TXA Journey example.
- [ ] Add approved dates and partner/integration logos if required.

Approved timeline content:

> 

## 14. Booking Systems

### Booking-system list

- [-] Four booking-system names are currently displayed.
- [ ] Obtain approved logos for every booking system.
- [ ] Replace generic Bootstrap icons with actual logos.
- [ ] Confirm the complete booking-system list.
- [ ] Confirm integration-status labels such as Full Integration and Limited Release.
- [ ] Verify whether `/booking-systems/directory/` should be created.

### Booking-system role diagram

- [-] A simplified Booking System → TXA → Distribution Channels diagram exists.
- [ ] Replace it with the shared detailed system concept diagram.
- [ ] Highlight Booking Systems in the appropriate column.
- [ ] Include the other requested system, data, content, channel, and customer elements.

Notes/decision:

> 

## 15. Contact Us

### Page image

- [x] Replace the Contact page image.
- [ ] Confirm the quokka image is the approved final image.

### Contact form

- [ ] Install or activate Contact Form 7, or select a different form solution.
- [ ] Create the contact form; there are currently no stored Contact Form 7 forms.
- [ ] Review and approve all form fields.
- [ ] Add the required enquiry-type options.
- [ ] Configure the recipient as `sales@txa.com.au`.
- [ ] Configure the sender, reply-to address, and subject format.
- [ ] Configure SMTP or another reliable email-delivery method.
- [ ] Add success and error messages.
- [ ] Test submission and confirm that the email arrives at `sales@txa.com.au`.
- [ ] Test spam protection and validation.

### Smart Destination Focus button

- [ ] Confirm the exact button label.
- [ ] Confirm the button destination.
- [ ] Add/move the button to the Destination page.
- [ ] Remove any obsolete version from the Contact page if necessary.

Notes/decision:

> 

## 16. FAQ

- [x] Create a standalone FAQ page.
- [x] Add the FAQ page template.
- [x] Add the FAQ page to the footer navigation.
- [x] Categorise FAQs into:
  - [x] Suppliers.
  - [x] Destinations.
  - [x] Distributors.
  - [x] Booking Systems.
- [x] Consolidate relevant FAQs previously embedded in the Supplier and Destination pages.
- [-] Obtain final approval for the Distributor and Booking System answers derived from their existing page content.
- [x] Verify that `/faqs/` works and does not return a 404.

Notes/decision:

> 

## 17. Broken or Missing Routes

- [ ] Create or correct `/apply-now/`.
- [ ] Create or correct `/request-demo/`.
- [ ] Decide whether `/destinations/request-demo/` should be separate or redirect to `/request-demo/`.
- [ ] Create or correct `/distributors/apply/`.
- [ ] Create or correct `/booking-systems/partner-enquiry/`.
- [ ] Create or correct `/booking-systems/directory/`.
- [ ] Create or correct `/data-insights/`.
- [ ] Create or correct `/faqs/`.
- [ ] Create or correct `/resources/`, or remove the footer link.
- [ ] Test all header, footer, card, and button links after the pages are created.

## 17A. Header Navigation

- [x] Make the Destinations navigation label open its submenu on click.
- [x] Keep the first submenu item linked to the main Destinations page.
- [x] Close the Destinations submenu on outside click or Escape.

## 18. Final Quality Assurance

- [ ] Confirm all requested images are locally available and licensed for use.
- [ ] Check that no page references a deleted image.
- [ ] Test every page at mobile, tablet, laptop, and large-desktop widths.
- [ ] Test network hover, focus, keyboard, touch, and reduced-motion behaviour.
- [ ] Check image alternative text.
- [ ] Check heading hierarchy.
- [ ] Check colour contrast and visible keyboard focus.
- [ ] Run PHP syntax checks.
- [ ] Build the production CSS and JavaScript assets.
- [ ] Check the production build for missing Tailwind classes.
- [ ] Test every internal link and call to action.
- [ ] Test all forms and email delivery.
- [ ] Obtain stakeholder approval for copy, diagrams, images, video, pricing, and timeline data.
- [ ] Perform a final comparison against the original revision document.

## Decisions and Assets Still Required

- [ ] Two homepage hero images from Amy.
- [ ] Final re-edited TXA Explainer video.
- [ ] Approved shared TXA system diagram design and labels.
- [ ] Destination Pricing discussion-button destination.
- [ ] Decision on POI page versus DMO Website Activation page.
- [ ] Approved National Trade Portal map capture.
- [ ] Approved microsite demonstration image.
- [ ] Approved TXA dashboard screenshot for Data & Insights.
- [ ] New Virtual Concierge image and approved copy.
- [ ] Distributor logos.
- [ ] Booking-system logos and complete system list.
- [ ] Approved Pricing copy.
- [ ] Approved About timeline facts and dates.
- [ ] Contact form fields and email-delivery configuration.
- [ ] FAQ questions and answers for all four categories.
