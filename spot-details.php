<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heritage Site Details - Varanasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .hero-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                              var(--hero-image);
            height: 50vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        .feature-icon {
            background-color: #fef3c7;
            color: #b45309;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
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
                <a href="route.php" class="hover:text-amber-200">Map</a>
                <a href="contact.php" class="hover:text-amber-200">Contact</a>
            </div>
        </div>
    </nav>

    <?php
    include 'data.php';
    $site_id = $_GET['id'] ?? 1;
    $site = get_heritage_site($site_id);
    
    if (!$site) {
        header("Location: index.php");
        exit;
    }
    ?>

    <!-- Hero Section with Site Image -->
    <div class="hero-image" style="--hero-image: url('<?= $site['image'] ?>')">
        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-8">
            <div class="container mx-auto">
                <h1 class="text-4xl font-bold text-white"><?= $site['name'] ?></h1>
                <p class="text-xl text-gray-200"><?= $site['location'] ?></p>
            </div>
        </div>
    </div>

    <div class="container mx-auto py-8 px-4">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Main Content -->
            <div class="md:w-2/3">
                <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                    <h2 class="text-2xl font-bold mb-4 text-gray-800">About This Site</h2>
                    <p class="text-gray-700 leading-relaxed"><?= $site['description'] ?></p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                    <h2 class="text-2xl font-bold mb-4 text-gray-800">Historical Significance</h2>
                    <p class="text-gray-700 leading-relaxed">
                        <?= $site['name'] ?> holds immense historical and cultural importance in Varanasi. 
                        Dating back several centuries, this site has witnessed numerous historical events 
                        and has been a center of spiritual and cultural activities. The architecture reflects 
                        the typical North Indian style with intricate carvings and symbolic representations.
                    </p>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="md:w-1/3">
                <div class="bg-white p-6 rounded-lg shadow-md sticky top-4">
                    <h3 class="text-xl font-semibold mb-4 text-gray-800">Visitor Information</h3>
                    
                    <div class="space-y-4">
                        <div>
                            <h4 class="font-medium text-gray-600">Entry Fee</h4>
                            <p class="text-gray-800"><?= $site['entry_fee'] ?></p>
                        </div>
                        
                        <div>
                            <h4 class="font-medium text-gray-600">Best Time to Visit</h4>
                            <p class="text-gray-800"><?= $site['best_time'] ?></p>
                        </div>
                        
                        <div>
                            <h4 class="font-medium text-gray-600">Location</h4>
                            <p class="text-gray-800"><?= $site['location'] ?></p>
                            <a href="https://www.google.com/maps?q=<?= $site['lat'] ?>,<?= $site['lng'] ?>" 
                               target="_blank" 
                               class="text-amber-600 hover:text-amber-800 text-sm inline-block mt-1">
                                <i class="fas fa-map-marker-alt mr-1"></i> View on Map
                            </a>
                        </div>
                        
                        <div>
                            <h4 class="font-medium text-gray-600">Coordinates</h4>
                            <p class="text-gray-800"><?= $site['lat'] ?>, <?= $site['lng'] ?></p>
                        </div>
                        
                        <div class="pt-4 border-t border-gray-200">
                            <h4 class="font-medium text-gray-600 mb-2">Share This Site</h4>
                            <div class="flex space-x-3">
                                <a href="#" class="feature-icon">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="feature-icon">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="feature-icon">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                                <a href="#" class="feature-icon">
                                    <i class="fas fa-link"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Key Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($site['features'] as $feature): ?>
                <div class="flex items-start space-x-4">
                    <div class="feature-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div>
                        <h3 class="font-medium text-gray-800"><?= $feature ?></h3>
                        <p class="text-sm text-gray-600 mt-1">Experience this unique aspect of the site</p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Nearby Sites -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Nearby Heritage Sites</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php 
                $nearby_sites = array_filter($heritage_sites, function($s) use ($site) {
                    return $s['id'] != $site['id'];
                });
                $nearby_sites = array_slice($nearby_sites, 0, 3);
                ?>
                <?php foreach ($nearby_sites as $nearby): ?>
                <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition duration-300">
                    <img src="<?= $nearby['image'] ?>" alt="<?= $nearby['name'] ?>" class="w-full h-40 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg mb-2"><?= $nearby['name'] ?></h3>
                        <p class="text-gray-600 text-sm mb-3"><?= substr($nearby['description'], 0, 80) ?>...</p>
                        <a href="spot-details.php?id=<?= $nearby['id'] ?>" 
                           class="text-amber-600 hover:text-amber-800 font-medium text-sm">
                            Explore Site <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <h3 class="text-xl font-bold">Varanasi Heritage Walks</h3>
                    <p class="text-gray-400">Preserving history one step at a time</p>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-6 pt-6 text-center text-gray-400">
                <p>&copy; <?= date('Y') ?> Varanasi Heritage Walks. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>