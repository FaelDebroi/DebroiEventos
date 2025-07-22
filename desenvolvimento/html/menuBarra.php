 <?php 
 if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    include('conexao.php');
    ?>

 <link rel="stylesheet" href="../css/menuBarra.css" defer>

 <header class="menu-fixo">
     <img class="imagemlogo" src="../img/logoDebroi.png">
     <nav class=" menu-links">
         <a href="index.php"><b>Home</b></a>
         <a href="sobre.php"><b>Sobre</b></a>
         <a href="chacaras.php"><b>Chácaras</b></a>
         <a href="servicos.php"><b>Serviços</b></a>
         <a href="contato.php"><b>Contato</b></a>
         <?php if(!empty($_SESSION["user_portal"])){?>

         <div class="menu-hover">
             <div class="profile-container">
                 <div class="profile-button">
                     <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="perfil" style="width:20px;">
                     Perfil
                 </div>
                 <div class="profile-dropdown">
                     <div><strong><?php echo $informacaoUser["Nome"]?></strong></div>
                     <div><a href="perfil.php">Meu Perfil</a></div>
                     <?php   if($informacaoUser["Admin"] == 1){?>

                     <div><a href="Gerenciamento.php">Gerenciamento</a></div>

                     <?php } ?>
                     <div><a href="visitaCliente.php">Minhas Visitas</a></div>
                     <div><a href="perfil.php">Favoritos</a></div>
                     <div><a href="logout.php">Sair</a></div>
                 </div>
             </div>
         </div>

         <?php }else{?>

         <a href="login.php"><b>Login </b></a>

         <?php }?>

         <a
             href="https://wa.me/5519992313281?text=Olá!%20Gostaria%20de%20consultar%20o%20cardápio%20do%20buffet%20completo">
             <img src="../img/whatsApp.png" alt="WhatsApp" width="35">
         </a>
         <!-- criar um modelo que aparece a o perfil do usuario -->
     </nav>
 </header>


 <!-- Nas outras páginas só precisa incluir isto:  -->
 <?php //include 'menuBarra.php'; ?>