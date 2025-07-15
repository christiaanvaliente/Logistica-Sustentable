<?php


$productos = ControladorProductos::ctrMostrarAlertas2();

 ?>


<div class="box box-primary">

  <div class="box-header with-border">

    <h3 class="box-title">Próximos vencimientos</h3>

    <div class="box-tools pull-right">

      <button type="button" class="btn btn-box-tool" data-widget="collapse">

        <i class="fa fa-minus"></i>

      </button>

      <button type="button" class="btn btn-box-tool" data-widget="remove">

        <i class="fa fa-times"></i>

      </button>

    </div>

  </div>
  
  <div class="box-body">

    <ul class="products-list product-list-in-box">

    <?php

    for($i = 0; $i < 10; $i++){

      echo '<li class="item">
       

        <div class="product-info">

          <a href="" class="product-title">

            '.$productos[$i]["descripcion"].'

            <span class="label label-warning pull-right">'.$productos[$i]["fechav"].'</span>

          </a>
    
       </div>

      </li>';

    }

    ?>

    </ul>

  </div>

  <div class="box-footer text-center">

    <a href="productos" class="uppercase">Ver todos los productos</a>
  
  </div>

</div>
