<?php $__env->startSection('content'); ?>

    <div class="site-section"  data-aos="fade">
      <div class="container">

        <div class="row justify-content-center">

          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-center">تواصل معنا</h2>
              </div>
            </div>
          </div>

        </div>

        <div class="row"></div>
          <div class="col-lg-8 mb-5">
            <form action="#">


              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-white" for="fname">الاسم الأول</label>
                  <input type="text" id="fname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-white" for="lname">اسم العائلة</label>
                  <input type="text" id="lname" class="form-control">
                </div>
              </div>

              <div class="row form-group">

                <div class="col-md-12">
                  <label class="text-white" for="email">البريد الإلكتروني</label>
                  <input type="email" id="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">

                <div class="col-md-12">
                  <label class="text-white" for="subject">الموضوع</label>
                  <input type="subject" id="subject" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-white" for="message">الرسالة</label>
                  <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="اكتب ملاحظاتك أو استفساراتك هنا..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="إرسال الرسالة" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>


            </form>
          </div>
          <div class="col-lg-3 ml-auto">
            <div class="mb-3">
              <p class="mb-0 font-weight-bold text-white">العنوان</p>
              <p class="mb-4">203 شارع وهمي، ماونتن فيو، سان فرانسيسكو، كاليفورنيا، الولايات المتحدة الأمريكية</p>

              <p class="mb-0 font-weight-bold text-white">الهاتف</p>
              <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

              <p class="mb-0 font-weight-bold text-white">البريد الإلكتروني</p>
              <p class="mb-0"><a href="#">youremail@domain.com</a></p>

            </div>

          </div>
        </div>
      </div>
    </div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/u746187910/domains/alqadsy.com/public_html/resources/views/frontend/contact.blade.php ENDPATH**/ ?>