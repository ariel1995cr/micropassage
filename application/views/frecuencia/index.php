<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Frecuencias Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('frecuencia/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>IdFrecuencia</th>
						<th>Dia</th>
						<th>IdViaje</th>
						<th>Hora</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($frecuencias as $f){ ?>
                    <tr>
						<td><?php echo $f['idFrecuencia']; ?></td>
						<td><?php echo $f['dia']; ?></td>
						<td><?php echo $f['idViaje']; ?></td>
						<td><?php echo $f['hora']; ?></td>
						<td>
                            <a href="<?php echo site_url('frecuencia/edit/'.$f['idFrecuencia']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('frecuencia/remove/'.$f['idFrecuencia']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
