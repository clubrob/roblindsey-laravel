<template>
    <section class="section blog" id="blog">
        <div class="container">
            <h2 class="section-title">Blog</h2>
            <div class="row">
                <div class="col40">
                    <p>
                        <img src="" alt="">
                    </p>
                </div>
                <div class="col60">
                    <p>
                        <a href="/blog">Link to Blog</a> Velit enim minim dolore elit irure reprehenderit irure cillum esse quis ipsum duis magna esse. Adipisicing ea enim pariatur voluptate velit occaecat adipisicing qui aliquip. Eu eu et ea excepteur consectetur ad duis et.
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
