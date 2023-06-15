<?php
session_start();
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
                    <h1 class="h3 mb-2 text-gray-800">Listar Produtos</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Produtos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tamanho</th>
                                            <th>Tipo</th>
                                            <th>Cor</th>
                                            <th>Quantidade</th>
                                            <th>Estoque</th>
                                            <th>Preço</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                         <?php
                                        require_once $_SERVER['DOCUMENT_ROOT'].'/mkrl/modelo/dao/ProdutoDAO.php';
                                        $lista= ProdutoDAO::getInstance()->listAll();
                                        foreach ($lista as $obj){
                                            echo '<tr>';
                                            echo '<td>'.$obj->getTamanho()."</td>";
                                            echo '<td>'.$obj->getTipo()."</td>";
                                            echo '<td>'.$obj->getCor()."</td>";
                                            echo '<td>'.$obj->getQuantidade()."</td>";
                                            echo '<td>'.$obj->getPreco()."</td>";
                                            echo '<td>'.$obj->getEstoqueDoProduto()."</td>";
                                            echo "<td>";
                                            echo "<a href='cadastrarProduto.php?id=".$obj->getId()."' class=\"btn btn-warning btn-icon-split\">
                                        <span class=\"icon text-white-50\">
                                            <i class=\"fas fa-pen\"></i>
                                        </span>
                                        <span class=\"text\">Editar</span>
                                    </a>";
                                            echo "<a href='#'  data-toggle='modal' data-target='#modal".$obj->getId()."' class=\"btn btn-danger btn-icon-split\">
                                            <span class=\"icon text-white-50\">
                                                <i class=\"fas fa-trash\"></i>
                                        </span>
                                        <span class=\"text\">Remover</span>
                                    </a>";
                                   echo " <div class='modal fade' id='modal".$obj->getId()."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel'
                                              aria-hidden='true'>
                                    <div class='modal-dialog' role='document'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>Tem certeza disso?</h5>
                                                <button class='close' type='button' data-dismiss='modal' aria-label='Close'>
                                                    <span aria-hidden='true'>×</span>
                                                </button>
                                            </div>
                                            <div class='modal-body'>Para excluir o produto".$obj->getId()." clique em remover</div>
                                            <div class='modal-footer'>
                                                <button class='btn btn-secondary' type='button' data-dismiss='modal'>Cancel</button>
                                                <a class='btn btn-danger' href='control/produtoRemover.php?id=".$obj->getId()."'>Remover</a>;
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>";
                                            echo "</td>";
                                        echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                       
                                    
                                </table>
                            </div>
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