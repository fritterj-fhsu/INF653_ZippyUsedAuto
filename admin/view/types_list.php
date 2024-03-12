<section>
    <table class="admin_table">
        <thead>
            <tr>
                <th>Name</th>
                <th class="last-column"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($types as $typeId => $typeName) : ?>
                <tr>
                    <td><?= htmlspecialchars($typeName); ?></td>
                    <td class="last-column">
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" style="display:inline;">
                            <input type="hidden" name="type_id" value="<?= $typeId ?>">
                            <button type="submit" class="delete-button" name="action" value="delete_type" data-id="<?= $typeId ?>" onclick="return confirm('Are you sure you want to delete this type?')">
                                &#10006;
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="add-form">
                <tr>
                    <td><input type="text" name="new_type" placeholder="Enter New Type" class="table-input"></td>
                    <td class="last-column">
                        <button type="submit" name="action" value="add_type" class="add-button">
                            &#10010;
                        </button>
                    </td>
                </tr>
            </form>
        </tbody>
    </table>
</section>
