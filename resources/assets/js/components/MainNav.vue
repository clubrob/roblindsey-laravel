<template>
    <nav class="navbar">
        
        <div class="container">
            <div class="navCover">
                <ul id="mainNav" class="navbar-menu" v-bind:class="{navHidden: hideNav}">
                    <li>
                        <a href="/#home" v-on:click.prevent="hideNav" v-scroll-to="{
                            el: '#home',
                            offset: -60
                            }">Home</a>
                    </li><li>
                        <a href="/#about" v-on:click.prevent="hideNav" v-scroll-to="'#about'">About</a>
                    </li><li>
                        <a href="/#blog" v-on:click.prevent="hideNav" v-scroll-to="'#blog'">Blog</a>
                    </li><li>
                        <a href="/#contact" v-on:click.prevent="hideNav" v-scroll-to="'#contact'">Contact</a>
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
                var mainNav = this.$el.querySelector('#mainNav');
                mainNav.classList.toggle('navHidden');
                var botDot = this.$el.querySelector('.botdot-toggle');
                botDot.classList.toggle('botdotOpen');
            }
        }
    }
</script>