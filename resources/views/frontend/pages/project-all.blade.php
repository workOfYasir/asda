@extends('frontend.layout.index')

@section('content')
<div class="content">



    <section class="about about_projects-top" data-color-section="white">
        <div class="about__bg">
            <span data-split-letters-big>
                Projects </span>
        </div>
        <div class="wrapper about__wrapper">
            <h2 class="h2 about__h2" data-split-letters="1000">
            </h2>
            <div class="text about__text wow fadeInUp" data-wow-delay="1.3s">
                <p>
                </p>
            </div>
        </div>
    </section>

    <section class="all-projects">
        <div class="all-projects__head" data-color-section="white">
            <div class="wrapper wrapper_large">
                <h2 class="h2 all-projects__h2" data-split-letters>
                </h2>
                <div class="all-projects__inner">
                    <div class="filters all-projects__filters" id="filters">

                        <button class="filters__button filters__button_active wow fadeInUp" data-wow-delay="0.2s"
                            data-filter="*">
                            All
                        </button>

                        @foreach($category as $key => $cat)

                        <button class="filters__button wow fadeInUp" onclick="catName('{{$cat->category_name}}')"
                            data-wow-delay="0.4s" data-filter="[data-filter-card={{$cat->category_name}}]">
                            {{ $cat->category_name }} </button>

                        @endforeach
                    </div>

                    <div class="view all-projects__view">
                        <div class="view__label wow fadeInUp" data-wow-delay="0.8s">
                            See
                        </div>
                        <button class="view__button wow fadeInUp" data-wow-delay="1s" data-view="2">
                            2
                        </button>
                        <button class="view__button view__button_active wow fadeInUp" data-wow-delay="1.2s"
                            data-view="4">
                            4
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="all-projects__body" data-color-section="dark">
            <div class="wrapper wrapper_large">

                <div class="all-projects__inner" data-isotope>
                    @foreach($project as $key => $product)

                    @foreach($product->category as $key2=> $cat)


                    <a href="#" class="card card_small all-projects__card" data-filter-card="{{$cat->category_name}}">
                        <div class="card__outer">

                            <img class="card__bg b-lazy" 
                            data-src="{{ asset($product->images[0]->image) }}"
                            src='{{ asset($product->images[0]->image) }}'/>

                            <div class="card__content">
                                <h2 class="h2 card__h2">
                                    {{ $product->name }} <!--wow fadeInUp-->
                                </h2>
                            </div>
                        </div>
                    </a>




                    @endforeach
                    @endforeach

                </div>
            </div>
        </div>
    </section>


    <section class="about about_about-bottom" data-color-section="white">
        <div class="scroll about__scroll" data-animated-one></div>
        <div class="wrapper about__wrapper">
            <h2 class="h2 about__h2" data-split-letters>
                Let’s talk about </br>your project! </h2>
            <div class="text about__text wow fadeInUp" data-wow-delay="0.5s">
                <p>
                <p>We are ready to share with you our design vision and lead you into the exciting world of creativity.
                </p>
                </p>
            </div>
            <button class="button about__button" data-modal-open="contact" data-button="300">
                <span class="button__text">
                    Send request
                </span>
                <svg class="button__svg" height="100%" width="100%" xmlns="http://www.w3.org/2000/svg">
                    <rect class="button__shape" height="100%" width="100%"></rect>
                </svg></button>
        </div>
    </section>
</div>
<section class="footer">
    <div class="wrapper wrapper_large">
        <div class="footer__inner" style="height: auto; padding-bottom: 38px;">
            <div class="footer__copyright wow fadeInUp" data-wow-delay>
                <div>
                    <a href="https://yodezeen.com/wp-content/uploads/2019/02/Privacy_Notice_Yodezeen.pdf"
                        target="_blank"
                        style="display: inline-block;vertical-align: top; margin-right: 20px;font-size: 10px;line-height: 16px;font-weight: 300;color: #888;text-transform: none;max-width: 500px;margin-top: 10px;">Privacy
                        Notice</a>
                    <a href="https://yodezeen.com/wp-content/uploads/2019/02/Terms_of_Use_Yodezeen.pdf" target="_blank"
                        style="display: inline-block;vertical-align: top; margin-right: 20px;font-size: 10px;line-height: 16px;font-weight: 300;color: #888;text-transform: none;max-width: 500px;margin-top: 10px;">Terms
                        of use</a>
                </div>
                <div
                    style="font-size: 10px;line-height: 16px;font-weight: 300;color: #888;text-transform: none;max-width: 500px;margin-top: 13px; margin-bottom: 13px;padding-right:40px;">
                    Please, be informed, that the intellectual property rights to all the photos, designs and other
                    materials on this Site belong to “Yodezeen” LLC. You may request permission to use them by
                    contacting us at: <a href="mailto:privacy@yodezeen.com">privacy@yodezeen.com</a>
                </div>
                Copyright 2018. All RIGHTS RESERVED
            </div>
            <a href="https://thefirstthelast.agency/" target="_blank" class="footer__developed wow fadeInUp"
                data-wow-delay="0.5s" style="vertical-align: bottom;">
                Developed by
                <svg style="margin-left:20px;position:relative;top:8px;" width="60" height="auto" viewBox="0 0 80 35"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#888"
                        d="M4.96832 4.29262H7.23456V6.36275H4.96832V11.9412C4.96832 12.4642 5.05548 12.8128 5.22981 12.9872C5.40413 13.1615 5.75278 13.2487 6.27577 13.2487C6.45009 13.2487 6.61716 13.2414 6.77696 13.2269C6.93676 13.2123 7.08929 13.1906 7.23456 13.1615V15.5585C6.97307 15.6021 6.68253 15.6311 6.36293 15.6457C6.04333 15.6602 5.731 15.6674 5.42592 15.6674C4.94652 15.6674 4.49255 15.6348 4.06399 15.5694C3.63544 15.504 3.25773 15.3769 2.93087 15.1881C2.60401 14.9992 2.34615 14.7304 2.15729 14.3818C1.96844 14.0331 1.87401 13.5755 1.87401 13.009V6.36275H0V4.29262H1.87401V0.915039H4.96832V4.29262ZM8.71631 0H11.8106V5.86174H11.876C12.2682 5.20801 12.7694 4.73225 13.3796 4.43444C13.9897 4.13663 14.5853 3.98773 15.1664 3.98773C15.9945 3.98773 16.6736 4.10031 17.2038 4.32549C17.7341 4.55066 18.1517 4.86299 18.4568 5.26249C18.7619 5.66199 18.9762 6.14865 19.0997 6.72248C19.2231 7.29631 19.2849 7.93187 19.2849 8.62918V15.5587H16.1906V9.19574C16.1906 8.26599 16.0453 7.57233 15.7548 7.11472C15.4642 6.6571 14.9485 6.4283 14.2076 6.4283C13.365 6.4283 12.7549 6.6789 12.3772 7.18009C11.9995 7.68128 11.8106 8.50569 11.8106 9.65335V15.5587H8.71631V0ZM29.2217 8.71633C29.0764 7.93186 28.8185 7.33624 28.4481 6.92948C28.0777 6.52272 27.5147 6.31934 26.7593 6.31934C26.2654 6.31934 25.855 6.40287 25.5281 6.56993C25.2013 6.73699 24.9398 6.94401 24.7437 7.19097C24.5475 7.43793 24.4095 7.69942 24.3296 7.97544C24.2497 8.25146 24.2025 8.49842 24.188 8.71633H29.2217ZM24.1881 10.6776C24.2316 11.68 24.4859 12.4063 24.9507 12.8567C25.4156 13.307 26.0839 13.5322 26.9555 13.5322C27.5802 13.5322 28.1177 13.376 28.568 13.0637C29.0184 12.7513 29.2944 12.4209 29.3961 12.0722H32.1199C31.6841 13.4232 31.0159 14.3893 30.1152 14.9704C29.2145 15.5515 28.1249 15.842 26.8465 15.842C25.9604 15.842 25.1614 15.7004 24.4495 15.4171C23.7377 15.1338 23.1348 14.7307 22.6409 14.2077C22.147 13.6847 21.7656 13.0601 21.4969 12.3337C21.2281 11.6073 21.0938 10.8083 21.0938 9.9367C21.0938 9.09411 21.2318 8.30965 21.5078 7.58328C21.7838 6.85692 22.176 6.22862 22.6845 5.69838C23.1929 5.16813 23.7994 4.75047 24.504 4.4454C25.2086 4.14033 25.9894 3.98779 26.8465 3.98779C27.8053 3.98779 28.6406 4.17301 29.3525 4.54346C30.0643 4.91391 30.649 5.41146 31.1066 6.03613C31.5643 6.66081 31.8948 7.37264 32.0981 8.17164C32.3015 8.97064 32.3742 9.80595 32.316 10.6776H24.1881ZM40.8796 6.36293H39.0273V4.2928H40.8796V3.42116C40.8796 2.41878 41.1919 1.598 41.8166 0.958798C42.4412 0.319596 43.3855 0 44.6494 0C44.9254 0 45.2014 0.0108953 45.4774 0.0326863C45.7535 0.0544773 46.0222 0.0726361 46.2837 0.0871634V2.39699C45.9205 2.35341 45.5428 2.33162 45.1506 2.33162C44.7293 2.33162 44.4278 2.42968 44.2463 2.6258C44.0647 2.82192 43.9739 3.15241 43.9739 3.61728V4.2928H46.1094V6.36293H43.9739V15.5587H40.8796V6.36293ZM47.9834 4.29297H51.0777V15.5588H47.9834V4.29297ZM51.0777 2.54953H47.9834V0H51.0777V2.54953ZM53.5186 4.29286H56.4603V6.38479H56.5039C56.6492 6.03613 56.8453 5.7129 57.0923 5.41509C57.3392 5.11728 57.6225 4.86306 57.9421 4.65241C58.2617 4.44177 58.6031 4.27834 58.9663 4.16212C59.3295 4.0459 59.7072 3.98779 60.0994 3.98779C60.3028 3.98779 60.5279 4.02411 60.7749 4.09675V6.97314C60.6296 6.94409 60.4553 6.91866 60.2519 6.89687C60.0485 6.87508 59.8524 6.86419 59.6636 6.86419C59.097 6.86419 58.6176 6.95861 58.2254 7.14747C57.8331 7.33632 57.5172 7.59418 57.2775 7.92104C57.0378 8.24791 56.8671 8.62924 56.7654 9.06506C56.6637 9.50088 56.6129 9.97301 56.6129 10.4815V15.5587H53.5186V4.29286ZM64.392 11.8979C64.392 12.232 64.461 12.5189 64.599 12.7586C64.737 12.9983 64.9149 13.1944 65.1329 13.347C65.3508 13.4995 65.6014 13.6121 65.8846 13.6847C66.1679 13.7574 66.4621 13.7937 66.7672 13.7937C66.9851 13.7937 67.2139 13.7683 67.4536 13.7174C67.6933 13.6666 67.9112 13.5867 68.1073 13.4777C68.3034 13.3688 68.4669 13.2235 68.5976 13.0419C68.7283 12.8603 68.7937 12.6315 68.7937 12.3555C68.7937 11.8906 68.485 11.542 67.8676 11.3095C67.2502 11.0771 66.3895 10.8447 65.2854 10.6122C64.835 10.5105 64.3956 10.3907 63.967 10.2527C63.5385 10.1147 63.1571 9.93307 62.823 9.70789C62.4889 9.48272 62.2201 9.19944 62.0168 8.85805C61.8134 8.51666 61.7117 8.099 61.7117 7.60508C61.7117 6.87871 61.8533 6.2831 62.1366 5.81823C62.4199 5.35335 62.794 4.98654 63.2588 4.71779C63.7237 4.44903 64.2467 4.26018 64.8278 4.15122C65.4089 4.04227 66.0045 3.98779 66.6146 3.98779C67.2248 3.98779 67.8168 4.0459 68.3906 4.16212C68.9644 4.27834 69.4765 4.47445 69.9268 4.75047C70.3772 5.02649 70.7513 5.3933 71.0491 5.85091C71.3469 6.30852 71.5248 6.88597 71.5829 7.58328H68.6412C68.5976 6.98766 68.3724 6.58454 67.9657 6.37389C67.5589 6.16325 67.0795 6.05792 66.5275 6.05792C66.3531 6.05792 66.1643 6.06882 65.9609 6.09061C65.7575 6.1124 65.5723 6.15961 65.4052 6.23225C65.2382 6.30489 65.0965 6.41021 64.9803 6.54822C64.8641 6.68623 64.806 6.87145 64.806 7.10389C64.806 7.3799 64.9077 7.60507 65.1111 7.7794C65.3144 7.95373 65.5796 8.09537 65.9064 8.20432C66.2333 8.31328 66.6074 8.41134 67.0287 8.4985C67.4499 8.58566 67.8785 8.68009 68.3143 8.78178C68.7647 8.88347 69.2041 9.00695 69.6327 9.15223C70.0612 9.2975 70.4426 9.48998 70.7767 9.72968C71.1108 9.96938 71.3796 10.2672 71.5829 10.6231C71.7863 10.979 71.888 11.4185 71.888 11.9415C71.888 12.6823 71.7391 13.3034 71.4413 13.8046C71.1435 14.3058 70.7549 14.7089 70.2755 15.014C69.7961 15.319 69.2477 15.5333 68.6303 15.6568C68.0129 15.7803 67.3846 15.842 66.7454 15.842C66.0916 15.842 65.4525 15.7766 64.8278 15.6459C64.2031 15.5152 63.6474 15.2972 63.1608 14.9922C62.6741 14.6871 62.2746 14.284 61.9623 13.7828C61.6499 13.2816 61.4792 12.6533 61.4502 11.8979H64.392ZM77.6192 4.29262H79.8854V6.36275H77.6192V11.9412C77.6192 12.4642 77.7064 12.8128 77.8807 12.9872C78.055 13.1615 78.4037 13.2487 78.9266 13.2487C79.101 13.2487 79.268 13.2414 79.4278 13.2269C79.5876 13.2123 79.7402 13.1906 79.8854 13.1615V15.5585C79.624 15.6021 79.3334 15.6311 79.0138 15.6457C78.6942 15.6602 78.3819 15.6674 78.0768 15.6674C77.5974 15.6674 77.1434 15.6348 76.7149 15.5694C76.2863 15.504 75.9086 15.3769 75.5817 15.1881C75.2549 14.9992 74.997 14.7304 74.8082 14.3818C74.6193 14.0331 74.5249 13.5755 74.5249 13.009V6.36275H72.6509V4.29262H74.5249V0.915039H77.6192V4.29262ZM4.96832 23.2506H7.23456V25.3208H4.96832V30.8992C4.96832 31.4222 5.05548 31.7709 5.22981 31.9452C5.40413 32.1195 5.75278 32.2067 6.27577 32.2067C6.45009 32.2067 6.61716 32.1994 6.77696 32.1849C6.93676 32.1704 7.08929 32.1486 7.23456 32.1195V34.5165C6.97307 34.5601 6.68253 34.5891 6.36293 34.6037C6.04333 34.6182 5.731 34.6255 5.42592 34.6255C4.94652 34.6255 4.49255 34.5928 4.06399 34.5274C3.63544 34.462 3.25773 34.3349 2.93087 34.1461C2.60401 33.9572 2.34615 33.6885 2.15729 33.3398C1.96844 32.9911 1.87401 32.5335 1.87401 31.967V25.3208H0V23.2506H1.87401V19.873H4.96832V23.2506ZM8.71631 18.958H11.8106V24.8197H11.876C12.2682 24.166 12.7694 23.6903 13.3796 23.3924C13.9897 23.0946 14.5853 22.9457 15.1664 22.9457C15.9945 22.9457 16.6736 23.0583 17.2038 23.2835C17.7341 23.5087 18.1517 23.821 18.4568 24.2205C18.7619 24.62 18.9762 25.1067 19.0997 25.6805C19.2231 26.2543 19.2849 26.8899 19.2849 27.5872V34.5167H16.1906V28.1537C16.1906 27.224 16.0453 26.5303 15.7548 26.0727C15.4642 25.6151 14.9485 25.3863 14.2076 25.3863C13.365 25.3863 12.7549 25.6369 12.3772 26.1381C11.9995 26.6393 11.8106 27.4637 11.8106 28.6114V34.5167H8.71631V18.958ZM29.2217 27.6743C29.0764 26.8899 28.8185 26.2943 28.4481 25.8875C28.0777 25.4807 27.5147 25.2773 26.7593 25.2773C26.2654 25.2773 25.855 25.3609 25.5281 25.5279C25.2013 25.695 24.9398 25.902 24.7437 26.149C24.5475 26.3959 24.4095 26.6574 24.3296 26.9334C24.2497 27.2095 24.2025 27.4564 24.188 27.6743H29.2217ZM24.1881 29.6356C24.2316 30.638 24.4859 31.3643 24.9507 31.8147C25.4156 32.265 26.0839 32.4902 26.9555 32.4902C27.5802 32.4902 28.1177 32.334 28.568 32.0217C29.0184 31.7094 29.2944 31.3789 29.3961 31.0302H32.1199C31.6841 32.3812 31.0159 33.3473 30.1152 33.9284C29.2145 34.5095 28.1249 34.8 26.8465 34.8C25.9604 34.8 25.1614 34.6584 24.4495 34.3751C23.7377 34.0918 23.1348 33.6887 22.6409 33.1657C22.147 32.6427 21.7656 32.0181 21.4969 31.2917C21.2281 30.5653 21.0938 29.7663 21.0938 28.8947C21.0938 28.0521 21.2318 27.2677 21.5078 26.5413C21.7838 25.8149 22.176 25.1866 22.6845 24.6564C23.1929 24.1261 23.7994 23.7085 24.504 23.4034C25.2086 23.0983 25.9894 22.9458 26.8465 22.9458C27.8053 22.9458 28.6406 23.131 29.3525 23.5015C30.0643 23.8719 30.649 24.3695 31.1066 24.9941C31.5643 25.6188 31.8948 26.3306 32.0981 27.1296C32.3015 27.9286 32.3742 28.764 32.316 29.6356H24.1881ZM40.2915 18.958H43.3858V34.5167H40.2915V18.958ZM45.3687 26.7156C45.4123 25.9893 45.5938 25.3864 45.9134 24.907C46.233 24.4276 46.6398 24.0426 47.1337 23.7521C47.6277 23.4615 48.1833 23.2545 48.8007 23.131C49.4181 23.0075 50.0392 22.9458 50.6639 22.9458C51.2304 22.9458 51.8042 22.9858 52.3853 23.0657C52.9664 23.1456 53.4967 23.3017 53.9761 23.5342C54.4555 23.7666 54.8477 24.0898 55.1528 24.5038C55.4578 24.9179 55.6104 25.4663 55.6104 26.1491V32.0108C55.6104 32.5193 55.6394 33.0059 55.6975 33.4708C55.7556 33.9357 55.8573 34.2843 56.0026 34.5167H52.8647C52.8066 34.3424 52.7594 34.1645 52.7231 33.9829C52.6868 33.8013 52.6613 33.6161 52.6468 33.4272C52.1529 33.9357 51.5718 34.2916 50.9036 34.495C50.2353 34.6983 49.5525 34.8 48.8552 34.8C48.3177 34.8 47.8165 34.7347 47.3516 34.6039C46.8868 34.4732 46.48 34.2698 46.1314 33.9938C45.7827 33.7177 45.5103 33.3691 45.3142 32.9478C45.1181 32.5265 45.02 32.0253 45.02 31.4442C45.02 30.805 45.1326 30.2784 45.3578 29.8644C45.583 29.4504 45.8735 29.1199 46.2294 28.8729C46.5853 28.626 46.9921 28.4407 47.4497 28.3172C47.9073 28.1938 48.3685 28.0957 48.8334 28.0231C49.2983 27.9504 49.7559 27.8923 50.2062 27.8487C50.6566 27.8052 51.0561 27.7398 51.4047 27.6526C51.7534 27.5655 52.0294 27.4384 52.2328 27.2713C52.4362 27.1042 52.5306 26.8609 52.5161 26.5413C52.5161 26.2072 52.4616 25.942 52.3526 25.7459C52.2437 25.5498 52.0984 25.3973 51.9168 25.2883C51.7352 25.1794 51.5246 25.1067 51.2849 25.0704C51.0452 25.0341 50.7873 25.0159 50.5113 25.0159C49.9012 25.0159 49.4218 25.1467 49.0731 25.4082C48.7245 25.6697 48.5211 26.1055 48.463 26.7156H45.3687ZM52.516 29.0034C52.3853 29.1196 52.2218 29.2104 52.0257 29.2758C51.8296 29.3412 51.619 29.3957 51.3938 29.4392C51.1686 29.4828 50.9325 29.5191 50.6856 29.5482C50.4386 29.5772 50.1917 29.6136 49.9447 29.6571C49.7123 29.7007 49.4835 29.7588 49.2583 29.8315C49.0331 29.9041 48.837 30.0022 48.6699 30.1256C48.5029 30.2491 48.3685 30.4053 48.2668 30.5942C48.1651 30.783 48.1143 31.0227 48.1143 31.3132C48.1143 31.5893 48.1651 31.8217 48.2668 32.0106C48.3685 32.1994 48.5065 32.3483 48.6808 32.4573C48.8551 32.5662 49.0585 32.6425 49.291 32.6861C49.5234 32.7297 49.7631 32.7514 50.0101 32.7514C50.6202 32.7514 51.0923 32.6498 51.4265 32.4464C51.7606 32.243 52.0076 31.9997 52.1674 31.7164C52.3272 31.4331 52.4252 31.1462 52.4615 30.8556C52.4979 30.5651 52.516 30.3327 52.516 30.1583V29.0034ZM60.0775 30.8559C60.0775 31.19 60.1465 31.4769 60.2845 31.7166C60.4225 31.9563 60.6005 32.1524 60.8184 32.305C61.0363 32.4575 61.2869 32.5701 61.5702 32.6427C61.8535 32.7154 62.1476 32.7517 62.4527 32.7517C62.6706 32.7517 62.8994 32.7263 63.1391 32.6754C63.3788 32.6246 63.5967 32.5447 63.7928 32.4357C63.989 32.3268 64.1524 32.1815 64.2831 31.9999C64.4139 31.8183 64.4793 31.5895 64.4793 31.3135C64.4793 30.8486 64.1706 30.5 63.5531 30.2675C62.9357 30.0351 62.075 29.8027 60.9709 29.5702C60.5206 29.4685 60.0811 29.3487 59.6526 29.2107C59.224 29.0727 58.8427 28.8911 58.5086 28.6659C58.1744 28.4407 57.9057 28.1574 57.7023 27.8161C57.4989 27.4747 57.3972 27.057 57.3972 26.5631C57.3972 25.8367 57.5389 25.2411 57.8222 24.7762C58.1054 24.3114 58.4795 23.9445 58.9444 23.6758C59.4093 23.407 59.9322 23.2182 60.5133 23.1092C61.0944 23.0003 61.69 22.9458 62.3002 22.9458C62.9103 22.9458 63.5023 23.0039 64.0761 23.1201C64.65 23.2363 65.162 23.4325 65.6124 23.7085C66.0627 23.9845 66.4368 24.3513 66.7346 24.8089C67.0324 25.2665 67.2104 25.844 67.2685 26.5413H64.3267C64.2831 25.9457 64.058 25.5425 63.6512 25.3319C63.2444 25.1213 62.7651 25.0159 62.213 25.0159C62.0387 25.0159 61.8498 25.0268 61.6464 25.0486C61.4431 25.0704 61.2578 25.1176 61.0908 25.1903C60.9237 25.2629 60.7821 25.3682 60.6659 25.5062C60.5496 25.6442 60.4915 25.8295 60.4915 26.0619C60.4915 26.3379 60.5932 26.5631 60.7966 26.7374C61 26.9117 61.2651 27.0534 61.592 27.1623C61.9188 27.2713 62.2929 27.3693 62.7142 27.4565C63.1355 27.5437 63.564 27.6381 63.9999 27.7398C64.4502 27.8415 64.8897 27.965 65.3182 28.1102C65.7468 28.2555 66.1281 28.448 66.4622 28.6877C66.7964 28.9274 67.0651 29.2252 67.2685 29.5811C67.4719 29.937 67.5736 30.3765 67.5736 30.8995C67.5736 31.6404 67.4247 32.2614 67.1269 32.7626C66.829 33.2638 66.4404 33.6669 65.961 33.972C65.4816 34.277 64.9332 34.4913 64.3158 34.6148C63.6984 34.7383 63.0701 34.8 62.4309 34.8C61.7772 34.8 61.138 34.7347 60.5133 34.6039C59.8887 34.4732 59.333 34.2553 58.8463 33.9502C58.3597 33.6451 57.9602 33.242 57.6478 32.7408C57.3355 32.2396 57.1648 31.6113 57.1357 30.8559H60.0775ZM72.9776 23.2506H75.2438V25.3208H72.9776V30.8992C72.9776 31.4222 73.0648 31.7709 73.2391 31.9452C73.4134 32.1195 73.7621 32.2067 74.285 32.2067C74.4594 32.2067 74.6264 32.1994 74.7862 32.1849C74.946 32.1704 75.0986 32.1486 75.2438 32.1195V34.5165C74.9824 34.5601 74.6918 34.5891 74.3722 34.6037C74.0526 34.6182 73.7403 34.6255 73.4352 34.6255C72.9558 34.6255 72.5018 34.5928 72.0733 34.5274C71.6447 34.462 71.267 34.3349 70.9401 34.1461C70.6133 33.9572 70.3554 33.6885 70.1666 33.3398C69.9777 32.9911 69.8833 32.5335 69.8833 31.967V25.3208H68.0093V23.2506H69.8833V19.873H72.9776V23.2506ZM76.5293 31.1611H79.9505V34.5169H76.5293V31.1611Z"
                        fill="white" />
                </svg>
            </a>
        </div>
    </div>
</section>
<div class="modals" data-modals>

    <div class="modal modal_mobile-video" data-modal="mobile-video">
        <div class="modal__outer">
            <div class="modal__overlay"></div>
            <div class="modal__inner">
                <div class="modal__content">
                    <button class="modal__close" data-modal-close></button>
                    <video class="mobile-video" controls>
                        <source src="" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal_video" data-modal="video-poster-1">
        <div class="modal__outer">
            <div class="modal__overlay" data-modal-close></div>
            <div class="modal__inner">
                <div class="modal__content">
                    <div class="video">
                        <button class="modal__close" data-modal-close></button>
                        <div class="custom-video video__custom-video">
                            <video class="custom-video__video" preload="metadata" data-custom-video>
                                <source
                                    src="https://yodezeen.com/wp-content/uploads/2021/09/State-of-art-Edition-Video_2.mp4"
                                    type="video/mp4">
                            </video>
                            <div class="custom-video__controls">
                                <button class="custom-video__button">
                                    <div class="custom-video__sign custom-video__sign_play">
                                        <svg width="16" height="18" viewBox="0 0 16 18" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Canvas" fill="none">
                                                <g id="Vector">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M 14.4262 7.72468L 2.44832 0.177888C 2.09422 -0.0329294 1.65452 0.002194 1.32244 0.002194C -0.00589223 0.002194 4.2024e-07 1.02775 4.2024e-07 1.28757L 4.2024e-07 16.7124C 4.2024e-07 16.932 -0.00581474 17.9978 1.32244 17.9978C 1.65452 17.9978 2.0943 18.0328 2.44832 17.8221L 14.4262 10.2753C 15.4093 9.69034 15.2394 8.99997 15.2394 8.99997C 15.2394 8.99997 15.4094 8.3096 14.4262 7.72468Z"
                                                        fill="white" />
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="custom-video__sign custom-video__sign_pause">
                                        <svg width="16" height="18" viewBox="0 0 16 18" version="1.1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g id="Canvas" fill="none">
                                                <g id="music-player-pause-lines">
                                                    <g id="Pause">
                                                        <g id="Vector">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M 4.84613 0L 1.38459 0C 0.619884 0 1.29846e-08 0.619962 1.29846e-08 1.38459L 1.29846e-08 16.6154C 1.29846e-08 17.3801 0.619884 18 1.38459 18L 4.84613 18C 5.61083 18 6.23071 17.3801 6.23071 16.6154L 6.23071 1.38459C 6.23064 0.619962 5.61075 0 4.84613 0ZM 13.8461 0L 10.3845 0C 9.61977 0 8.99988 0.619962 8.99988 1.38459L 8.99988 16.6154C 8.99988 17.3801 9.61977 18 10.3845 18L 13.8461 18C 14.6108 18 15.2307 17.3801 15.2307 16.6154L 15.2307 1.38459C 15.2308 0.619962 14.6108 0 13.8461 0Z"
                                                                fill="white" />
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </button>
                                <button class="custom-video__progress">
                                    <canvas class="custom-video__canvas"></canvas>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" data-modal="navigation">
        <div class="modal__outer">
            <div class="modal__overlay"></div>
            <div class="modal__inner">
                <div class="modal__content">
                    <div class="navigation">
                        <div class="navigation__bg">
                            <span data-split-letters-big="500" data-nav-bg>
                                Menu
                            </span>
                        </div>
                        <div class="navigation__inner">
                            <div class="navigation__column">
                                <div class="contact contact_for-nav navigation__contact">
                                    <div class="contact__inner">
                                        <div class="contact__list">
                                            <div class="contact__row">
                                                <div class="card contact__card">
                                                    <h4 class="h4 card__h4">
                                                        General Inquiries:
                                                    </h4>
                                                    <a href="mailto:info@yodezeen.com" class="card__info">
                                                        info@yodezeen.com </a>
                                                </div>
                                                <div class="card contact__card">
                                                    <h4 class="h4 card__h4">
                                                        PR&Collaborations:
                                                    </h4>
                                                    <a href="mailto:pr@yodezeen.com" class="card__info">
                                                        pr@yodezeen.com </a>
                                                </div>
                                                <div class="card contact__card">
                                                    <h4 class="h4 card__h4">
                                                        Careers:
                                                    </h4>
                                                    <a href="mailto:hr@yodezeen.com" class="card__info">
                                                        hr@yodezeen.com </a>
                                                </div>
                                            </div>
                                            <div class="contact__row">
                                            </div>
                                        </div>
                                        <div class="text contact__text">
                                            <p>
                                                For each project the approach rests on a careful understanding of the
                                                space, or the site’s.
                                            </p>
                                        </div>
                                        <button class="button button_white contact__button" data-btn-in-nav
                                            data-modal-open="contact">
                                            <span class="button__text">
                                                Send request
                                            </span>
                                            <svg class="button__svg" height="100%" width="100%"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect class="button__shape" height="100%" width="100%"></rect>
                                            </svg></button>
                                    </div>
                                </div>
                            </div>
                            <div class="navigation__column">
                                <div class="menu-panel navigation__menu-panel">
                                    <a href="/projects" class="menu-panel__item">
                                        <span>
                                            Projects
                                        </span>
                                    </a>
                                    <a href="/about-us" class="menu-panel__item">
                                        <span>
                                            About
                                        </span>
                                    </a>
                                    <a href="/media" class="menu-panel__item">
                                        <span>
                                            Media
                                        </span>
                                    </a>
                                    <a href="/blog" class="menu-panel__item">
                                        <span>
                                            Blog
                                        </span>
                                    </a>
                                    <a href="/career" class="menu-panel__item">
                                        <span>
                                            Careers
                                        </span>
                                    </a>
                                    <a href="/contacts" class="menu-panel__item">
                                        <span>
                                            Contact
                                        </span>
                                    </a>
                                </div>
                                <div class="search search_for-panel navigation__search">
                                    <form class="search__form" method="GET" action="/search">
                                        <input type="text" class="search__input" name="request" placeholder="Search">
                                        <button class="search__button">
                                            <svg class="search__svg" width="16" height="16" viewbox="0 0 16 16"
                                                version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <desc>Created using Figma</desc>
                                                <g transform="translate(-303 731)">
                                                    <g>
                                                        <use xlink:href="#path0_fill-1" transform="translate(303 -731)"
                                                            fill="#FFFFFF"></use>
                                                    </g>
                                                </g>
                                                <defs>
                                                    <path id="path0_fill-1"
                                                        d="M 6.22606 12.4521C 7.74461 12.4521 9.12511 11.9137 10.2019 11.0026L 15.0336 15.8343C 15.1441 15.9448 15.2821 16 15.434 16C 15.5858 16 15.7239 15.9448 15.8343 15.8343C 16.0552 15.6135 16.0552 15.2545 15.8343 15.0336L 11.0026 10.2019C 11.8999 9.12511 12.4521 7.7308 12.4521 6.22606C 12.4521 2.78861 9.6635 -9.80904e-16 6.22606 -9.80904e-16C 2.80242 -1.96181e-15 0 2.80242 0 6.22606C 0 9.6635 2.80242 12.4521 6.22606 12.4521ZM 6.22606 1.13201C 9.04228 1.13201 11.3201 3.42364 11.3201 6.22606C 11.3201 9.04228 9.04228 11.3201 6.22606 11.3201C 3.40984 11.3201 1.13201 9.02847 1.13201 6.22606C 1.13201 3.42364 3.42364 1.13201 6.22606 1.13201Z">
                                                    </path>
                                                </defs>
                                            </svg></button>
                                    </form>
                                </div>
                                <div class="share share_for-panel navigation__share">
                                    <a href="https://www.behance.net/yodezeen" target="_blank"
                                        class="share__socnetwork">
                                        <span class="share__icon socicon socicon-behance"></span>
                                    </a>
                                    <a href="https://www.facebook.com/Yodezeen" target="_blank"
                                        class="share__socnetwork">
                                        <span class="share__icon socicon socicon-facebook"></span>
                                    </a>
                                    <a href="https://www.instagram.com/yodezeen_architects/" target="_blank"
                                        class="share__socnetwork">
                                        <span class="share__icon socicon socicon-instagram"></span>
                                    </a>
                                    <a href="https://pinterest.com/yodezeen/" target="_blank" class="share__socnetwork">
                                        <span class="share__icon socicon socicon-pinterest"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" data-modal="vacancy">
        <div class="modal__outer">
            <div class="modal__overlay" data-modal-close></div>
            <div class="modal__inner">
                <div class="modal__content">
                    <div class="request">
                        <button class="modal__close" data-modal-close></button>
                        <h2 class="request__h2">
                            We are waiting for you in our team!
                        </h2>

                        <form action="{{ route('applied_job') }}" method="POST" data-success-id="thank"
                            data-error-id="error" class="form request__form" data-form enctype="multipart/form-data">
                            @csrf

                            <div class="form__row">
                                <div class="form__column">

                                    <div class="fieldset">
                                        <div class="label">Name</div>
                                        <div class="fieldset__focus">
                                            <input type="text" name="username" data-field-name="username" class="input"
                                                data-required>
                                        </div>
                                        <div class="error">
                                            enter correct Name
                                        </div>
                                    </div>

                                    <div class="fieldset">
                                        <div class="label">E-mail</div>
                                        <div class="fieldset__focus">
                                            <input type="text" name="email" data-field-name="email" class="input"
                                                data-required>
                                        </div>
                                        <div class="error">
                                            enter correct E-mail
                                        </div>
                                    </div>

                                    <div class="fieldset">
                                        <div class="label">Phone</div>
                                        <div class="fieldset__focus">
                                            <input type="text" data-field-name="phone" name="phone" class="input"
                                                data-required>
                                        </div>
                                        <div class="error">
                                            enter correct Phone
                                        </div>
                                    </div>

                                </div>
                                <div class="form__column">

                                    <div class="fieldset">
                                        <div class="label">Vacancy</div>
                                        <div class="custom-select" data-custom-select="vacancy">
                                            <select name="vacancy">
                                                @foreach($careers as $key => $career)
                                                <option value="{{ $career->id }}">{{ $career->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="fieldset">
                                        <div class="label">Message</div>
                                        <div class="fieldset__focus">
                                            <textarea type="text" name="message" data-field-name="message" class="input"
                                                data-required></textarea>
                                        </div>
                                        <div class="error">
                                            enter correct Message
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form__row">
                                <div class="form__column">

                                    <div class="fieldset fieldset_portfolio">
                                        <div class="label">Portfolio link</div>
                                        <div class="fieldset__focus">
                                            <input type="text" name="portfolio" data-field-name="name" class="input"
                                                data-required>
                                        </div>
                                        <div class="error">
                                            enter correct Link
                                        </div>
                                    </div>

                                </div>
                                <div class="form__column">

                                    <div class="upload" data-upload>
                                        <div class="upload__select">or upload a resume</div>
                                        <input type="file" class="upload__input" data-field-name="file" name="file"
                                            onchange="uploadCtrl.getName(this.value);">
                                    </div>

                                    <div class="result upload__result" data-result>
                                        <div class="result__icon">
                                            <svg width="11" height="16" viewbox="0 0 11 16" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <desc>Created using Figma</desc>
                                                <g id="Canvas" transform="translate(310 6448)">
                                                    <g id="Vector">
                                                        <use xlink:href="#path01234_fill"
                                                            transform="translate(-310 -6448)" fill="#828282"></use>
                                                    </g>
                                                </g>
                                                <defs>
                                                    <path id="path01234_fill"
                                                        d="M 8.40281 0L 0.912482 0C 0.409546 0 1.64071e-08 0.440609 1.64071e-08 0.981213L 1.64071e-08 15.0187C 1.64071e-08 15.5601 0.409546 16 0.912482 16L 10.0875 16C 10.5908 16 11 15.5601 11 15.0187L 11 3.03398L 8.40281 0ZM 8.61818 1.46827L 9.75656 2.79839L 8.61818 2.79839L 8.61818 1.46827ZM 10.2336 15.0187C 10.2336 15.1051 10.1678 15.1761 10.087 15.1761L 0.912482 15.1761C 0.831837 15.1761 0.766405 15.1051 0.766405 15.0187L 0.766405 0.981213C 0.766405 0.89458 0.831837 0.82437 0.912482 0.82437L 7.8514 0.82437L 7.8514 3.21054C 7.8514 3.43773 8.02353 3.62191 8.23498 3.62191L 10.2336 3.62191L 10.2336 15.0187ZM 2.11835 4.38229L 8.62637 4.38229C 8.78491 4.38229 8.9135 4.52053 8.9135 4.69098C 8.9135 4.86142 8.78491 4.99967 8.62637 4.99967L 2.11835 4.99967C 1.95984 4.99967 1.83123 4.86142 1.83123 4.69098C 1.83123 4.52057 1.95984 4.38229 2.11835 4.38229ZM 8.9135 6.76537C 8.9135 6.93578 8.78491 7.07406 8.62637 7.07406L 2.11835 7.07406C 1.95984 7.07406 1.83123 6.93581 1.83123 6.76537C 1.83123 6.59492 1.95984 6.45668 2.11835 6.45668L 8.62637 6.45668C 8.78491 6.45668 8.9135 6.59496 8.9135 6.76537ZM 8.9135 8.77182C 8.9135 8.94227 8.78491 9.08051 8.62637 9.08051L 2.11835 9.08051C 1.95984 9.08051 1.83123 8.94227 1.83123 8.77182C 1.83123 8.60138 1.95984 8.46313 2.11835 8.46313L 8.62637 8.46313C 8.78491 8.46313 8.9135 8.60138 8.9135 8.77182ZM 8.9135 10.8124C 8.9135 10.9829 8.78491 11.1211 8.62637 11.1211L 2.11835 11.1211C 1.95984 11.1211 1.83123 10.9829 1.83123 10.8124C 1.83123 10.642 1.95984 10.5038 2.11835 10.5038L 8.62637 10.5038C 8.78491 10.5038 8.9135 10.642 8.9135 10.8124Z">
                                                    </path>
                                                </defs>
                                            </svg>
                                        </div>
                                        <div class="result__name" data-upload-filename></div>
                                        <button class="result__close" data-result-close></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button button_active button_hover button_white form__button" data-button
                                data-test>
                                <span class="button__text">
                                    Send request
                                </span>
                                <svg class="button__svg" height="100%" width="100%" xmlns="http://www.w3.org/2000/svg">
                                    <rect class="button__shape" height="100%" width="100%"></rect>
                                </svg></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" data-modal="contact">
        <div class="modal__outer">
            <div class="modal__overlay" data-modal-close></div>
            <div class="modal__inner">
                <div class="modal__content">
                    <div class="request">
                        <button class="modal__close" data-modal-close></button>
                        <h2 class="request__h2">
                            Don't hesitate to contact us
                        </h2>

                        <form action="{{ route('contact_us') }}" method="POST" data-success-id="thank"
                            data-error-id="error" class="form request__form" data-form>
                            @csrf
                            <div class="form__row">
                                <div class="form__column">

                                    <div class="fieldset">
                                        <div class="label">Name</div>
                                        <div class="fieldset__focus">
                                            <input type="text" name="username" data-field-name="username" class="input"
                                                data-required>
                                        </div>
                                        <div class="error">
                                            enter correct Name
                                        </div>
                                    </div>

                                    <div class="fieldset">
                                        <div class="label">E-mail</div>
                                        <div class="fieldset__focus">
                                            <input type="text" name="email" data-field-name="email" class="input"
                                                data-required>
                                        </div>
                                        <div class="error">
                                            enter correct E-mail
                                        </div>
                                    </div>

                                    <div class="fieldset">
                                        <div class="label">Phone</div>
                                        <div class="fieldset__focus">
                                            <input type="text" data-field-name="phone" name="phone" class="input"
                                                data-required>
                                        </div>
                                        <div class="error">
                                            enter correct Phone
                                        </div>
                                    </div>

                                </div>
                                <div class="form__column">

                                    <div class="fieldset">
                                        <div class="label">Your city</div>
                                        <div class="custom-select" data-custom-select="city">
                                            <select name="city">

                                                <option value="Islamabad">
                                                    Islamabad
                                                </option>
                                                <option value="Lahore" selected>
                                                    Lahore
                                                </option>

                                                <!--<option value="Moscow">
                                                    Moscow
                                                </option>-->
                                            </select>
                                        </div>
                                    </div>

                                    <div class="fieldset">
                                        <div class="label">Message</div>
                                        <div class="fieldset__focus">
                                            <textarea type="text" name="message" data-field-name="message" class="input"
                                                data-required></textarea>
                                        </div>
                                        <div class="error">
                                            enter correct Message
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <button
                                class="button button_active button_hover button_white form__button form__button_margin"
                                data-button>
                                <span class="button__text">
                                    Send request
                                </span>
                                <svg class="button__svg" height="100%" width="100%" xmlns="http://www.w3.org/2000/svg">
                                    <rect class="button__shape" height="100%" width="100%"></rect>
                                </svg></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modals__modal" data-modal="error">
        <div class="modal__outer">
            <div class="modal__overlay" data-modal-close></div>
            <div class="modal__inner">
                <div class="modal__content">
                    <div class="thank">
                        <button class="modal__close" data-modal-close></button>
                        <div class="thank__content">
                            <div class="thank__bg">
                                <span>
                                    Error
                                </span>
                            </div>
                            <h2 class="h2 thank__h2">
                                Error!
                            </h2>
                            <div class="text thank__text">
                                Something went wrong.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modals__modal" data-modal="thank">
        <div class="modal__outer">
            <div class="modal__overlay" data-modal-close></div>
            <div class="modal__inner">
                <div class="modal__content">
                    <div class="thank">
                        <button class="modal__close" data-modal-close></button>
                        <div class="thank__content">
                            <div class="thank__bg">
                                <span>
                                    Thanks
                                </span>
                            </div>
                            <h2 class="h2 thank__h2">
                                Thanks you for your message!
                            </h2>
                            <div class="text thank__text">
                                We will reply to you as soon as possible.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection