<?php include('view/header.php'); ?>

<section>
    <h2>Vehicles</h2>

     <!-- Form for Filtering and Sorting Vehicles -->
     <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
        <!-- Make Dropdown -->
        <label for="make">Make:</label>
        <select name="make_id" id="make">
            <option value="0" <?= ($make_id ?? 0) == 0 ? 'selected' : '' ?>>View All Makes</option>
            <?php foreach ($makes as $makeId => $makeName) : ?>
                <option value="<?= $makeId ?>" <?= ($make_id ?? 0) == $makeId ? 'selected' : '' ?>>
                    <?= htmlspecialchars($makeName) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- Type Dropdown -->
        <label for="type">Type:</label>
        <select name="type_id" id="type">
            <option value="0" <?= ($type_id ?? 0) == 0 ? 'selected' : '' ?>>View All Types</option>
            <?php foreach ($types as $typeId => $typeName) : ?>
                <option value="<?= $typeId ?>" <?= ($type_id ?? 0) == $typeId ? 'selected' : '' ?>>
                    <?= htmlspecialchars($typeName) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- Class Dropdown -->
        <label for="class">Class:</label>
        <select name="class_id" id="class">
            <option value="0" <?= ($class_id ?? 0) == 0 ? 'selected' : '' ?>>View All Classes</option>
            <?php foreach ($classes as $classId => $className) : ?>
                <option value="<?= $classId ?>" <?= ($class_id ?? 0) == $classId ? 'selected' : '' ?>>
                    <?= htmlspecialchars($className) ?>
                </option>
            <?php endforeach; ?>
        </select>


        <!-- Sorting Radio Buttons -->
        <label>Sort by:</label>
        <label>
            <input type="radio" name="sort" value="price" <?= $sort == 'price' ? 'checked' : '' ?>>
            Price
        </label>
        <label>
            <input type="radio" name="sort" value="year" <?= $sort == 'year' ? 'checked' : '' ?>>
            Year
        </label>

        <!-- Submit Button -->
        <button type="submit" name="submit">Apply</button>
    </form>

    <?php if (!empty($vehicles)) : ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Year</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Make</th>
                    <th>Type</th>
                    <th>Class</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vehicles as $vehicle) : ?>
                    <tr>
                        <td><?= $vehicle['id']; ?></td>
                        <td><?= $vehicle['year']; ?></td>
                        <td><?= $vehicle['model']; ?></td>
                        <td><?= $vehicle['price']; ?></td>
                        <td><?= $makes[$vehicle['make_id']]; ?></td>
                        <td><?= $types[$vehicle['type_id']]; ?></td>
                        <td><?= $classes[$vehicle['class_id']]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No vehicles matching the selected parameters currently available.</p>
    <?php endif; ?>
</section>

<?php include('view/footer.php'); ?>