<?php
$count = count($output);
?>

<table class="table">
    <thead class="thead-dark">
        <?php if ($count != 0) { ?>
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Profile Pic</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
    <tbody>

        <?php foreach ($output as $key => $request) { ?>
            <tr>
                <td><?php echo $request['first_name'] . ' ' . $request['last_name'] ?></td>
                <td><img src="<?php echo $image_dir_url . $request['image'] ?>" height="55px" width="55px"></td>
                <td>
                    <a type="button" class="btn btn-success accept" data-id="<?php echo $request['id']; ?>">Accept</a>
                    <a type="button" class="btn btn-danger reject" data-id="<?php echo $request['id']; ?>">Reject</a>
                </td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <p style="color: black; text-align: center;">No Request Available..</p>
    <?php } ?>
    </tbody>
</table>