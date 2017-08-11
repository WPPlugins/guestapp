<?php // Review data
   // Represent a single review by an user
?>
<div itemscope itemtype="http://schema.org/Review" class="ga-review">
    <?php // Microformat stuff
       // Those particular properties have to be shown in meta tags, because they are either not shown
       // in the review, or they're not in the right format (like dtreviewed)
    ?>

    <meta content="<?php echo $review["establishment"] ?>" itemprop="itemReviewed">

    <?php // See rules about stars, notes & both ?>
    <div itemscope itemprop="reviewRating" itemtype="http://schema.org/Rating">
        <?php if ($note == "both" || $note == "note"): ?>
            <p style="text-align: center; font-family: 'Open Sans', Helvetica, Arial, sans-serif; font-weight: bold;">
                <span style="color: #DA3466; font-size: 1.3em !important;" class="ga-note-emphasis">
                    <?php echo $review["global_rate"] ?>
                </span>
                /10
            </p>
        <?php endif ?>

        <meta content="<?php echo $review["global_rate"] ?>" itemprop="ratingValue">
        <meta content="0" itemprop="worstRating">
        <meta content="10" itemprop="bestRating">
    </div>
    <meta content="<?php echo $review['establishment'] ?>" itemprop="name">
    <meta content="<?php echo date('c', $review['timestamp']) ?>" itemprop="datePublished">

    <?php if ($note == "both" || $note == "stars"): ?>
        <div class="ga-note-stars-global">
        <?php for($i = 0; $i < floor($review["global_rate"] / 2); $i++): ?>
            <i class="fa fa-star"></i>
        <?php endfor ?>
        <?php if(($review["global_rate"] / 2) - floor($review["global_rate"] / 2) > 0): ?>
            <i class="fa fa-star-half-o"></i>
        <?php endif ?>
        <?php for($i = 0; $i <= 4 - ($review["global_rate"] / 2); $i++): ?>
            <i class="fa fa-star-o"></i>
        <?php endfor ?>
        </div>
    <?php endif ?>

    <blockquote>
         <div class="ga-content">

            <div class="ga-comment-short ga-show-all ga-show-all-<?php echo $review["id"] ?>">
                <?php if ($review["title"]): ?>
                <strong style="font-weight:600;"><?php echo $review["title"] ?></strong>
                <br>
                <?php endif ?>
                <?php // 'Tis but a dirtey hack. Background images are overrated. ?>
                <span class='ga-opening-quote'>“</span>
                <span itemprop="reviewBody"><?php echo $review["comment_short"] ?></span>

                <?php // Togglers
                   // Open in a popup if we're in compact mode
                   // Show inline if not
                   // (Protip : it's actually disabled in the js, and will always open inline) ?>
                <?php if ($compact): ?>
                    <span class="ga-show-all ga-show-all-link ga-show-all-<?php echo $review["id"] ?>" onclick="toggleSubNotes(jQuery(this),<?php echo $review["id"] ?>, true)">
                        (<?php _e("See more...", "guestapp") ?>)
                    </span>
                <?php else: ?>
                    <span class="ga-show-all ga-show-all-link ga-show-all-<?php echo $review["id"] ?>" onclick="toggleSubNotes(jQuery(this),<?php echo $review["id"] ?>, false)">
                        (<?php _e("See more...", "guestapp") ?>)
                    </span>
                <?php endif ?>

                <?php // End of the dirty hack ?>
                <span class="ga-closing-quote">”</span>
            </div>

            <div class="ga-comment-full ga-hide-all ga-hide-all-<?php echo $review["id"] ?>">
                <?php if ($review["title"]): ?>
                <strong style="font-weight:600;"><?php echo $review["title"] ?></strong>
                <br>
                <?php endif ?>
                <?php // Dirty hack 2 : the dirty hackening ?>
                <span class='ga-opening-quote'>“</span>
                <span itemprop="description"><?php echo $review["comment_all"] ?></span>

                <?php if ($compact): ?>
                    <span class="ga-hide-all ga-hide-all-link ga-hide-all-<?php echo $review["id"] ?>" onclick="toggleSubNotes(jQuery(this), <?php echo $review["id"] ?>, true)">
                        (<?php _e("See less...", "guestapp") ?>)
                    </span>
                <?php else: ?>
                    <span class="ga-hide-all ga-hide-all-link ga-hide-all-<?php echo $review["id"] ?>" onclick="toggleSubNotes(jQuery(this), <?php echo $review["id"] ?>, false)">
                        (<?php _e("See less...", "guestapp") ?>)
                    </span>
                <?php endif ?>

                <span class="ga-closing-quote">”</span>
            </div>

            <?php // List of the subratings for this particular review ?>
            <div class="ga-subrating ga-note-hidden ga-review-<?php echo $review["id"] ?>">
                <div class="ga-subrating-holder">
                    <?php foreach($review["ratings"] as $key => $value): ?>
                        <?php if ($key != ''): ?>
                        <div class="ga-subrating">
                            <strong class="ga-subcat"><?php _e($key, "guestapp") ?></strong>
                            <div class="ga-note-container">
                                <?php if ($note == "both" || $note == "note"): ?>
                                    <span class="ga-rate-average-num"><span class="ga-note-emphasis"> <?php echo $value ?></span> / 10 </span>
                                <?php endif ?>
                                <?php if ($note == "both" || $note == "stars"): ?>
                                    <div class="ga-note-stars">
                                    <?php for($i = 0; $i < floor($value / 2); $i++): ?>
                                        <i class="fa fa-star"></i>
                                    <?php endfor ?>
                                    <?php if(($value / 2) - floor($value / 2) > 0): ?>
                                        <i class="fa fa-star-half-o"></i>
                                    <?php endif ?>
                                    <?php for($i = 0; $i <= 4 - ($value / 2); $i++): ?>
                                        <i class="fa fa-star-o"></i>
                                    <?php endfor ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <?php endif ?>
                    <?php endforeach ?>
                </div>
            </div>
            <?php // Seal of authenticity & client info ?>
            <div class='ga-review-info'>
                <?php if (!empty($review["verif_link"])): ?>
                    <a target="_blank" rel="nofollow" href="<?php echo $review["verif_link"] ?>">
                        <span class="ga-seal">
                            <img alt="Guestapp Seal" src='<?php echo plugin_dir_url(__FILE__) . '../images/seal.png' ?>'>
                        </span>
                    </a>
                <?php endif ?>
                <p style="display: inline-block; margin: 0; font-weight: normal; font-size: 9pt;" itemprop="author" class="ga-client-name"><?php echo $review["user_name"] ?></p> -
                <div class="ga-date"><?php echo date_i18n("d F Y", $review["timestamp"]) ?></div> -
                <span class="ga-staytype"><?php _e($review["stay_type"], 'guestapp') ?></span> -
                <span class="ga-country">
                    <img alt="Flag" src='<?php echo plugin_dir_url(__FILE__) . '../images/flag/'.$review["flag"] ?>'>
                </span>
            </div>
        </div>

    </blockquote>
</div>
