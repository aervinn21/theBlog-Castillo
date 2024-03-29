<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

    <section class="banner">
        <div class="container">
            <div class="banner__wrapper">
            <h1><?php echo get_field('banner_title'); ?></h1>
            <div class="banner__grid">
                <div class="banner__main">
                    
                    <?php

                    $args = array(
                        'post_type' => 'blogPost',
                        'posts_per_page' => 1, 
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => 'Uncategorized'
                            ),
                        ),
                    );
                    $newQuery = new WP_Query($args);

                    ?>
                   <?php if($newQuery -> have_posts()) : while($newQuery ->have_posts()) : $newQuery -> the_post(); ?>  
                <article class="banner__story">
                <?php echo get_the_post_thumbnail() ?>
                    <div class="banner__story__content">
                    <small><?php echo get_the_date('M-d-Y') ?></small>
                    <h2><?php echo the_title() ?></h2>
                    <p>
                        <?php echo the_excerpt() ?>
                    </p>
                    <a href="<?php the_permalink(); ?>"> Read More...</a>
                    </div>
                </article>
                <?php
                endwhile;
                    else:
                        echo "no available post yet";
                    endif;
                    wp_reset_postdata();
                ?>
                </div>

                <div class="banner__sidebar">

                 <?php

                    $args = array(
                        'post_type' => 'blogPost',
                        'posts_per_page' => 4,
                        'offset'    => 1,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => 'Uncategorized'
                            ),
                        ),
                    );
                    $newQuery = new WP_Query($args);

                ?>

                <?php if($newQuery -> have_posts()) : while($newQuery ->have_posts()) : $newQuery -> the_post(); ?>


                <div class="card__sm">
                    <?php echo get_the_post_thumbnail() ?>
                    <div class="card__sm__content">
                    <small><?php echo get_the_date('M-d-Y') ?></small>
                    <h3><?php echo the_title() ?></h3>
                    <a href="<?php the_permalink(); ?>">Read More...</a>
                    </div>
                </div>
                
                <?php
                endwhile;
                    else:
                        echo "no available post yet";
                    endif;
                    wp_reset_postdata();
                ?>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="latest">
        <div class="container">
        <h2>Latest Story</h2>
        <div class="latest__wrapper">

             <?php

            $args = array(
                'post_type' => 'blogPost',
                'posts_per_page' => 3,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => 'Latest'
                    ),
                ),
            );
            $newQuery = new WP_Query($args);

            ?>

            <?php if($newQuery -> have_posts()) : while($newQuery ->have_posts()) : $newQuery -> the_post(); ?>
         
            <div class="card__md">
            <?php echo get_the_post_thumbnail() ?>
            <div class="card__md__content">

                <ul>
                <li><small><?php echo get_the_date('M-d-Y') ?></small></li>
                <li><small><?php echo the_tags('') ?></small></li>
                </ul>
                <h3>
                <?php echo the_title() ?>
                </h3>

                <p>
                 <?php echo the_excerpt() ?>
                </p>
                <a href="<?php the_permalink(); ?>">Read More...</a>
            </div>
            </div>
            <?php
                endwhile;
                    else:
                        echo "no available post yet";
                endif;
                    wp_reset_postdata();
            ?>
        </div>
        </div>
    </section>

    <section class="feature">
        <div class="feature__content">
        <h2>Feature New</h2>
        <h3 class="block__header">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
        </h3>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga id
            perferendis quisquam error culpa non iure blanditiis placeat rem
            itaque autem nihil ducimus
        </p>
        </div>

        <div class="container">
        <div class="feature__img">
            <picture>

            <img src="<?php echo get_template_directory_uri() ?>./img/img-9.webp" alt="blog-img" class="lazy" />
            </picture>
        </div>
        </div>

        <div class="container">
        <div class="feature__wrapper">

            <div class="feature__main">
            <?php

            $args = array(
                'post_type' => 'blogPost',
                'posts_per_page' => 3,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => 'Feature'
                    ),
                ),
            );
            $newQuery = new WP_Query($args);

            ?>

            <?php if($newQuery -> have_posts()) : while($newQuery ->have_posts()) : $newQuery -> the_post(); ?>

            <article class="card__lg">
            <?php echo get_the_post_thumbnail() ?>
                <div class="card__lg__content">
                <small><?php echo get_the_date('M-d-Y') ?></small>
                <h3>
                <?php echo the_title() ?>
                </h3>
                <p>
                <?php echo wp_trim_words(get_the_excerpt(), 10) ?><!-- echo echo wp_trim_words(get_the_excerpt(), 10) para matrim ung words-->
                 <!-- echo the_excerpt() pede din to-->
                </p>
                <a href="<?php the_permalink(); ?>">Read More...</a>
                </div>
            </article>
            <?php
                endwhile;
                    else:
                        echo "no available post yet";
                endif;
                    wp_reset_postdata();
            ?>
            </div>


            <div class="feature__sidebar">
            <?php

            $args = array(
                'post_type' => 'blogPost',
                'posts_per_page' => 6,
                'offset'    => 3,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => 'Feature'
                    ),
                ),
            );
            $newQuery = new WP_Query($args);

            ?>

            <?php if($newQuery -> have_posts()) : while($newQuery ->have_posts()) : $newQuery -> the_post(); ?>

            <div class="card__mini">
                <small><?php echo get_the_date('M-d-Y') ?></small>
                <h4>
                <?php echo the_excerpt() ?>
                </h4>
                <a href="<?php the_permalink(); ?>">Read More ...</a>
            </div>
            <?php
                endwhile;
                    else:
                        echo "no available post yet";
                endif;
                    wp_reset_postdata();
            ?>
            </div>
        </div>
        </div>
    </section>

<?php get_footer(); ?>

