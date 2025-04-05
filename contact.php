<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Varanasi Heritage Walks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .form-input {
            transition: all 0.3s;
        }
        .form-input:focus {
            border-color: #b45309;
            box-shadow: 0 0 0 3px rgba(180, 83, 9, 0.2);
        }
        .error-message {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
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
                <a href="contact.php" class="hover:text-amber-200 font-bold">Contact</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto py-12 px-4">
        <div class="max-w-3xl mx-auto">
            <h1 class="text-3xl font-bold text-center mb-2 text-gray-800">Contact Us</h1>
            <p class="text-gray-600 text-center mb-8">Have questions or feedback about our heritage walks? We'd love to hear from you!</p>
            
            <div class="bg-white p-8 rounded-lg shadow-md">
                <?php
                $errors = [];
                $success = false;

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = trim($_POST['name'] ?? '');
                    $email = trim($_POST['email'] ?? '');
                    $rating = $_POST['rating'] ?? '';
                    $message = trim($_POST['message'] ?? '');

                    // Validation
                    if (empty($name)) {
                        $errors['name'] = 'Please enter your name';
                    }

                    if (empty($email)) {
                        $errors['email'] = 'Please enter your email';
                    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors['email'] = 'Please enter a valid email';
                    }

                    if (empty($rating)) {
                        $errors['rating'] = 'Please rate your experience';
                    }

                    if (empty($message)) {
                        $errors['message'] = 'Please enter your message';
                    } elseif (strlen($message) < 10) {
                        $errors['message'] = 'Message should be at least 10 characters';
                    }

                    if (empty($errors)) {
                        // In a real application, you would save to database or send email here
                        $success = true;
                    }
                }
                ?>

                <?php if ($success): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <p class="font-medium">Thank you for your feedback!</p>
                        <p>We've received your message and will get back to you soon.</p>
                    </div>
                <?php else: ?>
                    <form method="POST" novalidate>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                                <input type="text" id="name" name="name" 
                                    class="form-input w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-amber-500 <?= isset($errors['name']) ? 'border-red-500' : 'border-gray-300' ?>"
                                    value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                                <?php if (isset($errors['name'])): ?>
                                    <p class="error-message"><?= $errors['name'] ?></p>
                                <?php endif; ?>
                            </div>

                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                                <input type="email" id="email" name="email" 
                                    class="form-input w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-amber-500 <?= isset($errors['email']) ? 'border-red-500' : 'border-gray-300' ?>"
                                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                                <?php if (isset($errors['email'])): ?>
                                    <p class="error-message"><?= $errors['email'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="mt-6">
                            <label class="block text-gray-700 font-medium mb-2">How would you rate your experience?</label>
                            <div class="flex space-x-4">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="rating" value="<?= $i ?>" 
                                            class="h-5 w-5 text-amber-600 focus:ring-amber-500 <?= isset($errors['rating']) ? 'border-red-500' : 'border-gray-300' ?>"
                                            <?= ($_POST['rating'] ?? '') == $i ? 'checked' : '' ?>>
                                        <span class="ml-2 text-gray-700"><?= $i ?></span>
                                    </label>
                                <?php endfor; ?>
                            </div>
                            <?php if (isset($errors['rating'])): ?>
                                <p class="error-message"><?= $errors['rating'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="mt-6">
                            <label for="message" class="block text-gray-700 font-medium mb-2">Your Message</label>
                            <textarea id="message" name="message" rows="5"
                                class="form-input w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-amber-500 <?= isset($errors['message']) ? 'border-red-500' : 'border-gray-300' ?>"><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                            <?php if (isset($errors['message'])): ?>
                                <p class="error-message"><?= $errors['message'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="mt-8">
                            <button type="submit" 
                                class="w-full bg-amber-600 hover:bg-amber-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300">
                                Send Message
                            </button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="text-amber-600 text-3xl mb-4">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Our Office</h3>
                    <p class="text-gray-600">23 Heritage Lane, Varanasi<br>Uttar Pradesh 221001</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="text-amber-600 text-3xl mb-4">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Call Us</h3>
                    <p class="text-gray-600">+91 98765 43210<br>Mon-Sat, 9am-6pm</p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="text-amber-600 text-3xl mb-4">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Email Us</h3>
                    <p class="text-gray-600">info@varanasiheritagewalks.com<br>response within 24 hours</p>
                </div>
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