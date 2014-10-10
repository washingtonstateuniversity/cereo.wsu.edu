<?php get_template_part( 'spine' ); ?>

<?php get_template_part('parts/after-main'); ?>
</div><!--/binder-->
<?php get_template_part('parts/after-binder'); ?>
</div><!--/jacket-->
<?php get_template_part('parts/after-jacket'); ?>

<?php get_template_part('parts/contact'); ?> 

<?php wp_footer(); ?>
 <script>
  $(function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  });
  </script>
</body>
</html>