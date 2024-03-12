<?php include('view/header.php'); ?>

<section>
     <!-- Form for Filtering and Sorting Vehicles -->
     <div class="form-container">
     <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
        <!-- Make Dropdown -->
        <select name="make_id" id="make">
            <option value="0" <?= ($make_id ?? 0) == 0 ? 'selected' : '' ?>>View All Makes</option>
            <?php foreach ($makes as $makeId => $makeName) : ?>
                <option value="<?= $makeId ?>" <?= ($make_id ?? 0) == $makeId ? 'selected' : '' ?>>
                    <?= htmlspecialchars($makeName) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- Type Dropdown -->
        <select name="type_id" id="type">
            <option value="0" <?= ($type_id ?? 0) == 0 ? 'selected' : '' ?>>View All Types</option>
            <?php foreach ($types as $typeId => $typeName) : ?>
                <option value="<?= $typeId ?>" <?= ($type_id ?? 0) == $typeId ? 'selected' : '' ?>>
                    <?= htmlspecialchars($typeName) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- Class Dropdown -->
        <select name="class_id" id="class">
            <option value="0" <?= ($class_id ?? 0) == 0 ? 'selected' : '' ?>>View All Classes</option>
            <?php foreach ($classes as $classId => $className) : ?>
                <option value="<?= $classId ?>" <?= ($class_id ?? 0) == $classId ? 'selected' : '' ?>>
                    <?= htmlspecialchars($className) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <!-- Sorting Radio Buttons -->
        <label class="sort-by">Sort by:</label>
        <label>
            <input type="radio" name="sort" value="price" <?= $sort == 'price' ? 'checked' : '' ?>>
            Price
        </label>
        <label>
            <input type="radio" name="sort" value="year" <?= $sort == 'year' ? 'checked' : '' ?>>
            Year
        </label>

        <!-- Submit Button -->
        <button type="submit" name="submit" class="apply-button">Apply</button>
    </form>
    </div>

    <?php if (!empty($vehicles)) : ?>
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Class</th>
                    <th>Price</th>
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
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No vehicles matching the selected parameters currently available.</p>
    <?php endif; ?>
</section>

<?php include('view/footer.php'); ?>