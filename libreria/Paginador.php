<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">

        <li class="page-item <?php echo $_GET['pag']==1 ? 'disabled' : '' ?>">
            <a href="reporteSistema.php?pag=<?php echo $_GET['pag']-1 ?>" class="page-link" tabindex="-1" aria-disabled="true">
                Anterior
            </a>
        </li>
        
        <?php for($i = 1; $i <= $paginas; $i++): ?>

            <li class="page-item <?php echo $_GET['pag']==$i ? 'active' : '' ?> "> 
                <a class="page-link" href="reporteSistema.php?pag=<?= $i ?> ">
                    <?= $i ?>
                </a>
            </li>

        <?php endfor ?>


        <li class="page-item <?php echo $_GET['pag']==$paginas ? 'disabled' : '' ?>">
            <a class="page-link" href="reporteSistema.php?pag=<?php echo $_GET['pag']+1 ?>">
                Siguiente
            </a>
        </li>
    </ul>
</nav>