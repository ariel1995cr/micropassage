<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Colectivos Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('colectivo/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>IdColectivo</th>
						<th>CapacidadInferior</th>
						<th>CapacidadSuperior</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($colectivos as $c){ ?>
                    <tr>
						<td><?php echo $c['idColectivo']; ?></td>
						<td><?php echo $c['capacidadInferior']; ?></td>
						<td><?php echo $c['capacidadSuperior']; ?></td>
						<td>
                            <a href="<?php echo site_url('colectivo/edit/'.$c['idColectivo']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('colectivo/remove/'.$c['idColectivo']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
