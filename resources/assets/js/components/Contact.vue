<template>
    <section class="section contact" id="contact">
        <div class="container">
            <h2 class="section-title">Contact</h2>
            <div class="row">
                <form method="post" action="/" class="form contact-form">
                    <div class="form-element">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="name-input">
                    </div>
                    <div class="form-element">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" class="email-input">
                    </div>
                    <div class="form-element">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="phone" class="phone-input">
                    </div>
                    <div class="form-element">
                        <label for="message">Message</label>
                        <textarea class="message-input" name="message" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-element">
                        <button class="submit-button">Send Message</button>
                    </div>
                </form>
            </div>
            <div class="divider"></div>
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
