<head>
	<title>Formulario de compra</title>
	
	<style type="text/css">
  		p {
			display: inline-block;
		}
		table{

			border-collapse:collapse;		
		}

		#Total{
		    font-size: x-large;
		    color: red;
		}
	</style>

  <SCRIPT LANGUAGE='JavaScript'>
  <!--
  function actualizaTipoDoc()
   {
   	      var v1 = document.getElementById("select1");
   	      var pais = v1.options[v1.selectedIndex].text; 
   	      /*var valor = v1.options[v1.selectedIndex].value; */
          /*alert("Se ha seleccionado el pais " + pais); */         

           var arrayValores=new Array(
	        new Array("Internacional", "PPN","Pasaporte","TAX","TAX","LIC","Labeler Identification Code"),
	        new Array("Colombia","CC","Cédula de ciudadanía", "CE","Cédula de extranjeria","TI","Tarjeta de identidad","RC", "Registro Civil","NIT", "Número de Identificación Tributaria","RUT", "Registro único tributario"),
	        new Array("Panamá","CIP","Cédula de identidad personal"),
	        new Array("Ecuador","CI","Cédula de identidad","RUC", "Registro único de contribuyentes"),
	        new Array("Brazil","CPF", "Cadastro de Pessoas Fisicas"),
	        new Array("USA","SSN", "Social security number")

	        );

	        if(pais=="Seleccione un país")
    		{
		        // desactivamos el segundo select
		        document.getElementById("select2").disabled=true;
		    }else{
			        // eliminamos todos los posibles valores que contenga el select2
			        document.getElementById("select2").options.length=0;
			 
			        // añadimos los nuevos valores al select2
			        document.getElementById("select2").options[0]=new Option("Selecciona una opcion");

			        for(i=0;i<arrayValores.length;i++)
			        {
			            // unicamente añadimos las opciones que pertenecen al id seleccionado
			            // del primer select
			            if(arrayValores[i][0]==pais)
			            {
			            	/*alert("Este elemento de" + pais +" tiene tama-o:"+ arrayValores[i].length);*/
			            	for(j=1;j<arrayValores[i].length;j++){
			            		 document.getElementById("select2").options[document.getElementById("select2").options.length]=new Option(arrayValores[i][j+1], arrayValores[i][j]);
			            		 j = j + 1;
			            	}
			               
			            }
			        }
			 
			        // habilitamos el segundo select
			        document.getElementById("select2").disabled=false;
		        }
		}

		function seleccion2()
		{
				 var v2 = document.getElementById("select2");
   	     		 var Tipodoc = v2.options[v2.selectedIndex].text; 
   	      		 var CodigoTipoDoc = v2.options[v2.selectedIndex].value; 

   	      		 /*alert("estos: "+ Tipodoc + "   " + valor2);*/
		}

		function pagar(){			
			console.log("Pagando!");
			var v2 = document.getElementById("select2");
			var CodigoTipoDoc = v2.options[v2.selectedIndex].value;
			var documento = document.getElementById("documento").value;		
			
			/*console.log(docu);*/

			var Persona = new Person(CodigoTipoDoc,documento,document.getElementById("nombre"),document.getElementById("apellidos"), document.getElementById("empresa"),document.getElementById("email"), document.getElementById("calle"), document.getElementById("ciudad"), document.getElementById("estado"), document.getElementById("cod.Postal"),document.getElementById("país"),document.getElementById("telefono"));
		}
	        
  // -->
  </SCRIPT>		

</head>
<body>
	<form action="conexion.php" method="post">
		<fieldset>

			<legend>Datos de Compra</legend>
			
			<select id="select1" name="País" placeholder="País" ONCHANGE='actualizaTipoDoc()'>
					<option>Seleccione un país</option>
					<option>Internacional</option>
					<option>Colombia</option>
					<option>Panamá</option>
					<option>Ecuador</option>
					<option>Brasil</option>
					<option>USA</option>
			</select>
		    <select id="select2" name="TipoDoc" placeholder="Tipo Documento" disabled ONCHANGE='seleccion2()'>
					<option value="0">Seleccione un tipo de documento</option>
			</select>
			<p>				
				<input type="Document" id="documento" name="d" placeholder="Documento" autocomplete="off" autofocus required>										
			</p>
		    <p>				
				<input type="Nombres" id="nombres" name="nombres" placeholder="Nombres" autocomplete="off" autofocus required>										
			</p>
			 <p>				
				<input type="Apellidos" id="apellidos" name="Apellidos" placeholder="Apellidos" autocomplete="off" autofocus required>										
			</p>
			 <p>				
				<input type="Empresa" id="empresa" name="Empresa" placeholder="Empresa" autocomplete="off" autofocus required>										
			</p>
			
			<p>				
				<input type="Email" id="email" name="e" placeholder="Email" autocomplete="off" autofocus required>										
			</p>		
			
			<fieldset>
				<legend>Datos de Domicilio</legend>

		    <p>				
				<input type="Calle" id="calle" name="e" placeholder="Calle" autocomplete="off" autofocus required>										
			</p>	
			<p>				
				<input type="Ciudad" id="ciudad" name="e" placeholder="Ciudad" autocomplete="off" autofocus required>										
			</p>	
			<p>				
				<input type="Estado" id="estado" name="e" placeholder="Estado" autocomplete="off" autofocus required>										
			</p>	
			<p>				
				<input type="Cod. Postal" id="cod.Postal" name="e" placeholder="Cod. Postal" autocomplete="off" autofocus required>										
			</p>	
			<p>				
				<input type="País" id="pais" name="e" placeholder="País" autocomplete="off" autofocus required>										
			</p>	
			<p>				
				<input type="Telefono" id="telefono" name="e" placeholder="Telefono" maxlength="30" autocomplete="off" autofocus required>										
			</p>

			<table width=”100%” border=”1″>
				<caption>Cesta de Compra</caption>
				<thead>    
			    <tr>
			      <th scope="col" header="datos">Presentación</th>
			      <th scope="col" header="datos">Descripción</th>
			      <th scope="col" header="datos">Grupo</th>
			      <th scope="col" header="datos">Código</th>
			      <th scope="col" header="datos">Precio (COP)</th>
			      <th scope="col" header="datos">Impuesto (%)</th>
			    </tr>			    
			  </thead>			 

				<?php 				

						$total = 0;
						spl_autoload_register(function ($nombre_clase) {
						    
						    include $_SERVER['DOCUMENT_ROOT'] . "/Ejercicio_Placetopay/Ejercicio_Integracion/app/Models/" . $nombre_clase . '.php';		    

						});

						$item1 = new Item('Unidad','Botas Deportivas', 'Ropa', '001', 120000, 19);
						$item2 = new Item('Unidad','Reloj Adidas', 'Accesorio','002', 150000, 19);
						$item3 = new Item('Unidad','Audifonos ExtraBass', 'Accesorio','003', 250000, 19);
						$item4 = new Item('Unidad','Mouse', 'Computación','004', 45000, 19);

						$items = array();
						array_push($items , $item1);
						array_push($items , $item2);
						array_push($items , $item3);
						array_push($items , $item4);

						
				?>
  
				 <?php
				       foreach($items as $key => $value)
				          {

				 ?>
				        <tr>        	
				                   
				             </td>
				                     <?php foreach($value as $key=>$value)
				                       {
				                     ?>
				              <td>
				                    <?php echo $value;
				                    	if ($key == 'price'){
				                    		$total = $total + $value;
				                    	    }
				                    ?>
				             </td>
				                    <?php
				                     }
				                    ?>
				        </tr>
				        <?php
				        }
				       ?>

				 <tfoot>
				    <tr>
				      <th scope="row">Total</th>
				      <td></td>
				      <td></td>
				      <td></td>
				      <td id="Total"><?php echo $total;?></td>
				      <td></td>
				    </tr>
			     </tfoot>

			</table>			
	
			</fieldset>

			<p>				
				<input type="submit" value= "Pagar Ya" name="Pagar">						  
			</p>
		</fieldset>		
	</form>
</body>
