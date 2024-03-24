<?php get_header(); ?>
<style>
    .firstWrapper {
        background:url('<?php the_field('first_background_image');?>;') center center no-repeat;-webkit-background-size:cover;background-size:cover;
    }
    @media and screen (max-width: 768px) {
        .firstWrapper {
            background:url('<?php the_field('first_background_image_mob');?>;') center center no-repeat;-webkit-background-size:cover;background-size:cover;
        }
    }
</style>
<main>
    <div class="firstWrapper">
        <div class="overlay" style="background: <?php the_field('first_overlay');?>; opacity: <?php the_field('first_opacity');?>;"></div>
        <div class="resize">
            <h2 class="title"><?php the_field('first_heading');?></h2>
            <ul class="list">
            <?php if( have_rows('first_list') ):?>
                <?php  while ( have_rows('first_list') ) : the_row();?>
                    <li>
                        <a href="<?php the_sub_field('link');?>" target="<?php the_sub_field('url_target');?>">
                            <span class="animated bounce">
                                <?php the_sub_field('icon'); ?>
                            </span>
                            <p><?php the_sub_field('text');?></p>
                        </a>
                    </li>
                <?php endwhile; ?>
            <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="bannerWrapper" style="background: <?php the_field('banner_background_color');?>">
        <div class="resize cf">
            <?php the_field('banner_text');?>
        </div>
    </div>
    <div class="contentWrapper">
        <div class="resize cf">
            <?php the_field('content_content');?>
        </div>
    </div>
    <div class="bannerWrapper" style="background: <?php the_field('second_banner_background_color');?>">
        <div class="resize cf">
            <?php the_field('second_banner_content');?>
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
    <div class="testimonialsWrapper">
        <div class="resize cf">
            <h3 class="title"><?php the_field('testimonials_title');?></h3>
            <ul class="list">
            <?php if( have_rows('testimonials') ):?>
            <?php  while ( have_rows('testimonials') ) : the_row();?>
                <li>
                    <img src="<?php the_sub_field('image');?>" alt="">
                    <p class="description"><?php the_sub_field('description');?></p>
                    <h3 class="name"><?php the_sub_field('name');?></h3>
                    <h4 class="position"><?php the_sub_field('position');?></h4>
                </li>
                <?php endwhile; ?>
            <?php endif; ?>
            </ul>
        </div>
    </div>
    <div class="awardsWrapper">
        <div class="resize cf">
            <h3 class="title"><?php the_field('awards_title');?></h3>
            <ul class="list">
                <?php if( have_rows('awards_list') ):?>
                    <?php  while ( have_rows('awards_list') ) : the_row();?>
                <li>
                    <img src="<?php the_sub_field('image');?>" alt="">
                </li>
                <?php endwhile; ?>
            <?php endif; ?>
            </ul>
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
