<div class="container-fluid">
    <div class="row" >
        <div class="col" id="pagina-header">
            <h5>Página Inicial</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="<?php echo BASE_URL?>home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-light">
                    <h1 class=" card-title h5">Chamados em aberto</h1>
                    <p class="card-subtitle text-muted mb-2"><em>Setor responsável: Coordenação de Controle Ambiental</em></p>
                </div>
                <div>
                    <!--table-->
                    <table class="table table-striped table-sm">
                        <thead class="bg-success">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Data</th>
                                <th scope="col">Setor</th>
                                <th scope="col">Status</th>
                                <th scope="col">Solicitante</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x = 1;
                            while ($x <= 5) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $x; ?></th>
                                    <td>21/07/2020 11:30:20</td>
                                    <td>CCA</td>
                                    <td>Aguardando</td>
                                    <td>Joab Torres Alencar</td>
                                </tr>
                                <?php
                                $x++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <!--table-->  
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header bg-light">
                    <h1 class=" card-title h5">Chamados realizados</h1>
                    <p class="card-subtitle text-muted mb-2"><em>Setor responsável: Coordenação de Controle Ambiental</em></p>
                </div>
                <div>
                    <!--table-->
                    <table class="table table-striped table-sm">
                        <thead class="bg-success">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Data</th>
                                <th scope="col">Setor</th>
                                <th scope="col">Status</th>
                                <th scope="col">Solicitante</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x = 1;
                            while ($x <= 5) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $x; ?></th>
                                    <td>21/07/2020 11:30:20</td>
                                    <td>CCA</td>
                                    <td>Encerrado</td>
                                    <td>Joab Torres Alencar</td>
                                </tr>
                                <?php
                                $x++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <!--table-->  
                </div>
            </div>
        </div>
    </div>
</div>