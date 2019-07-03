<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Ciudad Edit</h3>
            </div>
			<?php echo form_open('ciudad/edit/'.$ciudad['idCiudad']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nombreCiudad" class="control-label"><span class="text-danger">*</span>NombreCiudad</label>
						<div class="form-group">
							<input type="text" name="nombreCiudad" value="<?php echo ($this->input->post('nombreCiudad') ? $this->input->post('nombreCiudad') : $ciudad['nombreCiudad']); ?>" class="form-control" id="nombreCiudad" />
							<span class="text-danger"><?php echo form_error('nombreCiudad');?></span>
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