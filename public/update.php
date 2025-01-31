<?php

require "config.php";

if(isset($_GET['updateId'])){
    $id = $_GET['updateId'];
    $result = mysqli_query($connexion , "SELECT * FROM article WHERE id_article = $id");
    $row = mysqli_fetch_assoc($result);
}


if(isset($_POST["submit"])){

    $titre = $_POST["titre"] ?? '';
    $content = $_POST["content"] ?? '';
    $img = $_POST["image"] ?? '';
    $description = $_POST["description"] ?? '';
  
    if($titre != "" && $content != "" && $img){
        $query = "UPDATE article SET title = '$titre' , content = '$content'  , description = '$description' , image = '$img' where id_article = $id;";
        
        mysqli_query($connexion,$query);
        header('location:dashboard.php');
  
    }else{
  
      echo "<script>alert('Tout les Champ Obligatoire')</script>";
  
    }
  
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>


       <!-- Modal Modifie Article -->

       <div id="modifieModalArticle"
                    class="fixed inset-0 p-4 flex flex-wrap justify-center items-center w-full h-full z-[1000] before:fixed before:inset-0 before:w-full before:h-full before:bg-[rgba(0,0,0,0.5)] overflow-auto font-[sans-serif]">
            <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8 relative">
                <div class="flex items-center">
                    <h3 class="text-blue-600 text-3xl font-bold flex-1 text-center w-full">Ajouter Article</h3>

                    <div id="close2"> 
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-3 ml-2 cursor-pointer shrink-0 fill-gray-400 hover:fill-red-500"
                      viewBox="0 0 320.591 320.591">
                      <path
                          d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                          data-original="#000000"></path>
                      <path
                          d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                          data-original="#000000"></path>
                      </svg>
                    </div>
                    
                </div>

                <form class="space-y-4 mt-8" method="post" autocomplete="off">
                    <div>
                        <labe class="text-gray-800 text-sm mb-2 block">Titre</labe>
                        <input type="text" name="titre" placeholder="Saisir le titre..." value = "<?php echo $row['title']; ?>"
                            class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg" />
                    </div>

                    <div>
                        <labe class="text-gray-800 text-sm mb-2 block">Image</labe>
                        <input  type="text" name="image" placeholder="Saisir L'image..." value = "<?php echo $row['image']; ?>"
                            class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg" />
                    </div>

                    <div>
                        <labe class="text-gray-800 text-sm mb-2 block">Content</labe>
                        <input type="text" name="content" placeholder="Saisir content..."  value = "<?php echo $row['content']; ?>"
                            class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg" />
                    </div>

                    <div>
                        <labe class="text-gray-800 text-sm mb-2 block">Description</labe>
                        <textarea placeholder='Saisir la description...' name="description"
                            class="px-4 py-3 bg-gray-100 w-full text-gray-800 text-sm border-none focus:outline-blue-600 focus:bg-transparent rounded-lg" rows="3"><?php echo $row['description']; ?></textarea>
                    </div>

                    <div class="flex justify-end gap-4 !mt-8">
                        <button type="button" id=""
                            class="px-6 py-3 rounded-lg text-gray-800 text-sm border-none outline-none tracking-wide bg-gray-200 hover:bg-gray-300">Cancel</button>
                        <button type="submit" id="" name="submit"
                            class="px-6 py-3 rounded-lg text-white text-sm border-none outline-none tracking-wide bg-blue-600 hover:bg-blue-700">Ajouter</button>
                    </div>


                </form>
            </div>
            </div>

    
</body>
</html>