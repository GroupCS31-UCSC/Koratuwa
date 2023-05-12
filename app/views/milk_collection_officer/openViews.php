<!-- View milk collections of each cattle -->
<table class="tableForm">
    <tbody id="newData">
        <tr>
            <th>Cow ID</th>
            <th>Quantity (L)</th> 
        </tr>
        <?php foreach ($data['farmCollectionView'] as $Cattle_milking) : ?>
        <tr>          
            <td><?php echo $Cattle_milking->cow_id; ?></td> 
            <td><?php echo $Cattle_milking->quantity; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>