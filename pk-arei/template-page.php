<?php
/**
 * The template for displaying the Page.
 *
 * Template name: Services Page template
 *
 */

get_header(); ?>
<style>
    .firstSection {
        background:url('<?php the_field('first_background_image');?>;') center center no-repeat;-webkit-background-size:cover;background-size:cover;
    }
    @media and screen (max-width: 768px) {
        .firstSection {
            background:url('<?php the_field('first_background_image_mob');?>;') center center no-repeat;-webkit-background-size:cover;background-size:cover;
        }
    }
</style>
<main>
    <div class="firstSection">
        <div class="overlay" style="background: <?php the_field('first_overlay');?>; opacity: <?php the_field('first_overlay_opacity');?>;"></div>
        <div class="resize cf">
            <h2 class="title"><?php the_title();?></h2>
            <a href="<?php the_field('first_button_link'); ?>" target="<?php the_field('first_button_target'); ?>"><img src="<?php the_field('first_button_icon'); ?>" alt=""><span><?php the_field('first_button_text'); ?></span></a>
        </div>
    </div>
    <div class="bannerWrapper" style="background: <?php the_field('banner_background_color');?>">
        <div class="resize cf">
            <?php the_field('banner_text');?>
        </div>
    </div>
    <?php if( have_rows('sections_list') ):?>
        <?php  while ( have_rows('sections_list') ) : the_row();?>
            <div class="contentSection">
                <div class="resize cf">
                    <?php the_sub_field('content');?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <div class="reportsSection" style="background: <?php the_field('reports_bg');?>" id="reports">
        <div class="resize cf">
            <h2 class="title"><?php the_field('reports_title');?></h2>
            <ul class="list">
                <?php if( have_rows('reports_list') ):?>
                    <?php  while ( have_rows('reports_list') ) : the_row();?>
                        <li>
                            <a href="<?php the_sub_field('link');?>" target="<?php the_sub_field('target');?>">
                                <img src="<?php the_sub_field('image'); ?>" alt="">
                                <p><?php the_sub_field('text');?></p>
                            </a>
                        </li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="realWrapper" style="background: url('<?php the_field('real_background_image');?>') center center no-repeat;-webkit-background-size:cover;background-size:cover;">
        <div class="overlay" style="background: <?php the_field('real_overlay');?>; opacity: <?php the_field('real_opacity');?>;"></div>
        <div class="resize cf">
            <div class="textBlock">
                <h3 class="title"><?php the_field('real_title');?></h3>
                <p class="text"><?php the_field('real_text');?></p>
                <a href="<?php the_field('real_button_link');?>" class="link"><img src="http://dev-american-real-estate-investments.pantheonsite.io/wp-content/uploads/listen_ico.png"" alt=""><span><?php the_field('real_button_text');?></span></a>
            </div>
            <img src="<?php the_field('real_logo');?>" alt="" class="logo">
            <div class="manBlock">
                <img src="<?php the_field('real_man_image');?>" alt="">
                <p class="name"><?php the_field('real_name');?></p>
            </div>
        </div>
    </div>
    <div class="formWrapper" id="formSection">
        <div class="resize cf">
            <h2 class="heading"><?php the_field('form_heading');?></h2>
            <?php the_field('form_code');?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
