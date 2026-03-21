
<div id="ai-chat-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
    <button id="toggle-chat" style="background: #2563eb; color: white; border: none; padding: 15px 20px; border-radius: 50px; cursor: pointer; box-shadow: 0 10px 15px rgba(0,0,0,0.1);">
        💬 Ask AI Assistant
    </button>
    
    <div id="chat-box" style="display: none; width: 350px; height: 450px; background: white; border-radius: 15px; box-shadow: 0 20px 25px rgba(0,0,0,0.15); margin-bottom: 10px; flex-direction: column; border: 1px solid #e2e8f0;">
        <div style="background: #2563eb; color: white; padding: 15px; border-radius: 15px 15px 0 0; font-weight: bold;">
            Amin Medical AI
        </div>
        <div id="chat-messages" style="flex: 1; padding: 15px; overflow-y: auto; font-size: 14px; color: #333;">
            <p><strong>AI:</strong> Hello! How can I help you today? You can tell me your symptoms.</p>
        </div>
        <div style="padding: 10px; border-top: 1px solid #eee; display: flex;">
            <input type="text" id="user-input" placeholder="Type symptoms..." style="flex:1; border:none; outline:none; padding:5px;">
            <button id="send-btn" style="background: none; border: none; color: #2563eb; font-weight: bold; cursor: pointer;">Send</button>
        </div>
    </div>
</div>

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

<script>
(function($) {
    $('#toggle-chat').on('click', function() {
        $('#chat-box').toggle().css('display', 'flex');
    });

    $('#send-btn').on('click', function() {
        let msg = $('#user-input').val();
        if(!msg) return;

        $('#chat-messages').append('<p style="text-align:right;"><strong>You:</strong> ' + msg + '</p>');
        $('#user-input').val('');

        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: { action: 'gemini_chat', message: msg },
            success: function(res) {
                $('#chat-messages').append('<p><strong>AI:</strong> ' + res.data + '</p>');
                // Auto-scroll to bottom
                $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);
            }
        });
    });
})(jQuery);
</script>
</html>

