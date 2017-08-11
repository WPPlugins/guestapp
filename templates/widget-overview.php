    <?php //==================================================================================
       // Hotel Overview (average notes)
       //==================================================================================  ?>
    <div itemscope itemtype="http://schema.org/LodgingBusiness" class="ga-review-average">
        <p style="text-align: center; margin: 0; border: none; font-family: 'Open Sans', Helvetica, Arial, sans-serif; font-size: 16px; line-height: 30px; font-weight: bold;" itemprop="name">
            <?php echo $data["establishment_name"] ?>
        </p>

        <div class="ga-rate" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
            <?php //==================================================================================
               // Average rating
               //================================================================================== ?>
            <?php
                $showNumericRating = ($note == "both" || $note == "note");

                if ($showNumericRating) :
            ?>
                <p style="border: none; font-family: 'Open Sans', Helvetica, Arial, sans-serif; line-height: 34px; margin: 0; margin-top: 0px; text-align: center;" class="ga-rate-average-num" >
                    <span style="color: #DA3466; font-weight: bold; font-size: 26px;">
                        <?php echo $data["average"] ?>
                    </span>
                    /
                    <span>10</span>
                </p>
            <?php endif; ?>

            <meta itemprop="ratingValue" content="<?php echo $data["average"] ?>">
            <meta content="0" itemprop="worstRating">
            <meta content="10" itemprop="bestRating">

            <?php //==================================================================================
               // Average stars
               //==================================================================================
            ?>
            <?php if ($note == "both" || $note == "stars"): ?>
                <div class="ga-rate-average-stars">
                    <?php // Output floor($average / 2) full stars ?>
                    <?php for($i = 0; $i < floor($data["average"] / 2); $i++): ?>
                        <i class="fa fa-star"></i>
                    <?php endfor ?>

                    <?php // If $average/2 - floor($average/2) is > 0, it means the note has a half part to it
                       // We add a half star to compensate (this also means that any note between x.1 and x.9
                       // Will be represented with a half star, which is somewhat imprecise if we're at the
                       // upper or lower ends of the note?>
                    <?php if(($data["average"] / 2) - floor($data["average"] / 2) > 0): ?>
                        <i class="fa fa-star-half-o"></i>
                    <?php endif ?>

                    <?php // Fill the rest with empty stars ?>
                    <?php for($i = 0; $i <= 4 - ($data["average"] / 2); $i++): ?>
                        <i class="fa fa-star-o"></i>
                    <?php endfor ?>
                </div>
            <?php endif ?>

            <?php //==================================================================================
               // Review count
               //==================================================================================  ?>
            <p style="font-size: 11px; font-style: italic; text-align: center;" class="ga-stay-count">
                <?php _e("Average rate on", "guestapp") ?>
                <span itemprop="ratingCount"><?php echo $data['count'] ?></span>
                <?php _e("Review", "guestapp") ?>
            </p>
        </div>

        <?php //==================================================================================
           // List of subratings
           //==================================================================================  ?>
        <div class="ga-subratings">
            <?php // Only if the user wants to show it ?>
            <?php if ($showSubratings): ?>
                <div style="width: 100%;" class="ga-subrating-holder">
                    <?php // Display each subnote as `Category [note] [stars]`
                       // Also, only the first three subnotes are shown by default
                       // Others get a .ga-note-hidden css class and are shown later through some js
                       // See the part about stars before for info as to how it works. It's the same ?>
                    <?php $counter = 0;
                       $maxCount = 3; ?>
                       <?php foreach($data['subratings'] as $rating): ?>

                           <?php if ($rating->key != ""): ?>
                               <?php if ($counter >= $maxCount): ?>
                                   <div style="padding-left: 0; margin-left: 0;" class="ga-subrating ga-note-hidden">
                               <?php else: ?>
                                   <div class="ga-subrating">
                               <?php endif ?>


                                   <strong class="ga-subcat"><?php _e($rating->key, "guestapp") ?></strong>
                                   <div class="ga-note-container">
                                       <?php if ($note == "both" || $note == "note"): ?>
                                           <span class="ga-rate-average-num"><span class="ga-note-emphasis"> <?php echo $rating->average ?></span> / 10 </span>
                                       <?php endif ?>

                                       <?php if ($note == "both" || $note == "stars"): ?>
                                           <div class="ga-note-stars">

                                           <?php for($i = 0; $i < floor($rating->average / 2); $i++): ?>
                                               <i class="fa fa-star"></i>
                                           <?php endfor ?>

                                           <?php if(($rating->average / 2) - floor($rating->average / 2) > 0): ?>
                                               <i class="fa fa-star-half-o"></i>
                                           <?php endif ?>

                                           <?php for($i = 0; $i <= 4 - ($rating->average / 2); $i++): ?>
                                               <i class="fa fa-star-o"></i>
                                           <?php endfor ?>
                                           </div>
                                       <?php endif ?>
                                   </div>
                               </div>
                               <?php $counter++ ?>
                           <?php endif ?>
                       <?php endforeach ?>
                </div>
                <?php // Only show the more/less links if there is more than three reviews ?>
                <?php if ($counter > $maxCount): ?>
                    <div class="ga-show-all ga-show-all-link ga-show-global" onclick="toggleNotes(jQuery(this))">
                        <?php _e("See more...", "guestapp") ?>
                    </div>
                    <div class="ga-hide-all ga-hide-all-link ga-hide-global" onclick="toggleNotes(jQuery(this))">
                        <?php _e("See less...", "guestapp") ?>
                    </div>
                <?php endif ?>
            <?php endif ?>
        </div>
    </div>
