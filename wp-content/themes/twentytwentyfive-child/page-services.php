<?php get_header(); ?>

<section style="background: linear-gradient(135deg, #1e293b, #334155); color: white; padding: 100px 5%; text-align: center;">
    <h1 style="font-size: 3rem; margin-bottom: 20px;">Our Premium Services</h1>
    <p style="max-width: 700px; margin: 0 auto; opacity: 0.9; font-size: 1.2rem;">
        We are more than just a directory. We provide end-to-end healthcare solutions for you and your family.
    </p>
</section>

<section style="padding: 80px 5%; background: #ffffff;">
    <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
        
        <div style="padding: 40px; border-radius: 20px; border: 1px solid #e2e8f0; transition: 0.3s;" onmouseover="this.style.borderColor='#2563eb'">
            <div style="font-size: 50px; margin-bottom: 20px;">👨‍⚕️</div>
            <h3 style="color: #1e293b;">Expert Doctor Matching</h3>
            <p style="color: #64748b; line-height: 1.6;">Our advanced algorithm (and AI assistant) helps you find the perfect specialist based on your specific symptoms and budget.</p>
        </div>

        <div style="padding: 40px; border-radius: 20px; border: 1px solid #e2e8f0; transition: 0.3s;" onmouseover="this.style.borderColor='#2563eb'">
            <div style="font-size: 50px; margin-bottom: 20px;">📱</div>
            <h3 style="color: #1e293b;">Digital Prescriptions</h3>
            <p style="color: #64748b; line-height: 1.6;">Access all your medical history and prescriptions digitally in one secure place. Never lose a medical report again.</p>
        </div>

        <div style="padding: 40px; border-radius: 20px; border: 1px solid #e2e8f0; transition: 0.3s;" onmouseover="this.style.borderColor='#2563eb'">
            <div style="font-size: 50px; margin-bottom: 20px;">🤖</div>
            <h3 style="color: #1e293b;">AI Symptom Checker</h3>
            <p style="color: #64748b; line-height: 1.6;">Powered by Google Gemini, our chatbot provides instant guidance on minor health issues and recommends immediate steps.</p>
        </div>

    </div>
</section>

<?php get_footer(); ?>