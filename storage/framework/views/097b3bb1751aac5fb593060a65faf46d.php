<?php $__env->startSection('content'); ?>

<!-- Hero Section with Parallax Effect -->
<section class="about-hero-section position-relative d-flex align-items-center justify-content-center" data-aos="fade-in">
    <div class="overlay position-absolute w-100 h-100" style="background: linear-gradient(135deg, rgba(0,0,0,0.95) 0%, rgba(10,10,10,0.85) 100%); top: 0; left: 0; z-index: 1;"></div>
    <div class="container position-relative text-center" style="z-index: 2; padding: 100px 0;">
        <h1 class="display-3 font-weight-bold text-white mb-4 shadow-sm" data-aos="fade-down" data-aos-delay="100">ورشة القدسي</h1>
        <p class="lead text-white-50 w-75 mx-auto font-weight-light" data-aos="fade-up" data-aos-delay="200" style="font-size: 1.25rem;">إبداع يتجسد في الحديد، ودقة ترسم معالم المستقبل بأيدي محترفة.</p>
    </div>
</section>

<!-- Our Story / Mission Section -->
<section class="site-section py-5" style="background-color: #000000;">
    <div class="container">
        <div class="row align-items-center my-5">
            <!-- Image with Floating Badge -->
            <div class="col-lg-6 mb-5 mb-lg-0 d-flex align-items-center" data-aos="fade-right">
                <div class="position-relative w-100">
                    <img src="<?php echo e(asset('frontend/images/Alqadsy.png')); ?>" alt="ورشة القدسي - أعمال الحديد" class="img-fluid rounded-lg shadow-lg" style="object-fit: contain; height: 380px; width: 100%; padding: 20px; background: rgba(255,255,255,0.02); border-radius: 15px; border: 1px solid rgba(255,255,255,0.1);">
                    <!-- Floating Experience Badge -->
                    <div class="floating-badge position-absolute text-white text-center px-4 py-3 shadow-lg rounded-lg" style="top: -30px; left: -20px; border: 2px solid rgba(255,255,255,0.2); z-index: 3; background-color: #111111;" data-aos="zoom-in" data-aos-delay="300">
                        <h2 class="font-weight-bold mb-0 text-white" style="font-size: 2.5rem;">+35</h2>
                        <span class="font-weight-bold text-uppercase text-white-50" style="letter-spacing: 1px;">عاماً من الخبرة</span>
                    </div>
                </div>
            </div>

            <!-- Text Content -->
            <div class="col-lg-5 ml-auto" data-aos="fade-left" data-aos-delay="100">
                <div class="mb-4">
                    <span class="text-white-50 text-uppercase letter-spacing-1 font-weight-bold">من نحن</span>
                    <h2 class="display-5 font-weight-bold mb-4 mt-2 text-white">رسالتنا ورؤيتنا</h2>
                </div>
                <p class="text-white-50 mb-4" style="line-height: 1.8; font-size: 1.1rem;">
                    نحن في ورشة القدسي نؤمن بأن الجودة والاحترافية هما أساس نجاح أي عمل. نسعى جاهدين لتقديم أفضل الخدمات في مجال أعمال الحديد والأعمال المعدنية، مع الحفاظ على أعلى معايير الجودة والدقة في التنفيذ.
                </p>
                <p class="text-white-50 mb-4" style="line-height: 1.8; font-size: 1.1rem;">
                    نقدم حلولاً مبتكرة ومخصصة تلبي احتياجات عملائنا الكرام، سواء كان ذلك في المشاريع السكنية، التجارية، أو الصناعية. خبرتنا الطويلة المستمدة من إنجازاتنا تجعلنا الخيار الأمثل لتحويل أفكاركم إلى واقع ملموس وبأعلى مستويات الأمان.
                </p>
                <!-- Checkmarks -->
                <ul class="list-unstyled mt-4">
                    <li class="d-flex align-items-center mb-3 text-white">
                        <div class="d-flex align-items-center justify-content-center bg-white rounded-circle mr-3" style="width: 28px; height: 28px;">
                            <svg width="18" height="18" fill="none" stroke="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        دقة واهتمام بكافة التفاصيل الصغيرة
                    </li>
                    <li class="d-flex align-items-center mb-3 text-white">
                        <div class="d-flex align-items-center justify-content-center bg-white rounded-circle mr-3" style="width: 28px; height: 28px;">
                            <svg width="18" height="18" fill="none" stroke="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        إنجاز الأعمال وفق أحدث المعايير الهندسية
                    </li>
                    <li class="d-flex align-items-center mb-3 text-white">
                        <div class="d-flex align-items-center justify-content-center bg-white rounded-circle mr-3" style="width: 28px; height: 28px;">
                            <svg width="18" height="18" fill="none" stroke="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        الالتزام التام بتسليم المشاريع في الموعد المحدد
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Features / Why Choose Us -->
<section class="site-section py-5 position-relative" style="background-color: #050505;">
    <div class="container">
        <div class="row justify-content-center mb-5" data-aos="fade-up">
            <div class="col-md-8 text-center">
                <span class="text-white-50 text-uppercase font-weight-bold">مزايانا</span>
                <h2 class="display-5 font-weight-bold text-white mt-2">لماذا تختار ورشة القدسي؟</h2>
                <div class="mx-auto bg-white mt-3" style="width: 60px; height: 4px; border-radius: 2px;"></div>
            </div>
        </div>

        <div class="row">
            <!-- Feature 1 -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card h-100 text-center p-5 rounded-lg shadow" style="background: #111111; border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
                    <div class="icon-wrap mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle shadow" style="width: 80px; height: 80px; background: #ffffff;">
                        <svg width="40" height="40" fill="none" stroke="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h4 class="text-white mb-3">الجودة والمتانة</h4>
                    <p class="text-white-50">نستخدم أفضل وأجود أنواع الحديد لضمان منتجات تدوم طويلاً وتتحمل كافة الظروف بكل قوة.</p>
                </div>
            </div>
            <!-- Feature 2 -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card h-100 text-center p-5 rounded-lg shadow" style="background: #111111; border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
                    <div class="icon-wrap mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle shadow" style="width: 80px; height: 80px; background: #ffffff;">
                        <svg width="40" height="40" fill="none" stroke="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h4 class="text-white mb-3">سرعة التنفيذ</h4>
                    <p class="text-white-50">ندرك قيمة الوقت، لذا نلتزم بتسليم المشاريع في الموعد المحدد وبأعلى معايير الإتقان.</p>
                </div>
            </div>
            <!-- Feature 3 -->
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card h-100 text-center p-5 rounded-lg shadow" style="background: #111111; border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px);">
                    <div class="icon-wrap mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle shadow" style="width: 80px; height: 80px; background: #ffffff;">
                        <svg width="40" height="40" fill="none" stroke="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                    </div>
                    <h4 class="text-white mb-3">تصاميم مخصصة</h4>
                    <p class="text-white-50">نحول أفكاركم إلى واقع بتصاميم هندسية مرنة وجمالية تلائم تطلعاتكم بدقة وابتكار.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Animated Counters Section -->
<section class="py-5 position-relative" style="background-image: url('<?php echo e(asset('frontend/images/img_2.jpg')); ?>'); background-size: cover; background-attachment: fixed; background-position: center;">
    <div class="position-absolute w-100 h-100" style="background: rgba(0,0,0,0.85); top: 0; left: 0; z-index: 0;"></div>
    <div class="container position-relative" style="z-index: 1;">
        <div class="row text-center pt-4 pb-4">
            <div class="col-md-4 mb-4 mb-md-0" data-aos="zoom-in" data-aos-delay="100">
                <h2 class="display-3 font-weight-bold text-white mb-2 counter" data-target="5000" style="direction: ltr; display: inline-block;">0</h2>
                <br>
                <span class="text-white-50 text-uppercase letter-spacing-1 font-weight-bold">مشاريع مكتملة</span>
            </div>
            <div class="col-md-4 mb-4 mb-md-0" data-aos="zoom-in" data-aos-delay="200">
                <h2 class="display-3 font-weight-bold text-white mb-2 counter" data-target="35" style="direction: ltr; display: inline-block;">0</h2>
                <br>
                <span class="text-white-50 text-uppercase letter-spacing-1 font-weight-bold">سنوات الخبرة</span>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                <h2 class="display-3 font-weight-bold text-white mb-2 counter" data-target="10000" style="direction: ltr; display: inline-block;">0</h2>
                <br>
                <span class="text-white-50 text-uppercase letter-spacing-1 font-weight-bold">عملاء سعداء</span>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="site-section py-5" style="background-color: #000000;">
    <div class="container">
        <div class="row justify-content-center mb-5" data-aos="fade-up">
            <div class="col-md-8 text-center mt-5">
                <span class="text-white-50 text-uppercase font-weight-bold">كادرنا</span>
                <h2 class="display-5 font-weight-bold text-white mt-2">فريق العمل</h2>
                <div class="mx-auto bg-white mt-3" style="width: 60px; height: 4px; border-radius: 2px;"></div>
            </div>
        </div>

        <div class="row justify-content-center">
            <!-- Team Member 1 -->
            <div class="col-md-6 col-lg-4 text-center mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="team-member-card p-5 rounded-lg position-relative shadow-sm" style="background: #111111; border: 1px solid rgba(255,255,255,0.1);">
                    <!--<div class="team-img-wrap mx-auto mb-4 position-relative" style="width: 150px; height: 150px;">-->
                    <!--    <img src="<?php echo e(asset('frontend/images/manager_portrait.png')); ?>" alt="عبدالحكيم القدسي" class="img-fluid rounded-circle w-100 h-100 shadow-sm object-fit-cover" style="border: 2px solid rgba(255,255,255,0.2);">-->
                    <!--</div>-->
                    <h3 class="text-white font-weight-bold mb-2">عبدالحكيم القدسي</h3>
                    <p class="text-white-50 mb-4 font-weight-bold small text-uppercase letter-spacing-1">المدير العام والمؤسس</p>
                    <p class="text-white mb-4 px-2" style="opacity: 0.8;">يمتلك خبرة تزيد عن 35 عاماً في مجال الحدادة والأعمال المعدنية. متخصص في تصميم وتنفيذ المشاريع المعقدة والدقيقة بأعلى مستويات الإحترافية.</p>
                    <br>

                </div>
            </div>
            
            <!-- Team Member 2 -->
            <div class="col-md-6 col-lg-4 text-center mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="team-member-card p-5 rounded-lg position-relative shadow-sm" style="background: #111111; border: 1px solid rgba(255,255,255,0.1);">
                    <!--<div class="team-img-wrap mx-auto mb-4 position-relative" style="width: 150px; height: 150px;">-->
                    <!--    <img src="<?php echo e(asset('frontend/images/blacksmith_team.png')); ?>" alt="فريق الحدادة" class="img-fluid rounded-circle w-100 h-100 shadow-sm object-fit-cover" style="border: 2px solid rgba(255,255,255,0.2);">-->
                    <!--</div>-->
                    <h3 class="text-white font-weight-bold mb-2">عمار القدسي</h3>
                    <p class="text-white-50 mb-4 font-weight-bold small text-uppercase letter-spacing-1">حرفيون وخبراء مهنيون</p>
                    <p class="text-white mb-4 px-2" style="opacity: 0.8;">فريق محترف من الحرفيين المتخصصين في اللحام والتركيب ومختلف أنواع الأعمال المعدنية، ينفذون أصعب التحديات بمهارة استثنائية.</p>
                    <div class="social-links">
                        <a href="https://wa.me/" class="d-inline-flex align-items-center justify-content-center rounded-circle bg-secondary text-white mx-1" style="width: 40px; height: 40px; transition: all 0.3s ease;"><span class="icon-whatsapp"></span></a>
                        <a href="https://www.facebook.com/share/1EyxBLDgNc/" class="d-inline-flex align-items-center justify-content-center rounded-circle bg-secondary text-white mx-1" style="width: 40px; height: 40px; transition: all 0.3s ease;"><span class="icon-facebook"></span></a>
                    </div>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="col-md-6 col-lg-4 text-center mb-5" data-aos="fade-up" data-aos-delay="300">
                <div class="team-member-card p-5 rounded-lg position-relative shadow-sm" style="background: #111111; border: 1px solid rgba(255,255,255,0.1);">
                    <!--<div class="team-img-wrap mx-auto mb-4 position-relative" style="width: 150px; height: 150px;">-->
                    <!--    <img src="<?php echo e(asset('frontend/images/engineering_team.png')); ?>" alt="فريق التصميم" class="img-fluid rounded-circle w-100 h-100 shadow-sm object-fit-cover" style="border: 2px solid rgba(255,255,255,0.2);">-->
                    <!--</div>-->
                    <h3 class="text-white font-weight-bold mb-2">علاء الفدسي</h3>
                    <p class="text-white-50 mb-4 font-weight-bold small text-uppercase letter-spacing-1">المهندسون الاستشاريون</p>
                    <p class="text-white mb-4 px-2" style="opacity: 0.8;">مصممون محترفون متخصصون في تصميم الأعمال المعدنية والحديدية بلمسات فنية بديعة تجمع بين الأناقة المطلقة والبنية الوظيفية القوية.</p>
                    <div class="social-links">
                        <a href="https://wa.me/" class="d-inline-flex align-items-center justify-content-center rounded-circle bg-secondary text-white mx-1" style="width: 40px; height: 40px; transition: all 0.3s ease;"><span class="icon-whatsapp"></span></a>
                        <a href="https://www.facebook.com/share/1EyxBLDgNc/" class="d-inline-flex align-items-center justify-content-center rounded-circle bg-secondary text-white mx-1" style="width: 40px; height: 40px; transition: all 0.3s ease;"><span class="icon-facebook"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom Styles for About Page -->
<style>
    body, html {
        background-color: #000000;
        color: #ffffff;
    }
    .about-hero-section {
        background-image: url('<?php echo e(asset('frontend/images/img_2.jpg')); ?>');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    .letter-spacing-1 {
        letter-spacing: 1px;
    }
    .object-fit-cover {
        object-fit: cover !important;
    }
    
    /* Feature Cards Hover */
    .feature-card {
        transition: all 0.4s ease;
        border-bottom: 4px solid transparent !important;
    }
    .feature-card:hover {
        transform: translateY(-10px);
        background: #1a1a1a !important;
        border-bottom: 4px solid #ffffff !important;
    }
    .feature-card:hover .icon-wrap {
        background: #111111 !important;
        border: 2px solid #ffffff !important;
    }
    .feature-card:hover .icon-wrap svg {
        stroke: #ffffff !important;
    }

    /* Team Cards Hover */
    .team-member-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .team-member-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.5) !important;
        border-color: #ffffff !important;
        background: #1a1a1a !important;
    }
    .team-img-wrap img {
        transition: all 0.5s ease;
    }
    .team-member-card:hover .team-img-wrap img {
        transform: scale(1.1) rotate(5deg);
        border-color: #ffffff !important;
    }
    .social-links a:hover {
        background: rgba(255,255,255,0.8) !important;
        transform: translateY(-3px);
    }
</style>

<!-- Custom Script for Number Counters -->
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll('.counter');
        const speed = 200; // The lower the slower

        let observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                    const updateCount = (counter) => {
                        const target = +counter.getAttribute('data-target');
                        const count = +counter.innerText;
                        
                        // Lower inc to slow and higher to fast
                        const inc = target / speed;

                        // Check if target is reached
                        if (count < target) {
                            counter.innerText = Math.ceil(count + inc);
                            setTimeout(() => updateCount(counter), 10);
                        } else {
                            counter.innerText = target + "+";
                        }
                    };
                    updateCount(entry.target);
                    // Stop observing once animated
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 }); // Trigger when 50% visible

        counters.forEach(counter => {
            observer.observe(counter);
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u746187910/domains/alqadsy.com/public_html/resources/views/frontend/about.blade.php ENDPATH**/ ?>