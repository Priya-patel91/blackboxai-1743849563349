<?php
$heritage_sites = [
    [
        'id' => 1,
        'name' => 'Kashi Vishwanath Temple',
        'description' => 'One of the most famous Hindu temples dedicated to Lord Shiva. The original temple was destroyed and rebuilt several times, with the current structure dating back to 1780. The temple is known for its gold-plated towers and intricate carvings.',
        'image' => 'https://images.pexels.com/photos/3581369/pexels-photo-3581369.jpeg',
        'entry_fee' => 'Free (ID proof required)',
        'best_time' => 'Morning (4:00 AM - 11:00 AM)',
        'location' => 'Lahori Tola, Varanasi',
        'lat' => 25.3107,
        'lng' => 83.0106,
        'features' => [
            'Gold-plated spire',
            'Evening Ganga Aarti',
            'Restricted photography'
        ]
    ],
    [
        'id' => 2,
        'name' => 'Dashashwamedh Ghat',
        'description' => 'The most famous and spectacular ghat in Varanasi where the Ganga Aarti ceremony takes place every evening. According to legend, Lord Brahma created this ghat to welcome Lord Shiva.',
        'image' => 'https://images.pexels.com/photos/3581369/pexels-photo-3581369.jpeg',
        'entry_fee' => 'Free',
        'best_time' => 'Evening (5:00 PM - 7:00 PM)',
        'location' => 'Near Vishwanath Temple',
        'lat' => 25.3107,
        'lng' => 83.0106,
        'features' => [
            'Daily Ganga Aarti',
            'Boat rides available',
            'Photography allowed'
        ]
    ],
    [
        'id' => 3,
        'name' => 'Sarnath',
        'description' => 'The place where Buddha delivered his first sermon after enlightenment. Sarnath contains several ancient Buddhist structures and stupas dating back to 3rd century BCE.',
        'image' => 'https://images.pexels.com/photos/3581369/pexels-photo-3581369.jpeg',
        'entry_fee' => '₹50 for Indians, ₹300 for foreigners',
        'best_time' => 'Morning (8:00 AM - 5:00 PM)',
        'location' => '10 km from Varanasi',
        'lat' => 25.3809,
        'lng' => 83.0214,
        'features' => [
            'Dhamek Stupa',
            'Archaeological Museum',
            'Peaceful gardens'
        ]
    ],
    [
        'id' => 4,
        'name' => 'Manikarnika Ghat',
        'description' => 'One of the oldest and most sacred cremation grounds in Varanasi. Hindus believe that being cremated here provides moksha (liberation from cycle of rebirth).',
        'image' => 'https://images.pexels.com/photos/3581369/pexels-photo-3581369.jpeg',
        'entry_fee' => 'Free',
        'best_time' => 'Daytime (Respectful visits only)',
        'location' => 'Near Scindia Ghat',
        'lat' => 25.3107,
        'lng' => 83.0106,
        'features' => [
            'Sacred cremation site',
            'Ancient history',
            'Photography discouraged'
        ]
    ],
    [
        'id' => 5,
        'name' => 'Banaras Hindu University',
        'description' => 'One of Asia\'s largest residential universities, founded in 1916. The campus features beautiful architecture including the famous Vishwanath Temple and Bharat Kala Bhavan museum.',
        'image' => 'https://images.pexels.com/photos/3581369/pexels-photo-3581369.jpeg',
        'entry_fee' => 'Free (₹50 for museum)',
        'best_time' => '9:00 AM - 5:00 PM',
        'location' => 'BHU Campus',
        'lat' => 25.2677,
        'lng' => 82.9913,
        'features' => [
            'Vishwanath Temple',
            'Bharat Kala Bhavan museum',
            'Lush green campus'
        ]
    ],
    [
        'id' => 6,
        'name' => 'Ramnagar Fort',
        'description' => 'The ancestral home of the Maharaja of Banaras, this 18th century fort on the eastern bank of the Ganges features a museum with vintage cars, weapons, and royal artifacts.',
        'image' => 'https://images.pexels.com/photos/3581369/pexels-photo-3581369.jpeg',
        'entry_fee' => '₹150 for Indians, ₹300 for foreigners',
        'best_time' => '10:00 AM - 5:00 PM',
        'location' => 'Ramnagar',
        'lat' => 25.2858,
        'lng' => 82.9921,
        'features' => [
            'Museum with royal collection',
            'Riverside location',
            'Dussehra festival venue'
        ]
    ]
];

// Helper function to get site by ID
function get_heritage_site($id) {
    global $heritage_sites;
    foreach ($heritage_sites as $site) {
        if ($site['id'] == $id) {
            return $site;
        }
    }
    return null;
}
?>