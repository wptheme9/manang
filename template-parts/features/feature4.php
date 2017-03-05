<?php $feature_icon_class = get_post_meta( get_the_id(), 'feature_icon_class', true ); ?>
    <div class="col-md-4 col-sm-4">
        <div class="callout-item icon-left">
            <div class="callout-icon">
                <i class="<?php echo esc_attr($feature_icon_class); ?>"></i>
            </div>
            <div class="callout-content">
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?> </p>
            </div>
        </div>
    </div>
