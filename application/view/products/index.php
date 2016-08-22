<div class="container">
    <h2>You are in the View: application/view/products/index.php (everything in this box comes from that file)</h2>
    
    <div class="box">
        <h3>Search an item (book, furniture, laptop... etc)<h3>
        <form action="<?php echo URL; ?>products/searchproducts" method="POST">
            <label>Item Name: </label>
            <input type="text" name="searchinput" value="" required />
            <select type = "text" name="category">
                <option value="">All Categories</option>
                <?php foreach ($categorys as $category) { ?>
                    <option value= "<?php if (isset($category->Category_name)) echo htmlspecialchars($category->Category_name, ENT_QUOTES, 'UTF-8'); ?>"><?php if (isset($category->Category_name)) echo htmlspecialchars($category->Category_name, ENT_QUOTES, 'UTF-8'); ?></option>

                <?php } ?>
<!--                <option value="book">Books</option>-->
<!--                <option value="furniture">Furniture</option>-->
<!--                <option value="electronics">Electronics</option>-->
<!--                <option value="clothing">Clothing</option>-->
<!--                <option value="office suppies">Office Supplies</option>-->
<!--                <option value="other">Other</option>-->
            </select>
            <input type="submit" name="submit_search_product" value="Search" />
        </form>
    </div>
            
</div>
