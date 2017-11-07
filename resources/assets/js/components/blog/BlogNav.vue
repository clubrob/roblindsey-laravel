<template>
    <nav class="navbar">
        <div class="container">
            <div class="navCover">
                <ul id="blogNav" class="navbar-menu" v-bind:class="{navHidden: hideNav}">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="/blog">Blog Home</a>
                    </li>
                </ul>
            </div>
            <div class="botdot-toggle" v-on:click.prevent="hideNav">
                <a href="#">
                    <svg height="26" width="8">
                        <circle cx="4" cy="4" r="3" />
                        <circle cx="4" cy="13" r="3" />
                        <circle cx="4" cy="22" r="3" />
                    </svg>
                </a>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            hideNav: function (event) {
                var blogNav = this.$el.querySelector('#blogNav');
                blogNav.classList.toggle('navHidden');
                var botDot = this.$el.querySelector('.botdot-toggle');
                botDot.classList.toggle('botdotOpen');
            }
        }
    }
</script>