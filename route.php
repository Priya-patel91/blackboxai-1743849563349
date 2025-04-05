<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heritage Walk Map - Varanasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>
        #map { 
            height: 500px;
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
        .route-marker {
            background-color: #b45309;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: block;
            border: 2px solid white;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-amber-800 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Varanasi Heritage Walks</h1>
            <div class="space-x-4">
                <a href="index.php" class="hover:text-amber-200">Home</a>
                <a href="route.php" class="hover:text-amber-200 font-bold">Map</a>
                <a href="contact.php" class="hover:text-amber-200">Contact</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Heritage Walk Route Map</h1>
        
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            <div id="map"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Suggested Walking Route</h2>
                <ol class="list-decimal pl-5 space-y-3">
                    <li class="font-medium">Start at Dashashwamedh Ghat (Morning)</li>
                    <li>Walk to Kashi Vishwanath Temple (15 min)</li>
                    <li>Proceed to Manikarnika Ghat (10 min)</li>
                    <li>Take a boat to Ramnagar Fort (30 min)</li>
                    <li class="font-medium">End at Banaras Hindu University (Evening)</li>
                </ol>
                <div class="mt-6">
                    <h3 class="font-semibold mb-2">Route Tips:</h3>
                    <ul class="space-y-2 text-gray-600">
                        <li>• Total walking distance: ~5 km</li>
                        <li>• Estimated time: 4-5 hours with stops</li>
                        <li>• Best started early morning (6-7 AM)</li>
                        <li>• Wear comfortable walking shoes</li>
                    </ul>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4 text-gray-800">Transport Options</h2>
                <div class="space-y-4">
                    <div>
                        <h3 class="font-medium text-amber-700">By Foot</h3>
                        <p class="text-gray-600">Most locations in old city are within walking distance (1-2 km apart)</p>
                    </div>
                    <div>
                        <h3 class="font-medium text-amber-700">Cycle Rickshaw</h3>
                        <p class="text-gray-600">Available throughout the city (₹50-100 per ride)</p>
                    </div>
                    <div>
                        <h3 class="font-medium text-amber-700">Boat</h3>
                        <p class="text-gray-600">Best for river crossings (₹200-500 per hour)</p>
                    </div>
                    <div>
                        <h3 class="font-medium text-amber-700">Auto Rickshaw</h3>
                        <p class="text-gray-600">For longer distances like Sarnath (₹150-300)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize map centered on Varanasi
        const map = L.map('map').setView([25.3176, 82.9739], 13);
        
        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Add markers for heritage sites
        <?php include 'data.php'; ?>
        <?php foreach ($heritage_sites as $site): ?>
            L.marker([<?= $site['lat'] ?>, <?= $site['lng'] ?>], {
                icon: L.divIcon({
                    className: 'route-marker'
                })
            })
            .bindPopup(`
                <div class="p-2">
                    <h3 class="font-bold text-lg"><?= $site['name'] ?></h3>
                    <p class="text-gray-600"><?= $site['location'] ?></p>
                    <a href="spot-details.php?id=<?= $site['id'] ?>" 
                       class="mt-2 inline-block text-amber-700 hover:text-amber-900 font-medium">
                        View Details →
                    </a>
                </div>
            `)
            .addTo(map);
        <?php endforeach; ?>

        // Add suggested walking route (simplified)
        const routeCoordinates = [
            [25.3107, 83.0106],  // Dashashwamedh Ghat
            [25.3107, 83.0106],  // Kashi Vishwanath
            [25.3107, 83.0106],  // Manikarnika Ghat
            [25.2858, 82.9921],  // Ramnagar Fort
            [25.2677, 82.9913]   // BHU
        ];
        
        const routeLine = L.polyline(routeCoordinates, {
            color: '#b45309',
            weight: 4,
            opacity: 0.7,
            dashArray: '10, 10'
        }).addTo(map);

        // Fit map to show all markers
        map.fitBounds(routeLine.getBounds());
    </script>
</body>
</html>