		<div id="main">
		<div id="main-shift">			
		
			<div id="mainmiddle">
			<div id="mainmiddle-expand">

			<div id="content">
			<div id="content-shift">
																					
				<div class="wrapper-t1">
					<div class="wrapper-t2">
						<div class="wrapper-t3"></div>
					</div>
				</div>
										
				<div class="wrapper-1">
				<div class="wrapper-2">
				<div class="wrapper-3">

				<h1 class="title">Bienvenido a la Zona Privada</h1>
				<div class="cuadro">
				<h2>Datos del Usuario</h2>
				<p><b>Apellidos y Nombres:</b> <?php echo $session['apellidos'].' '.$session['nombres']; ?><br />
				<b>Cédula de Identidad:</b> <?php echo $session['identidad']; ?><br />
				<b>Sexo:</b> <?php echo $session['sexo']; ?><br />
				<b>Fecha de Nacimiento:</b> <?php echo date("d/m/Y", strtotime($session['fecha_nacimiento'])); ?><br />
				<b>Dirección:</b> <?php echo $session['direccion']; ?><br />
				<b>Teléfono:</b> <?php echo $session['telefono']; ?><br />
				<b>Correo:</b> <?php echo $session['correo']; ?><br />

				</p>
				</div>

				</div>
				</div>
				</div>
											
				<div class="wrapper-b1">
					<div class="wrapper-b2">
						<div class="wrapper-b3"></div>
					</div>
				</div>



																					
			</div>
			</div>
			<!-- content end -->
									
		
			</div>
			</div>
				<!-- mainmiddle end -->


							
		</div>
		</div>



