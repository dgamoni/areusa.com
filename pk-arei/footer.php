    <footer>
        <div class="infoBlock" style="background: <?php the_field('footer_background_color','options');?>">
            <div class="resize cf">
                <a href="/" class="logo">
                    <img src="<?php the_field('footer_logo', 'options'); ?>" alt="">
                </a>
                <p class="text"><?php the_field('middle_text','options');?></p>
                <ul class="socials">
                    <?php if( have_rows('socials','options') ):?>
                        <?php  while ( have_rows('socials','options') ) : the_row();?>
                        <li>
                            <a href="<?php the_sub_field('link');?>" target="_blank">
                                <img src="<?php the_sub_field('icon'); ?>" alt="">
                            </a>
                        </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="lastBlock" style="background: <?php the_field('footer_last_line_color','options');?>">
            <div class="resize cf">
                <p class="copyright"><?php the_field('copyright','options');?></p>
                <div class="links">
                    <a href="<?php the_field('privacy_link', 'options'); ?>">Privacy</a>
                    <div class="sep"></div>
                    <a href="<?php the_field('terms_of_service', 'options'); ?>">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<!-- Optimized loading JS Start -->
<script>var scr = {"scripts":[
            {"src" : "<?=get_template_directory_uri().'/'?>js/libs.min.js", "async" : false},
            {"src" : "<?=get_template_directory_uri().'/'?>js/common.js", "async" : false}
        ]};!function(t,n,r){"use strict";var c=function(t){if("[object Array]"!==Object.prototype.toString.call(t))return!1;for(var r=0;r<t.length;r++){var c=n.createElement("script"),e=t[r];c.src=e.src,c.async=e.async,n.body.appendChild(c)}return!0};t.addEventListener?t.addEventListener("load",function(){c(r.scripts);},!1):t.attachEvent?t.attachEvent("onload",function(){c(r.scripts)}):t.onload=function(){c(r.scripts)}}(window,document,scr);
</script>
<!-- Optimized loading JS End -->
<?php wp_footer(); ?>
</body>
</html>
