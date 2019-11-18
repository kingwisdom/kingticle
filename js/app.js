let app = new Vue({
    el: "#root",
    data: {
        errorMessage: "",
        successMessage: "",
        articles: [],
        newArticle: { title:"", body_url:"", image_url:""}
    },

    mounted: function(){
        this.getAllArticles()
        // console.log("Mounted");
    },
    // filter: {
    //     formatDate(time){
    //         let dt = eval(time*1000);
    //         let myDate = new Date(dt);
    //         return(myDate.toLocaleDateString());
    //     }
    // },
    methods: {
        formatDate: function(time){
            // let dt = eval(time*1000);

             let myDate = new Date(time);
             let dt = myDate.toDateString()
            // return(myDate.toLocaleDateString());
            return dt
        },
        getAllArticles: function() {
            axios.get('https://delinksproperty.com/api.php?action=read')
            .then(function(response){
                // console.log(response)
                if(response.data.error){
                    app.errorMessage = response.data.error
                }else{
                    app.articles = response.data.articles
                }
            })
        },

        saveArticle: function() {
            // console.log(app.newArticle)
            let formData = app.toFormData(app.newArticle)
            axios.post('https://delinksproperty.com/api.php?action=create', formData)
            .then(function(response){
                console.log(response);
                app.newArticle = {title:"",body_url:"",image_url:""}
                if(response.data.error){
                    app.errorMessage = response.data.message;
                } else {
                    app.successMessage = response.data.message;
                    app.getAllArticles();
                }
            });
        },

        toFormData: function(obj){
            let form_data = new FormData();
            for(let key in obj) {
                form_data.append(key, obj[key]);
            }
            return form_data;
        },

        clearMessage: function(){
            app.errorMessage = "";
            app.successMessage = "";
        }
    }
})
