<footer class="footer-area">

    <div class="container">

        <div class="footer-top">

            <!-- COLUMN 1 -->
            <div class="footer-col footer-about">
                <a href="#" class="footer-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="logo">
                </a>
                <div style="margin-top: 25px; margin-bottom: 25px;">
                    <div style="display: flex; gap: 15px; margin-bottom: 15px; align-items: flex-start;">
                        <i class="bi bi-geo-alt-fill" style="font-size: 20px; color: #aeb5c5;"></i>
                        <div>
                            <strong style="display: block; margin-bottom: 5px; color: #001136; font-size: 13px; text-transform: uppercase;">LEXWELL ADVISORS</strong>
                            <span style="color: #6c757d; font-size: 13px;">SCO 47, Second Floor, Sector-4<br>Panchkula, Haryana-134112</span>
                        </div>
                    </div>
                    <div style="display: flex; gap: 15px; margin-bottom: 15px; align-items: flex-start;">
                        <i class="bi bi-telephone-fill" style="font-size: 20px; color: #aeb5c5;"></i>
                        <div>
                            <strong style="display: block; margin-bottom: 5px; color: #001136; font-size: 13px; text-transform: uppercase;">PHONE</strong>
                            <span style="color: #ffb703; font-weight: 600; font-size: 13px;">+91 9915999371</span>
                        </div>
                    </div>
                    <div style="display: flex; gap: 15px; margin-bottom: 15px; align-items: flex-start;">
                        <i class="bi bi-send-fill" style="font-size: 20px; color: #aeb5c5;"></i>
                        <div>
                            <strong style="display: block; margin-bottom: 5px; color: #001136; font-size: 13px; text-transform: uppercase;">E-MAIL</strong>
                            <span style="color: #6c757d; font-size: 13px;">digital.lexwell@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="footer-socials">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                </div>
            </div>

            <!-- COLUMN 2 -->
            <div class="footer-col" style="flex: 0.8;">
                <h4>Policy</h4>
                <ul style="font-size: 12px;">
                    <li><a href="#" style="font-size: 12px;">Privacy Policy</a></li>
                    <li><a href="#" style="font-size: 12px;">Terms & Conditions</a></li>
                    <li><a href="#" style="font-size: 12px;">Disclaimer Policy</a></li>
                    <li><a href="#" style="font-size: 12px;">Security Policy</a></li>
                    <li><a href="#" style="font-size: 12px;">Cancellation Refund Policy</a></li>
                </ul>
            </div>

            <!-- COLUMN 3 -->
            <div class="footer-col" style="flex: 1.5;">
                <h4>Quick Links</h4>
                <ul style="column-count: 2; column-gap: 20px; font-size: 12px;">
                    <li><a href="#" style="font-size: 12px;">Trademark Registration</a></li>
                    <li><a href="#" style="font-size: 12px;">XBRL Filing</a></li>
                    <li><a href="#" style="font-size: 12px;">Annual Filing for Pvt Ltd</a></li>
                    <li><a href="#" style="font-size: 12px;">GST Registration</a></li>
                    <li><a href="#" style="font-size: 12px;">TDS Returns</a></li>
                    <li><a href="#" style="font-size: 12px;">About Us</a></li>
                    <li><a href="#" style="font-size: 12px;">Contact Us</a></li>
                    <li><a href="#" style="font-size: 12px;">Careers</a></li>
                    <li><a href="#" style="font-size: 12px;">Blog</a></li>
                </ul>
            </div>

            <!-- COLUMN 4 -->
            <div class="footer-col footer-newsletter" style="flex: 1.2;">
                <h2>Subscribe to our newsletter</h2>
                <form action="#">
                    <input type="email" placeholder="Enter email">
                    <button type="submit"><i class="bi bi-send-fill"></i></button>
                </form>
            </div>

        </div>

    </div>

    <!-- FOOTER BOTTOM -->

    <div class="footer-bottom">

        <div class="container">

            <div class="footer-bottom-wrapper">

                <p>
                    <i class="bi bi-patch-check-fill"></i>
                    Trusted partner in business excellence
                </p>

                <p>
                    © 2026 <strong>Lexwell</strong> All right reserved.
                </p>

                <div class="footer-links">

                    <a href="#">Policy & privacy</a>

                    <span>•</span>

                    <a href="#">Terms & conditions</a>

                </div>

            </div>

        </div>

    </div>

</footer>

<!-- =========================
     FOOTER END
========================= -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

<!-- GSAP for advanced animations -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/SplitText.min.js"></script>

<!-- WOW.js for scroll animations -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

<!-- Swiper for sliders -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>

<script>
    // Preloader fade out
    window.addEventListener('load', function(){
        document.querySelector('.preloader').classList.add('fade-out');
        document.body.classList.add('loaded');
    });

    // Initialize WOW.js
    new WOW({
        boxClass:     'wow',
        animateClass: 'animated',
        offset:       100,
        mobile:       false,
        live:         true
    }).init();

    // Mobile Menu Toggle
    document.addEventListener('DOMContentLoaded', function(){
        const menuBtn = document.querySelector('.mobile-menu-btn');
        const navArea = document.querySelector('.navbar-nav-area');
        if(menuBtn && navArea){
            menuBtn.addEventListener('click', function(){
                navArea.classList.toggle('open');
                menuBtn.classList.toggle('active');
                const icon = menuBtn.querySelector('i');
                if(icon){
                    icon.className = navArea.classList.contains('open') ? 'bi bi-x' : 'bi bi-list';
                }
            });
        }

        // Mobile submenu toggles (click instead of hover)
        document.querySelectorAll('.navbar-nav-area ul li.has-dropdown > a, .navbar-nav-area ul li.has-mega > a').forEach(function(link){
            link.addEventListener('click', function(e){
                if(window.innerWidth <= 1199){
                    e.preventDefault();
                    this.parentElement.classList.toggle('active');
                }
            });
        });
    });

    // GSAP Scroll Animations
    document.addEventListener('DOMContentLoaded', function(){
        if(typeof gsap === 'undefined') return;
        gsap.registerPlugin(ScrollTrigger);

        // Hero entrance animations — fire after preloader hides (on window.load)
        function heroEntrance(){
            // Hero text split animation
            const heroTitle = document.querySelector('.hero-content h1');
            if(heroTitle && typeof SplitText !== 'undefined'){
                const split = new SplitText(heroTitle, {type: 'lines'});
                gsap.from(split.lines, {
                    y: 80,
                    opacity: 0,
                    duration: 1,
                    stagger: 0.15,
                    ease: 'power3.out'
                });
            }

            // Hero paragraph & button fade in
            gsap.from('.hero-content p, .hero-content .hero-btn', {
                y: 60,
                opacity: 0,
                duration: 0.8,
                stagger: 0.2,
                ease: 'power2.out'
            });

            // Hero image fade in
            gsap.from('.hero-image-area', {
                x: 100,
                opacity: 0,
                duration: 1,
                ease: 'power2.out'
            });
        }

        // If page already loaded (cached images), run instantly; otherwise wait for load
        if(document.readyState === 'complete'){
            heroEntrance();
        } else {
            window.addEventListener('load', heroEntrance);
        }

        // Counter animation on scroll
        document.querySelectorAll('.about-counter-item h3').forEach(counter => {
            const target = parseInt(counter.textContent);
            if(!isNaN(target)){
                gsap.from(counter, {
                    textContent: 0,
                    duration: 2,
                    ease: 'power1.out',
                    scrollTrigger: {
                        trigger: counter,
                        start: 'top 85%'
                    },
                    onUpdate: function(){
                        counter.textContent = Math.round(this.targets()[0].textContent) + '%';
                    }
                });
            }
        });

        // Service items stagger animation
        gsap.from('.service-item', {
            y: 40,
            opacity: 0,
            duration: 0.6,
            stagger: 0.1,
            ease: 'power2.out',
            scrollTrigger: {
                trigger: '.service-wrapper',
                start: 'top 85%'
            }
        });

        // Section reveal animations
        document.querySelectorAll('.feature-area, .about-area, .service-area, .work-area, .project-area, .pricing-area, .testimonial-area, .blog-area, .cta-area').forEach(section => {
            ScrollTrigger.create({
                trigger: section,
                start: 'top 85%',
                onEnter: function(){
                    section.classList.add('section-reveal', 'revealed');
                }
            });
        });
    });
</script>
<!-- CONSULTATION MODAL -->
<div class="consultation-modal" id="consultationModal">
    <div class="modal-overlay" id="modalOverlay"></div>
    <div class="modal-content">
        <button class="modal-close" id="modalClose">&times;</button>
        <div class="modal-left">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-woman.png" alt="Consultant">
        </div>
        <div class="modal-right">
            <div class="modal-header-blue">
                <h3>Hassle Free Book your Free Consultation Today</h3>
                <p>Our advisor will contact you shortly for your help</p>
            </div>
            <form class="consultation-form">
                <div class="form-group form-row">
                    <input type="text" placeholder="Full Name" required>
                    <input type="tel" placeholder="Phone Number" required>
                </div>
                <div class="form-group form-row">
                    <input type="email" placeholder="Email Address" required>
                    <input type="text" placeholder="City" required>
                </div>
                <div class="form-group form-row">
                    <select required>
                        <option value="" disabled selected>I Am A...</option>
                        <option>Startup Founder</option>
                        <option>Business Owner</option>
                        <option>Freelancer</option>
                        <option>Individual</option>
                        <option>CA / Consultant</option>
                        <option>Partnership Firm</option>
                        <option>Private Limited Company</option>
                        <option>Other</option>
                    </select>
                    <select required>
                        <option value="" disabled selected>Select Service...</option>
                        <option>Trademark Registration</option>
                        <option>GST Registration</option>
                        <option>Private Limited Company</option>
                        <option>LLP Registration</option>
                        <option>FSSAI License</option>
                        <option>ISO Certification</option>
                        <option>ITR Filing</option>
                        <option>Accounting Services</option>
                        <option>Import Export Code</option>
                        <option>Startup India Registration</option>
                        <option>Legal Consultation</option>
                        <option>Other</option>
                    </select>
                </div>
                <div class="form-group form-row">
                    <select required>
                        <option value="" disabled selected>How Soon Do You Need It?</option>
                        <option>Immediately</option>
                        <option>Within 1 Week</option>
                        <option>Within 1 Month</option>
                        <option>Just Exploring</option>
                    </select>
                </div>
                <div class="form-group radio-section">
                    <label>Business Status:</label>
                    <div class="radio-group">
                        <label><input type="radio" name="business_status" value="Just Starting"> Just Starting</label>
                        <label><input type="radio" name="business_status" value="Already Running"> Already Running</label>
                        <label><input type="radio" name="business_status" value="Need Compliance Support"> Need Compliance Support</label>
                        <label><input type="radio" name="business_status" value="Need Consultation First"> Need Consultation First</label>
                    </div>
                </div>
                <button type="submit" class="tj-primary-btn modal-submit-btn">
                    Book Free Consultation
                </button>
            </form>
        </div>
    </div>
</div>

    <?php wp_footer(); ?>
</body>
</html>