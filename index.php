<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heritage Walk Planner - Varanasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .hero-image {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                              url('https://images.pexels.com/photos/3581369/pexels-photo-3581369.jpeg');
            height: 60vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
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

    <!-- Hero Section -->
    <div class="hero-image flex items-center justify-center">
        <div class="text-center text-white">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Discover Varanasi's Heritage</h1>
            <p class="text-xl mb-8">Explore the ancient city through curated walking tours</p>
            <a href="route.php" class="bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                View Walking Routes
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto py-12 px-4">
        <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">Featured Heritage Sites</h2>
        
        <?php include 'data.php'; ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($heritage_sites as $site): ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                <img src="<?= $site['image'] ?>" alt="<?= $site['name'] ?>" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-gray-800"><?= $site['name'] ?></h3>
                    <p class="text-gray-600 mb-4"><?= substr($site['description'], 0, 100) ?>...</p>
                    <div class="flex justify-between items-center">
                        <span class="text-amber-600 font-medium">Entry: <?= $site['entry_fee'] ?></span>
                        <a href="spot-details.php?id=<?= $site['id'] ?>" class="text-amber-800 hover:text-amber-600 font-medium">
                            View Details <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
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