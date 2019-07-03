<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Viaje Edit</h3>
            </div>
			<?php echo form_open('viaje/edit/'.$viaje['idViaje']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="idcolectivo" class="control-label"><span class="text-danger">*</span>Colectivo</label>
						<div class="form-group">
							<select name="idcolectivo" class="form-control">
								<option value="">select colectivo</option>
								<?php 
								foreach($all_colectivos as $colectivo)
								{
									$selected = ($colectivo['idColectivo'] == $viaje['idcolectivo']) ? ' selected="selected"' : "";

									echo '<option value="'.$colectivo['idColectivo'].'" '.$selected.'>'.$colectivo['idColectivo'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('idcolectivo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="idciudadorigen" class="control-label"><span class="text-danger">*</span>Ciudad</label>
						<div class="form-group">
							<select name="idciudadorigen" class="form-control">
								<option value="">select ciudad</option>
								<?php 
								foreach($all_ciudades as $ciudad)
								{
									$selected = ($ciudad['idCiudad'] == $viaje['idciudadorigen']) ? ' selected="selected"' : "";

									echo '<option value="'.$ciudad['idCiudad'].'" '.$selected.'>'.$ciudad['nombreCiudad'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('idciudadorigen');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="idciudadestino" class="control-label"><span class="text-danger">*</span>Ciudad</label>
						<div class="form-group">
							<select name="idciudadestino" class="form-control">
								<option value="">select ciudad</option>
								<?php 
								foreach($all_ciudades as $ciudad)
								{
									$selected = ($ciudad['idCiudad'] == $viaje['idciudadestino']) ? ' selected="selected"' : "";

									echo '<option value="'.$ciudad['idCiudad'].'" '.$selected.'>'.$ciudad['nombreCiudad'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('idciudadestino');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tarifa" class="control-label"><span class="text-danger">*</span>Tarifa</label>
						<div class="form-group">
							<input type="text" name="tarifa" value="<?php echo ($this->input->post('tarifa') ? $this->input->post('tarifa') : $viaje['tarifa']); ?>" class="form-control" id="tarifa" />
							<span class="text-danger"><?php echo form_error('tarifa');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>