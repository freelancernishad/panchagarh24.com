<template>
    <div>
        <loader v-if="preloader"  object="#ff0000" color1="#ffffff" color2="#17fd3d" size="8" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="dots"></loader>
        <!-- Welcome home page <router-link to="/login">Login</router-link>-->
        <main role="main">
            <div data-nosnippet>
                <div class="container section-top mt-3">

                    <div class="row">

                        <div class="col-lg-3 col-md-6">
                            <div class="top-right m-pt-3">
                                <div class="opinion-contents" style="    border: 1px solid black;">
                                    <div class="category-header opinion-header text-center" style="background: rgb(42 42 42);">
                                        <div class="heading opinion-heading text-center">
                                            <p class="title"><a href="javascript:void(0)" class="text-white">সর্বশেষ সংবাদ</a></p>
                                        </div>
                                    </div>
                                    <div class="regular-list scaled ai-custom" style="height: 425px;overflow: auto;">
                                        <a :href="'/read/post/'+LPost.id+'/'+LPost.title"
                                            v-for="(LPost, Pindex) in posts.latestPost" :key="'Lpost' + Pindex"
                                            class="news-item news-item-regular py-2 d-flex">
                                            <img style="width: 83px;height: 70px;margin-right: 8px;padding-left: 7px;"
                                                :src="$asseturl + LPost.fiture" v-if="LPost.fiture" :alt="LPost.title"
                                                class="lazyload img-loader">
                                            <img style="width: 83px;height: 70px;margin-right: 8px;padding-left: 7px;"
                                                v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"
                                                :alt="LPost.title" class="lazyload img-loader">
                                            <div class="d-flex flex-column" style="">
                                                {{ LPost.title }}
                                            </div>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="col-lg-6 col-md-12 top-left-section lead-top m-order-0">
                            <carousel :autoplay="true" :nav="false" :dots="false" :items="1" style="position:relative">
                                <template slot="prev"><span class="prev"><i
                                            class="fa-solid fa-chevron-left"></i></span></template>
                                <div class="box item" :id="'owlItem'+index" v-for="(featured_post, index) in getlatestpost"
                                    :key="'Fpost' + index">
                                    <a :href="'/read/post/'+featured_post.id+'/'+featured_post.title">
                                        <div class="carousel-caption"> {{ featured_post.title }}</div>
                                        <img class="img-responsive cover_image" :src="$asseturl + featured_post.fiture"
                                            v-if="featured_post.fiture" width="600" height="364" alt="">
                                        <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg":alt="featured_post.title" class="img-responsive cover_image">
                                        <div class="overlay"></div>
                                        <div class="overlay-info">
                                            <div class="info">
                                                <p><span class="ion-android-data"></span>8th January 2023<span
                                                        class="ion-chatbubbles"></span>351</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <template slot="next"><span class="next"><i
                                            class="fa-solid fa-chevron-right"></i></span></template>

                                <template slot="owl-dot"><button role='button' class='owl-dot'></button></template>

                            </carousel>

                            <div class="dots" style="display: flex;width: 98%;;overflow: auto;">
                                <div class="navDotsImage" @click="slidernavChange(getlatestpost.length,index)" v-for="(featured_post, index) in getlatestpost"  :key="'slide'+index">
                                    <img style="height:100px;width:100px" :src="$asseturl + featured_post.fiture" v-if="featured_post.fiture"/>
                                    <img style="height:100px;width:100px" v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg":alt="featured_post.title" class="img-responsive cover_image"/>
                                </div>
                            </div>

                            <!--
                            <div class="row">
                                <div class="col-12 lead-news" v-for="(featured_post, index) in posts.featured_post"
                                    :key="'Fpost' + index" v-if="index==0">
                                    <a :href="'/read/post/'+featured_post.id+'/'+featured_post.title" class="news-item news-item-lead">
                                        <div class="image-container">
                                            <img :src="$asseturl + featured_post.fiture" v-if="featured_post.fiture"
                                                :alt="featured_post.title" class="lazyload img-loader">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"
                                                :alt="featured_post.title" class="lazyload img-loader">
                                        </div>
                                        <h2 class="title" style="margin: 10px 0">
                                            {{ featured_post.title }}
                                        </h2>
                                    </a>
                                </div>
                            </div> -->


                        </div>

                        <!--
                        <div class="col-lg-3 col-md-6 top-list-1 m-order-1  " style="order: -1">
                            <div class="second-center scaled" style="background: #Eff5F4">
                                <a :href="'/read/post/'+featured_post.id+'/'+featured_post.title"
                                    class="news-item news-item-list py-2 "
                                    v-for="(featured_post, index4) in posts.featured_post" :key="'F1post' + index4"
                                    :style="[index4 == 0 ? { 'display': 'none' } : '']">
                                    <div class="image-container">
                                        <img :src="$asseturl + featured_post.fiture" v-if="featured_post.fiture"
                                            :alt="featured_post.title" class="lazyload img-loader">
                                        <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"
                                            :alt="featured_post.title" class="lazyload img-loader">
                                    </div>
                                    <div class="">
                                        <h2 class="title">
                                            {{ featured_post.title }}
                                        </h2>
                                    </div>
                                </a>
                            </div>
                        </div> -->

                        <div class="col-lg-3 col-md-6 top-list-1 m-order-1  " style="order: 1">
                            <img style="height: 469px;" :src="$asseturl + 'WhatsApp Image 2023-01-10 at 1.09.03 AM.jpeg'" width="100%" alt="">
                        </div>

                    </div>
                </div>



                <div class="container">

                <p class="d-flex align-items-center" style="    margin-left: 0;margin-top: 7px;">

                     <img :src="$asseturl+'softwebad.jpeg'" width="100%" />

               </p>
            </div>

                <div class="section-two py-3 bg-section-two">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-sm-12 special-top" style="background: #00519738;">
                                <div class="category-header country-ch d-flex justify-content-between align-items-center opinion__home mt-2" style="    background: #005197 !important;">
                                <div class="heading opinion-heading">
                                    <p class="title"><router-link title="" style="color:white"
                                            :to="{ name: 'categoryPost', params: { cat: 'জাতীয়' } }"
                                            class="country-lc">জাতীয়</router-link></p>
                                </div>
                                <router-link title="" :to="{ name: 'categoryPost', params: { cat: 'জাতীয়' } }"
                                    class="d-none d-sm-flex">
                                    <div class="read-more d-flex justify-content-end align-items-center">
                                        <p>আরও খবর</p>
                                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                                    </div>
                                </router-link>
                            </div>
                                <div class="row">
                                    <div class="col-sm-3 box-news " v-for="(National, Pindex) in posts.national"
                                        :key="'National' + Pindex">
                                        <a :href="'/read/post/'+National.id+'/'+National.title" class="news-item news-item-box m-py-2">
                                            <div class="image-container">
                                                <img style="height:167px !important;" :src="$asseturl + National.fiture"
                                                    v-if="National.fiture" :alt="National.title" class="lazyload img-loader">
                                                <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"
                                                    :alt="National.title" class="lazyload img-loader">
                                            </div>
                                            <div>
                                                <h2 class="title">
                                                    {{ National.title }}
                                                </h2>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container pt-3 ">
                    <div class="row">

                        <div class="col-lg-9 col-md-8" style="background: #aeb5cb63 !important;">
                            <div
                                class="category-header country-ch d-flex justify-content-between align-items-center opinion__home mt-2" style="background: #74d2e7 !important;">
                                <div class="heading opinion-heading">
                                    <p class="title"><router-link title=""
                                            :to="{ name: 'categoryPost', params: { cat: 'পঞ্চগড়ের খবর' } }"
                                            class="country-lc">পঞ্চগড়ের খবর</router-link></p>
                                </div>
                                <router-link title="" :to="{ name: 'categoryPost', params: { cat: 'পঞ্চগড়ের খবর' } }"
                                    class="d-none d-sm-flex">
                                    <div class="read-more d-flex justify-content-end align-items-center">
                                        <p>আরও খবর</p>
                                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                                    </div>
                                </router-link>
                            </div>
                            <div class="row border-right country-articles">
                                <div class="col-12 col-md-6 col-xl-4"
                                    v-for="(Panchagarh_news, naindex) in posts.Panchagarh_news"
                                    :key="'naindex' + naindex">
                                    <div class="clk-list clk-center">
                                        <a :href="'/read/post/'+Panchagarh_news.id+'/'+Panchagarh_news.title" class="clk-item clk-item-regular py-2 ">
                                            <img style="height:75px !important;"
                                                :src="$asseturl + Panchagarh_news.fiture"
                                                v-if="Panchagarh_news.fiture" :alt="Panchagarh_news.title"
                                                class="lazyload img-loader">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"
                                                :alt="Panchagarh_news.title" class="lazyload img-loader">
                                            <h2 class="title">
                                                {{ Panchagarh_news.title }}
                                            </h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 politics" style="background: #ff99001f;">
                            <div
                                class="category-header politics-ch d-flex justify-content-between align-items-center politics__home mt-2" style="    background: #ff9900;">
                                <div class="heading politics-heading">
                                    <p class="title"><router-link title=""
                                            :to="{ name: 'categoryPost', params: { cat: 'আন্তর্জাতিক' } }"
                                            class="politics-lc">আন্তর্জাতিক</router-link></p>
                                </div>
                                <router-link title="" :to="{ name: 'categoryPost', params: { cat: 'আন্তর্জাতিক' } }"
                                    class="d-none d-sm-flex">
                                    <div class="read-more d-flex justify-content-end align-items-center">
                                        <p>আরও খবর</p>
                                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                                    </div>
                                </router-link>
                            </div>
                            <div class="regular-list scaled ai-custom">
                                <a :href="'/read/post/'+international.id+'/'+international.title" class="news-item news-item-regular py-2"
                                    v-for="(international, naindex) in posts.international" :key="'naindex' + naindex">
                                    <div class="image-container">
                                        <img style="height:75px !important;" :src="$asseturl + international.fiture"
                                            v-if="international.fiture" :alt="international.title"
                                            class="lazyload img-loader">
                                        <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"
                                            :alt="international.title" class="lazyload img-loader">
                                    </div>
                                    <h2 class="title">
                                        {{ international.title }}
                                    </h2>
                                </a>
                            </div>
                        </div>




                    </div>
                </div>


                <div class="container pt-3 m-pt-2">
                    <div class="row">


                        <div class="col-lg-9 col-md-8" style="    background: #87c90730;">
                            <div class="category-header country-ch d-flex justify-content-between align-items-center opinion__home mt-2" style="background: #87c907;">
                                <div class="heading opinion-heading">
                                    <p class="title"><router-link title=""
                                            :to="{ name: 'categoryPost', params: { cat: 'সারাদেশ' } }"
                                            class="country-lc">সারাদেশ</router-link></p>
                                </div>
                                <router-link title="" :to="{ name: 'categoryPost', params: { cat: 'সারাদেশ' } }"
                                    class="d-none d-sm-flex">
                                    <div class="read-more d-flex justify-content-end align-items-center">
                                        <p>আরও খবর</p>
                                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                                    </div>
                                </router-link>
                            </div>
                            <div class="row border-right country-articles">
                                <div class="col-12 col-md-6 col-xl-4" v-for="(the_whole_country, naindex) in posts.the_whole_country"
                                    :key="'naindex' + naindex">
                                    <div class="clk-list clk-center">
                                        <a :href="'/read/post/'+the_whole_country.id+'/'+the_whole_country.title" class="clk-item clk-item-regular py-2 ">
                                            <img style="height:75px !important;" :src="$asseturl + the_whole_country.fiture"
                                                v-if="the_whole_country.fiture" :alt="the_whole_country.title"
                                                class="lazyload img-loader">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"
                                                :alt="the_whole_country.title" class="lazyload img-loader">
                                            <h2 class="title">
                                                {{ the_whole_country.title }}
                                            </h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="col-lg-3 col-md-4 politics" style="">
                            <div
                                class="category-header politics-ch d-flex justify-content-between align-items-center politics__home mt-2">
                                <div class="heading politics-heading">
                                    <p class="title"><router-link title=""
                                            :to="{ name: 'categoryPost', params: { cat: 'রাজনীতি' } }"
                                            class="politics-lc">রাজনীতি</router-link></p>
                                </div>
                                <router-link title="" :to="{ name: 'categoryPost', params: { cat: 'রাজনীতি' } }"
                                    class="d-none d-sm-flex">
                                    <div class="read-more d-flex justify-content-end align-items-center">
                                        <p>আরও খবর</p>
                                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                                    </div>
                                </router-link>
                            </div>
                            <div class="regular-list scaled ai-custom">
                                <a :href="'/read/post/'+politics.id+'/'+politics.title"
                                    class="news-item news-item-regular py-2"
                                    v-for="(politics, naindex) in posts.politics" :key="'naindex' + naindex">
                                    <div class="image-container">
                                        <img style="height:75px !important;" :src="$asseturl + politics.fiture"
                                            v-if="politics.fiture" :alt="politics.title" class="lazyload img-loader">
                                        <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"
                                            :alt="politics.title" class="lazyload img-loader">
                                    </div>
                                    <h2 class="title">
                                        {{ politics.title }}
                                    </h2>
                                </a>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="container pt-3 m-pt-2">
                    <div class="row">
                        <div class="col-lg-9 col-md-8" style="background: #a24bf145;">
                            <div
                                class="category-header country-ch d-flex justify-content-between align-items-center opinion__home mt-2" style="    background: #a24bf1;">
                                <div class="heading opinion-heading">
                                    <p class="title"><router-link title=""
                                            :to="{ name: 'categoryPost', params: { cat: 'বিনোদন' } }"
                                            class="country-lc">বিনোদন</router-link></p>
                                </div>
                                <router-link title="" :to="{ name: 'categoryPost', params: { cat: 'বিনোদন' } }"
                                    class="d-none d-sm-flex">
                                    <div class="read-more d-flex justify-content-end align-items-center">
                                        <p>আরও খবর</p>
                                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                                    </div>
                                </router-link>
                            </div>
                            <div class="row border-right country-articles">
                                <div class="col-12 col-md-6 col-xl-4"
                                    v-for="(entertainment, naindex) in posts.entertainment" :key="'naindex' + naindex">
                                    <div class="clk-list clk-center">
                                        <a :href="'/read/post/'+entertainment.id+'/'+entertainment.title"
                                            class="clk-item clk-item-regular py-2 ">
                                            <img style="height:75px !important;"
                                                :src="$asseturl + entertainment.fiture" v-if="entertainment.fiture"
                                                :alt="entertainment.title" class="lazyload img-loader">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"
                                                :alt="entertainment.title" class="lazyload img-loader">
                                            <h2 class="title">
                                                {{ entertainment.title }}
                                            </h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 politics">
                            <div
                                class="category-header politics-ch d-flex justify-content-between align-items-center politics__home mt-2">
                                <div class="heading politics-heading">
                                    <p class="title">
                                        <router-link title="" :to="{ name: 'categoryPost', params: { cat: 'শিক্ষা' } }"
                                            class="politics-lc">শিক্ষা</router-link></p>
                                </div>
                                <router-link title="" :to="{ name: 'categoryPost', params: { cat: 'শিক্ষা' } }"
                                    class="d-none d-sm-flex">
                                    <div class="read-more d-flex justify-content-end align-items-center">
                                        <p>আরও খবর</p>
                                        <p><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></p>
                                    </div>
                                </router-link>
                            </div>
                            <div class="regular-list scaled ai-custom">
                                <a :href="'/read/post/'+education.id+'/'+education.title"
                                    class="news-item news-item-regular py-2"
                                    v-for="(education, naindex) in posts.education" :key="'naindex' + naindex">
                                    <div class="image-container">
                                        <img style="height:75px !important;" :src="$asseturl + education.fiture"
                                            v-if="education.fiture" :alt="education.title" class="lazyload img-loader">
                                        <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"
                                            :alt="education.title" class="lazyload img-loader">
                                    </div>
                                    <h2 class="title">
                                        {{ education.title }}
                                    </h2>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container pt-3 m-pt-2 mt-5" style="    overflow: hidden;">
                    <div class="width100 block-2 row">


                        <div class="col-xl-3 col-md-6 col-sm-12 postbgFooter">
                            <div class="padding">
                                <div class="news news-3 width100">
                                    <h3 class="title width100"><router-link title="" :to="{ name: 'categoryPost', params: { cat: 'লাইফ স্টাইল' } }">লাইফ স্টাইল</router-link></h3>
                                    <div class="first width100" v-for="(Life_style, naindex) in posts.Life_style" :key="'naindex' + naindex" v-if="naindex==0">
                                        <a :href="'/read/post/'+Life_style.id+'/'+Life_style.title" >

                                            <img :src="$asseturl + Life_style.fiture" v-if="Life_style.fiture" :alt="Life_style.title" width="233" height="148">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="Life_style.title"  width="233" height="148">
                                            <h3> {{ Life_style.title }}</h3>
                                        </a>
                                    </div>
                                    <div v-for="(Life_style, naindex) in posts.Life_style" :key="'naindex' + naindex" v-if="naindex!=0" class="other width100">
                                        <a :href="'/read/post/'+Life_style.id+'/'+Life_style.title" > <i class="fas fa-long-arrow-right"></i>  {{ Life_style.title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-md-6 col-sm-12 postbgFooter">
                            <div class="padding">
                                <div class="news news-3 width100">
                                    <h3 class="title width100"><router-link title="" :to="{ name: 'categoryPost', params: { cat: 'তথ্যপ্রযুক্তি' } }">তথ্যপ্রযুক্তি</router-link></h3>
                                    <div class="first width100" v-for="(Information_technology, naindex) in posts.Information_technology" :key="'naindex' + naindex" v-if="naindex==0">
                                        <a :href="'/read/post/'+Information_technology.id+'/'+Information_technology.title" >

                                            <img :src="$asseturl + Information_technology.fiture" v-if="Information_technology.fiture" :alt="Information_technology.title" width="233" height="148">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="Information_technology.title"  width="233" height="148">
                                            <h3> {{ Information_technology.title }}</h3>
                                        </a>
                                    </div>
                                    <div v-for="(Information_technology, naindex) in posts.Information_technology" :key="'naindex' + naindex" v-if="naindex!=0" class="other width100">
                                        <a :href="'/read/post/'+Information_technology.id+'/'+Information_technology.title" > <i class="fas fa-long-arrow-right"></i>  {{ Information_technology.title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-md-6 col-sm-12 postbgFooter">
                            <div class="padding">
                                <div class="news news-3 width100">
                                    <h3 class="title width100"><router-link title="" :to="{ name: 'categoryPost', params: { cat: 'বিশেষ প্রতিবেদন' } }">বিশেষ প্রতিবেদন</router-link></h3>
                                    <div class="first width100" v-for="(Special_report, naindex) in posts.Special_report" :key="'naindex' + naindex" v-if="naindex==0">
                                        <a :href="'/read/post/'+Special_report.id+'/'+Special_report.title" >

                                            <img :src="$asseturl + Special_report.fiture" v-if="Special_report.fiture" :alt="Special_report.title" width="233" height="148">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="Special_report.title"  width="233" height="148">
                                            <h3> {{ Special_report.title }}</h3>
                                        </a>
                                    </div>
                                    <div v-for="(Special_report, naindex) in posts.Special_report" :key="'naindex' + naindex" v-if="naindex!=0" class="other width100">
                                        <a :href="'/read/post/'+Special_report.id+'/'+Special_report.title" > <i class="fas fa-long-arrow-right"></i>  {{ Special_report.title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-md-6 col-sm-12 postbgFooter">
                            <div class="padding">
                                <div class="news news-3 width100">
                                    <h3 class="title width100"><router-link title="" :to="{ name: 'categoryPost', params: { cat: 'খেলাধূলা' } }">খেলাধূলা</router-link></h3>
                                    <div class="first width100" v-for="(sports, naindex) in posts.sports" :key="'naindex' + naindex" v-if="naindex==0">
                                        <a :href="'/read/post/'+sports.id+'/'+sports.title" >

                                            <img :src="$asseturl + sports.fiture" v-if="sports.fiture" :alt="sports.title" width="233" height="148">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="sports.title"  width="233" height="148">
                                            <h3> {{ sports.title }}</h3>
                                        </a>
                                    </div>
                                    <div v-for="(sports, naindex) in posts.sports" :key="'naindex' + naindex" v-if="naindex!=0" class="other width100">
                                        <a :href="'/read/post/'+sports.id+'/'+sports.title" > <i class="fas fa-long-arrow-right"></i>  {{ sports.title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="container pt-3 m-pt-2 mt-5" style="    overflow: hidden;">
                    <div class="width100 block-2 row">


                        <div class="col-xl-3 col-md-6 col-sm-12 postbgFooter">
                            <div class="padding">
                                <div class="news news-3 width100">
                                    <h3 class="title width100"><router-link title="" :to="{ name: 'categoryPost', params: { cat: 'স্বাস্থ্য' } }">স্বাস্থ্য</router-link></h3>
                                    <div class="first width100" v-for="(health, naindex) in posts.health" :key="'naindex' + naindex" v-if="naindex==0">
                                        <a :href="'/read/post/'+health.id+'/'+health.title" >

                                            <img :src="$asseturl + health.fiture" v-if="health.fiture" :alt="health.title" width="233" height="148">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="health.title"  width="233" height="148">
                                            <h3> {{ health.title }}</h3>
                                        </a>
                                    </div>
                                    <div v-for="(health, naindex) in posts.health" :key="'naindex' + naindex" v-if="naindex!=0" class="other width100">
                                        <a :href="'/read/post/'+health.id+'/'+health.title" > <i class="fas fa-long-arrow-right"></i>  {{ health.title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-md-6 col-sm-12 postbgFooter">
                            <div class="padding">
                                <div class="news news-3 width100">
                                    <h3 class="title width100"><router-link title="" :to="{ name: 'categoryPost', params: { cat: 'ধর্ম ও জীবন' } }">ধর্ম ও জীবন</router-link></h3>
                                    <div class="first width100" v-for="(Religion_and_life, naindex) in posts.Religion_and_life" :key="'naindex' + naindex" v-if="naindex==0">
                                        <a :href="'/read/post/'+Religion_and_life.id+'/'+Religion_and_life.title" >

                                            <img :src="$asseturl + Religion_and_life.fiture" v-if="Religion_and_life.fiture" :alt="Religion_and_life.title" width="233" height="148">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="Religion_and_life.title"  width="233" height="148">
                                            <h3> {{ Religion_and_life.title }}</h3>
                                        </a>
                                    </div>
                                    <div v-for="(Religion_and_life, naindex) in posts.Religion_and_life" :key="'naindex' + naindex" v-if="naindex!=0" class="other width100">
                                        <a :href="'/read/post/'+Religion_and_life.id+'/'+Religion_and_life.title" > <i class="fas fa-long-arrow-right"></i>  {{ Religion_and_life.title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-md-6 col-sm-12 postbgFooter">
                            <div class="padding">
                                <div class="news news-3 width100">
                                    <h3 class="title width100"><router-link title="" :to="{ name: 'categoryPost', params: { cat: 'কৃষি' } }">কৃষি</router-link></h3>
                                    <div class="first width100" v-for="(agriculture, naindex) in posts.agriculture" :key="'naindex' + naindex" v-if="naindex==0">
                                        <a :href="'/read/post/'+agriculture.id+'/'+agriculture.title" >

                                            <img :src="$asseturl + agriculture.fiture" v-if="agriculture.fiture" :alt="agriculture.title" width="233" height="148">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="agriculture.title"  width="233" height="148">
                                            <h3> {{ agriculture.title }}</h3>
                                        </a>
                                    </div>
                                    <div v-for="(agriculture, naindex) in posts.agriculture" :key="'naindex' + naindex" v-if="naindex!=0" class="other width100">
                                        <a :href="'/read/post/'+agriculture.id+'/'+agriculture.title" > <i class="fas fa-long-arrow-right"></i>  {{ agriculture.title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-md-6 col-sm-12 postbgFooter">
                            <div class="padding">
                                <div class="news news-3 width100">
                                    <h3 class="title width100"><router-link title="" :to="{ name: 'categoryPost', params: { cat: 'ফিচার' } }">ফিচার</router-link></h3>
                                    <div class="first width100" v-for="(feature, naindex) in posts.feature" :key="'naindex' + naindex" v-if="naindex==0">
                                        <a :href="'/read/post/'+feature.id+'/'+feature.title" >

                                            <img :src="$asseturl + feature.fiture" v-if="feature.fiture" :alt="feature.title" width="233" height="148">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="feature.title"  width="233" height="148">
                                            <h3> {{ feature.title }}</h3>
                                        </a>
                                    </div>
                                    <div v-for="(feature, naindex) in posts.feature" :key="'naindex' + naindex" v-if="naindex!=0" class="other width100">
                                        <a :href="'/read/post/'+feature.id+'/'+feature.title" > <i class="fas fa-long-arrow-right"></i>  {{ feature.title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="container pt-3 m-pt-2 mt-5" style="    overflow: hidden;">
                    <div class="width100 block-2 row">


                        <div class="col-xl-3 col-md-6 col-sm-12 postbgFooter">
                            <div class="padding">
                                <div class="news news-3 width100">
                                    <h3 class="title width100"><router-link title="" :to="{ name: 'categoryPost', params: { cat: 'ক্যাম্পাস' } }">ক্যাম্পাস</router-link></h3>
                                    <div class="first width100" v-for="(campus, naindex) in posts.campus" :key="'naindex' + naindex" v-if="naindex==0">
                                        <a :href="'/read/post/'+campus.id+'/'+campus.title" >

                                            <img :src="$asseturl + campus.fiture" v-if="campus.fiture" :alt="campus.title" width="233" height="148">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="campus.title"  width="233" height="148">
                                            <h3> {{ campus.title }}</h3>
                                        </a>
                                    </div>
                                    <div v-for="(campus, naindex) in posts.campus" :key="'naindex' + naindex" v-if="naindex!=0" class="other width100">
                                        <a :href="'/read/post/'+campus.id+'/'+campus.title" > <i class="fas fa-long-arrow-right"></i>  {{ campus.title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-md-6 col-sm-12 postbgFooter">
                            <div class="padding">
                                <div class="news news-3 width100">
                                    <h3 class="title width100"><router-link title="" :to="{ name: 'categoryPost', params: { cat: 'ভ্রমণ' } }">ভ্রমণ</router-link></h3>
                                    <div class="first width100" v-for="(traveling, naindex) in posts.traveling" :key="'naindex' + naindex" v-if="naindex==0">
                                        <a :href="'/read/post/'+traveling.id+'/'+traveling.title" >

                                            <img :src="$asseturl + traveling.fiture" v-if="traveling.fiture" :alt="traveling.title" width="233" height="148">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="traveling.title"  width="233" height="148">
                                            <h3> {{ traveling.title }}</h3>
                                        </a>
                                    </div>
                                    <div v-for="(traveling, naindex) in posts.traveling" :key="'naindex' + naindex" v-if="naindex!=0" class="other width100">
                                        <a :href="'/read/post/'+traveling.id+'/'+traveling.title" > <i class="fas fa-long-arrow-right"></i>  {{ traveling.title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-md-6 col-sm-12 postbgFooter">
                            <div class="padding">
                                <div class="news news-3 width100">
                                    <h3 class="title width100"><router-link title="" :to="{ name: 'categoryPost', params: { cat: 'চাকুরী' } }">চাকুরী</router-link></h3>
                                    <div class="first width100" v-for="(the_job, naindex) in posts.the_job" :key="'naindex' + naindex" v-if="naindex==0">
                                        <a :href="'/read/post/'+the_job.id+'/'+the_job.title" >

                                            <img :src="$asseturl + the_job.fiture" v-if="the_job.fiture" :alt="the_job.title" width="233" height="148">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="the_job.title"  width="233" height="148">
                                            <h3> {{ the_job.title }}</h3>
                                        </a>
                                    </div>
                                    <div v-for="(the_job, naindex) in posts.the_job" :key="'naindex' + naindex" v-if="naindex!=0" class="other width100">
                                        <a :href="'/read/post/'+the_job.id+'/'+the_job.title" > <i class="fas fa-long-arrow-right"></i>  {{ the_job.title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-3 col-md-6 col-sm-12 postbgFooter">
                            <div class="padding">
                                <div class="news news-3 width100">
                                    <h3 class="title width100"><router-link title="" :to="{ name: 'categoryPost', params: { cat: 'অন্যান্য' } }">ভিন্ন সংবাদ</router-link></h3>
                                    <div class="first width100" v-for="(other, naindex) in posts.other" :key="'naindex' + naindex" v-if="naindex==0">
                                        <a :href="'/read/post/'+other.id+'/'+other.title" >

                                            <img :src="$asseturl + other.fiture" v-if="other.fiture" :alt="other.title" width="233" height="148">
                                            <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="other.title"  width="233" height="148">
                                            <h3> {{ other.title }}</h3>
                                        </a>
                                    </div>
                                    <div v-for="(other, naindex) in posts.other" :key="'naindex' + naindex" v-if="naindex!=0" class="other width100">
                                        <a :href="'/read/post/'+other.id+'/'+other.title" > <i class="fas fa-long-arrow-right"></i>  {{ other.title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <div class="container mb-3">
                    <div class="LeadTitlebar3">
                        <a href="https://www.risingbd.com/videogallery/archives">
                            <h2><span>ভিডিও গ্যালারি</span></h2>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-sm-12 rowresize mb-3">
                            <div class="VideoGalleryTop">
                                <div class="thumbnail" v-for="(videoGallery, naindex) in posts.videoGallery" :key="'naindex' + naindex" v-if="naindex==0">
                                    <a :href="'/read/post/'+videoGallery.id+'/'+videoGallery.title" >
                                        <div class="Imgresize">
                                            <picture class="Ratio Ratio16x9 VideoIcon">
                                                <img :src="$asseturl + videoGallery.fiture" v-if="videoGallery.fiture" :alt="videoGallery.title"
                                                    class="img-fluid img100 Ratio Ratio16x9" width="100%">
                                            </picture>
                                        </div>
                                        <div class="caption">
                                            <h3></h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-sm-12 rowresize">
                            <div class="DVideoArea">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6 mb-3" v-for="(videoGallery, naindex) in posts.videoGallery" :key="'naindex' + naindex" v-if="naindex!=0">
                                        <div class="VideoGalleryList">
                                            <div class="col-sm-12 thumbnail">
                                                <a :href="'/read/post/'+videoGallery.id+'/'+videoGallery.title" >
                                                    <div class="Imgresize">
                                                        <picture class="Ratio Ratio16x9 VideoIcon">
                                                            <img :src="$asseturl + videoGallery.fiture" v-if="videoGallery.fiture" :alt="videoGallery.title" class="img-fluid img100">
                                                        </picture>
                                                    </div>
                                                    <div class="caption">
                                                        <h3>{{ videoGallery.title }}</h3>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>














            </div>
        </main>
    </div>
</template>
<script>
import carousel from 'vue-owl-carousel'
export default {
    components: { carousel },
    created() {
        // if (!User.loggedIn()) {
        //     this.$router.push({ name: "/login" });
        // }
        this.getPosts();
    },
    data() {
        return {
            posts: {},
            preloader:true,
        };
    },
    mounted() {
        document.title = 'Panchagarh24'
    },
    methods: {
        async getPosts() {
            this.preloader = true
            var res = await this.callApi('get', `/api/get/all/latest/news`, []);
            this.posts = res.data
            this.preloader = false
        },

        slidernavChange(allPost,index){
            for (let i = 0; i < allPost; i++) {

                var child = document.getElementById('owlItem'+i).parentElement;
                child.classList.remove('active');
                console.log(child)

            }

            var child2 = document.getElementById('owlItem'+index).parentElement;
                child2.classList.add('active');
                console.log(child2)

        }
    },
};
</script>
<style>
span.next {
    background: red;
    padding: 3px 11px;
    font-size: 24px;
    color: white;
    position: absolute;
    top: 47%;
    right: 0;
    z-index: 1;
}

span.prev {
    background: red;
    padding: 3px 11px;
    font-size: 24px;
    color: white;
    position: absolute;
    top: 47%;
    left: 0;
    z-index: 9;
}



.overlay {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 9;
    background: #3d566e;
    overflow: hidden;
    opacity: 0;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
    width: 100%;
    height: 100%;
}

.box:hover .overlay {
    opacity: 0.8;
}

.overlay-info {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 9;
    overflow: hidden;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
    width: 100%;
    height: 100%;
}

.box:hover .overlay-info {
    opacity: 1;
}

.cat {
    position: absolute;
    text-transform: capitalize;
    left: 15px;
    top: 0;
    padding: 0;
    margin: 0;
    z-index: 10;
    width: auto;
    height: 36px;
    line-height: 36px;
    color: #fff;
    font-size: 12px;
    opacity: 0;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.banner-outer-thumb .cat {
    top: 15px;
    opacity: 1;
}

.cat-data span {
    width: 36px;
    height: 36px;
    text-align: center;
    color: #fff;
    line-height: 36px;
    font-weight: 700;
    font-size: 22px;
    background: #e74c3c;
    display: inline-block;
    margin-right: 5px;
    float: left;
}

.box:hover .cat {
    top: 15px;
    opacity: 1;
}

.info {
    display: block;
    position: absolute;
    left: 15px;
    bottom: 0;
    z-index: 100;
    text-align: center;
    color: #fff;
    height: 36px;
    line-height: 36px;
    font-weight: normal;
    font-size: 12px;
    opacity: 0;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}

.banner-outer-thumb .info {
    bottom: 10px;
    opacity: 1;
}

.info span {
    font-size: 12px;
    display: inline-block;
    padding: 0 5px 0 10px;
}

.info span:first-child {
    padding-left: 0;
}

.box:hover .info {
    bottom: 10px;
    opacity: 1;
}

.banner-outer-thumb {
    padding-bottom: 15px;
}

.box {
    position: relative;
    overflow: hidden;
}

.box:hover .info {
    bottom: 10px;
    opacity: 1;
}

.banner-outer-thumb {
    padding-bottom: 15px;
}

.carousel-caption {
    left: 15px;
    right: 8%;
    bottom: 10px;
    z-index: 10;
    padding-top: 20px;
    padding-bottom: 30px;
    color: #ffffff;
    text-align: left;
    text-shadow: none;
    font-size: 18px;
    font-weight: bold;
    line-height: 24px;
    background: #637684d9;
    padding: 24px 16px;
}

.banner-outer-thumb .carousel-caption {
    position: absolute;
    left: 15px;
    right: 8%;
    bottom: 10px;
    z-index: 10;
    padding-top: 20px;
    padding-bottom: 30px;
    color: #ffffff;
    text-align: left;
    text-shadow: none;
    font-size: 18px;
    font-weight: bold;
    line-height: 24px;
    opacity: 0;
}

.banner-outer-thumb a p,
.banner-oute-thumbr a:hover p {
    color: #fff;
}

.banner-outer-thumb .box:hover .carousel-caption {
    opacity: 1;
}

.banner-outer-thumb .item {
    margin: 0 5px;
    padding: 4px;
    ;
    background-color: #f8f8f8;
    border: 1px solid #ededed;
}

.banner-outer .carousel-caption {
    position: absolute;
    left: 15px;
    right: 8%;
    bottom: 10px;
    z-index: 10;
    padding-top: 20px;
    padding-bottom: 30px;
    color: #ffffff;
    text-align: left;
    text-shadow: none;
    font-size: 20px;
    font-weight: bold;
    line-height: 24px;
}

.banner-outer a p,
.banner-outer a:hover p {
    color: #fff;
}

.right-img-top {
    margin-bottom: 10px;
    overflow: hidden;
    height: 212px;
}

.right-img-top .box {
    height: 212px;
}

.right-img-btm {
    overflow: hidden;
    height: 212px;
}

.right-img-btm .box {
    height: 212px;
}

/*8-4 OWL CAROUSEL SYNC*/
#sync2 .item {
    margin: 0 5px;
    cursor: pointer;
}

#sync2 .owl-wrapper-outer {}

#sync2 .synced .item {
    border: 2px solid #e74c3c;
}

.box img {
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    transition: all 0.3s ease;
    image-rendering: optimizequality;
}

.box:hover img {
    -webkit-transform: scale(1.25);
    -moz-transform: scale(1.25);
    -ms-transform: scale(1.25);
    -o-transform: scale(1.25);
    transform: scale(1.25);
    display: inline-block;
    line-height: 0;
}

a:hover img {
    border: 1px solid #ffcfca;
    opacity: 0.6;
}

.box:hover img {
    -webkit-transform: scale(1.25);
    -moz-transform: scale(1.25);
    -ms-transform: scale(1.25);
    -o-transform: scale(1.25);
    transform: scale(1.25);
    display: inline-block;
    line-height: 0;
}

.overlay-info {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 9;
    overflow: hidden;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
    width: 100%;
    height: 100%;
}

.left,
.middle {
    float: left;
}

.news {
    margin-bottom: 15px;
    float: left;
}

.news .title {
    border-bottom: 2px solid #f01010;
    font-size: 23px;
    line-height: 30px;
    margin-bottom: 10px;
    margin-top: 0;
}

.news-3 .other {

    margin-bottom: 5px;
}

.width25 {
    width: 25%;
    float: left;
}

.width100 {
    width: 100%;
    float: left;
}

.first.width100 a h3 {
    font-size: 22px;
    margin-bottom: 18px;
    margin-top: 11px;
}


/* video gallery */

.LeadTitlebar3 {
    position: relative;
}

.LeadTitlebar3 h2 {
    /* background: url(../../media/common/dot.png); */
    width: 100%;
    position: relative;
    border-bottom: 2px solid #939297;
    line-height: 100%;
    margin: 0 0 15px;
    font-size: 20px;
    font-weight: bold;
    letter-spacing: .3px;
}

.LeadTitlebar3 h2 span {
    background: #A91717;
    padding: 7px 18px;
    color: #fff;
    height: 30px;
    line-height: 39px;
    position: relative;
    border-bottom: 2px solid#939297;
}

.LeadTitlebar3 h2 span::after {
    border-color: #939297 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0)rgba(0, 0, 0, 0);
    position: absolute;
    content: " ";
    width: auto;
    height: auto;
    bottom: -20px;
    margin-left: -10px;
    left: 50%;
    border-width: 10px;
    border-style: solid;
}

.VideoGalleryList {
    margin-bottom: 15px;
}

.VideoGalleryList .thumbnail {
    border: 0 none;
    box-shadow: none;
    margin: 0 0 0 0;
    padding: 0;
}

.Imgresize {
    position: relative;
}

.VideoGalleryList .thumbnail .caption {
    padding: 7px;
}

.VideoGalleryList .caption h3 {
    color: #fff;
    font-size: 1.1em;
    font-weight: 400;
}

.VideoGalleryList .caption {
    width: 100%;
    bottom: 0;
    position: absolute;
    background: rgba(0, 0, 0, 0.5) linear-gradient(to bottom, rgba(0, 0, 0, 0.14) 0%, rgb(0, 0, 0) 100%) repeat scroll 0 0;
    z-index: 10;
    border-bottom: 1px solid #2d2d2d;
}

.VideoGalleryList .VideoIcon::after {
    position: absolute;
    top: 18%;
    left: 10%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    content: "\f144";
    font-family: FontAwesome;
    font-size: 40px;
    color: #fff;
    text-shadow: 0px 0px 30px rgb(0 0 0 / 50%);
}

.navDotsImage {
    border: 2px solid #bbbbbb;
    margin: 1px;
}
.category-header {
    background: #b1aeae;
}
h3.title.width100 {
    background: #a3ffaa;
}


    /* width */
    .dots::-webkit-scrollbar {
        width: 10px;
        height: 5px;
        display:none;
    }
    .dots:hover::-webkit-scrollbar {

        display:block;
    }

    /* Track */
    .dots::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey;
    border-radius: 10px;
    }

    /* Handle */
    .dots::-webkit-scrollbar-thumb {
    background: #0d5404;
    border-radius: 10px;
    }







    img.img-fluid.img100.Ratio.Ratio16x9 {
    width: 100%;
    height: 358px;
}


img.img-fluid.img100 {
    width: 100%;
    height: 173px;
}

@media screen and (max-width:768px) {
    img.img-fluid.img100.Ratio.Ratio16x9 {
    width: 100%;
    height: 100%;
}
}




.postbgFooter{
    background: #a3ffaa26;
}


</style>
