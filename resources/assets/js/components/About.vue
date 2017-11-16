<template>
    <section class="section about" id="about">
        <div class="container">
            <h2 class="section-title">About</h2>
            <div class="row">
                <div class="col70">
                    <p>
                        Howdy, I’m Rob Lindsey. I’m a web technologist in the western North Carolina mountains. I’ve lived in the Carolinas my whole life, and I’ve been working on the web for over 10 years. I have a deep and broad knowledge of what makes it all go. I’d love to work with you to make your business goals a reality. I can speak server, frontend, marketing, usability, accessibility, and design. </p><p>If you need a full-stack contractor to put it all together for you or a team member to fill in on a larger project, I’m your guy. My stack is PHP (<em>Laravel</em>), <em>MySQL</em>, CSS (<em>Sass</em>, <em>Bootstrap</em>, <em>Bulma</em>), and Javascript (<em>Vue</em>, <em>React</em>, <em>jQuery</em>, <em>npm</em>, <em>Webpack</em>, <em>Gulp</em>), but I have some experience with the Microsoft stack (<em>C#</em>, <em>.NET</em>, <em>MSSQL</em>), as well. In my spare time, I like exploring the Asheville area, going to concerts, and reading fiction. 
                        </p><p><a href="/#contact" v-on:click.prevent="hideNav" v-scroll-to="'#contact'">Drop me a line</a>, and let’s talk!
                    </p>
                </div>
                <div class="col30">
                    <img class="img-responsive thumbnail" src="/images/rob-lindsey.jpg" alt="Rob Lindsey">
                </div>
            </div>
            <h4 class="section-subtitle">Services</h4>
            <div class="row">
                <div class="col50">
                    <div class="card img-icon">
                        <div class="card-icon">
                            <img src="/images/wordpress-icon.svg" alt="Wordpress">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Wordpress</h3>
                            <p class="card-text">One of the most popular systems for managing your web content, Wordpress’s open source software powers the web presence of thousands of small and medium businesses throughout the world. I can help you maintain, upgrade, or customize your existing Wordpress project. Or we can start from scratch and build something beautiful.</p>
                        </div>
                    </div>
                </div>
                <div class="col50">
                    <div class="card img-icon">
                        <div class="card-icon">
                            <img src="/images/drupal-icon.svg" alt="Drupal">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Drupal</h3>
                            <p class="card-text">Drupal is a powerful, highly customizable content management platform used by some of the highest-profile organizations in the world, including the United States government. I can optimize or customize your existing Drupal project, or we can build one from the ground up that meets your exact business needs.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col50">
                    <div class="card img-icon">
                        <div class="card-icon">
                            <img src="/images/custom-projects-icon.svg" alt="Custom Projects">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Custom Projects</h3>
                            <p class="card-text">If you have an idea that doesn’t fit into an existing content management system, I can build you a custom solution. Often, small and medium businesses simply want a one-page website to highlight their product or service with bold design and an engaging user experience… and a website that can be found on Google. Let me handle all that for you.</p>
                        </div>
                    </div>
                </div>
                <div class="col50">
                    <div class="card img-icon">
                        <div class="card-icon">
                            <img src="/images/web-consulting-icon.svg" alt="Web Technology Consulting">
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">Web Technology Consulting</h3>
                            <p class="card-text">The pace of change in web technologies can be daunting if it isn’t your full-time job to keep up with it. Let my nerd brain help. I can walk you through the process of setting up your own web hosting environment that you can take over after I’m done. Or I can help you setup your custom domain name at an all-in-one web service like Squarespace or Wix. I like talking about web tech, and my mom says I explain it well.</p>
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
        }
    }
</script>
