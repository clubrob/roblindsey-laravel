<template>
    <section class="section blog" id="blog">
        <div class="container">
            <h2 class="section-title">Blog</h2>
            <div class="row">
                <div class="col30">
                    <p>
                        <a href="/blog"><img class="img-responsive thumbnail" src="/images/asheville_with_the_missus.jpg" alt="Asheville with the missus"></a>
                    </p>
                </div>
                <div class="col70">
                    <p>
                        I put together a <a href="/blog">blog</a> to share my adventures in web development and as a citizen of the lovely western North Carolina mountains. My wife Caitlin and I enjoy exploring the area and finding interesting things to see and do. I’ll let you know about some of them. I’ll also be using these posts as a playground of sort for web development experiments. And finally, I’ll be sharing my knowledge as I continue to learn more (and more and more) about the wide world of web development. Hopefully some of my experiences can be helpful to you on your own journey.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col30" v-for="post in posts" v-bind:key="post.id">
                    <div class="card blog-feature">
                        <div class="card-body">
                            <h3 class="card-title"><a :href="'/blog/post/' + post.slug">{{ post.title }}</a></h3>
                            <p class="card-feature-img" >
                                <a :href="'/blog/post/' + post.slug">
                                    <img v-if="post.photos[0]" :src="'/images/blog/' + post.photos[0].filename" :alt="post.photos[0].description" class="thumbnail">
                                    <img v-else src="/images/blog/rob-lindsey-design-default.png" alt="Rob Lindsey Design" class="thumbnail">
                                </a>
                            </p>
                            <p class="card-text">{{ post.detail.summary }} 
                                <small class="small">[Continue reading: <a :href="'/blog/post/' + post.slug"> {{ post.title }}</a>]</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divider">
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

        created() {
            axios.get('/blog/posts.json')
                .then(response => this.posts = response.data);
        }
    }
</script>
