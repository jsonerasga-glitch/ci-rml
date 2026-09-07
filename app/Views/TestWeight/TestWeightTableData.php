<table class="table table-bordered table-sm" id="users-list">
    <thead>
        <tr>
            <th>Certificate no.</th>
            <th>Customer</th>
            <th>Address</th>
            <th>Progress</th>
            <th>Print</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(count($TestWeightData) > 0){
        foreach($TestWeightData as $row) : ?>
        <tr style="background-color:<?php
            if($row['completion'] == "Not Completed"){echo 'rgba(255,0,0,0.5)';}else{echo 'rgba(0,255,0,0.5)';}
        ?>"
            >
            <td><?= $row['certificateNumber'];?></td>
            <td><?= $row['customer'];?></td>
            <td><?= $row['address'];?></td>
            <td><?= $row['completion'];?></td>
            <td>
                <a href="<?= base_url('testWeightEdit/'.$row['id']) ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="View and print">
                    <i class="fas fa-print"></i>    
                </a>
            </td>
            <td>
                <a href="<?= base_url('testWeightEditDataView/'.$row['id']) ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit and update">
                <i class="far fa-edit"></i>    
            </a>
            </td>
            <td>
                <a onclick="deleteConfirmation('<?= base_url('testWeightDelete/'.$row['id']) ?>')" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete Item">
                    <i data-feather="trash"></i>    
            </a>
            </td>
        </tr>   
        <?php endforeach; 
          }else{ ?>  
            <tr>
            <td colspan="7" class="text-center"><strong>No Record found</strong></td>
            </tr>
        <?php 
        }
        ?>          
    </tbody>
</table>