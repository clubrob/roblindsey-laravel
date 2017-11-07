<nav class="navbar">
    <div class="container">
        <ul id="mainNav" class="navbar-menu" v-show="!seen">
            <li><a href="/">Home</a></li>
            <li>
                {{--  <a href="about">About</a>  --}}
                <router-link to="/about">About</router-link>
            </li>
            <li>
                <a href="blog">Blog</a>
            </li>
            <li>
                <a href="contact">Contact</a>
            </li>
        </ul>
        <div class="botdot-toggle" v-on:click="seen = !seen">
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