<!--<template xmlns="http://www.w3.org/1999/html">-->

<!--    <div class="mb-2 max-h-screen flex flex-col">-->
<!--        <div class="mockup-code"  v-if="finder">-->
<!--            <div  v-for="user in finder">-->
<!--                <a :href="`/search/group/${user.id}`"><pre><code class="text-blue-800">{{user.name}}</code> <img v-if="user.photo_profile_path" :src="user.photo_profile_path"></pre></a>-->
<!--            </div>-->

<!--        </div>-->



<!--    <div v-for="message in messages" class=" mt-4">-->

<!--        <div :class="message.user.id == my_id ? 'chat chat-end' : 'chat chat-start'">-->
<!--            <a :href="`profile/${message.user.id}`"> <i>{{message.user.name}}</i></a>-->
<!--            <div v-if="message.message" :class="message.user.id == my_id ? 'chat-bubble chat-bubble-success' :'chat-bubble chat-bubble-secondary'">{{ message.message}}</div><br>-->
<!--            <img v-if="message.files" width="300" height="200"  :src="`http://127.0.0.1:8000/storage/${message.files}`" class="m">-->
<!--            <br>-->
<!--            <i class=""> {{message.created_at}}</i>-->
<!--        </div>-->


<!--    </div>-->








<!--    <input v-if="this.group_id" name="message" type="text" @keydown.enter="sendMess(mess)" v-model="mess" class="input input-bordered input-accent w-full" />-->
<!--    </div>-->

<!--</template>-->
<template>
    <body class="flex flex-col items-center justify-center w-full min-h-screen bg-base-100 text-gray-800 " v-if="group_id">

    <!-- Component Start -->
    <div class="flex flex-col flex-grow w-full  bg-gray-400 shadow-xl rounded-lg overflow-hidden ">
        <div class="flex flex-col flex-grow h-0 p-4 overflow-auto">

                <div v-for="message in messages">

                    <div :class="message.user.id == my_id ? 'chat chat-end' : 'chat chat-start'">
                        <a :href="`http://127.0.0.1:8000/profile/${message.user.id}`"> <i>{{message.user.name}}</i></a>
                        <div v-if="message.message" :class="message.user.id == my_id ? 'chat-bubble chat-bubble-success' :'chat-bubble chat-bubble-secondary'">{{ message.message}}</div><br>
                        <img v-if="message.files" width="300" height="200"  :src="`http://127.0.0.1:8000/storage/${message.files}`" class="m">
                        <br>
                        <i class=""> {{message.created_at}}</i>
                    </div>


                </div>
        </div>

    </div>
    <!-- Component End  -->

    </body>
    <input v-if="this.group_id" name="message" type="text" @keydown.enter="sendMess(mess)" v-model="mess" class="input input-bordered input-accent w-full" />

</template>
<script>
import axios from "axios";
export default {

    name: "IndexChat",
    data() {
        return {
            messages: [],
            xyi: ['dsfds', 'dsafdfsa', 'sdfas'],
            mess: '',
            s: '',
            finder: null,
            on: false,
            sort: '',
            image: File,
        }
    },
    methods: {
        async getMess() {
            let res = await axios.get(`http://127.0.0.1:8000/getMessages/${this.group_id}`)
            this.messages = res.data
            console.log(res.data)
        },

        sendMess(mess) {
            axios.post(`http://127.0.0.1:8000/sendMessage/${this.group_id}`, {
                message: mess,
                image: this.image
            }).then(res => {
                this.mess = ''
                this.messages.push(res.data)
                console.log('mess send')
            })

        },

        findUser() {

            axios.get(`http://127.0.0.1:8000/search?s=${this.s}`).then(res => {
                this.finder = null;
                this.finder = res.data
                this.on = true
            })
        },

        sorter(target) {
            if (target == '-') {
                this.finder.sort((a, b) => a.id - b.id);
            }
            if (target == '+') {
                this.finder.sort((a, b) => a.id + b.id);
            }
        },

        uploadFiles() {
            var s = this
            const data = new FormData(document.getElementById('uploadForm'))
            var imagefile = document.querySelector('#file')

            data.append('file', imagefile)
            axios.post(`http://127.0.0.1:8000/sendMessage/${this.group_id}`, data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    console.log(response)
                })
                .catch(error => {
                    console.log(error.response)
                })
        }
    },

    props:{
        my_id: Number,
        group_id: Number,
    },
    mounted() {
        if (this.chat_id != null || this.recipient_id !== null){
            this.getMess();
        }
        console.log(this.messages)

    },
    created() {
        Echo.channel(`private-chat`)
            .listen('MessageEvent', (res) => {
                console.log(this.res)
                this.messages.push(res.message)
            });


    }



}



</script>

<style scoped>

</style>
