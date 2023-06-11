<template>
    <div class="alert shadow-lg" v-if="message">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <div>
            <i class="text-xs">New message!</i>
            <div class="text-base"><a :href="`/messenger/${group_id}`">{{message.message}}</a></div>
        </div>
        <button class="btn btn-sm">See</button>
    </div>
</template>

<script>
export default {
    name: "NotificationComponent",
    data() {
        return {
            message: null,
            group_id:'',
        }
    },

    created() {
        Echo.channel(`private-notification`)
            .listen('NewMessageEvent', (res) => {
                this.message = ''
                this.group_id = ''
                console.log(res)
                this.message = res.message
                this.group_id = res.group_id
                console.log('sex')
            });
    }
}
</script>

<style scoped>

</style>
