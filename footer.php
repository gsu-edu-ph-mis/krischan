<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage Krischan
 * subpackage Krischan 1.0
 */
?>
<section class="section-subfooter pt-5 pb-5 text-left">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-5 mb-md-0">
                <h3 class="h3 mb-3">About Us</h3>
                <p>The Center for Journal Publications undertakes the publication of the institutional research journals, namely, Himal-Us, Higher Education Research Review (HERR), and The Graduate School Journal.  </p>
            </div>
            <div class="col-md-4 mb-5 mb-md-0">
                <h3 class="h3 mb-3">Links</h3>
                <ul class="pl-4">
					<li><a href="<?php echo get_permalink( get_page_by_path( 'himal-us' ) ) ?>">Himal-Us</a></li>
					<li><a href="<?php echo get_permalink( get_page_by_path( 'the-graduate-school-journal' ) ) ?>">The Graduate School Journal</a></li>
					<li><a href="<?php echo get_permalink( get_page_by_path( 'higher-education-research-review' ) ) ?>">Higher Education Research Review</a></li>
				</ul>
            </div>
            <div class="col-md-4 mb-5 mb-md-0">
                <h3 class="h3 mb-3">Contact Us</h3>
                <p>Address: Mclain, Buenavista, Guimaras, Philippines, 5044</p>
                <p>Email: <a href="mailto:jp@gsc.edu.ph">jp@gsc.edu.ph</a></p>
                <p>Phone: <a href="tel:0335808244">(033) 580-8244</a></p>
            </div>
        </div>
    </div>
</section>
<footer class="footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Copyright &copy; 2022. Center for Journal Publications. All Rights Reserved. </p>
                <p>Guimaras State College</p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
