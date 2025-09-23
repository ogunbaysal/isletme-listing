# Product Requirements Document (PRD)

## 1. Overview

### Product Vision

A web-first platform that helps travelers discover and plan their trips by providing a one-stop hub for accommodations, restaurants, villas, activity places (e.g., scuba diving, paragliding, golf), and curated experiences. The product combines listings, activities, and blog-style editorial content in a clean, modern, Airbnb-style interface.

### Target Audience

* **Travelers**: Domestic and international visitors to Türkiye (starting in Muğla).
* **Place Owners**: Hotels, restaurants, villas, flats, and activity operators looking to increase visibility.
* **Admin Team**: Internal staff who manage listings, subscriptions, payments, and content.

### Business Model

* **B2B Subscription Model**: Places pay a recurring subscription fee to list their business and optionally contribute blog content.
* No booking or payment from travelers in MVP.

### Initial Launch Region

* **Muğla, Türkiye** with Turkish as the primary language and English support for international travelers.

---

## 2. Goals & Objectives

* **Travelers**: Easily discover accommodations, restaurants, and activities in one place, supported by filters, maps, and curated blogs.
* **Place Owners**: Manage listings and publish promotional blogs while subscribing to gain visibility.
* **Admin Team**: Efficiently manage listings, blogs, subscriptions, and provide platform oversight with analytics.

---

## 3. Scope (MVP)

### Traveler Features

* Search and filter listings.
* Map-based browsing (with geolocation support).
* Curated collections and blog content.
* Responsive web app with multilingual support.

### Place Owner Features

* Manage core and type-specific listing details.
* Manage subscription plan and renewals.
* Add blog posts (subject to admin approval).

### Admin Features

* Manage users, places, and listings (approve, reject, suspend).
* Manage blogs (approve/reject owner posts, publish editorial content).
* Manage subscriptions and payments.
* Support tools for handling owner inquiries.
* Analytics dashboard for platform KPIs.

### Out of Scope (Future Phases)

* Traveler bookings and payments.
* Reviews and ratings.
* Mobile apps (iOS/Android).
* Owner analytics and insights.
* AI-driven recommendations.

---

## 4. User Personas

### Traveler Persona

* Age: 25–45
* Motivations: Discover authentic experiences, easy trip planning.
* Pain points: Too many scattered sources, lack of trust in unknown platforms.

### Place Owner Persona

* Small hotel/villa owner, restaurant manager, or activity operator.
* Motivations: Increase visibility, attract domestic and international travelers.
* Pain points: Limited marketing budget, lack of digital tools.

### Admin Persona

* Platform operations manager.
* Motivations: Maintain content quality, ensure compliance, maximize subscriptions.
* Pain points: Manual overhead if tools are inefficient.

---

## 5. User Flows (Expanded with Visual Detail)

### Traveler Flow

1. **Landing Page/Homepage**

   * Hero section with search bar ("Where to?").
   * Featured collections and blog highlights.
   * Map button for location-based browsing.

2. **Search & Filter**

   * Enter location → Apply filters (type, amenities, tags, etc.).
   * Results shown as list + map toggle.
   * Infinite scroll or pagination.

3. **Listing Detail Page**

   * Photo gallery, description, type-specific fields (e.g., cuisine for restaurants).
   * Location map embed.
   * Contact information.
   * Related listings section ("You may also like").

4. **Blogs & Collections**

   * Curated travel guides (admin-generated).
   * Owner-submitted posts (approved by admin).
   * Share/save functionality (email, WhatsApp, social).

**Wireframe-Level Detail:**

* Top navigation: Logo + Search + Language toggle (TR/EN) + Explore (Map/Collections/Blog).
* Footer: About, Terms, Contact, Subscription info.

---

### Place Owner Flow

1. **Onboarding**

   * Sign up with email/password or social login.
   * Select place type (Hotel, Restaurant, Villa, Activity, etc.).
   * Subscribe to a plan (monthly/annual).

2. **Dashboard**

   * Overview of subscription status.
   * Quick links: Manage Listings, Add Blog Post, Account Settings.

3. **Listing Management**

   * Add/Edit listing: Upload images, fill in description, type-specific fields.
   * Publish or save as draft.
   * See status (Approved / Pending / Rejected).

4. **Blog Post Submission**

   * Create blog post with title, body, and images.
   * Submit for admin approval.
   * Track status.

**Wireframe-Level Detail:**

* Side navigation: Dashboard, Listings, Blog Posts, Subscription, Settings.
* Clean Airbnb-style forms with image upload drag-and-drop.

---

### Admin Flow

1. **Admin Dashboard**

   * High-level KPIs: Number of listings, active subscriptions, pending approvals.
   * Quick actions: Approve listings, Review blogs.

2. **User & Place Management**

   * Search/filter listings by type, owner, status.
   * Approve/reject/suspend listings.
   * Edit details if needed.

3. **Blog Management**

   * Queue of submitted blog posts.
   * Approve/reject, edit before publishing.

4. **Subscription & Payment Management**

   * View invoices and payment history.
   * Manage plan tiers.
   * Track failed or pending payments.

5. **Support Tools**

   * Ticket inbox with owner inquiries.
   * Assign tickets to staff.

6. **Analytics Dashboard**

   * Graphs for active listings growth, subscription churn, most-viewed places/blogs.
   * Export reports (CSV/PDF).

**Wireframe-Level Detail:**

* Left navigation: Dashboard, Listings, Blogs, Subscriptions, Support, Analytics.
* Simple card-based UI for approvals (Approve/Reject buttons inline).

---

## 6. Feature Requirements

### 6.1 Traveler-Side (Web App)

* **Search & Filter**: By place type, location, tags (family-friendly, luxury, etc.).
* **Interactive Map**: Show nearby places using browser geolocation APIs.
* **Curated Collections & Blogs**: Editorial and owner-contributed posts.
* **Multi-language**: Turkish (default) and English.
* **Responsive Design**: Optimized for desktop and mobile browsers.

### 6.2 Owner Panel

* **Listing Management**: Core structure (title, description, images, location, contact info, opening hours) + custom fields per type.
* **Subscription Management**: View current plan, renew/upgrade subscription.
* **Blog Posts**: Add and submit blog posts for admin review.

### 6.3 Admin Panel

* **User & Place Management**: Approve, reject, suspend, or edit listings.
* **Blog Management**: Approve/reject owner submissions, publish editorial content.
* **Subscription & Payment Management**: Track invoices, manage plans, monitor payments.
* **Support Tools**: Messaging system or support ticketing.
* **Analytics Dashboard**: KPIs such as number of active listings, subscriptions, and engagement.

---

## 7. Non-Functional Requirements

* **Performance**: Pages load within 2–3 seconds.
* **Security**: Secure data handling, SSL, hashed passwords.
* **Data Privacy**: Compliance with GDPR and KVKK (Turkish data law).
* **Scalability**: Architecture supports future expansion to other regions.
* **Reliability**: 99.5% uptime target.

---

## 8. Success Metrics

* **Listings**: Number of active listings onboarded.
* **Subscriptions**: Renewal rate and new subscriptions per month.
* **Engagement**: Number of searches, blog reads, and shares by travelers.
* **Admin Efficiency**: Average time to approve or reject submissions.

---

## 9. Future Enhancements (Post-MVP)

* **Mobile Apps**: Native iOS and Android apps.
* **Traveler Bookings & Payments**: Integrated POS system.
* **Reviews & Ratings**: User feedback system.
* **Advanced Analytics for Owners**: Traffic, engagement, conversions.
* **AI Recommendations**: Personalized suggestions for travelers.

