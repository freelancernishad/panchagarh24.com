import { mapGetters } from 'vuex'
export default {

    data(){
        return {
            nT:{}

        }
    },
    methods: {
        async callApi(method, url, dataObj ){
            try {
              return await axios({
                    method: method,
                    url: url,
                    data: dataObj
                });
            } catch (e) {
                return e.response
            }
        },


        dateformatGlobal(date=''){
            return  User.dateformat(date);
         },

        checkUserPermission(key){
            if(!this.userPermission) return true
            let isPermitted = false;
            for(let d of this.userPermission){
                if(this.$route.name==d.name){
                    if(d[key]){
                        isPermitted = true
                        break;
                    }else{
                        break
                    }
                }

            }
            return isPermitted
            // return this.$route.name;
        },




    },
    computed: {

        // Users(){
        //     return this.$store.getters.setUpdateUser;
        // }

        ...mapGetters({
            'Users' : 'getUpdateUser',
            'getlatestpost' : 'getlatestpost',
            // 'userPermission' : 'getUserPermission',
            // 'getAuthPermission' : 'getAuthPermission',
            // 'getUserRoles' : 'getUserRoles',
        }),

        // isReadPermitted(){
        //     return this.checkUserPermission('read')
        //  },
        //  isWritePermitted(){
        //      return this.checkUserPermission('write')
        //  },
        //  isUpdatePermitted(){
        //      return this.checkUserPermission('update')
        //  },
        //  isDeletePermitted(){
        //      return this.checkUserPermission('delete')
        //  },

    },




}
