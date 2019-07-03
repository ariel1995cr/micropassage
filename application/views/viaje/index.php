<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Viajes Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('viaje/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>IdViaje</th>
						<th>Idcolectivo</th>
						<th>Idciudadorigen</th>
						<th>Idciudadestino</th>
						<th>Tarifa</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($viajes as $v){ ?>
                    <tr>
						<td><?php echo $v['idViaje']; ?></td>
						<td><?php echo $v['idcolectivo']; ?></td>
						<td><?php echo $v['idciudadorigen']; ?></td>
						<td><?php echo $v['idciudadestino']; ?></td>
						<td><?php echo $v['tarifa']; ?></td>
						<td>
                            <a href="<?php echo site_url('viaje/edit/'.$v['idViaje']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('viaje/remove/'.$v['idViaje']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
