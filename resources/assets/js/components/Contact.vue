<template>
    <section class="section contact" id="contact">
        <div class="container">
            <h2 class="section-title">Contact</h2>
            <modal v-bind:message="message" v-if="modaltoggle" @close="changeValue"></modal>
            <p>Drop me a note to talk about your business project or just to say hi. I'll get back to you within a day usually, and we can hash it out. Don't be shy; say "Hi"!</p>
            <div class="row">
                <form method="post" action="/contact" class="form contact-form">
                    <div class="form-element">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="name-input" required>
                    </div>
                    <div class="form-element">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" class="email-input" required>
                    </div>
                    <div class="form-element">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" class="phone-input" required>
                    </div>
                    <div class="form-element">
                        <label for="message">Message</label>
                        <textarea class="message-input" name="message" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="form-element">
                        <button class="submit-button">Send Message</button>
                        <input type="hidden" name="_token" :value="csrf">
                    </div>
                </form>
            </div>
            <div class="divider"></div>
        </div>
    </section>
</template>

<script>
    export default {
        props: ['message', 'showmodal'],
        data() {
            return {
                csrf: '',
                modaltoggle: this.showmodal
            }
        },
        methods: {
            changeValue: function () {
                this.modaltoggle = !this.modaltoggle
            }
        },
        mounted() {
            let meta = document.querySelector('meta[name="csrf-token"]');
            this.csrf = meta.getAttribute('content');
            //this.csrf = document.querySelector('meta[name="csrf-token"]')['content‌​'];
            console.log('Component mounted.')
        }
    }
</script>
