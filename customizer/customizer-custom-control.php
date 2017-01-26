<?php
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * Class to create a custom layout control
 */
class Manang_Layout_Picker_Custom_Control extends WP_Customize_Control
{

      /**
       * Render the content on the theme customizer page
       */
      public function render_content()
       {
        ?>
        <span class="customize-layout-control"><?php echo esc_html( $this->label ); ?></span>
        <label>
           <ul>
              <?php
              if(!empty( $this->choices )){
                    foreach($this->choices as $value=>$args){
                      if( !empty( $this->choices[$value]['url'] ) ):
                          $this->choices[ $value ]['url'] = esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) );
                      endif;
                        ?>
                          <li>
                              <input type="radio" name="<?php echo $this->id; ?>" id="<?php echo $this->id .'['.$value.']' ?>]" value="<?php echo $value; ?>"  data-customize-setting-link="<?php echo $this->id; ?>" />
                                  <label for="<?php echo $this->id .'['.$value.']' ?>]">
                                      <?php if(!empty($this->choices[$value]['url'])): ?>
                                                <img src="<?php echo $this->choices[ $value ]['url']; ?>" alt="<?php echo $args['label'] ?>"/>
                                       <?php endif;
                                       echo $args['label']; ?>
                                  </label>
                          </li>
                    <?php
                      }
                }  ?>
           </ul>
        </label>
        <?php
       }

}


/**
 * Multiple select customize control class.
 */
class Manang_Customize_Control_Multiple_Select extends WP_Customize_Control {

    /**
     * The type of customize control being rendered.
     */
    public $type = 'multiple-select';

    /**
     * Displays the multiple select on the customize screen.
     */
    public function render_content() {

    if ( empty( $this->choices ) )
        return;
    ?>
        <label>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <select <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
                <?php
                    foreach ( $this->choices as $value => $label ) {
                        $selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
                        echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
                    }
                ?>
            </select>
        </label>
    <?php }
}


/**
 * Sortable multi check boxes custom control.
 * @since 0.1.0
 * @author David Chandra Purnama <david@genbu.me>
 * @copyright Copyright (c) 2015, Genbu Media
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
class Manang_Customize_Control_Sortable_Checkboxes extends WP_Customize_Control {

  /**
   * Control Type
   */
  public $type = 'manang-multicheck-sortable';

  /**
   * Enqueue Scripts
   */
  public function enqueue() {
    wp_enqueue_style( 'sortable-style', trailingslashit( get_template_directory_uri() ) . 'customizer/css/customize-control.css' );
     /* js */
    wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'sortable-customize-controls', trailingslashit( get_template_directory_uri() ) . 'customizer/js/customize-control.js', array( 'jquery', 'jquery-ui-sortable' ) );
  }

  /**
   * Render Settings
   */
  public function render_content() {

    /* if no choices, bail. */
    if ( empty( $this->choices ) ){
      return;
    } ?>

    <?php if ( !empty( $this->label ) ){ ?>
      <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
    <?php } // add label if needed. ?>

    <?php if ( !empty( $this->description ) ){ ?>
      <span class="description customize-control-description"><?php echo $this->description; ?></span>
    <?php } // add desc if needed. ?>

    <?php
    /* Data */
    $values = explode( ',', $this->value() );
    $choices = $this->choices;

    /* If values exist, use it. */
    $options = array();
    if( $values ){

      /* get individual item */
      foreach( $values as $value ){

        /* separate item with option */
        $value = explode( ':', $value );

        /* build the array. remove options not listed on choices. */
        if ( array_key_exists( $value[0], $choices ) ){
          $options[$value[0]] = $value[1] ? '1' : '0';
        }
      }
    }
    /* if there's new options (not saved yet), add it in the end. */
    foreach( $choices as $key => $val ){

      /* if not exist, add it in the end. */
      if ( ! array_key_exists( $key, $options ) ){
        $options[$key] = '0'; // use zero to deactivate as default for new items.
      }
    }
    ?>

    <ul class="manang-multicheck-sortable-list">
      <?php foreach ( $options as $key => $value ){ ?>

        <li>
          <label>
            <input name="<?php echo esc_attr( $key ); ?>" class="manang-multicheck-sortable-item" type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( $value ); ?> />
            <?php echo esc_html( $choices[$key] ); ?>
          </label>
          <i class="dashicons dashicons-menu manang-multicheck-sortable-handle"></i>
        </li>

      <?php } // end choices. ?>

        <li class="manang-hideme">
          <input type="hidden" class="manang-multicheck-sortable" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
        </li>

    </ul><!-- .manang-multicheck-sortable-list -->


  <?php
  }
}