<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Ciudades Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('ciudad/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>IdCiudad</th>
						<th>NombreCiudad</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($ciudades as $c){ ?>
                    <tr>
						<td><?php echo $c['idCiudad']; ?></td>
						<td><?php echo $c['nombreCiudad']; ?></td>
						<td>
                            <a href="<?php echo site_url('ciudad/edit/'.$c['idCiudad']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('ciudad/remove/'.$c['idCiudad']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
