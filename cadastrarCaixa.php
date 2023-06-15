<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/bo/UsuarioPermissaoBO.php';
session_start();

$possuiPermissao = UsuarioPermissaoBO::usuarioPossuiPermissao($_SESSION['idUsuarioLogado'], "Cadastrar Caixa");

if(!$possuiPermissao){
     header("location: naoPermissao.php?permissao=cadastrarCaixa");
}

//se estiver setado nosso id, então é para atualizar
$obj=NULL;
if(isset($_GET['id'])){
    //buscar da base o cara com o Id do get
    //e salvar na variavel $objUsuario;
    //Para usar o Dao eu preciso importar ele.
    require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/CaixaDAO.php';
    $obj=CaixaDao::getInstance()->getById($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
       <?php 
       require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/menuLateral.php';
       ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/menuSuperior.php';
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                  
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Cadastar Caixa</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" action="control/caixaControle.php">
                                <input type='hidden' 
                                       value="<?php echo isset($_GET['id'])?$_GET['id']:"0"?>" name="id"/>
                                <div>
                                    <label for="fluxo">
                                       fluxo:
                                    </label>
                                    <select  name="fluxo">
                                        <option value="Entrada" <?php echo ($obj!=NULL&&$obj->getFluxo()=="Entrada"?"selected='selected'":"")?> >Entrada</option>
                                        <option value="Sáida" <?php echo ($obj!=NULL&&$obj->getFluxo()=="Saída"?"selected='selected'":"")?>>Saída</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="descricao">
                                        Descrição:
                               
                                    </label>
                                    <input type="text" name="descricao" id="descricao" class="form-control"
                                           value="<?php echo ($obj==NULL?"":$obj->getDescricao())?>"/>
                                </div>
                                <div>
                                  <label for="dataDeVencimento">
                                        Data de Vencimento:
                                    </label>
                                    <input type="date" name="dataDeVencimento" id="dataDeVencimento" class="form-control"
                                           value="<?php echo ($obj==NULL?"":$obj->getDataVencimento())?>" />
                                </div>
                                <div>
                                    <label for="dataDePagamento">
                                        Data de Pagamento:
                                    </label>
                                    <input type="date" name="dataDePagamento" id="dataDePagamento" class="form-control"
                                           value="<?php echo ($obj==NULL?"":$obj->getDataPagamento())?>"/>
                                </div>                             
                                <div>
                                    <label for="tipo">
                                        Tipo:
                                    </label>
                                    <input type="text" name="tipo" id="tipo" class="form-control"
                                           value="<?php echo ($obj==NULL?"":$obj->getTipo())?>"/>
                                </div>
                                <div>
                                    <label for="valor">
                                        Valor:
                                    </label>
                                    <input type="text" name="valor" id="valor" class="form-control"
                                           value="<?php echo ($obj==NULL?"":$obj->getValor())?>"/>
                                </div>
                                <input type="submit" value="Salvar" />
                            </form>
                        </div>
                                
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
           
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/rodape.php';
            ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

