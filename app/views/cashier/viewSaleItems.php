<!-- View onsite sale items -->
<table class="tableForm">
    <tbody id="productDetails">
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Quantity</th> 
        </tr>
        <?php foreach ($data['saleProductView'] as $Product_sale) : ?>
        <tr>          
            <td><?php echo $Product_sale->product_id; ?></td>
            <td><?php echo $Product_sale->product_name; ?></td>  
            <td><?php echo $Product_sale->quantity; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- View online order items -->
<table class="tableForm">
    <tbody id="productDetails2">
        <tr>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Quantity</th> 
        </tr>
        <?php foreach ($data['orderProductView'] as $order_product) : ?>
        <tr>          
            <td><?php echo $order_product->product_id; ?></td>
            <td><?php echo $order_product->product_name; ?></td>  
            <td><?php echo $order_product->quantity; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>