<table class="tableForm">
    <tbody id="items">
        <tr>
            <th>Product Name</th>
            <th>Quantity</th> 
        </tr>
        <?php foreach ($data['itemView'] as $pv) : ?>
        <tr>
            <td><?php echo $pv->product_name; ?></td>  
            <td><?php echo $pv->quantity; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>