<?php include("../view/header.php") ?>
<?php if ($classes) { ?>
    <section id="classes_list" class="classes_list">
        <header>
            <h1>Classes List</h1>
        </header>
        <?php foreach ($classes as $class) : ?>
            <div class="classes_list__row">
                <div class="classes_list__item">
                    <p class="bold"><?= $class['class'] ?> </p>
                </div>
                <div class="class_list__removed">
                    <form action="." method="post">
                        <input type="hidden" name="adminAction" value="delete_class">
                        <input type="hidden" name="class_id" value="<?= $class['class_id'] ?>">
                        <button class="remove-button">X</button>
                    </form>
                </div>
            </div>    
        <?php endforeach; ?>
    </section>
<?php } else { ?>
    <p>No Classes exist yet </p>
<?php } ?>
<section>
    <h2> Add Class </h2>
    <form action="." method="post" id="add__class__form" class="add__class__form">
        <input type="hidden" name="adminAction" value="add_class">
        <div class="add__inputs">
            <label>Class Name:</label>
            <input type="text" name="vehicle_class" maxlength="30" placeholder="class" autofocus required>
        </div>
        <div class="add__addItem">
            <button class="add-button bold">Add</button>
        </div>
    </form>
</section>
<?php include("../view/admin_footer.php");