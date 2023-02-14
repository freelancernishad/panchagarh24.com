<template>
    <div>


        <section class="header_top_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <small class="date">
                            <i class="fa fa-map-marker"  style="color: #7c7c7c;"></i> পঞ্চগড় &nbsp;&nbsp;<i class="fa fa-calendar" style="color: #7c7c7c;"> </i>
                            {{ dateTime }}
                        </small>
                    </div>

                    <div class="col-sm-3">

                        <!-- <form role="search" method="get" id="searchform" class="searchform d-flex"
                            action="https://shamolynews24.com">
                            <div class="col-xs-10 col-sm-11" style="padding:0 !important">
                                <input class="form-control" value="" name="s" id="s" placeholder="কী খুঁজতে চান ?"
                                    type="text">
                                <input type="hidden" name="post_type" value="post">
                            </div>
                            <div class="col-xs-2 col-sm-1" style="padding:0 !important">
                                <input name="post_type" value="post" type="hidden">
                                <button class="search_submit_button form-control" id="searchsubmit" value="অনুসন্ধান"
                                    type="submit">
                                    <i class="fa fa-search srch_btn"></i>
                                </button>
                            </div>
                        </form> -->

                    </div>

                    <div class="col-sm-2">
                        <ul class="social-media">

                            <!-- <li><a href="" target="_blank" title="iPhone/Mac"><i style="background: #cd171e;"
                                        class="fa fa-camera"></i></a></li>

                            <li><a href="#" target="_blank" title="Youtube" style=""><i style="background: #cd171e;"
                                        class="fa fa-video-camera"></i></a></li>


                            <li><a href="#" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank" title="Google Plus"><i class="fa fa-google-plus"></i></a>
                            </li> -->


                            <!--<li><a href="" target="_blank" title="Android"><i class="fa fa-android"></i></a></li>
							<li><a href="" target="_blank" title="iPhone/Mac"><i class="fa fa-apple"></i></a></li>
							<li><a href="" target="_blank" title="RSS"><i class="fa fa-rss"></i></a></li>
							<li class="sr-only"><a href="" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
        <div class="scroll width100" style="    margin: 10px 0px;">
            <div class="padding">
                <div class="scroll-parent">
                    <span class="title">সংবাদ শিরোনাম</span>
                    <div class="scroll-cont">
                        <marquee style="width: 100%;background: #152437;" align="top" onmouseout="this.start();"
                            onmouseover="this.stop();" scrollamount="1" scrolldelay="10" behavior="scroll"
                            direction="left" truespeed="truespeed">

                            <router-link
                                :to="{ name: 'readPost', params: { id: featured_post.id, slug: featured_post.slug } }"
                                v-for="(featured_post, index) in getlatestpost" :key="'marq' + index"> ◈ {{
                                    featured_post.title
                                }}</router-link>

                        </marquee>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <div class="body-items" style="background: #f9f9f9">

            <div class="container d-none d-print">
                <img class="print-logo" style="max-width: 250px;"
                :src="$asseturl + 'cropped-cropped-Alokitotetulia.png.png'" alt="alokitotetulia.com" />
            </div>

            <div class="container d-none d-lg-flex py-3 navbar-root" id="section-down"
                style="padding-top: 5px !important;">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <router-link class="brand-logo-top" title="" to="/" style="border: 2px solid #006328;padding: 7px;">
                        <img style="max-width: 300px;" :src="$asseturl + 'logo.jpeg'"
                            alt="" />
                    </router-link>


                    <div class="d-flex align-items-center social-media-icons">
                        <p class="d-flex align-items-center" style="    margin-left: 70px;margin-top: 7px;">
                            <img :src="$asseturl+'softwebad.jpeg'" width="100%" />
                        </p>
                    </div>

                    <div class="d-flex align-items-center social-media-icons">
                        <p class="d-flex align-items-center" style="    margin-left: 70px;margin-top: 7px;">
                            <img :src="$asseturl+'logo2.jpeg'" width="143px" />
                        </p>
                    </div>

                </div>
            </div>



            <nav class="container navbar navbar-expand-lg sticky-top shadow-sm navigator-extra">
                <!-- <div class="container"> -->

                    <button class="navbar-toggler collapsed m-margin-reducer-left-14" type="button" @click="openMenu"
                        data-toggle="collapse" data-target="#main-nav-1" aria-controls="main-nav-1"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                        <span class="sr-only">AL</span>
                    </button>



                    <div class="navbar-brand align-items-center d-flex d-lg-none mr-0">
                        <a title="" href="/">
                            <img :src="$asseturl + 'cropped-cropped-Alokitotetulia.png.png'" alt=""
                                width="1345" height="192" />
                        </a>
                    </div>
                    <span></span>

                    <!-- <button type="button" class="btn btn-link d-flex d-lg-none" data-target="slide-down-m"
                        aria-label="Search" style="margin-right: -14px;">
                        <i class="fa fa-search" style="font-size: 20px;"></i></button> -->
<!--
                        <div class="mobileMenu">
                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-6">menu 1</div>
                                <div class="col-md-4 col-sm-6 col-6">menu 1</div>
                                <div class="col-md-4 col-sm-6 col-6">menu 1</div>
                                <div class="col-md-4 col-sm-6 col-6">menu 1</div>
                                <div class="col-md-4 col-sm-6 col-6">menu 1</div>
                                <div class="col-md-4 col-sm-6 col-6">menu 1</div>
                                <div class="col-md-4 col-sm-6 col-6">menu 1</div>
                                <div class="col-md-4 col-sm-6 col-6">menu 1</div>
                                <div class="col-md-4 col-sm-6 col-6">menu 1</div>
                            </div>
                        </div> -->











                    <div class="navbar-collapse collapse" id="main-nav-1">
                        <div style="width: 99%">
                            <ul class="navbar-nav m-auto d-none d-lg-flex d-menu-items justify-content-center">
                                <li class="nav-item">
                                    <router-link title="" to="/" class="nav-link">প্রচ্ছদ</router-link>
                                </li>
                                <li v-for="(menu, index) in menus" :key="index" class="nav-item"
                                    :class="[menu.subCategoies.length ? ' dropdown dropdown-toggle' : '']"
                                    style="display: flex; color: #FFF; align-items: center;">
                                    <router-link title="" :to="{ name: 'categoryPost', params: { cat: menu.slug } }"
                                        class="nav-link">{{ menu.name }}</router-link>
                                    <div class="dropdown-menu single-dropdown s-dr-menu m-0" aria-labelledby="navbarDropdown">
                                        <router-link class="dropdown-item" v-for="(Submenu, index2) in menu.subCategoies" :key="index2"
                                            :to="{ name: 'categoryPost2', params: { cat: menu.slug, cat2: Submenu.slug } }"
                                            style="padding: 5px 0;">{{ Submenu.name }}</router-link>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex d-lg-none"
                            style="position: fixed; padding: 1rem; background: #f5f5f5; width: 100%; color: #FFF; justify-content:space-between">
                            <button class="navbar-toggler m-margin-reducer-left-14 text-white" type="button"
                                data-toggle="collapse" data-target="#main-nav-1" aria-controls="main-nav-1"
                                aria-expanded="true" aria-label="Toggle navigation" style=" ">
                                <span class="icon-bar top-bar"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>
                                <span class="sr-only">AL</span>
                            </button>
                        </div>
                    </div>

            </nav>





            <slot></slot>

        </div>



        <div class="container">


<!--

            <nav class="navbar navbar-expand-lg sticky-top shadow-sm navigator-extra">
                <div class="container">
                    <button class="navbar-toggler collapsed m-margin-reducer-left-14" type="button"
                        data-toggle="collapse" data-target="#main-nav-1" aria-controls="main-nav-1"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                        <span class="sr-only">DP</span>
                    </button>
                    <div class="navbar-brand align-items-center d-flex d-lg-none mr-0">
                        <a title="Dhaka Post" href="/">
                            <img :src="$asseturl + 'cropped-cropped-Alokitotetulia.png.png'" alt="Dhaka Post"
                                width="1345" height="192" />
                        </a>
                    </div>
                    <button type="button" class="btn btn-link d-flex d-lg-none" data-target="slide-down-m"
                        aria-label="Search" style="margin-right: -14px;">
                        <i class="fa fa-search" style="font-size: 20px;"></i></button>
                    <div class="navbar-collapse collapse" id="main-nav-1">
                        <div style="width: 99%">
                            <ul class="navbar-nav m-auto d-none d-lg-flex d-menu-items justify-content-center">
                                <li class="nav-item">
                                    <router-link title="" to="/" class="nav-link">প্রচ্ছদ</router-link>
                                </li>
                                <li v-for="(menu, index) in menus" :key="index" class="nav-item"
                                    :class="[menu.subCategoies.length ? ' dropdown dropdown-toggle' : '']"
                                    style="display: flex; color: #FFF; align-items: center;">
                                    <router-link title="" :to="{ name: 'categoryPost', params: { cat: menu.slug } }"
                                        class="nav-link">{{ menu.name }}</router-link>
                                    <div class="dropdown-menu single-dropdown s-dr-menu m-0" aria-labelledby="navbarDropdown">
                                        <router-link class="dropdown-item" v-for="(Submenu, index2) in menu.subCategoies" :key="index2"
                                            :to="{ name: 'categoryPost2', params: { cat: menu.slug, cat2: Submenu.slug } }"
                                            style="padding: 5px 0;">{{ Submenu.name }}</router-link>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex d-lg-none"
                            style="position: fixed; padding: 1rem; background: #f5f5f5; width: 100%; color: #FFF; justify-content:space-between">
                            <button class="navbar-toggler m-margin-reducer-left-14 text-white" type="button"
                                data-toggle="collapse" data-target="#main-nav-1" aria-controls="main-nav-1"
                                aria-expanded="true" aria-label="Toggle navigation" style=" ">
                                <span class="icon-bar top-bar"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>
                                <span class="sr-only">DP</span>
                            </button>
                        </div>
                    </div>
                </div>
                <form class="search-wrapper needs-validation" style="display: none;" data-target="slide-content"
                    action="https://www.dhakapost.com/search" method="get">
                    <div class="container m-pl-0 m-pr-0">
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <div class="input-group">
                                <input type="text" name="q" class="form-control" autocomplete="off"
                                    placeholder="অনুসন্ধান করুন" required />
                                <div class="input-group-append search-action">
                                    <button type="submit" class="btn btn-dark"><i style="color: white !important;"
                                            class="fa fa-search"></i></button>
                                    <button type="button" class="btn btn-light m-margin-reducer-right-14"
                                        data-target="slide-up">
                                        <i class="fa fa-times"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </nav>

 -->




<!--
<footer style="    display: block;
    background: #62626263;
    width: 100%;
    overflow: hidden;
    color: #161616 !important;">
        <div class="container">
        <div class="copyright width100" style="padding-top: 30px;">
            <div class="padding row">

                <div class="col-xl-4 col-md-4 col-sm-12 footerOption mb-3">
                            <p>
                                <strong>সম্পাদক: এস.কে. দোয়েল</strong><br>
                                <strong>বার্তা সম্পাদক: মোবারক হোসাইন</strong><br>
                                <strong>মফস্বল সম্পাদক: এম আরই রতন</strong><br>


                                <hr style="margin: 6px 0;"/>
                                <strong>ই-মেইলঃ</strong> skdoyel2020@gmail.com<br>
                                <strong>ফোনঃ</strong> ০১৭৫০-১৪০৯১৯</p>
                        </div>


                        <div class="col-xl-4 col-md-6 col-sm-12 footerOption mb-3">
                            <p></p>
                            <p data-x="">
                                <strong>নিউজ রুমঃ</strong> ০১৭৫৫৪৯০৮৯৪<br>
                                <strong>বার্তা সম্পাদকঃ</strong> ০১৩০৩১৫০০৭০<br>
                                <strong>মফস্বল সম্পাদকঃ</strong>০১৭৯৪-৯৯৩৯৯৪<br>
                                <strong>ইমেইলঃ</strong> news.alokitotetulia@gmail.com<br>
                                <strong>ইমেইলঃ</strong> alokitotetulia@gmail.com</p>
                            <p></p>
                        </div>
                <div class="col-xl-4 col-md-6 col-sm-12 footerOption mb-3">
                    <div class="padding">
                        <div class="width100"><router-link to="/">
                            Developed by : <br>
                            <img width="50%" :src="$asseturl + 'syslogo.png'" ></router-link></div>
                        <div class="width100"><a href="https://www.softwebsys.com" target="_blank" rel="noopener">Softweb System Solution</a><p style="font-size:14px">Panchagarh, Bangladesh.</p>
                            <ul style="">
                                <li><a href="mailto:info@softwebsys.com"><i class="fa-solid fa-envelope"></i> info@softwebsys.com</a></li>
                                <li><a target="_blank" href="https://www.softwebsys.com"> <i class="fa-solid fa-earth-americas"></i> www.softwebsys.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> -->

<!--
<div class="jFooterBottom">
        <div class="container" style="padding: 9px 0 0px 0px;">
            <div class="row d-flex align-items-center">
                <div class="col-sm-6">
                    <p class="footerText" style="    display: flex;
    align-items: center;
    color: white;
    font-size: 13px;">
                        <i class="fa fa-copyright"></i> &nbsp; ২০২৩ সর্বস্বত্ব সংরক্ষিত  &nbsp; <a href="https://alokitotetulia.com" class="text-white">আলোকিত তেঁতুলিয়া</a>

                    </p>
                </div>
                <div class="col-sm-6 text-right">
                    <ul class="footerSocialLink">
                        <li><a href="#" title="Facebook" target="_blank" rel="nofollow noopener"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#" title="Twitter" target="_blank" rel="nofollow noopener"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="#" title="Instagram" target="_blank" rel="nofollow noopener"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#" title="Youtube" target="_blank" rel="nofollow noopener"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div> -->

    <img width="100%" :src="$asseturl+'footerimage.jpeg?ver=1.0'" alt="">
    <div class="jFooterBottom" style="padding: 10px 12px;    background: #606060 !important;">
        <div class="container" style="padding: 9px 0 0px 0px;">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 text-right"></div>
                <div class="col-md-6">
                    <p class="footerText" style="    display: flex;
    align-items: center;justify-content: end;
    color: white;
    font-size: 13px;">
                        Developed By  &nbsp; <a href="https://softwebsys.com/" class="text-white"><img :src="$asseturl+'syslogo.png'" width="80px" alt=""> </img>সফটওয়েব সিস্টেম সল্যুশন</a>

                    </p>
                </div>

            </div>
        </div>
    </div>


</div>
      <transition name="fade">
    <div id="pagetop" class="fixed right-0 bottom-0" v-show="scY > 300" @click="toTop">
      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
           stroke="#4a5568"
           stroke-width="1" stroke-linecap="square" stroke-linejoin="arcs">
        <path d="M18 15l-6-6-6 6"/>
      </svg>
    </div>
  </transition>



    </div>
</template>
<script>
export default {
    props: ['user', 'latestpost'],
    async created() {

        // console.log(this.latestpost)
        this.$store.commit('setlatestpost', this.latestpost)

        this.getMainMenu();
        this.getDateTime();

    },

    data() {
        return {
            menus: {},
            scTimer: 0,
            scY: 0,
            dateTime:''
        }
    },
    methods: {

        openMenu(){
            console.log('open menu')
        },


        async getDateTime() {
            var res = await this.callApi('get', `/api/get/date/time`, []);
            this.dateTime = res.data
        },


        async getMainMenu() {
            var res = await this.callApi('get', `/api/get/all/category`, []);
            this.menus = res.data
        },

        handleScroll: function () {
        if (this.scTimer) return;
        this.scTimer = setTimeout(() => {
          this.scY = window.scrollY;
          clearTimeout(this.scTimer);
          this.scTimer = 0;
        }, 100);
      },
      toTop: function () {
        window.scrollTo({
          top: 0,
          behavior: "smooth"
        });
      },

    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll);
    }
}
</script>
<style>

.navbar {

    z-index: 11 !important;
}

span.Headtitle {
    position: absolute;
    background: #001080;
    color: white;
    z-index: 99;
    padding: 2px 13px 2px 26px;
}

a.nav-link.router-link-exact-active.router-link-active {
    background: var(--brand-hover-color);
    border-bottom: 2px solid var(--brand-object-color);
}

.scroll-parent {
    position: relative;
}

.scroll .title {
    color: #fff;
    background: #b50301;
    float: left;
    font-size: 17px;
    height: 36px;
    line-height: 34px;
    margin: 0;
    padding-left: 8px;
    padding-right: 8px;
    position: absolute;
    z-index: 99;
    border-right: 10px solid #152437;
}

.scroll a {
    color: #fff;
    font-size: 17px;
    text-decoration: none;
    margin: 5px 0 5px 7px;
    display: inline-block;
}

.scroll a:hover {
    color: #F00;
}

.header_top_section {
    padding: 5px 0px;
    background: #FFF;
    box-shadow: 0px 5px 5px -5px #000;
}

.searchform input[type="text"] {
    border-radius: 4px 0px 0px 4px;
    height: 28px;
    background: #FFF;
    color: #363131;
    border-radius: 0;
    border: none;
}

button,
input,
select,
textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}

.search_submit_button {
    background-color: #000;
    color: #FFF;
    border-radius: 0px 4px 5px 0px;
    border: none;
    height: 26px;
    padding: 0px;
    background-color: #9c9c9c;
    margin-top: 1px;
}

.header_top_section .social-media {
    margin-bottom: 0px;
    text-align: right;
}

.social-media li {
    display: inline-block;
}

.social-media li a,
.social-media li button {
    color: #000;
    border: none;
    background: none;
    padding: 0;
}

.header_top_section .social-media li a i,
.header_top_section .social-media li button i {
    width: 20px;
    height: 20px;
    border-radius: 0;
    line-height: 20px;
    font-size: 12px;
}

.social-media li a i,
.social-media li button i {
    width: 34px;
    height: 34px;
    border-radius: 100%;
    text-align: center;
    line-height: 34px;
    color: #fff;
}

.copyright .copy {
    font-size: 12px;
}.copyright .padding {
    padding: 10px;
    float: left;
}
.copyright .right .padding div:first-child {
    width: 50%;
    float: left;
    line-height: 1.7em;
    padding-left: 18px;
    border-left: 1px solid red;
}
.copyright .right .padding div:first-child {
    width: 50%;
    float: left;
    line-height: 1.7em;
}
.copyright .right .padding div:nth-child(2) {
    width: 40%;
    float: right;
    padding-left: 5%;
    border-left: 1px solid red;
    font-size: 17px;
    line-height: 1.8em;
}
.copyright .right .padding div:nth-child(2) {
    width: 40%;
    float: right;
    padding-left: 5%;
    border-left: 1px solid black;
    font-size: 17px;
    line-height: 1.8em;
}.width33 {
    width: 33%;
    float: left;
}
.width66 {
    width: 66%;
    float: left;
}
.jFooterBottom {
    width: 100%;
    background: #2f343f;
}
.jFooterBottom ul {
    list-style: none;
    margin: 0;
    padding: 0;
}.jFooterBottom ul li {
    display: inline-block;
}.jFooterBottom ul li a {
    color: #fff;
    margin: 10px 5px;
    display: block;
}

.dropdown-menu.single-dropdown.s-dr-menu.m-0 a {
    border-bottom: 1px solid #a3a3a3;
}

.dropdown-menu.single-dropdown.s-dr-menu.m-0 a:hover {
    background: #cbcbcb;
}

nav.container.navbar.navbar-expand-lg.sticky-top.shadow-sm.navigator-extra {
    max-width: 1260px;
}
div#pagetop {
    position: fixed;
    bottom: 13px;
    right: 11px;
    background: #b1b1b1;
    color: white;
}


.footerOption {
    border-left: 3px solid #ad1818;
    line-height: 30px;
    font-size: 18px;
    padding-left: 25px;
}



@media screen and (max-width:768px) {

    .footerText{
        justify-content: center !important;
    }
    .footerSocialLink{
        text-align: center !important;
    }

}



</style>
