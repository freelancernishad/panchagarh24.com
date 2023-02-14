<template>
    <div>
        <loader v-if="preLooding"  object="#ff0000" color1="#ffffff" color2="#17fd3d" size="8" speed="2" bg="#343a40" objectbg="#999793" opacity="80" disableScrolling="false" name="dots"></loader>

<div class="breadcrumbs-area">
    <h3>পোস্ট</h3>
    <ul>
        <li>
            <router-link :to="{name:'Dashboard'}">Home</router-link>
        </li>
        <li>পোস্ট</li>
    </ul>
</div>





<div class="card">
    <div class="card-header">
                <router-link :to="{name:'blogform'}" class="btn btn-info">নতুন পোস্ট</router-link>

            </div>
        <div class="card-body">

<table class="table">

    <thead>
        <tr>
            <th>ক্রমিক</th>
            <th>শিরোনাম</th>
            <th>স্লাগ</th>
            <th>ছোট বিবরণ</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <tr v-for="(item,index) in items.data" :key="index">
            <td>{{ index+pageNO }}</td>
            <td>{{ item.title }}</td>
            <td>{{ item.slug }}</td>
            <td>{{ item.short_description }}</td>

            <td>

                <router-link :to="{name:'blogedit',params:{id:item.id}}" class="btn btn-info mt-3">Edit</router-link>
                <span @click="postDelete(item.id)" class="btn btn-danger mt-3">Delete</span>

            </td>
        </tr>
    </tbody>



</table>

        </div>


                <div class="card-footer">
                        <Pagination :total-rows="TotalRows" :route-name="RouteName" :route-params="RouteParams" :total-page="Totalpage"></Pagination>
                    </div>

            </div>



        </div>
</template>

<script>

export default {

     computed: {



    },
    created() {


    },
    data() {
        return {

            preLooding:false,
            items: {},

            PerPageData: '20',
            TotalRows: '1',
            Totalpage: [],
            RouteName:'blogs',
            RouteParams:{},
            pageNO: 1,


        }
    },
    // updated(){

    //  this.sonodList();

    // },

  watch: {
        '$route':  {
            handler(newValue, oldValue) {

                this.blogsList();


      },
      deep: true



        }
    },

    methods: {


       async blogsList(){

            this.preLooding = true
            var page = 1;
            if (this.$route.query.page) page = this.$route.query.page;

            var res = await this.callApi('get',`/api/get/blog/list?page=${page}`,[]);
            this.items = res.data
            this.TotalRows = `${res.data.total}`;
            this.PerPageData = `${res.data.per_page}`;
            this.Totalpage = res.data.links
            if(page==1){
                this.pageNO = 1;
            }else{
                this.pageNO = (page-1)*this.PerPageData+1;
            }


                this.preLooding = false
        },

        async postDelete(id){

            Swal.fire({
                        title: 'আপনি কি নিশ্চিত?',
                        text: `পোস্ট টি ডিলিট করতে চান!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: `হা নিশ্চিত`,
                        cancelButtonText: `বাতিল`
                    }).then(async (result) => {
                        if (result.isConfirmed) {
                            var res = await this.callApi('get', `/api/get/blog/delete/${id}`, []);
                            Notification.customSuccess(`পোস্ট টি ডিলিট হয়েছে!`);
                            this.preLooding = false
                            this.blogsList()
                        } else {
                            this.preLooding = false
                        }
                    })


        },




    },





    mounted() {

        this.blogsList();


    }


}
</script>
