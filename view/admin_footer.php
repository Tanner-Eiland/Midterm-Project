</main>

<?php if (($action != 'vehicle_add')){ ?>
    <p><a href=".?adminAction=vehicle_add">Add a Vehicle</a></p>

<?php} if (($action != 'view_makes')){ ?>
    <p><a href=".?adminAction=view_makes">View/Edit Makes</a></p>
<?php
} 
if (($action != 'view_types')) { ?> 
    <p><a href=".?adminAction=view_types">View/Edit Types</a></p>
<?php
} 
if (($action != 'view_classes')) { ?>
    <p><a href=".?adminAction=view_classes">View/Edit Classes</a></p>
<?php
}
if (($action !='admin_page')) { ?>
    <p><a href=".?adminAction=admin_page">View/Edit Vehicles</a></p>
<?php } ?>



</body>
</html>