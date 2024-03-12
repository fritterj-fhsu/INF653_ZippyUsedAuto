<section>
    <table class="admin_table">
        <thead>
            <tr>
                <th>Name</th>
                <th class="last-column"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($makes as $makeId => $makeName) : ?>
                <tr>
                    <td><?= htmlspecialchars($makeName); ?></td>
                    <td class="last-column">
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" style="display:inline;">
                            <input type="hidden" name="make_id" value="<?= $makeId ?>">
                            <button type="submit" class="delete-button" name="action" value="delete_make" data-id="<?= $makeId ?>" onclick="return confirm('Are you sure you want to delete this make?')">
                                &#10006;
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="add-form">
                <tr>
                    <td><input type="text" name="new_make" placeholder="Enter New Make" class="table-input"></td>
                    <td class="last-column">
                        <button type="submit" name="action" value="add_make" class="add-button">
                            &#10010;
                        </button>
                    </td>
                </tr>
            </form>
        </tbody>
    </table>
</section>