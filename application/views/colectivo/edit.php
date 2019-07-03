<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Colectivo Edit</h3>
            </div>
			<?php echo form_open('colectivo/edit/'.$colectivo['idColectivo']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="capacidadInferior" class="control-label"><span class="text-danger">*</span>CapacidadInferior</label>
						<div class="form-group">
							<input type="text" name="capacidadInferior" value="<?php echo ($this->input->post('capacidadInferior') ? $this->input->post('capacidadInferior') : $colectivo['capacidadInferior']); ?>" class="form-control" id="capacidadInferior" />
							<span class="text-danger"><?php echo form_error('capacidadInferior');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="capacidadSuperior" class="control-label"><span class="text-danger">*</span>CapacidadSuperior</label>
						<div class="form-group">
							<input type="text" name="capacidadSuperior" value="<?php echo ($this->input->post('capacidadSuperior') ? $this->input->post('capacidadSuperior') : $colectivo['capacidadSuperior']); ?>" class="form-control" id="capacidadSuperior" />
							<span class="text-danger"><?php echo form_error('capacidadSuperior');?></span>
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