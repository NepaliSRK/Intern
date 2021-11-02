<?php
 get_header();

// First we need to show content from WordPress editor so use this code:
if ( have_posts() ) : while ( have_posts() ) : the_post();
the_content();
endwhile; else: ?>
<p> Sorry, no posts matched your criteria.</p>
<?php endif; ?>


<?php
echo '<style>
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: blue;
  color: white;
  font-weight: bold;
  font-size : 50;
  text-align: center;
}
</style>

<div class="footer">
  <p>@2021 All rights reserved by Utsav</p>
</div>';

