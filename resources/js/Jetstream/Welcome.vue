<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <img src="/images/pnlogo.png" class="inline-block h-12 w-auto" /> <div class="inline-block text-3xl"> Welcome to Pew News </div>
            </div>
            <div class="mt-8 text-2xl">
               My Articles:
            </div>
            <div class="bg-gray-200 bg-opacity-25 ">
            <div v-for="article in myArticles" :key="article.id" >
                    <div :key="article.id">{{article.name}} - <button class="inline-block" v-on:click.prevent="editArticle(article.id)">Edit</button></div>
            </div>
            </div>
            <div class="mt-8 text-2xl">
                Write an article:
            </div>

        </div>

        <div class="bg-gray-200 bg-opacity-25 ">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="article_name">
                    Article Name
                </label>
                <input :min="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="articleName"  id="article_name" type="text" placeholder="Article Name">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="img_url">
                        Image URL
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="articleImg" id="img_url" type="text" placeholder="http://www...">
                </div>
                     <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                        Content
                    </label>
                 <ckeditor id="content" :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
                <div class="flex items-center justify-between mt-3">
                    <button :type="'submit'" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" v-on:click.prevent="submitPost()" id="articleSubmit" >
                        Post
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                        Need Help?
                    </a>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
     import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
        import axios from 'axios';
    export default {
        mounted() {

            this.getMyArticles(this.$userId);
        },
        methods: {
            submitPost: function(){
                let thisser = this;
                if(thisser.articleExists){
                  axios.put("/articles/"+thisser.articleId,{articleId:thisser.articleId,articleName:thisser.articleName,articleImg:thisser.articleImg,articleContent:thisser.editorData})
                                .then(response => thisser.whatNext(response) )
                }else{
                  axios.post("/articles",{articleName:thisser.articleName,articleImg:thisser.articleImg,articleContent:thisser.editorData})
                                .then(response => thisser.whatNext(response) )
                }
          
            },
            whatNext: function(response){
                if(response.data == 'good'){
                    location.reload();
                }else{
                    console.log(response);
                    alert('Check that you filled out all fields correctly.')
                }

            },
            getMyArticles: function(id){
                axios.get("/articles/my",{id:id})
                                .then(response => this.myArticlesGet(response.data) )
            },
            myArticlesGet: function(data){
                this.myArticles = data;
            },
            editArticle: function(articleid){
                var articles = this.myArticles;
                var thisser = this;
                $.each(articles, function(key,value){
                    if(value.id == articleid){
                        thisser.articleName = value.name;
                        thisser.articleImg = value.imageUrl;
                        thisser.editorData = value.content;
                        thisser.articleExists = true;
                        thisser.articleId = value.id;
                    }
                }
            
            )},
        },
        data() {
            return {
                editor: ClassicEditor,
                articleExists: false,
                articleName: '',
                articleImg: '',
                articleId: 0,
                editorData: '<p>Enter content here.</p>',
                editorConfig: {
                    
                },
                myArticles:{},
            };
        },
        components: {
           
        },
    }
</script>
