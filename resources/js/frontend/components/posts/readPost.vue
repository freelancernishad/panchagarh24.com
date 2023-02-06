<template>



    <div>
        <loader v-if="preloader"  object="#ff0000" color1="#ffffff" color2="#17fd3d" size="8" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="dots"></loader>
        <main role="main">
            <div class="pt-2 pb-2 details">
                <div class="container">
                    <div class="news-items">
                        <div class="row news-item-0">
                            <div class="col-xl-9 col-lg-8 news-root-container-0">

                                <!-- <ol class="d-flex" style="padding: 0; margin: 8px 0 16px">
                                    <li class="breadcrumb-item">
                                        <a href="https://www.dhakapost.com">প্রচ্ছদ</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        <a href="https://www.dhakapost.com/law-courts">আইন-আদালত</a>
                                    </li>
                                </ol> -->

                                <article class="details-body" lg-uid="lg0">
                                    <h1 class="news-title">{{ row.title }}
                                    </h1>
                                    <div class="details-writer d-flex align-items-center justify-content-between my-2 py-2"
                                        style="gap: 10px">




                                        <div class="d-flex flex-column">




    <div class="d-flex justify-content-start flex-row align-items-center ml-2">
        <i class="fa-solid fa-user-pen" style="font-size: 28px;padding: 4px 6px;color: #006328;"></i>
        <p class="news-time" style="color: rgba( 0, 0,0,0.7);font-size: 20px;font-weight: 700;">{{ row.author }}</p>
    </div>


    <div class="d-flex justify-content-start flex-row align-items-center ml-2">
        <i class="fa-regular fa-calendar-days" style="font-size: 28px;padding: 4px 6px;color: #9f4404;"></i>
        <p class="news-time" style="color: rgba( 0, 0,0,0.7);"> {{ dateformatGlobal(row.created_at)[8] }}</p>
    </div>




                                        </div>

                                    </div>



                                    <hr class="pb-2 fix-padding-0" />


                                    <div class="news-image" v-if="posts.category.name=='ভিডিও গ্যালারি'" v-html="row.video"></div>


                                    <div class="news-image" v-else>
                                        <img  :src="$asseturl+row.fiture" v-if="row.fiture"  :alt="row.title" class="lazyload img-loader">
                                       <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="row.title" class="lazyload img-loader">
                                        <p class="news-image-caption"></p>
                                    </div>




                                    <div class="news-details" v-html="row.long_description">




                                    </div>



                                </article>

                                <h3>Share</h3>
                                <div class="d-flex shareIcons">

                                    <ShareNetwork network="facebook" :url="shareurl" :title="row.title" :description="row.long_description"> <i class="fa-brands fa-facebook-f"></i> </ShareNetwork>
                                    <ShareNetwork network="Twitter" :url="shareurl" :title="row.title"> <i class="fa-brands fa-twitter"></i> </ShareNetwork>

                                </div>

                                <div class="d-print-none">
                                    <div class="py-3 m-py-2">
                                        <div
                                            class="category-header d-flex justify-content-between align-items-center mt-2">
                                            <div class="heading recent-heading">
                                                <p class="title">আরও পড়ুন</p>
                                            </div>
                                        </div>
                                        <div class="more-items pt-2">
                                            <div class="row d-flex justify-content-center">



                                                <div class="col-sm-4 box-news" v-for="(latestPost,index) in posts.latestPost2" :key="index">
                                                    <a :href="'/read/post/'+latestPost.id+'/'+latestPost.title"
                                                        class="news-item news-item-box">
                                                        <img style=" width:100% !important;height:165px !important;" :src="$asseturl+latestPost.fiture" v-if="latestPost.fiture"  :alt="latestPost.title" class="lazyload img-loader">
                                                        <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="latestPost.title" class="lazyload img-loader">
                                                        <h2 class="title"> {{ latestPost.title }}</h2>
                                                </a>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 d-print-none">
                                <div class="probash">
                                    <div class="fy-selective third-right">
                                        <div class="same-category-items pt-2">
                                            <div
                                                class="category-header politics-ch d-flex justify-content-between align-items-center politics__home mt-2">
                                                <div class="heading politics-heading">
                                                    <p class="title">
                                                        <a href="https://www.dhakapost.com/law-courts"
                                                            class="politics-lc">{{ posts.category.name }} থেকে
                                                            আরও</a>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="regular-list scaled m-px-0">


                                                <a v-for="(relatedPost,index) in posts.relatedPosts" :key="index"  :href="'/read/post/'+relatedPost.id+'/'+relatedPost.title"  class="news-item news-item-regular py-2" >
                                                    <div class="image-container">
                                                        <img style=" width:100% !important;height:75px !important;" :src="$asseturl+relatedPost.fiture" v-if="relatedPost.fiture"  :alt="relatedPost.title" class="lazyload img-loader">
                                                        <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="relatedPost.title" class="lazyload img-loader">
                                                    </div>
                                                    <h2 class="title">
                                                        {{ relatedPost.title }}
                                                    </h2>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="fy-selective third-right">
                                        <div class="same-category-items pt-2">
                                            <div
                                                class="category-header politics-ch d-flex justify-content-between align-items-center politics__home mt-2">
                                                <div class="heading politics-heading">
                                                    <p class="title">সর্বশেষ</p>
                                                </div>
                                            </div>
                                            <div class="regular-list scaled m-px-0">


                                                <a v-for="(latestPost,index) in posts.latestPost" :key="index"  :href="'/read/post/'+latestPost.id+'/'+latestPost.title"  class="news-item news-item-regular py-2" >
                                                    <div class="image-container">
                                                        <img style=" width:100% !important;height:75px !important;" :src="$asseturl+latestPost.fiture" v-if="latestPost.fiture"  :alt="latestPost.title" class="lazyload img-loader">
                                                        <img v-else src="//cdn.dhakapost.com/media/common/placeholder.jpg"  :alt="latestPost.title" class="lazyload img-loader">
                                                    </div>
                                                    <h2 class="title">
                                                        {{ latestPost.title }}
                                                    </h2>
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
export default {

    data(){
        return {
           row: {
                title:null,
                cat_id:null,
                short_description:null,
                long_description:null,
                Images:null,
             },
             categorys:{},
             posts:{
                'category':{},
                'relatedPosts':{},
                'latestPost':{},
                'latestPost2':{},
             },
             shareurl:'',
             preloader:true,
        }
    },
    watch: {
        '$route': {
            handler(newValue, oldValue) {

                this.getunionInfo(this.$route.params.id);
           this.getposts(this.$route.params.id);
            },
            deep: true
        }
    },
    methods:{



       getunionInfo(id=''){

                axios.get(`/api/get/post/by/post/${id}`)
                .then((res)=>{
                    this.posts = res.data
                })

        },

      async getposts(id=''){
        this.preloader = true;
                axios.get(`/api/update/blog/${id}`)
                .then((res)=>{
                    this.row = res.data
                    this.preloader = false;
                })

        },


    },

    mounted(){
        this.shareurl = document.URL

           this.getunionInfo(this.$route.params.id);
           this.getposts(this.$route.params.id);



        }
}
</script>
<style>
.news-image iframe {
    width: 100% !important;
}
.d-flex.shareIcons a {
    padding: 0 0;
    font-size: 31px;
    width: 45px;
    height: 45px;
    margin: 6px 5px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color: white;
}

a.share-network-facebook {
    background: #0F8FF2;
}

a.share-network-twitter {
    background: #1D9BF0;
}
</style>
