<template>
    <div>
        <loader v-if="preloader"  object="#ff0000" color1="#ffffff" color2="#17fd3d" size="8" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="dots"></loader>
        <main role="main">
            <div class="py-3 category">
                <div class="container">
                    <div class="category-container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 mb-2">
                                <section class="section-bb">
                                    <div class="cat-header py-2">
                                        <h1>
                                            <a href="#">{{ this.catname }}</a>
                                        </h1>
                                    </div>

                                </section>
                                <div class="cat-lead-container border-bottom my-2">
                                    <div class="row">


                                        <div class="col-lg-8 top-left-section lead-top" v-for="(row,index) in rows.data" v-if="index==0" :key="'big'+index">
                                            <div class="lead-news">
                                                <a :href="'/read/post/'+row.id+'/'+row.title"
                                                    class="news-item news-item-lead border-0">
                                                    <img style="height:335px !important;" :src="$asseturl+row.fiture" v-if="row.fiture"  :alt="row.title" class="lazyload img-loader">
                                                        <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="row.title" class="lazyload img-loader">
                                                    <h2 class="title liveTitle" style="margin: 10px 0">
                                                        {{ row.title }}
                                                    </h2>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="col-lg-4 cat-two-items">
                                            <div class="row">
                                                <div class="col-12 col-sm-6 col-lg-12 box-news" v-for="(row,index1) in rows.data" v-if="index1==1 || index1==2" :key="'sm'+index1">
                                                    <a :href="'/read/post/'+row.id+'/'+row.title"
                                                        class="news-item news-item-box m-py-2 border-bottom">
                                                        <img style="height:175px !important;" :src="$asseturl+row.fiture" v-if="row.fiture"  :alt="row.title" class="lazyload img-loader">
                                                        <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="row.title" class="lazyload img-loader">

                                                        <h2 class="title">
                                                            {{ row.title }}
                                                        </h2>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div class="row more-contents">




                                    <div class="col-sm-4 box-news" v-for="(row,index2) in rows.data"  :key="'sm2'+index2" v-if="index2" :style="[index2==0 || index2==1 || index2==2 ? {'display': 'none'} : '']">
                                        <a :href="'/read/post/'+row.id+'/'+row.title"
                                            class="news-item news-item-box m-py-2">
                                            <img style="height:175px !important;" :src="$asseturl+row.fiture" v-if="row.fiture"  :alt="row.title" class="lazyload img-loader">
                                                        <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="row.title" class="lazyload img-loader">
                                            <h2 class="title">
                                                {{ row.title }}
                                            </h2>
                                        </a>
                                    </div>



                                </div>
                                <div class="w-100 text-center py-2">
                                    <button type="button" v-if="last_page>1" @click="loadMore" class="btn bg-primary px-4 load-more text-white">
                                        আরও দেখুন
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 d-none">

                                <div class="category-right-section-top">
                                    <div class="
                      category-header
                      d-flex
                      justify-content-between
                      align-items-center
                      mt-2
                    ">
                                        <div class="heading national-heading">
                                            <p class="title">এই সপ্তাহের পাঠকপ্রিয়</p>
                                        </div>
                                    </div>
                                    <div class="blk-list scaled">
                                        <a href="https://www.dhakapost.com/jobs-career/164317"
                                            class="news-item news-item-regular py-2">
                                            <div class="image-container">
                                                <img src="https://assets.dhakapost.com/media/imgAll/BG/2023January/jobs-20230102132810.jpg?width=160&amp;height=90"
                                                    width="130" height="90"
                                                    alt="২৫ হাজার বেতনে অভিজ্ঞতা ছাড়াই এনজিওতে চাকরি, নেবে ২০০ জন"
                                                    class="lazyload img-loader" />
                                            </div>
                                            <h2 class="title">
                                                ২৫ হাজার বেতনে অভিজ্ঞতা ছাড়াই এনজিওতে চাকরি, নেবে ২০০ জন
                                            </h2>
                                        </a>
                                        <a href="https://www.dhakapost.com/jobs-career/164024"
                                            class="news-item news-item-regular py-2">
                                            <div class="image-container">
                                                <img src="https://assets.dhakapost.com/media/imgAll/BG/2023January/jobsss-20230101105428.jpg?width=160&amp;height=90"
                                                    width="130" height="90"
                                                    alt="৩৪ হাজার বেতনে চাকরি, সঙ্গে সপ্তাহে ২ দিন ছুটি"
                                                    class="lazyload img-loader" />
                                            </div>
                                            <h2 class="title">
                                                ৩৪ হাজার বেতনে চাকরি, সঙ্গে সপ্তাহে ২ দিন ছুটি
                                            </h2>
                                        </a>
                                        <a href="https://www.dhakapost.com/sports/football/164539"
                                            class="news-item news-item-regular py-2">
                                            <div class="image-container">
                                                <img src="https://assets.dhakapost.com/media/imgAll/BG/2023January/messi-mbappe-20230103120614.jpg?width=160&amp;height=90"
                                                    width="130" height="90"
                                                    alt="মেসি ফেরার আগেই পিএসজি থেকে উধাও এমবাপে"
                                                    class="lazyload img-loader" />
                                            </div>
                                            <h2 class="title">
                                                মেসি ফেরার আগেই পিএসজি থেকে উধাও এমবাপে
                                            </h2>
                                        </a>
                                        <a href="https://www.dhakapost.com/jobs-career/164556"
                                            class="news-item news-item-regular py-2">
                                            <div class="image-container">
                                                <img src="https://assets.dhakapost.com/media/imgAll/BG/2023January/brac-job-20220118100357-20220213072738-20220222143654-20220309113656-20220516072959-20221130082720-20230107095628.jpg?width=160&amp;height=90"
                                                    width="130" height="90"
                                                    alt="ব্র্যাকে পার্ট-টাইম চাকরির সুযোগ, আবেদন করুন আজই"
                                                    class="lazyload img-loader" />
                                            </div>
                                            <h2 class="title">
                                                ব্র্যাকে পার্ট-টাইম চাকরির সুযোগ, আবেদন করুন আজই
                                            </h2>
                                        </a>
                                        <a href="https://www.dhakapost.com/entertainment/164919"
                                            class="news-item news-item-regular py-2">
                                            <div class="image-container">
                                                <img src="https://assets.dhakapost.com/media/imgAll/BG/2023January/raj-pori-20230105003409.jpg?width=160&amp;height=90"
                                                    width="130" height="90"
                                                    alt="ভুল বোঝাবুঝির অবসান ঘটিয়ে রাজের ঘরে পরীমণি!"
                                                    class="lazyload img-loader" />
                                            </div>
                                            <h2 class="title">
                                                ভুল বোঝাবুঝির অবসান ঘটিয়ে রাজের ঘরে পরীমণি!
                                            </h2>
                                        </a>
                                        <a href="https://www.dhakapost.com/jobs-career/164799"
                                            class="news-item news-item-regular py-2">
                                            <div class="image-container">
                                                <img src="https://assets.dhakapost.com/media/imgAll/BG/2023January/dhakapost-20220721171824-20230104134332.jpg?width=160&amp;height=90"
                                                    width="130" height="90"
                                                    alt="ইউএস-বাংলা এয়ারলাইন্সে চাকরি, বছরে পাবেন একাধিক উৎসব ভাতা"
                                                    class="lazyload img-loader" />
                                            </div>
                                            <h2 class="title">
                                                ইউএস-বাংলা এয়ারলাইন্সে চাকরি, বছরে পাবেন একাধিক উৎসব
                                                ভাতা
                                            </h2>
                                        </a>
                                        <a href="https://www.dhakapost.com/jobs-career/164012"
                                            class="news-item news-item-regular py-2">
                                            <div class="image-container">
                                                <img src="https://assets.dhakapost.com/media/imgAll/BG/2023January/jobss-20230101095910.jpg?width=160&amp;height=90"
                                                    width="130" height="90"
                                                    alt="ইউএস-বাংলা গ্রুপে চাকরি, থাকছে সপ্তাহে ২ দিন ছুটি"
                                                    class="lazyload img-loader" />
                                            </div>
                                            <h2 class="title">
                                                ইউএস-বাংলা গ্রুপে চাকরি, থাকছে সপ্তাহে ২ দিন ছুটি
                                            </h2>
                                        </a>
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
export default {
    data() {
        return {
            rows: {},
            categorys: {},
            posts: {
                category: {},
                relatedPosts: {},
                latestPost: {},
                latestPost2: {},
            },
            postsShow: 10,
            last_page: 0,
            catname:'',
            preloader:true,
        };
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {
                this.getposts(this.postsShow);
            },
            deep: true
        }
    },
    methods: {
        loadMore(){
            this.postsShow +=10
            this.getposts(this.postsShow);

        },


       async getposts(postsShow = 10) {
        this.preloader = true;
        var name = '';
        if(this.$route.params.cat && this.$route.params.cat2){
            name = this.$route.params.cat2;
        }else if(this.$route.params.cat){
            name = this.$route.params.cat;
        }
      this.catname = name
                          document.title = name
                    // document.querySelector('meta[name="title"]').setAttribute("content", res.data.title);
                    // document.querySelector('meta[name="description"]').setAttribute("content", res.data.short_description);



            axios.get(`/api/get/blog/list?allpost=${postsShow}&category=${name}`).then((res) => {
                this.rows = res.data;
                this.last_page = res.data.last_page
                this.preloader = false;
            });
        },
    },
    mounted() {

        this.getposts(this.postsShow);
    },
};
</script>
