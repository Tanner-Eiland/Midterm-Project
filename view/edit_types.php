<?php include("../view/header.php") ?>
<?php if ($types) { ?>
    <section id="types_list" class="types_list">
        <header>
            <h1>Types List</h1>
        </header>
        <?php foreach ($types as $type) : ?>
            <div class="types_list__row">
                <div class="types_list__item">
                    <p class="bold"><?= $type['type'] ?> </p>
                </div>
                <div class="type_list__removed">
                    <form action="." method="post">
                        <input type="hidden" name="adminAction" value="delete_type">
                        <input type="hidden" name="type_id" value="<?= $type['type_id'] ?>">
                        <button class="remove-button">X</button>
                    </form>
                </div>
            </div>    
        <?php endforeach; ?>
    </section>
<?php } else { ?>
    <p>No Types exist yet </p>
<?php } ?>
<section>
    <h2> Add Type </h2>
    <form action="." method="post" id="add__type__form" class="add__type__form">
        <input type="hidden" name="adminAction" value="add_type">
        <div class="add__inputs">
            <label>Type Name:</label>
            <input type="text" name="vehicle_type" maxlength="30" placeholder="type" autofocus required>
        </div>
        <div class="add__addItem">
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>
<?php include("../view/admin_footer.php");