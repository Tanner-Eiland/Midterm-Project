<?php include('../view/header.php') ?>
<section id="add" class="add">
    <header>Add Vehicle</header>
    <br>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="adminAction" value="add_vehicle">
        <div class="add__inputs">
            <label>Year:</label>
                <input type="text" name="year" maxlength="4" placeholder="Year" required>
                <br>
            <label>Model:</label>
                <input type="text" name="model" maxlength="30" placeholder="Model" required>
                <br>    
            <label>Price:</label>
                <input type="text" name="price" maxlength="12" placeholder="Price" required>
                <br>
            <label>Make:</label>
                <select name="make_id" required>
                    <option value="">Please select</option>
                    <?php foreach ($makes as $make) : ?>
                        <option value="<?= $make['make_id'] ?>">
                            <?= $make['make']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
            <label>Type:</label>
                <select name="type_id" required>
                    <option value="">Please select</option>
                    <?php foreach ($types as $type) : ?>
                        <option value="<?= $type['type_id'] ?>">
                            <?= $type['type']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
            <label>Class:</label>
                <select name="class_id" required>
                    <option value="">Please select</option>
                    <?php foreach ($classes as $class) : ?>
                        <option value="<?= $class['class_id'] ?>">
                            <?= $class['class']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
        </div>
        <div class="add_addItem">
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>


<?php include('../view/admin_footer.php') ?>