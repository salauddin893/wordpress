<?php

/*

class themename_most_resent_post_widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'themename_most_resent_post_widget',
            esc_html__( 'Themename Resent Post', 'themename' ),
            array(
                'description' => esc_html__( 'this is themename most resent post', 'themename')
            )
        );
    }


   
    public function form($instans) { 
        var_dump($instans);

       if(isset($instans['title'])) {
           $title = $instans['title'];
       }else{
           $title = 'this is title';
       }

       if(isset($instans['post_count'])) {
        $post_count = $instans['post_count'];
        }else{
            $post_count = 3;
        }

        if(isset($instans['post_date'])) {
            $post_date = $instans['post_date'];
        }else{
            $post_date = false;
        }

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title') ?>"><?php esc_html_e( 'Resent Post', 'themename') ?></label>
            <br>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr__( $title, 'themename'); ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('post_count') ?>"><?php esc_html_e( 'Post Count', 'themename' ) ?></label> 
            <br>
            <input class="widefat" type="number" id="<?php echo $this->get_field_id('post_count') ?>" name="<?php echo $this->get_field_name('post_count') ?>" value="<?php echo esc_attr__( $post_count, 'themename'); ?>">
        </p>

        <p>
            <input <?php checked($post_date); ?> type="checkbox" id="<?php echo $this->get_field_id('post_date') ?>" name="<?php echo $this->get_field_name('post_date') ?>">
            <label for="<?php echo $this->get_field_id('post_date') ?>"><?php esc_html_e( 'Post Date', 'themename' ) ?></label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('short_by') ?>"><?php esc_html_e( 'Post short by option', 'themename') ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name('short_by') ?>" id="<?php echo $this->get_field_id('short_by') ?>">
                <option value="date"><?php esc_html_e( 'Sort By date', 'themename' ) ?></option>
                <option value="rand"><?php esc_html_e( 'Sort By rand', 'themename' ) ?></option>
                <option value="comment_count"><?php esc_html_e( 'Sort By comment count', 'themename' ) ?></option>
            </select>
        </p>

    <?php }


    public function widget($args, $instans) {
        
    }


    public function update($new_instans, $old_instans) {
        $instans = array();
        $instans['title'] = sanitize_text_field($new_instans['title']);
        $instans['post_count'] = intval($new_instans['post_count']);
        $instans['post_date'] = boolval($new_instans['post_date']);
        return $instans;
    }

}

function themename_most_resent_post_widget() {
    register_widget( 'themename_most_resent_post_widget' );
}

add_action( 'widgets_init', 'themename_most_resent_post_widget');

*/

function themename_most_resent_post_sort_by_sanitize($input) {
    $value = array('data', 'rand', 'comment_count');
    if(in_array($input, $value)) {
        return $input;
    }
    return 'data';
}

class themename_Most_Resent_Post_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct(
            'themename_most_resent_post',
            esc_html__( 'Themename resent post', 'themename'),
            array(
                'description' => esc_html__( 'this is thmenaem resent post', 'themename')
            )
        );
    }

    public function form($instans) {

        if(isset($instans['title'])) {
            $title = $instans['title'];
        }else{
            $title = 'default';
        }

        if(isset($instans['post_count'])) {
            $post_count = $instans['post_count'];
        }else{
            $post_count = 3;
        }

        if(isset($instans['post_date'])) {
            $post_date = $instans['post_date'];
        }else{
            $post_date = false;
        }

        if(isset($instans['sort_by'])) {
            $sort_by = $instans['sort_by'];
        }else{
            $sort_by = 'data';
        }

        ?>
        
        <p>
            <label for="<?php echo $this->get_field_id('title') ?>"><?php esc_html_e( 'Post title', 'themename') ?></label>
            <br>
            <input class="widefat" type="text" id="<?php echo $this->get_field_id('title') ?>" name="<?php echo $this->get_field_name('title') ?>" value="<?php echo esc_attr__( $title, 'themename') ?>">
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('post_count') ?>"><?php esc_attr_e( 'Post count', 'themename') ?></label>
            <br>
            <input class="widefat" type="number" id="<?php echo $this->get_field_id('post_count') ?>" name="<?php echo $this->get_field_name('post_count') ?>" value="<?php echo esc_attr__( $post_count, 'themename') ?>">
        </p>

        <p>
            <input <?php checked($post_date); ?> type="checkbox" id="<?php echo $this->get_field_id('post_date') ?>" name="<?php echo $this->get_field_name('post_date') ?>">
            <label for="<?php echo $this->get_field_id('post_date') ?>"><?php esc_html_e( 'Include post date', 'themename') ?></label>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('sort_by') ?>"><?php esc_html_e( 'Post sort by', 'themename' ) ?></label>
            <br>
            <select class="widefat" name="<?php echo $this->get_field_name('sort_by') ?>" id="<?php echo $this->get_field_id('sort_by') ?>">
                <option <?php selected( $sort_by, 'data') ?> value="data"><?php esc_html_e( 'Post by data', 'themename') ?></option>
                <option <?php selected( $sort_by, 'rand') ?> value="rand"><?php esc_html_e( 'Post by rand', 'themename' ) ?></option>
                <option <?php selected( $sort_by, 'comment_count') ?> value="comment_count"><?php esc_html_e( 'Post by comment counr', 'themename') ?></option>
            </select>
        </p>


    <?php }

    public function widget($args, $instans) {
       echo $args['before_widget'];

            if(isset($instans['title']) && !empty($instans['title'])) {
                $title = apply_filters( 'widget_title', $instans['title']);
                echo $args['before_title'] . esc_html($title) . $args['after_title'];
            }

            $most_resent_post = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => (isset($instans['post_count'])) ? $instans['post_count'] : 3
            ));

            if($most_resent_post->have_posts()) {
                echo '<div>';
                    while($most_resent_post->have_posts()) {
                        $most_resent_post->the_post();
                        echo '<div>';
                        echo '<h6><a href="'. get_permalink() .'">'. get_the_title() .'</a></h6>';
                        echo $instans['post_date'] ? get_the_date( ) : '';
                        echo '</div>';
                    }
                echo '</div>';
            }

       echo $args['after_widget'];
    }

    public function update($new_instans, $old_instans) {
        $instans = array();
        $instans['title'] = sanitize_text_field($new_instans['title']);
        $instans['post_count'] = intval($new_instans['post_count']);
        $instans['post_date'] = boolval($new_instans['post_date']);
        $instans['sort_by'] = themename_most_resent_post_sort_by_sanitize($new_instans['sort_by']);
        return $instans;
    }

}



function themename_most_resent_post_widget() {
    register_widget( 'themename_Most_Resent_Post_Widget' );
}

add_action( 'widgets_init', 'themename_most_resent_post_widget');