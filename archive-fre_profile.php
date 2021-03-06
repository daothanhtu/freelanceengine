<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FreelanceEngine
 * @since FreelanceEngine 1.0
 */
global $wp_query, $ae_post_factory, $post, $user_ID;
$post_object = $ae_post_factory->get( PROFILE );
get_header();
$count_posts = wp_count_posts(PROFILE);
$user_role = ae_user_role($user_ID);
?>

<div class="fre-page-wrapper section-archive-profile">
    <div class="fre-page-title">
        <div class="container">
            <h2><?php _e('Available Profiles', ET_DOMAIN);?></h2>
        </div>
    </div>

    <div class="fre-page-section">
        <div class="container">
            <div class="page-profile-list-wrap">
                <div class="fre-profile-list-wrap">
                    <?php get_template_part('template/filter', 'profiles' ); ?>
                    <div class="fre-profile-list-box">
                        <div class="fre-profile-list-wrap">
                            <div class="fre-profile-result-sort">
                                <div class="row">
                                    <div class="col-sm-4 col-sm-push-8">
                                        <div class="fre-profile-sort">
                                            <select class="fre-chosen-single sort-order" name="orderby" >
                                                <option value="date"><?php _e('Newest Profiles',ET_DOMAIN);?></option>
                                                <option value="hour_rate"><?php _e('Highest Hourly Rate',ET_DOMAIN);?></option>
                                                <option value="rating"><?php _e('Highest Rating',ET_DOMAIN);?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 col-sm-pull-4">
                                        <div class="fre-profile-result">
                                        <p>
                                        <?php
                                            $found_posts = '<span class="found_post">'.$wp_query->found_posts.'</span>';
                                            $plural = sprintf(__('%s profiles available',ET_DOMAIN), $found_posts);
                                            $singular = sprintf(__('%s profile available',ET_DOMAIN),$found_posts);
                                        ?>
                                            <span class="plural <?php if( $wp_query->found_posts <= 1) { echo 'hide'; } ?>" >
                                                <?php echo $plural; ?>
                                            </span>
                                            <span class="singular <?php if( $wp_query->found_posts > 1) { echo 'hide'; } ?>">
                                                <?php echo $singular; ?>
                                            </span>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php get_template_part( 'list', 'profiles' ); ?>
                        </div>
                    </div>
                    <?php
                        echo '<div class="fre-paginations paginations-wrapper">';
                        ae_pagination($wp_query, get_query_var('paged'));
                        echo '</div>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();


