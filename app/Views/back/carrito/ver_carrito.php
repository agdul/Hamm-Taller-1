
<div class="container">
	  <div class="titulo"><br>
	  	<h2 class="verlasconsultas text-center ">Carrito de compras</h2>
       <div class="row">
           <div class="col-lg-12">
            
            
            <table class="table table-bordered table-striped table-sm  display"  style="width:90%" id="dataTable" cellspacing="0">
                <thead class=" bg-white text-center">
                    <th>Pedido Número</th>
                    <th>Producto Nombre</th>
                    <th>Precio del Producto</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Operación</th>
                </thead>
                <tbody class="table-dark">
                    <div class="text-center">

                     <?php 
                     $total = 0; //acumulador para mostrar el total
                     $i = 1;  //variable para contar los items del producto

                     foreach($cart->contents() as $carrito) { ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td class="text-center"><?php echo $carrito['name'] ?></td>
                        <td class="text-center">$<?php echo $carrito['price'] ?></td>
                        <td class="text-center"><?php echo $carrito['qty']?></td>
                        <td class="text-center">$<?php echo $carrito['subtotal']; $total = $total + $carrito['subtotal']?></td>
                        

                        <td class="text-center"><a href="<?php  echo base_url('eliminar_producto_carrito?rowid='.$carrito['rowid']); ?>" class="btn btn-secondary"><i class="fa-solid fa-xmark"></i>Eliminar</a></td>


                    <?php } ?>
                    </tr>
                </div>

                </tbody>
            </table>
            <div class="vaciarloscarros">

                <a class="btn btn-primary btn-sm" href="<?php echo base_url('pedi_ya')?>"><i class="fa-solid fa-arrow-left"></i>Segir comprando</a>
                 <a class="btn btn-secondary btn-sm" href="<?php echo base_url('vaciar_carrito')?>"><i class="fa-solid fa-check"></i>Vaciar carrito</a>
                 
              </div>


           <div class="totalcompra text-center">
           <h4>Total del compra: $<?php echo $total ?> 
           <td class="text-center"><a href="" class="btn btn btn-success"><i class="fa-solid fa-xmark"></i>Comprar</a></td> </h4>
           </div>
            <br>    
            <br>
            <br>
            <br>
            <br>
                   

           </div>
       </div> 
    </div>
</div>
