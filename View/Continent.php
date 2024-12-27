<?php

    require_once '../Controller/continentController.php';
    session_start();


    if (isset($_SESSION["user"])) {
        $user=$_SESSION["user"];
        // var_dump($user);
    }else {
        header("Location:../index.php");
    }

    $continentController = new ContinentController();
    $allContinent = $continentController->readAll();


    if (isset($_GET['id'])) {
        $idenC=$_GET['id'];
        $continent=$continentController->getElementById($idenC);
        $continent = $continent[0];
        $nomContinent = $continent['nom'];
        $nombrePays = $continent['nombrePays'];
        $urlImage = $continent['image'];
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Continent</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style >
        input[type="search"]::-webkit-search-cancel-button
        {
        -webkit-appearance:none;
        }
        td {
            border-bottom-width: 1px ;
            border-collapse: collapse;


        }
        @keyframes colorFade {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }
            50% {
                opacity: 0.5;
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-color-fade {
            animation: colorFade 1.5s ease-in-out;
        }
    </style>
    <script>
        tailwind.config = {
        theme: {
            screens: {
                'md': '768px',
            },

            extend: {
            colors: {
                primary: '#5051FA',
                borderColor: '#5f5d5d',
                bgcolor: '#F3F3F3',
                

            },
            fontFamily: {
                'title': ['Poppins','sans-serif'],
                'bigTitle':  ['"Myriad Pro"', 'sans-serif'],
            }
            }
        }
        }
    </script>
</head>
<body>
<div class="flex min-h-screen h-full ">
    <aside class="w-52 border-r min-h-full  flex flex-col items-center gap-4 ">
        <div class=" drop-shadow-xl">
            <img src="img/africa.png" alt="">
        </div>
        <div class="">
            <div class="grid gap-4 w-[100%]">
                <a href="" class="flex gap-4 px-4 py-2 rounded-2xl"><img src="img/home.svg" alt=""> Dashboard </a>
                <a href='./Continent.php' class='flex gap-4 px-4 py-2 rounded-2xl'><img id='btn-icon' class='mt-1' src='img/act.svg' alt=''> Continent</a>
            </div>
        </div>
    </aside>
    <div class="grow">
        <header class=" h-20 border-b">
            <nav class=" h-full flex justify-between mx-8 items-center">
                <div class="flex gap-2">
                    <img src="img/Search.svg" alt="">
                    <input class="search outline-none border-none w-64 px-4 py-2 rounded-2xl" type="search" name="search-input" id="search-input" placeholder="Search anything here">
                </div>
                <div class="flex w-72 justify-between  items-center ">
                    <img class="cursor-pointer" src="img/settings.svg" alt="">
                    <img class="cursor-pointer" src="img/Icon.svg" alt="">
                    <form action="../Controller/logout.php" action="post">
                        <button><img src="img/logout.png" class="h-4 w-4" alt=""></button>
                    </form>
                    <div class="flex items-center gap-2 cursor-pointer">
                        <div class=" cursor-pointer w-10 h-10 bg-black bg-cover rounded-full text-white relative ">
                            <div class="bg-[#228B22] h-3 w-3 rounded-full absolute bottom-0 right-0  "></div>
                        </div>
                        <?php if (isset($user)) : ?>
                            <p class="text-[#606060] font-bold"><?=$user['username'] ?> </p>
                        <?php endif; ?>
                    </div>
                </div>
    
            </nav>
        </header>
        
    <section class="p-4">
        <div class="flex justify-between items-center px-8">
        <h1 class="text-4xl md:text-5xl font-extrabold text-center mt-8 mb-6 uppercase tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-green-500 to-purple-600 animate-color-fade">
            Continent
        </h1>





            <?php if (isset($user)) : ?>
                <?php if ($user['role'] === 'admin') :?>
                    <div class="flex gap-4">
                        <button 
                            id="add-etd" 
                            onclick="document.getElementById('modal').classList.remove('hidden')" 
                            class="animate__pulse flex gap-2 items-center bg-[#4790cd] px-4 py-2 rounded-lg text-white">
                            <img src="img/_Avatar add button.svg" alt=""> Ajouter Continent
                        </button>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            
            </div> 
        <div class="container mx-auto mt-10 px-4">
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php
            if (!empty($allContinent)) {
                foreach ($allContinent as $continent) {
                    ?>
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <img class="w-full h-40 object-cover"  src="img/<?php echo $continent['image']; ?>" alt="Image de <?php echo $continent['nom']; ?>">
                        <div class="p-4">
                            <h5 class="text-xl font-semibold mb-2 text-gray-800"><?php echo $continent['nom']; ?></h5>
                            <p class="text-gray-600 mb-1">Nombre pays : <?php echo $continent['nombrePays']; ?></p>
                            <div class="flex justify-end">
                            <div class="flex gap-2 items-center justify-center">
                            <?php if (isset($user)) : ?>
                                <?php if ($user['role'] === 'admin') :?>
                                    <button 
                                        onclick="
                                            window.location.href = 'Continent.php?id=<?= $continent['id_continent'] ?>';
                    
                                        ">
                                        <img class="w-4 h-4 cursor-pointer" src="img/editinggh.png" alt="">
                                    </button>
                                <?php endif; ?>
                            <?php endif; ?>
                                    
                            
                            <?php if (isset($user)) : ?>
                                <?php if ($user['role'] === 'admin') :?>
                                    <a href="../Controller/deleteC.php?id=<?= $continent['id_continent'] ?>" >
                                        <img class="w-4 h-4 cursor-pointer" src="img/delete.png" alt="Supprimer">
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <a href="Payss.php?idC=<?= $continent['id_continent'] ?>">Show</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-center text-gray-700'>Aucun continent trouvé.</p>";
            }
            ?>
        </div>
        </div>
    </section>
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white w-full max-w-lg p-6 rounded-md shadow-lg space-y-4">
        <h2 class="text-xl font-semibold text-gray-700">Ajouter un pays</h2>
        <form enctype="multipart/form-data" action="../Controller/ajouterC.php?<?php if (isset($_GET['id'])) {
            echo "id=$idenC";
        }
        ?>" method="POST" class="space-y-4">
            <div>
                <input type="hidden" name= "id_continent" value = " <?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?> " >
                <label for="nom" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" value="<?php if (isset($_GET['id'])) {
                    echo "$nomContinent";
                }?>" id="nom" name="nom" class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre Pays</label>
                <input type="text" value="<?php if (isset($_GET['id'])) {
                    echo "$nombrePays";
                }?>" id="nonbre" name="nbrPays" class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div>
                <label for="urlImage" class="block text-sm font-medium text-gray-700">URL Ville</label>
                <input type="file" value="<?php if (isset($_GET['id'])) {
                    echo "$urlImage";
                }?>" id="urlImage" name="image" class="mt-1 block w-full border border-gray-300 rounded-md p-2 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <div class="flex justify-end space-x-2">
            <button type="button" onclick="closeModal();" class="bg-gray-500 text-white py-2 px-4 rounded-md hover:bg-gray-600">Annuler</button>
            <button type="submit" name="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                <?php
                            if (isset($_GET['id'])) {
                                echo "Modifer";
                            }else {
                                echo "Ajouter";
                            }
                        ?>
                </button>
            </div>
        </form>
    </div>
</div>


<script>
const urlParams = new URLSearchParams(window.location.search);
const id = urlParams.get('id');

if (id) {
document.getElementById('modal').classList.remove('hidden');
}
function closeModal() {
    // Cache le modal
    document.getElementById('modal').classList.add('hidden');
    
    // Supprime le paramètre 'id' de l'URL
    const url = new URL(window.location);
    url.searchParams.delete('id');
    window.history.replaceState(null, '', url);
}


</script>

</body>
</html>