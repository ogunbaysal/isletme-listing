# Domain ERD Overview

The current schema groups into five domains that mirror the PRD workflows. Each table below lists its key relationships.

## Accounts & Profiles
- **users** ←1:1→ owner_profiles (owners) and admin_profiles (admins)
- users → hasMany listings, listing_drafts, subscriptions, support_tickets, support_messages, ticket_assignments, listing_views
- users → hasMany blog_posts (as authors / owners) and approval logs (listing/blog)

## Places & Discovery
- **place_types** ←1:M→ listings
- listings ←1:M→ listing_media, listing_views, listing_approval_logs, listing_drafts
- listings ↔︎M:N↔︎ amenities (amenity_listing) & tags (listing_tag)
- collections ↔︎ morphMany ↔︎ listings/blog_posts via collection_items

## Subscriptions & Billing
- **subscription_plans** ←1:M→ subscriptions ←1:M→ invoices ←1:M→ payment_transactions
- subscriptions belong to users (owners)

## Content & Editorial
- **blog_categories** (self-referencing) ←1:M→ blog_posts ←1:M→ blog_media & blog_approval_logs
- blog_posts participate in collections and carry owner/author links to users

## Support, Messaging & Platform Ops
- **support_tickets** ←1:M→ support_messages & ticket_assignments; assigned_admin references users
- announcements broadcast platform notices
- audit_logs store polymorphic traces of admin actions
- analytics_snapshots capture aggregated KPIs per metric/date

These relationships ensure traveler discovery (listings/collections), owner monetisation (subscriptions), editorial curation (blogs), and operational oversight (support, audit, analytics) are all connected to the shared user base.
