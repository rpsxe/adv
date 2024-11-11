<?php       
require_once '_control/conexao.php';
$database = new Database();
$db = $database->connect();
$cadastroCRUD = new CadastroCRUD($db);
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucas, Godinho & Peduzzi Advogados Associados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css">



    <style>

        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        body {
            overflow-x: hidden; /* Evita scroll horizontal */
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        .logo{
            cursor: pointer;
        }
        .sidebar {
            height: 100vh; 
            position: fixed; 
            left: 0;
            top: 0;
            width: 100px; 
            background-color: #f8f9fa; 
            padding-top: 20px;

        }
        .sidebar a {
            padding: 10px 15px; 
            text-decoration: none; 
            color: #333; 
            transition: all 0.3s ease-in-out;
            font-size: 20px;

        }
        .sidebar a:hover {
            border-left: 10px solid #e9a440;
            background-color: #47372c; 
            color: #e9a440; 
            cursor: pointer;
            padding-left: 25px;
            transform: scale(1.05);
            font-weight: 700;
        }
        .content {
            margin-left: 100px; 
            padding: 20px; 
        }
        .logo{
            mix-blend-mode: multiply;
            margin: 50px;
        }

        .btn-confirm {
           background-color: #47372c; 
           color: #e9a440; 
           transition: all 0.3s ease-in-out;
       }
       .btn-confirm:hover {
           color: #47372c; 
           background-color: #e9a440; 

       }

       .btn-edit, .btn-docs, .btn-pasta{
        transition: all 0.3s ease-in-out;
        background-color: #47372c; 
        color: #e9a440; 
        padding: 10px;
        border-radius: 7px;
        border: none;
        outline: none;
    }

    .btn-edit:hover, .btn-docs:hover, .btn-pasta:hover{
        background-color: #e9a440; 
        color: #47372c; 
    }
    .nav-icons i{
     color: #47372c; 
     transition: all 0.3s ease-in-out;
 }
 .nav-icons:hover  i{
     color: #e9a440; 
 }
 .menu-span{
    display: none;
    margin-left: 10px;
}
.nav-item{
    text-align: center;
}
.img{
    height: 70px; 
}
.texto-laranja{
    color: #e9a440;
}
</style>
</head>
<body>

    <div class="sidebar">
        <div class="img my-3">
            <img src="_img/logo.png" alt="Logotipo" class="logo img-fluid mx-auto d-block w-50">
        </div>

        <ul class="nav flex-column mini" >
            <a data-pagina="inicio" class="nav-icons  nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Inicio">
                <li class="nav-item itens-menu">
                    <i class="fas fa-home"></i> <span class="menu-span">Inicio</span>
                </li>
            </a>
            <a data-pagina="formulario" class="nav-icons nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Cadastro">
                <li class="nav-item itens-menu">
                    <i class="fas fa-file-alt"></i> <span class="menu-span">Cadastro</span>
                </li>
            </a>
            <a data-pagina="clientes" class="nav-icons nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Clientes">
                <li class="nav-item itens-menu">
                    <i class="fas fa-users"></i> <span class="menu-span">Clientes</span>
                </li>
            </a>
            <a data-pagina="agenda" class="nav-icons nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Agenda">
                <li class="nav-item itens-menu">
                    <i class="fas fa-calendar-alt"></i> <span class="menu-span">Agenda</span>
                </li>
            </a>
            <a data-pagina="processos" class="nav-icons nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Processos">
                <li class="nav-item itens-menu">
                    <i class="fas fa-paperclip"></i> <span class="menu-span">Processos</span>
                </li>
            </a>
            <a data-pagina="cts-pagar" class="nav-icons nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Contas a Pagar">
                <li class="nav-item itens-menu">
                    <i class="fas fa-cash-register"></i> <span class="menu-span">Contas a Pagar</span>
                </li>
            </a>
            <a data-pagina="cts-receber" class="nav-icons nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Contas a Receber">
                <li class="nav-item itens-menu">
                 <i class="fas fa-wallet"></i> <span class="menu-span">Contas a Receber</span>
             </li>
         </a>
         <a data-pagina="" class="nav-icons nav-link" data-bs-toggle="tooltip" data-bs-placement="right" title="Sair">
            <li class="nav-item itens-menu">
                <i class="fas fa-sign-out-alt"></i> <span class="menu-span">Sair</span>
            </li>
        </a>
    </ul>
</div>

<section class="content">
    <div class="mensagemInicial py-5 container">
        <h1>Lucas, Godinho & Peduzzi Advogados Associados</h1>
        <p>Este é o conteúdo principal da página. Aqui você pode adicionar seu formulário ou outras informações.</p>
        <div class="row">
            <div class="col-4">
                <?php
                $cadastros = $cadastroCRUD->aniversariantesDoDia();
                if (isset($cadastros)) {
    echo '<div class="card" style="width: 18rem; border-left: 10px solid #e9a440">
    <div class="card-body">
    <h5 class="card-title">Aniversariantes do Dia</h5>
    <h6 class="card-subtitle mb-2 texto-laranja">'. date ('d/m/Y').'</h6>';

    foreach ($cadastros as $key => $value) {
        echo '<p>' .$value['nome']. ' ('. $value['idade'] . ' anos)</p>';
    }

    echo '</div>
    </div>';
}
?>
</div>
<div class="col-4">
    <div class="card" style="width: 18rem; border-left: 10px solid #e9a440">
        <div class="card-body">
            <h5 class="card-title">Valores à entrar</h5>
            <h6 class="card-subtitle mb-2 texto-laranja"><?php echo date ('m/Y') ?></h6>

            <p>R$ 1.590,30</p>

        </div>
    </div>
</div>
<div class="col-4">
    <div class="card" style="width: 18rem; border-left: 10px solid #e9a440">
        <div class="card-body">
            <h5 class="card-title">Valores à sair</h5>
            <h6 class="card-subtitle mb-2 texto-laranja"><?php echo date ('m/Y') ?></h6>

            <p>R$ 590,30</p>

        </div>
    </div>
</div>
</div>
</div>

<div class="container">
    <div class="conteudo py-5"></div>
</div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="_js/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

<script>
  var link = $(".nav-link");
  var conteudo = $(".conteudo")
  var mensagemInicial = $(".mensagemInicial")
  var verificaPagina = null;

  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
  })

  link.click(function() {
    var pagina = $(this).data('pagina');
    if (verificaPagina == pagina) {return false}
        if (pagina == 'inicio') {
            mensagemInicial.fadeIn();
            conteudo.hide()
            verificaPagina = pagina;
        }else{
            mensagemInicial.hide();
            conteudo.fadeIn();
            conteudo.load(`_pages/${pagina}.php`);
            verificaPagina = pagina;
        }

    });


</script>
</body>
</html>
