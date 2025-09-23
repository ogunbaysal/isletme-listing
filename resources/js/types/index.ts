export interface User {
    id: number;
    name: string;
    email: string;
    email_verified_at?: string;
    created_at: string;
    updated_at: string;
}

export interface Listing {
    id: number;
    owner_id: number;
    place_type_id: number;
    title: string;
    slug: string;
    summary?: string;
    description?: string;
    location?: Record<string, unknown>;
    coordinates?: Record<string, unknown>;
    address_line1?: string;
    address_line2?: string;
    city?: string;
    region?: string;
    country?: string;
    postal_code?: string;
    contact_email?: string;
    contact_phone?: string;
    website_url?: string;
    status: 'draft' | 'pending' | 'approved' | 'rejected' | 'suspended';
    visibility: 'public' | 'private';
    primary_language?: string;
    is_featured: boolean;
    published_at?: string;
    expires_at?: string;
    seo?: Record<string, unknown>;
    metadata?: Record<string, unknown>;
    created_at: string;
    updated_at: string;

    // Relationships
    owner?: User;
    place_type?: PlaceType;
    media?: ListingMedia[];
    amenities?: Amenity[];
    tags?: Tag[];
}

export interface PlaceType {
    id: number;
    name: string;
    slug: string;
    description?: string;
    icon?: string;
    is_active: boolean;
    sort_order?: number;
    created_at: string;
    updated_at: string;
}

export interface ListingMedia {
    id: number;
    listing_id: number;
    file_path: string;
    file_name: string;
    file_size?: number;
    mime_type?: string;
    alt_text?: string;
    sort_order?: number;
    is_primary: boolean;
    created_at: string;
    updated_at: string;
}

export interface Amenity {
    id: number;
    name: string;
    slug: string;
    description?: string;
    icon?: string;
    category?: string;
    is_active: boolean;
    sort_order?: number;
    created_at: string;
    updated_at: string;
}

export interface Tag {
    id: number;
    name: string;
    slug: string;
    description?: string;
    color?: string;
    is_active: boolean;
    created_at: string;
    updated_at: string;
}

export interface Collection {
    id: number;
    name: string;
    slug: string;
    description?: string;
    is_public: boolean;
    sort_order?: number;
    created_at: string;
    updated_at: string;

    // Relationships
    listings?: Listing[];
}

// Props for components
export interface HomeProps {
    featuredListings: Listing[];
    nearbyListings: Listing[];
    popularDestinations: Listing[];
}

export interface ListingGridProps {
    listings: Listing[];
    variant?: 'horizontal' | 'grid';
}

export interface SearchFilters {
    location?: string;
    check_in?: string;
    check_out?: string;
    guests?: number;
    place_type?: string;
    min_price?: number;
    max_price?: number;
    amenities?: number[];
    tags?: number[];
}