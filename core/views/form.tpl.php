<form method="POST" enctype="multipart/form-data">
    <?php foreach ($view['fields'] as $field_id => $field): ?>
        <label class="<?php print $field_id; ?>">
            <span><?php print $field['label']; ?></span>

            <!-- Form field -->            
            <?php if (in_array($field['type'], ['text', 'password', 'file'])): ?>
                <!-- Simple input field: text, password -->
                <input type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" placeholder="<?php print $field['placeholder']; ?>"/>
                <!-- Radio input -->
            <?php elseif ($field['type'] == 'radio'): ?>
                <?php foreach ($field['options'] as $idx => $option): ?> 
                    <label class="radio-label-<?php print $idx; ?> <?php print $field_id; ?>">
                        <input type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" value="<?php print $option['value']; ?>"/> 
                        <img src="images/<?php print $option['img']; ?>.jpg" alt="babuska" height="150" width="150">
                    </label>
                <?php endforeach; ?>
            <?php elseif ($field['type'] == 'float'): ?>
                <input type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" placeholder="<?php print $field['placeholder']; ?>" step="0.01"/>
            <?php elseif ($field['type'] == 'number'): ?>
                <?php if (isset($field['min']) && isset($field['max'])): ?>
                    <input type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" placeholder="<?php print $field['placeholder']; ?>" min="<?php print $field['min']; ?>" max="<?php print $field['max']; ?>"/>
                <?php else: ?>
                    <input type="<?php print $field['type']; ?>" name="<?php print $field_id; ?>" placeholder="<?php print $field['placeholder']; ?>"/>
                <?php endif; ?>
            <?php elseif ($field['type'] == 'select'): ?>
                <!-- Select field -->
                <select class="btn btn-outline-primary" name="<?php print $field_id; ?>">
                    <?php foreach ($field['options'] as $option_id => $option_label): ?>
                        <option value="<?php print $option_id; ?>"><?php print $option_label; ?></option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>

            <!-- Errors -->
            <?php if (isset($field['error_msg'])): ?>
                <p class="error"><?php print $field['error_msg']; ?></p>
            <?php endif; ?>
        </label>
    <?php endforeach; ?>

    <?php if (isset($view['error_msg'])): ?>
        <p class="error"><?php print $view['error_msg']; ?></p>
    <?php endif; ?>

    <!-- Buttons -->
    <?php foreach ($view['buttons'] as $button_id => $button): ?>
        <button class="btn btn-outline-primary" name="action" value="<?php print $button_id; ?>">
            <?php print $button['text']; ?>
        </button>
    <?php endforeach; ?>
</form>