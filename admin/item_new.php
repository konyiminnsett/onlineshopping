<h1>New Item</h1>
<form action="item_add.php" method="post" enctype="multipart/form-data">
    <label for="title">Item Name</label>
    <input type="text" name="title" id="title">

    <label for="brand">Brand</label>
    <input type="text" name="brand" id="brand">

    <label for="review">Review</label>
    <textarea name="review" id="review"></textarea>

    <label for="price">Price</label>
    <input type="text" name="price" id="price">

    <label for="categories">Category</label>
    <select name="category_id" id="categories">
        <option value="1"-- Choose --></option>
        <?php
        include("confs/config.php");
        $result=mysqli_query($conn,"SELECT id,name FROM categories");
        while ($row=mysqli_fetch_assoc($result)){
        ?>
        <option value="<?php echo $row['id']?>">
            <?php echo $row['name']; ?>
        </option>
        <?php } ?>
    </select>
    <label for="photo">Image</label>
    <input type="file" name="photo"id="photo">

    <br><br>
    <input type="submit" value="Add Item">
    <a href="item_list.php" class="back">Back>></a>
</form>