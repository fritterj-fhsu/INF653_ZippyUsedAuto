<div class="form-container">
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
        <select name="make_id" id="make">
            <option value="0" <?= ($make_id ?? 0) == 0 ? 'selected' : '' ?>>View All Makes</option>
            <?php foreach ($makes as $makeId => $makeName) : ?>
                <option value="<?= $makeId ?>" <?= ($make_id ?? 0) == $makeId ? 'selected' : '' ?>>
                    <?= htmlspecialchars($makeName) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select name="type_id" id="type">
            <option value="0" <?= ($type_id ?? 0) == 0 ? 'selected' : '' ?>>View All Types</option>
            <?php foreach ($types as $typeId => $typeName) : ?>
                <option value="<?= $typeId ?>" <?= ($type_id ?? 0) == $typeId ? 'selected' : '' ?>>
                    <?= htmlspecialchars($typeName) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <select name="class_id" id="class">
            <option value="0" <?= ($class_id ?? 0) == 0 ? 'selected' : '' ?>>View All Classes</option>
            <?php foreach ($classes as $classId => $className) : ?>
                <option value="<?= $classId ?>" <?= ($class_id ?? 0) == $classId ? 'selected' : '' ?>>
                    <?= htmlspecialchars($className) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Sort by:</label>
        <label>
            <input type="radio" name="sort" value="price" <?= $sort == 'price' ? 'checked' : '' ?>>
            Price
        </label>
        <label>
            <input type="radio" name="sort" value="year" <?= $sort == 'year' ? 'checked' : '' ?>>
            Year
        </label>

        <button name="action" value="list_vehicles" class="apply-button">Apply</button>
    </form>
</div>

<?php if (!empty($vehicles)) : ?>
    <table class="admin_vehicle_table">
        <thead>
            <tr>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Type</th>
                <th>Class</th>
                <th>Price</th>
                <th class="last-column"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                    <td><?= $vehicle['year']; ?></td>
                    <td><?= $makes[$vehicle['make_id']]; ?></td>
                    <td><?= $vehicle['model']; ?></td>
                    <td><?= $types[$vehicle['type_id']]; ?></td>
                    <td><?= $classes[$vehicle['class_id']]; ?></td>
                    <td><?= $vehicle['price']; ?></td>
                    <td class="last-column">
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" style="display:inline;">
                            <input type="hidden" name="vehicle_id" value="<?= $vehicle['ID'] ?>">
                            <button type="submit" class="delete-button" name="action" value="delete_vehicle" data-id="<?= $vehicle['ID'] ?>" onclick="return confirm('Are you sure you want to delete this vehicle?')">
                                &#10006;
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <tr>
                    <td><input type="text" name="new_year" placeholder="Enter Year" class="table-input"></td>
                    <td>
                        <select name="new_make_id" class="table-input">
                            <option value="0">Select Make</option>
                            <?php foreach ($makes as $makeId => $makeName) : ?>
                                <option value="<?= htmlspecialchars($makeId) ?>"><?= htmlspecialchars($makeName) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td><input type="text" name="new_model" placeholder="Enter Model" class="table-input"></td>
                    <td>
                        <select name="new_type_id" class="table-input">
                            <option value="0">Select Type</option>
                            <?php foreach ($types as $typeId => $typeName) : ?>
                                <option value="<?= htmlspecialchars($typeId) ?>"><?= htmlspecialchars($typeName) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <select name="new_class_id" class="table-input">
                            <option value="0">Select Class</option>
                            <?php foreach ($classes as $classId => $className) : ?>
                                <option value="<?= htmlspecialchars($classId) ?>"><?= htmlspecialchars($className) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td><input type="text" name="new_price" placeholder="Enter Price" class="table-input"></td>
                    <td class="last-column">
                        <button type="submit" name="action" value="add_vehicle" class="add-button" onclick="return confirm('Are you sure you want to add this vehicle?')">
                            &#10010;
                        </button>
                    </td>
                </tr>
            </form>
        </tbody>
    </table>
<?php else : ?>
    <p>No vehicles matching the selected parameters currently available.</p>
<?php endif; ?>