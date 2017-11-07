<template>
  <div class="tag-wrap">
      <h5>Tags</h5>
      <div class="tags">
          <span v-for="tag in tags" v-bind:key="tag.id"><a :href="'/blog/tag/' + tag.tag_slug">{{ tag.tag_name }}</a></span>
      </div>
  </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        data() {
            return {
                tags: []
            }
        },

        methods: {
            fetchTags: function(url){
                let vm = this;
                axios.get(url)
                .then(response => this.tags = response.data);
            }
        },

        created() {
            this.fetchTags('/blog/tags.json');
        }
    }
</script>
