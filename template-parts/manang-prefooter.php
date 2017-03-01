   <div class="prefooter">
        <div class="container">
            <div class="row">
                  <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
                    <div class="col-md-4">
                        <?php if ( is_active_sidebar( 'sidebar-3' ) ) :
                           dynamic_sidebar( 'sidebar-2' );
                           endif; ?>
                    </div>
                  <?php  endif; ?>
                  <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
                    <div class="col-md-3 col-sm-6">
                        <?php if ( is_active_sidebar( 'sidebar-3' ) ) :
                                     dynamic_sidebar( 'sidebar-3' );
                              endif; ?>
                    </div>
                <?php endif; ?>

                 <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
                    <div class="col-md-3 col-sm-6">
                        <?php if ( is_active_sidebar( 'sidebar-4' ) ) :
                                     dynamic_sidebar( 'sidebar-4' );
                              endif; ?>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
                  <div class="col-md-2 col-sm-6">
                      <?php if ( is_active_sidebar( 'sidebar-5' ) ) :
                                   dynamic_sidebar( 'sidebar-5' );
                            endif; ?>
                  </div>
                <?php endif; ?>



            </div>
        </div>
    </div>
