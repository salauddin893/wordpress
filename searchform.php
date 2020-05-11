<form action="<?php echo esc_url(home_url()) ?>" method="get">
    <input type="text" name="s" placeholder="search" value="<?php echo esc_attr__( get_search_query(), 'themename' ); ?>">
    <button type="submit">search</button>
</form>