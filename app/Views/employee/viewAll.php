<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<body>
<div class="title mt-5">
        <h1>Registered Employees</h1>
    </div>

    <div class="tables mt-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>email</th>
                    <th>Registered at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datas as $data): ?>
                    <tr>
                        <td><?= $data['username'] ?></td>
                        <td><?= $data['secret']?></td>
                        <td><?= $data['created_at'] ?></td>
                        <td class="text-center d-flex d-column">
                            <form action="/employees/delete/<?php echo $data['user_id']?>" method="post">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</body>

<?= $this->endSection(); ?>
