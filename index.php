<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - Plateforme Éducative</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#5051FA',
                        borderColor: '#5f5d5d',
                        bgcolor: '#F3F3F3',
                        accent: '#E0E7FF',
                    },
                    fontFamily: {
                        'title': ['Poppins', 'sans-serif'],
                    },
                },
            },
        };
    </script>
</head>
<body class="bg-bgcolor font-title min-h-screen flex items-center justify-center">
    <div class="relative bg-white shadow-xl rounded-3xl w-full max-w-md overflow-hidden">
        <div id="formContainer" class="flex transition-transform duration-500" style="width: 200%; transform: translateX(0);">
            <!-- Formulaire d'inscription -->
            <div class="w-1/2 p-8">
                <h2 class="text-2xl text-primary font-semibold text-center mb-6">Créer un compte</h2>
                <form>
                    <div class="mb-4">
                        <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                        <input type="text" id="nom" placeholder="Entrez votre nom" class="w-full px-4 py-3 border rounded-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" placeholder="Entrez votre email" class="w-full px-4 py-3 border rounded-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <input type="password" id="password" placeholder="Entrez votre mot de passe" class="w-full px-4 py-3 border rounded-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                    </div>
                    <button type="submit" class="w-full bg-primary text-white py-3 rounded-full shadow-md hover:bg-blue-700 transition-all duration-300">
                        S'inscrire
                    </button>
                </form>
                <p class="mt-6 text-center text-sm text-gray-600">
                    Déjà un compte ? <span id="switchToConnexion" class="text-primary cursor-pointer">Connectez-vous</span>
                </p>
            </div>

            <!-- Formulaire de connexion -->
            <div class="w-1/2 p-8">
                <h2 class="text-2xl text-primary font-semibold text-center mb-6">Connexion</h2>
                <form>
                    <div class="mb-4">
                        <label for="emailConnexion" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="emailConnexion" placeholder="Entrez votre email" class="w-full px-4 py-3 border rounded-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                    </div>
                    <div class="mb-6">
                        <label for="passwordConnexion" class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                        <input type="password" id="passwordConnexion" placeholder="Entrez votre mot de passe" class="w-full px-4 py-3 border rounded-full bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                    </div>
                    <button type="submit" class="w-full bg-primary text-white py-3 rounded-full shadow-md hover:bg-blue-700 transition-all duration-300">
                        Se connecter
                    </button>
                </form>
                <p class="mt-6 text-center text-sm text-gray-600">
                    Nouveau ? <span id="switchToInscrire" class="text-primary cursor-pointer">Créez un compte</span>
                </p>
            </div>
        </div>
    </div>

    <script>
        const formContainer = document.getElementById('formContainer');
        const switchToConnexion = document.getElementById('switchToConnexion');
        const switchToInscrire = document.getElementById('switchToInscrire');

        switchToConnexion.addEventListener('click', () => {
            formContainer.style.transform = 'translateX(-50%)';
        });

        switchToInscrire.addEventListener('click', () => {
            formContainer.style.transform = 'translateX(0)';
        });
    </script>
</body>
</html>
