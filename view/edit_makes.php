<?php include("../view/header.php") ?>
<?php if ($makes) { ?>
    <section id="makes_list" class="makes_list">
        <header>
            <h1>Makes List</h1>
        </header>
        <?php foreach ($makes as $make) : ?>
            <div class="makes_list__row">
                <div class="makes_list__item">
                    <p class="bold"><?= $make['make'] ?> </p>
                </div>
                <div class="make_list__removed">
                    <form action="." method="post">
                        <input type="hidden" name="adminAction" value="delete_make">
                        <input type="hidden" name="make_id" value="<?= $make['make_id'] ?>">
                        <button class="remove-button">X</button>
                    </form>
                </div>
            </div>    
        <?php endforeach; ?>
    </section>
<?php } else { ?>
    <p>No Makes exist yet </p>
<?php } ?>
<section>
    <h2> Add Make </h2>
    <form action="." method="post" id="add__make__form" class="add__make__form">
        <input type="hidden" name="adminAction" value="add_make">
        <div class="add__inputs">
            <label>Make Name:</label>
            <input type="text" name="vehicle_make" maxlength="30" placeholder="Make" autofocus required>
        </div>
        <div class="add__addItem">
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>
<?php include("../view/admin_footer.php");