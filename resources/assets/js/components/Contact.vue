<template>
    <section class="section contact" id="contact">
        <div class="container">
            <h2 class="section-title">Contact</h2>
            <modal v-bind:message="message" v-if="modaltoggle" @close="changeValue"></modal>
            <p>Drop me a note to talk about your business project or just to say hi. I'll get back to you within a day usually, and we can hash it out. Don't be shy; say "Hi"!</p>
            <p class="small"><span class="required">*</span> Required</p>
            <div class="row">
                <form method="post" action="/contact" class="form contact-form">
                    <div class="form-element">
                        <label for="name"><span class="required" title="required">*</span>Name</label>
                        <input type="text" name="name" class="name-input" required>
                    </div>
                    <div class="form-element">
                        <label for="email"><span class="required" title="required">*</span>Email Address</label>
                        <input type="email" name="email" class="email-input" required>
                    </div>
                    <div class="form-element">
                        <label for="phone"><span class="required" title="required">*</span>Phone Number</label>
                        <input type="tel" name="phone" class="phone-input" required>
                    </div>
                    <div class="form-element">
                        <label for="message"><span class="required" title="required">*</span>Message <span class="small">({{remainingCount}} characters)</span></label>
                        <textarea v-model="message" v-on:keyup="countdown" class="message-input" name="message" cols="30" rows="10" maxlength="500" required></textarea>
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
                modaltoggle: this.showmodal,
                maxCount: 500,
                remainingCount: 500
            }
        },
        methods: {
            changeValue: function () {
                this.modaltoggle = !this.modaltoggle
            },
            countdown: function() {
                this.remainingCount = this.maxCount - this.message.length;
                this.hasError = this.remainingCount < 0;
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
