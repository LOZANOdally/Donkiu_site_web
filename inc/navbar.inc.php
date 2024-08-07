<!doctype html>
<html lang="EN">

<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Begin page content -->
   <main class="flex-0">
        <div class="container">

</head>
<body>
  <header>
        <!-- Fixed navbar -->
        <nav class="navbar dark-mode" role="navigation">
            <!--<div class="nameMark"> Marketing Digital</div>-->
            <img class="img1" src="images/logo.png"> 
            <ul class="navbar-nav">
                <li class="nav-item fisrt">
                    <a class="nav-link active" aria-current="page" href='index.php'>Home</a>
                </li>
                <li class="nav-item second">
                    <a class="nav-link" href="#nous">Nosotros</a>
                </li>
                <li class="nav-item third">
                    <a class="nav-link" href="#btl">Servicios</a>
                </li>

                <li class="nav-item four">
                    <a class="nav-link" href="#clientes">Nuestros Clientes</a>
                </li>

                <li class="nav-item fifth">
                    <a class="nav-link" href="#contact">Contáctanos</a>
                </li>
            </ul>

            <button class="burger">
                <span class="bar"></span>
            </button>
            <main class="main-content" role="main">
           </main>


        </nav>
</header>
<main class="flex-0">
<div class="container">

<script>
    
function toggleMenu() {
  var navbar = document.querySelector('.navbar');
  var burger= document.querySelector('.burger');
  burger.addEventListener('click', () => {
    navbar.classList.toggle('show-nav');
  })
  }
  toggleMenu();

    </script>
</body>
<style>

.navbar{
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    padding: 10px;
    background:var(--navbar-bg-color);
    color: var(--navbar-color);
    height: 65px;
  
  
}

@media screen and (max-width:750px)
{
    

.nav-link {
       
       display: block;
       padding: 1rem;
       font-size: 1.6rem;
       transition: all .4s ease-in-out;
       overflow:hidden;

       
   }


   .navbar{
        display: flex;
        align-items: center;
        justify-content: space-around;
        padding: 10px;
        background:var(--navbar-bg-color);
        color: var(--navbar-color);
        height: 65px;
    
        

        
      
    }




}
    </style>
