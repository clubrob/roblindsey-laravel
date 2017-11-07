<template>
    <section class="section blog-list">
        <div class="container">
            <div class="row">
                <div class="col70">
                    <article class="blog-post" v-for="post in posts.data" v-bind:key="post.id">
                        <div class="post-image">
                            <a :href="'/blog/post/' + post.slug">
                                <img v-if="post.photos[0]" :src="'/images/blog/' + post.photos[0].filename" :alt="post.photos[0].description" class="post-thumb img-responsive thumbnail">
                                <img v-else src="/images/blog/rob-lindsey-design-default.png" alt="Rob Lindsey Design" class="post-thumb img-responsive thumbnail">
                            </a>
                        </div>
                        <div class="post-text">
                            <h3 class="post-title">
                                <a :href="'/blog/post/' + post.slug">{{ post.title }}</a>
                            </h3>
                            <div class="post-body">
                                {{ post.detail.summary }} 
                                <small class="small">[Continue reading: <a :href="'/blog/post/' + post.slug"> {{ post.title }}</a>]</small>
                            </div>
                        </div>
                    </article>
                    <div class="pagination" v-if="posts.last_page > 1">
                        <button class="button" @click="fetchPosts(posts.prev_page_url)"
                                :disabled="!posts.prev_page_url">
                            Previous
                        </button>
                        <!-- <span>{{posts.current_page}} {{posts.last_page}}</span> -->
                        <button class="button" @click="fetchPosts(posts.next_page_url)"
                                :disabled="!posts.next_page_url">Next
                        </button>
                    </div>
                </div>
                <div class="col30">
                    <!-- <blogsearch></blogsearch> -->
                    <taglist></taglist>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data() {
            return {
                posts: []
            }
        },

        props: ['endpoint'],

        methods: {
            fetchPosts: function(url){
                let vm = this;
                axios.get(url)
                .then(response => this.posts = response.data);
            }
        },

        created() {
            this.fetchPosts(this.endpoint);
        },

        ready: function() {
            this.fetchPosts(this.endpoint);
        }
    }
</script>
