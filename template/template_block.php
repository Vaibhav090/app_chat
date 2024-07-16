<table class="table">
    <?php if (!empty($output)) { ?>
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        <tbody>

            <?php foreach ($output as $key => $block) { ?>
                <tr>
                    <td><?php echo $block['first_name'] . ' ' . $block['last_name'] ?></td>
                    <td><?php echo $block['email'] ?></td>
                    <td><?php echo $block['phone'] ?></td>
                    <td><?php echo $block['description'] ?></td>
                    <td><img src="<?php echo $image_dir_url . $block['image'] ?>" height="55px" width="55px"></td>
                    <td>
                        <a type="button" class="btn btn-success unblock" data-id="<?php echo $block['id']; ?>">Unblock</a>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <p style="color: black; text-align: center;">No User Blocked...</p>
        <?php } ?>
        </tbody>
</table>