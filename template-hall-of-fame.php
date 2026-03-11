<?php /* Template Name: Hall Of Fame */ ?>
<?php get_header(); ?>

<?php 
     if (have_posts()): while (have_posts()) : the_post();
     $thumb = get_the_post_thumbnail_url($post->ID, 'full');
     endwhile;
     endif; 

    $user_id = get_current_user_id(); 
    $can_user_access_content = 0;
    if (!can_user_access_content($user_id, $post->ID)) :
        $can_user_access_content = 1;
    endif; 

    get_template_part( 
        'partials/intro-header',
        'intro-header',
        array(
            'url' => $thumb
        )
    );

    $pmrequests = new PM_request;
    $profile_url = $pmrequests->profile_magic_get_frontend_url("pm_user_profile_page","");
    
    // $no = 9;
    // $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    // if($paged==1){
    //     $offset = 0;  
    // }else {
    //     $offset= ($paged-1)*$no;
    // }
    $per_page = 12;
    //$page_number = 1;
    
    $challengues = get_challengues();
    $idChallengue = 0;
    
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if($paged == 1):
        $offset = 0;  
    else:
        $offset = ($paged-1) * $per_page;
    endif;

    if (isset($_GET['challengue-challengue']) && $_GET['challengue-challengue'] !== '' ) {
        $idChallengue = $_GET['challengue-challengue'];
    }

    $search = "";
    if (isset($_GET['n_rodador']) && $_GET['n_rodador'] !== '' ) {
        $search = $_GET['n_rodador'];
    }

    $getHallFame = getHallFame($idChallengue, $search, $per_page, $paged);

    //var_dump($getHallFame);

    $total_pages = ceil($getHallFame['total']/$per_page);   

    $end = $per_page * $paged;
    $start = $end - $per_page + 1; 

    //var_dump($getHallFame);

    if (have_posts()): while (have_posts()) : the_post();
        $hof_img = get_post_meta($post->ID, 'salon_fama_desafios', true);
        $hof_img  = wp_get_attachment_image_src( $hof_img , 'full' );
        $hof_mb_img = get_post_meta($post->ID, 'salon_fama_desafios_mobile', true);
        $hof_mb_img = wp_get_attachment_image_src( $hof_mb_img , 'full' );
    endwhile;
    endif
             
?>

<div class="container">
    <?php if($can_user_access_content) : ?>
    <div class="hall-of-fame">
        <section class="hall-of-fame-image desktop">
            <?php /* <img src="<? echo get_template_directory_uri().'/assets/images/hall_of_fame/logoshall.png'; ?>"
            alt=""> */ ?>
            <img src="<? echo $hof_img[0]; ?>" alt="">
        </section>

        <section class="hall-of-fame-image mobile">
            <?php /*<img src="<? echo get_template_directory_uri().'/assets/images/hall_of_fame/logo_hof.png'; ?>"
            alt=""> */ ?>
            <img srcset="<? echo $hof_mb_img[0]; ?> 2x" alt="">
        </section>

        <section class="hall-of-fame-search">

            <h2>Buscar al rodador</h2>
            <div class="hall-of-fame-search__content">
                <form role="search" method="get" class="woocommerce-product-search" action="">
                    <label class="screen-reader-text" for="woocommerce-product-search-field-0">Buscar por:</label>
                    <!-- <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Buscar" value="" name="s"> -->
                    <div class="custom-rss-select">
                        <select name="challengue-challengue" id="challengue-challengue">
                            <option value="">Selecciona el desafío</option>
                            <?php 
                                while ($challengues->have_posts()) {
                                    $challengues->the_post();
                                    $select = false;
                                    if (isset($_GET['challengue-challengue']) && $_GET['challengue-challengue'] !== '' ){
                                        if($_GET['challengue-challengue'] == get_the_ID()) $select = true;
                                    }
                                    echo '<option value="' . esc_attr(get_the_ID()) . '"', ($select) ? 'selected':'' ,'>' . esc_html(get_the_title()) . '</option>';
                                }
                        
                                wp_reset_query();
                            ?>
                        </select>
                    </div>
                    <div class="widget woocommerce widget_product_search">
                        <label class="screen-reader-text" for="woocommerce-product-search-field-0">Buscar por:</label>
                        <input type="text" id="woocommerce-product-search-field-0" class="search-field"
                            placeholder="Nombre" value="" name="n_rodador">
                        <button type="submit" value="Buscar" class="">
                            Buscar
                        </button>
                    </div>
                </form>
            </div>

        </section>

        <section class="rrm-sorting">
            <div class="storefront-sorting">
                <div class="woocommerce-notices-wrapper"></div>
                <!-- <form class="woocommerce-ordering" method="get">
                    <div class="custom-rss-select">
                        <p>Ordenar por</p>
                        <select name="orderby" class="orderby" aria-label="Shop order">
                            <option value="menu_order" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by latest</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select>
                    </div>
                    <input type="hidden" name="paged" value="1">
                </form> -->
                <p class="woocommerce-result-count">
                    <?php
                      if( $per_page > $getHallFame['total']) {
                        $results_summary_html = 'Mostrando ' . $getHallFame['total']  . ' de ' . $getHallFame['total']  . ' resultados ';
                    } else if( $end > $getHallFame['total']  ) {
                        $results_summary_html = 'Mostrando ' . $start . '-' . $getHallFame['total']  . ' de ' . $getHallFame['total']  . ' resultados ';
                    } else {
                        $results_summary_html = 'Mostrando ' . $start . '-' . $end . ' de ' . $getHallFame['total']  . ' resultados ';
                    }
                    echo $results_summary_html;
                    ?>
                </p>
            </div>
        </section>

        <section class="hall-of-fame-profiles">
            <?php //if($idChallengue): ?>
            <?php 
                //echo $idChallengue.'<br/>';
                //var_dump(getHallFame($idChallengue)); 
                //var_dump(getHallFame($idChallengue));
                $wheelersData = $getHallFame['data'];

                //var_dump($wheelersData);
                if(!empty($wheelersData)){

                foreach($wheelersData as $wheelerData ):
                    //var_dump($wheelerData['id_user']);
                    $completedChallengues = [];       
                    //var_dump(completedChallengueByAdmin($wheelerData['id_user'] ));
                    if(!empty(completedChallengueByAdmin($wheelerData['user_id']))):
                        //$completedChallengues = array_intersect(completedChallengueByAdmin($wheelerData['user_id'] ), progressChallengue($wheelerData['user_id'] )[1]); 
                        $completedChallengues = completedChallengueByAdmin($wheelerData['user_id']);
                        //$numCompletedChallengues = count($completedChallengues);
                    endif;
                    //var_dump($completedChallengues);
                    $description = get_user_meta($wheelerData['user_id'], 'description', true);
                    $user_level = rrm_user_level($wheelerData['user_id']);
                    $wheeler = get_user_by( 'id' , $wheelerData['user_id']);
                    get_template_part( 
                        'partials/entry-profile',
                        'entry-profile',
                        array(
                            'post-url' => add_query_arg( 'uid', $wheelerData['user_id'],$profile_url ),
                            'profile-image-url' => get_avatar( $wheelerData['user_id'], array( 'size' => 190 ) ),
                            'profile-name' =>  $wheeler->display_name,
                            'profile-status' =>  $user_level['level'],
                            'profile-description' => $description,
                            'profile-medals' => $completedChallengues,
                            'member-active' => rrm_is_active_user($wheelerData['user_id'])
                        )
                    );
                endforeach;
                
            }else{
            ?>

            <h3 class="no-results">No hay resultados para mostrar.</h3>
            <?php  } ?>
            <?php 
              
            ?>


        </section>

        <nav class="pagination-rrm">
            <?php
              echo paginate_links(array(  
                  'base' => preg_replace('/\?.*/', '/', get_pagenum_link(1)) . '%_%',
                  'format' => 'page/%#%',  
                  'current' => $paged,  
                  //'total' => $total_pages,  
                  'total' => $total_pages, 
                  'prev_text' => '&#171',  
                  'next_text' => '&#187',
                  'type'     => 'list',
                  'rewrite' => false,
                )); 
            ?>
        </nav>

        <!-- <nav class="pagination-rrm">
            <ul class="page-numbers">
                <li><a class="prev page-numbers" href="#">&#171</a></li>
                <li><a class="page-numbers" href="#">1</a></li>
                <li><span aria-current="page" class="page-numbers current">2</span></li>
                <li><a class="page-numbers" href="#">3</a></li>
                <li><a class="next page-numbers" href="#">&#187</a></li>
            </ul>
        </nav> -->

    </div>
    <?php else: ?>
        <?php 
            $message_key = 'page_content_restricted_message_no_products';
            $message = WC_Memberships_User_Messages::get_message( $message_key);
            if ( $message ) : ?>
                <div class="woocommerce">
                    <div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">
                        <?php echo $message; ?>    
                    </div>
                </div>
            <?php
            endif;
            
            //echo '<div class="woocommerce"><div class="woocommerce-info wc-memberships-restriction-message wc-memberships-message wc-memberships-content-restricted-message">' . wc_memberships()->frontend->get_content_restricted_message( $post->ID ) . '</div></div>';
        ?>
    <?php endif; ?>
</div>



<?php get_footer(); ?>