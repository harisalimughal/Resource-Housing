<?php
// ============================================================
//  Resource Housing — Properties Data
//  Edit this file to add, remove, or update property listings.
// ============================================================

function getProperties(): array {
    return [
        [
            'id'        => 1,
            'title'     => 'Sparkhill, B11 4PX',
            'address'   => 'Wright Court, Birmingham',
            'location'  => 'Birmingham',
            'area'      => 'Sparkhill',
            'type'      => 'HMO',
            'bedrooms'  => 4,
            'bathrooms' => 3,
            'image'     => '/public/assets/images/uk-houses/uk-1.jpg',
        ],
        [
            'id'        => 2,
            'title'     => 'Moseley, B13 9RQ',
            'address'   => 'Alcester Road, Birmingham',
            'location'  => 'Birmingham',
            'area'      => 'Moseley',
            'type'      => 'HMO',
            'bedrooms'  => 5,
            'bathrooms' => 2,
            'image'     => '/public/assets/images/uk-houses/uk-2.jpg',
        ],
        [
            'id'        => 3,
            'title'     => 'Selly Oak, B29 6AU',
            'address'   => 'Bristol Road, Birmingham',
            'location'  => 'Birmingham',
            'area'      => 'Selly Oak',
            'type'      => 'HMO',
            'bedrooms'  => 6,
            'bathrooms' => 3,
            'image'     => '/public/assets/images/uk-houses/uk-3.jpg',
        ],
        [
            'id'        => 4,
            'title'     => 'Erdington, B23 5TL',
            'address'   => 'Sutton Road, Birmingham',
            'location'  => 'Birmingham',
            'area'      => 'Erdington',
            'type'      => 'HMO',
            'bedrooms'  => 4,
            'bathrooms' => 2,
            'image'     => '/public/assets/images/uk-houses/uk-4.jpg',
        ],
        [
            'id'        => 5,
            'title'     => 'Handsworth, B21 0AH',
            'address'   => 'Soho Road, Birmingham',
            'location'  => 'Birmingham',
            'area'      => 'Handsworth',
            'type'      => 'HMO',
            'bedrooms'  => 5,
            'bathrooms' => 3,
            'image'     => '/public/assets/images/home-center.jpg',
        ],
        [
            'id'        => 6,
            'title'     => 'Aston, B6 7AB',
            'address'   => 'Witton Lane, Birmingham',
            'location'  => 'Birmingham',
            'area'      => 'Aston',
            'type'      => 'HMO',
            'bedrooms'  => 4,
            'bathrooms' => 2,
            'image'     => '/public/assets/images/home-center2.jpg',
        ],
        [
            'id'        => 7,
            'title'     => 'Kings Heath, B14 5LH',
            'address'   => 'Vicarage Road, Birmingham',
            'location'  => 'Birmingham',
            'area'      => 'Kings Heath',
            'type'      => 'HMO',
            'bedrooms'  => 6,
            'bathrooms' => 4,
            'image'     => '/public/assets/images/home-center3.jpg',
        ],
        [
            'id'        => 8,
            'title'     => 'Harborne, B17 0RD',
            'address'   => 'High Street, Birmingham',
            'location'  => 'Birmingham',
            'area'      => 'Harborne',
            'type'      => 'HMO',
            'bedrooms'  => 5,
            'bathrooms' => 3,
            'image'     => '/public/assets/images/home-center4.jpg',
        ],
    ];
}

// Slice properties for a given page (1-based)
function paginateProperties(array $properties, int $page = 1, int $perPage = 4): array {
    $total      = count($properties);
    $totalPages = (int) ceil($total / $perPage);
    $offset     = ($page - 1) * $perPage;

    return [
        'properties' => array_slice($properties, $offset, $perPage),
        'pagination' => [
            'current_page'       => $page,
            'total_pages'        => $totalPages,
            'per_page'           => $perPage,
            'total_properties'   => $total,
            'has_next'           => $page < $totalPages,
            'has_prev'           => $page > 1,
        ],
    ];
}

// Filter by area, type, min bedrooms, min bathrooms
function filterProperties(array $properties, array $filters): array {
    return array_values(array_filter($properties, function ($p) use ($filters) {
        if (!empty($filters['area']) && $filters['area'] !== 'all') {
            if (strtolower($p['area']) !== strtolower($filters['area'])) return false;
        }
        if (!empty($filters['type']) && $filters['type'] !== 'all') {
            if (strtolower($p['type']) !== strtolower($filters['type'])) return false;
        }
        if (!empty($filters['bedrooms_min']) && $p['bedrooms'] < (int)$filters['bedrooms_min']) {
            return false;
        }
        if (!empty($filters['bathrooms_min']) && $p['bathrooms'] < (int)$filters['bathrooms_min']) {
            return false;
        }
        return true;
    }));
}
