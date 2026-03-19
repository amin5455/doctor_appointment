<footer style="background: #1e293b; color: #cbd5e1; padding: 80px 5% 20px; font-family: sans-serif;">
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; margin-bottom: 50px;">
        <div>
            <h3 style="color: #fff;">DOCPORTAL</h3>
            <p>Your most trusted health partner. Providing world-class medical assistance at your fingertips.</p>
        </div>
        <div>
            <h4 style="color: #fff;">Quick Links</h4>
            <ul style="list-style: none; padding: 0; line-height: 2;">
                <li><a href="#" style="color: #cbd5e1; text-decoration:none;">About Us</a></li>
                <li><a href="#" style="color: #cbd5e1; text-decoration:none;">Find a Doctor</a></li>
                <li><a href="#" style="color: #cbd5e1; text-decoration:none;">Contact Support</a></li>
            </ul>
        </div>
        <div>
            <h4 style="color: #fff;">Top Specialities</h4>
            <ul style="list-style: none; padding: 0; line-height: 2;">
                <?php
                $footer_specs = get_terms(array('taxonomy' => 'specialization', 'number' => 4));
                foreach($footer_specs as $fs) {
                    echo '<li><a href="'.get_term_link($fs).'" style="color: #cbd5e1; text-decoration:none;">'.$fs->name.'</a></li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <h4 style="color: #fff;">Newsletter</h4>
            <p>Get health tips & updates.</p>
            <input type="email" placeholder="Your Email" style="width:100%; padding:10px; border-radius:5px; border:none; margin-bottom:10px;">
            <button style="background:#2563eb; color:#fff; border:none; padding:10px 20px; border-radius:5px; cursor:pointer; width:100%;">Subscribe</button>
        </div>
    </div>
    <hr style="border: 0; border-top: 1px solid #334155;">
    <p style="text-align: center; padding-top: 20px; font-size: 14px;">&copy; <?php echo date('Y'); ?> Amin Ali Doctors Portal. All Rights Reserved.</p>
</footer>
<?php wp_footer(); ?>
</body>
</html>