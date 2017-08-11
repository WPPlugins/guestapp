<p>
    <label for="<?php echo $titleId ?>">
        <?php _e("title", "guestapp") ?> : 
    </label>
    <input class="widefat" id="<?php echo $titleId ?>" name="<?php echo $titleName ?>" type="text" value="<?php echo $title ?>">

    <label for="<?php echo $amountId ?>">
        <?php _e("Amount of reviews to show", 'guestapp') ?> : 
    </label><br>
    <select class="widefat" value="<?php echo $amount ?>" id="<?php echo $amountId ?>" name="<?php echo $amountName ?>">
        <option value="5" <?php echo ($amount == 5 ? "selected" : "") ?>><?php _e("5 reviews", "guestapp") ?></option>
        <option value="10" <?php echo ($amount == 10 ? "selected" : "") ?>><?php _e("10 reviews", "guestapp") ?></option>
        <option value="30" <?php echo ($amount == 30 ? "selected" : "") ?>><?php _e("30 reviews", "guestapp") ?></option>
        <option value="50" <?php echo ($amount == 50 ? "selected" : "") ?>><?php _e("50 reviews", "guestapp") ?></option>
        <option value="100" <?php echo ($amount == 100 ? "selected" : "") ?>><?php _e("100 reviews", "guestapp") ?></option>
    </select><br>

    <label for="<?php echo $langId ?>">
        <?php _e("Language", "guestapp") ?>
    </label><br>
    <select class="widefat" id="<?php echo $langId ?>" name="<?php echo $langName ?>" value="<?php echo $lang ?>">
        <option value="any" <?php echo ($lang == 'any' ? "selected" : "") ?>><?php _e("any", "guestapp") ?></option>
        <option value="de" <?php echo ($lang == 'de' ? "selected" : "") ?>><?php _e("de", "guestapp") ?></option>
        <option value="fr" <?php echo ($lang == 'fr' ? "selected" : "") ?>><?php _e("fr", "guestapp") ?></option>
        <option value="en" <?php echo ($lang == 'en' ? "selected" : "") ?>><?php _e("en", "guestapp") ?></option>
        <option value="nl" <?php echo ($lang == 'nl' ? "selected" : "") ?>><?php _e("nl", "guestapp") ?></option>
        <option value="es" <?php echo ($lang == 'es' ? "selected" : "") ?>><?php _e("es", "guestapp") ?></option>
    </select><br>
    <hr>
    <h3>Style</h3>

    <label for="<?php echo $colorId ?>">
        <?php _e("Theme", "guestapp") ?>
    </label><br>
    <select class="widefat" id="<?php echo $colorId ?>" name="<?php echo $colorName ?>" value="<?php echo $color ?>">
        <option value="dark" <?php echo ($color == "dark" ? "selected" : "") ?>> <?php _e("Dark", "guestapp") ?></option>
        <option value="light" <?php echo ($color == "light" ? "selected" : "") ?>> <?php _e("Light", "guestapp") ?></option>
    </select>

    <label>
        <?php _e("note_visual", "guestapp") ?>
    </label><br>
    <select id="<?php echo $noteId ?>" name="<?php echo $noteName ?>" class="widefat">
        <option value="note" <?php echo ($note == "note" ? "selected" : "") ?>> <?php _e("Note", "guestapp") ?></option>
        <option value="stars" <?php echo ($note == "stars" ? "selected" : "") ?>> <?php _e("Stars", "guestapp") ?></option>
        <option value="both" <?php echo ($note == "both" ? "selected" : "") ?>> <?php _e("Notes & Stars", "guestapp") ?></option>
    </select><br><br>


    <label for="<?php echo $typeId ?>">
        <?php _e("Type", "guestapp"); ?>
    </label><br>
    <input type="radio" value="0" name="<?php echo $typeName ?>" <?php echo ($type == "0" ? "checked" : "") ?> ><?php _e("Normal", "guestapp") ?></input>
    <input type="radio" value="1" name="<?php echo $typeName ?>" <?php echo ($type == "1" ? "checked" : "") ?> ><?php _e("Compact", "guestapp") ?></input><br>
    <input type="checkbox" <?php echo $noavg == 'on' ? "checked" : "" ?> name="<?php echo $noavgName ?>"><?php _e("Do not show averages", "guestapp") ?>

    <div style="display: none;">
        <label for="<?php echo $numberId ?>">
        </label>
        <input disabled class="uuid-input" type="text" id="<?php echo $numberId ?>" name="<?php echo $numberName ?>" value="<?php echo $number ?>" /><br>
    </div>
</p>
