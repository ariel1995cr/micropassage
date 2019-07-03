<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Frecuencia Edit</h3>
            </div>
			<?php echo form_open('frecuencia/edit/'.$frecuencia['idFrecuencia']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="dia" value="1" <?php echo ($frecuencia['dia']==1 ? 'checked="checked"' : ''); ?> id='dia' />
							<label for="dia" class="control-label"><span class="text-danger">*</span>Dia</label>
							<span class="text-danger"><?php echo form_error('dia');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="idViaje" class="control-label"><span class="text-danger">*</span>Viaje</label>
						<div class="form-group">
							<select name="idViaje" class="form-control">
								<option value="">select viaje</option>
								<?php 
								foreach($all_viajes as $viaje)
								{
									$selected = ($viaje['idViaje'] == $frecuencia['idViaje']) ? ' selected="selected"' : "";

									echo '<option value="'.$viaje['idViaje'].'" '.$selected.'>'.$viaje['idViaje'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('idViaje');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="hora" class="control-label"><span class="text-danger">*</span>Hora</label>
						<div class="form-group">
							<input type="text" name="hora" value="<?php echo ($this->input->post('hora') ? $this->input->post('hora') : $frecuencia['hora']); ?>" class="form-control" id="hora" />
							<span class="text-danger"><?php echo form_error('hora');?></span>
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