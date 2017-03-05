<?php $feature_icon_class = get_post_meta( get_the_id(), 'feature_icon_class', true ); ?>
<div class="col-md-4">
    <div class="callout-item icon-left img-icon" data-aos="fade-up">
        <div class="callout-icon">
            <img src="assets/img/agenda.png" alt="">
        </div>
        <div class="callout-content">
            <?php the_title( '<h3>', '</h3>' ); ?>
            <p><?php the_excerpt(); ?></p>
        </div>
    </div>
</div>
