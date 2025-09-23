# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is an Airbnb-style travel discovery platform for Türkiye (starting in Muğla) built with Laravel 12 + Inertia.js + React 19. The platform connects travelers with accommodations, restaurants, villas, and activities through a subscription-based business model for place owners.

### Architecture

- **Backend**: Laravel 12 with PHP 8.2+, SQLite database
- **Frontend**: React 19 + TypeScript via Inertia.js
- **Styling**: Tailwind CSS v4 with automatic optimization
- **Build Tool**: Vite with Laravel plugin and Wayfinder
- **Testing**: Pest (PHP) with Feature/Unit test structure
- **Package Managers**: Composer (PHP), npm/bun (JavaScript)

## Domain Structure

The application is organized into five key domains as defined in `docs/erd-overview.md`:

1. **Accounts & Profiles**: User management with owner/admin role separation
2. **Places & Discovery**: Listings, place types, amenities, tags, and collections
3. **Subscriptions & Billing**: Payment processing and subscription management
4. **Content & Editorial**: Blog posts and editorial content with approval workflows
5. **Support & Platform Ops**: Support tickets, audit logs, and analytics

### Key Models

- `User` with polymorphic profiles (`OwnerProfile`, `AdminProfile`)
- `Listing` with type-specific fields, media, amenities, and tags
- `BlogPost` with approval workflows and media attachments
- `Subscription` with billing and payment tracking
- `SupportTicket` with message threads and admin assignments

## Development Commands

### Full-Stack Development
```bash
composer dev              # Starts PHP server + queue + logs + Vite dev server
composer dev:ssr          # Same as above but with SSR enabled
npm run dev               # Vite dev server only
```

### Building
```bash
npm run build             # Production frontend build
npm run build:ssr         # Production build with SSR support
```

### Code Quality
```bash
npm run lint              # ESLint with auto-fix
npm run format            # Prettier formatting
npm run format:check      # Check formatting without fixing
npm run types             # TypeScript type checking
```

### Testing
```bash
composer test             # Run PHP tests (config clear + artisan test)
php artisan test          # Direct Pest test execution
```

### Environment Setup
```bash
cp .env.example .env
php artisan key:generate
touch database/database.sqlite    # If not exists
php artisan migrate
```

## File Organization

### Frontend Structure
- `resources/js/pages/` - Inertia.js page components
- `resources/js/lib/` - Shared utilities and helpers
- `resources/js/types/` - TypeScript type definitions
- `resources/css/` - Tailwind CSS entry points
- `resources/views/` - Blade templates (mainly for SEO/SSR)

### Backend Structure
- `app/Models/` - Eloquent models with extensive relationships
- `app/Http/Controllers/` - HTTP controllers
- `app/Http/Middleware/` - Custom middleware (includes Inertia handling)
- `database/migrations/` - Database schema with domain-specific migrations
- `database/factories/` - Model factories for testing
- `database/seeders/` - Database seeders

### Configuration
- Uses SQLite for development (file: `database/database.sqlite`)
- Inertia.js configured for React with SSR support
- Wayfinder plugin for enhanced Laravel/Inertia integration
- Pest configured with `RefreshDatabase` for Feature tests

## Coding Conventions

### Naming
- **PHP**: Laravel conventions (snake_case for database, PascalCase for classes)
- **JavaScript/TypeScript**: camelCase for variables/functions, PascalCase for components
- **Database**: snake_case columns, descriptive relationship naming

### Code Style
- **Indentation**: 2 spaces for PHP, handled by Prettier for JS/TS
- **PHP Formatting**: Laravel Pint (if available) or PSR-12 standards
- **JS/TS Formatting**: Prettier with Tailwind CSS plugin and import organization

### Testing Strategy
- **Feature Tests**: End-to-end behavior using Pest with Inertia assertions
- **Unit Tests**: Isolated component testing in `tests/Unit/`
- **Test Naming**: Mirror route/class names (e.g., `ListingShowTest`)
- **Factories**: Lightweight test data via model factories

## Key Technologies & Packages

### Backend Dependencies
- `inertiajs/inertia-laravel` - Inertia.js Laravel adapter
- `laravel/wayfinder` - Enhanced routing and form handling

### Frontend Dependencies
- `@inertiajs/react` - Inertia.js React adapter
- `@tailwindcss/vite` - Tailwind CSS v4 Vite plugin
- `class-variance-authority` & `clsx` - Conditional styling utilities
- `tailwind-merge` - Tailwind class merging

### Development Tools
- ESLint with React hooks and Prettier integration
- TypeScript with strict configuration
- Prettier with Tailwind CSS and import organization plugins

## Business Context

This platform serves three user types:
1. **Travelers**: Discover accommodations, restaurants, and activities
2. **Place Owners**: Manage listings and subscriptions, submit blog content
3. **Admins**: Approve listings/blogs, manage subscriptions, handle support

The MVP focuses on discovery and content management without booking functionality. Payment integration handles subscription billing for place owners only.