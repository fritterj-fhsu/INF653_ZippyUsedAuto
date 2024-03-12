<section>
    <table class="admin_table">
        <thead>
            <tr>
                <th>Name</th>
                <th class="last-column"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classes as $classId => $className) : ?>
                <tr>
                    <td><?= htmlspecialchars($className); ?></td>
                    <td class="last-column">
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" style="display:inline;">
                            <input type="hidden" name="class_id" value="<?= $classId ?>">
                            <button type="submit" class="delete-button" name="action" value="delete_class" data-id="<?= $classId ?>" onclick="return confirm('Are you sure you want to delete this class?')">
                                &#10006;
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="add-form">
                <tr>
                    <td><input type="text" name="new_class" placeholder="Enter New Class" class="table-input"></td>
                    <td class="last-column">
                        <button type="submit" name="action" value="add_class" class="add-button">
                            &#10010;
                        </button>
                    </td>
                </tr>
            </form>
        </tbody>
    </table>
</section>