<?php 
    //require_once('util/valid_admin.php');
    include 'view/headeradmin.php'; 
?>
<main>

    <h1>Vehicle Class</h1>
    <?php if (sizeof($classes) !=0) { ?>
    <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($classes as $class) : ?>
        <tr>
            <td><?php echo $class['class_code']; ?></td>
            <td><?php echo $class['VehicleClass']; ?></td>
            <td>
                <form action="admin.php" method="post">
                    <input type="hidden" name="action" value="delete_class" />
                    <input type="hidden" name="class_code"
                           value="<?php echo $class['class_code']; ?>"/>
                    <input type="submit" class="button" value="DELETE"/>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
        <?php } else { ?>
            <p>There are no vehicle classes in your database.</p>
        <?php } ?>
    

    <h2>Add Class</h2>
    <form action="admin.php" method="post" id="add_class_form">
        <input type="hidden" name="action" value="add_class">

        <label>Class Name:</label>
        <input type="text" name="class_name" max="20" required><br>

        <label id="blanklabel">&nbsp;</label>
        <input id="add_class_button" type="submit" class="button" value="ADD CLASS">
    </form>
    <?php include 'view/adminlinks.php'; ?>
    <?php include 'view/footer.php'; ?>
</main>
